<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];

$checkMonthtimeformSR=$_POST["month"];
//資料庫設定
$DBNAME = "lm_data"; //資料庫名稱
$DBHOST = "localhost"; //主機位置
$DBAC = $ac; //登入資料庫的帳號
$conn = mysql_connect( $DBHOST,$DBAC,$pw); //連接資料庫
if (empty($conn)){
  die ("無法連結資料庫<br>");
}
if( !mysql_select_db("lm_data",$conn)) { //選擇資料庫
  die ("無法選擇資料庫<br>");
}
// 設定連線編碼
mysql_query("SET NAMES utf8");
?>
<html>

<head>
</head>

<body>


<button onclick="this.innerHTML=Date()">时间是？</button>


<table id="view" border="1" style="text-align: center; margin: auto;">
<tr>
    <tr>
    <td>時間戳記</td>
    <td>方式</td><!--<td>方式</td>-->
    <td>累積金額</td>
    <td>餘額</td>
    <td>詳細內容</td>
    </tr>
<?php
//印出

$IsNULL=0;
if($checkMonthtimeformSR=="顯示月報表(12)"){
    $checkMonthtimeformSR="12";
}else if($checkMonthtimeformSR=="顯示年報表(11)"){
    $checkMonthtimeformSR="11";
}else if($checkMonthtimeformSR=="顯示年報表(10)"){
    $checkMonthtimeformSR="10";
}else if($checkMonthtimeformSR=="顯示年報表(09)"){
    $checkMonthtimeformSR="09";
}else if($checkMonthtimeformSR=="顯示年報表(08)"){
    $checkMonthtimeformSR="08";
}else if($checkMonthtimeformSR=="顯示年報表(07)"){
    $checkMonthtimeformSR="07";
}else if($checkMonthtimeformSR=="顯示年報表(06)"){
    $checkMonthtimeformSR="06";
}else if($checkMonthtimeformSR=="顯示年報表(05)"){
    $checkMonthtimeformSR="05";
}else if($checkMonthtimeformSR=="顯示年報表(04)"){
    $checkMonthtimeformSR="04";
}else if($checkMonthtimeformSR=="顯示年報表(03)"){
    $checkMonthtimeformSR="03";
}else if($checkMonthtimeformSR=="顯示年報表(02)"){
    $checkMonthtimeformSR="02";
}else if($checkMonthtimeformSR=="顯示年報表(01)"){
    $checkMonthtimeformSR="01";
}
echo "<p>你剛選擇的月份$checkMonthtimeformSR</p>";
$rs = mysql_query("SELECT * FROM `$DBAC` ORDER BY `time_stamp` DESC LIMIT 100");
while($row = mysql_fetch_array($rs)){//印出資料
    $time=$row['time_stamp'];
    if($checkMonthtimeformSR[0]==$time[5] && $checkMonthtimeformSR[1]==$time[6]){
        $IsNULL++;
        echo "<tr><td>".$row['time_stamp']."</td>";
        if($row['method'] == "1"){
            echo "<td>收入</td>";
        }else if($row['method'] == "0"){
            echo "<td>支出</td>";
        }else{
            echo "<td>其他</td>";
        }
        echo "<td>NTD&nbsp".$row['amount']."</td>";
        echo "<td>NTD&nbsp".$row['total']."</td>";
        if(empty($row['descrption'])){
            echo "<td>無</td></tr>";
        }else{
            echo "<td>".$row['descrption']."</td></tr>";
        }
    }
}
if($IsNULL==0){//檢查是否有查詢到資料 未查詢到則為0
    echo "<script language=\"JavaScript\">"; //echo "<p>你沒有任何關於收支出紀錄</p>";
    echo "window.alert(\"時間內未做沒有任何紀錄\")";
    echo "</script>";
}else{
    //echo "<p>你有收支紀錄</p>";
}


mysql_close($conn);
?>
</tr>
</table>
<br>
<hr>
<form style="text-align: center;" action="../function.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="返回功能列表"></form>
</body>

</html>