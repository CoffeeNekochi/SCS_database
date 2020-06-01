<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$checkYeartimeformSR=$_POST["year"];
//資料庫設定
$DBNAME = "lm_data"; //資料庫名稱
$DBHOST = "localhost"; //主機位置
$DBAC = $ac; //登入資料庫的帳號
$conn = mysql_connect( $DBHOST,$DBAC,$pw); //連接資料庫(伺服器主機,用戶名,密碼)
if (empty($conn)){
  //echo mysql_error($conn);//除錯用回傳錯誤訊息
  die ("無法連結資料庫<br>");
}   
if( !mysql_select_db("lm_data",$conn)) { //選擇資料庫//(資料庫名稱,資料庫連結)
  die ("無法選擇資料庫<br>");
}
// 設定連線編碼
mysql_query("SET NAMES utf8");
?>
<html>

<head>
</head>

<body>


<!--<button onclick="this.innerHTML=Date()">时间是？</button>-->


<table id="view" border="1" style="text-align: center; margin: auto;">
<tr>
    <tr>
    <td>時間戳記</td>
    <td>方式</td>
    <td>累積金額</td>
    <td>餘額</td>
    <td>詳細內容</td>
    </tr>
<?php
//印出

$IsNULL=0;
if($checkYeartimeformSR=="顯示年報表(2019)"){
    $checkYeartime="2019";
    echo "<p>你剛選擇的年份$checkYeartime</p>";
}else if($checkYeartimeformSR=="顯示年報表(2020)"){
    $checkYeartime="2020";
    echo "<p>你剛選擇的年份$checkYeartime</p>";
}
//time_stamp 由大到小
$rs = mysql_query("SELECT * FROM `$DBAC` ORDER BY `time_stamp` DESC LIMIT 100");
while($row = mysql_fetch_array($rs)){//印出資料
    $time=$row['time_stamp'];
    //echo "<p>!!".$row['time_stamp'][0]."".$row['time_stamp'][1]."".$row['time_stamp'][2]."".$row['time_stamp'][3]."!!</p>";
    if($checkYeartime[2]==$time[2] && $checkYeartime[3]==$time[3]){
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
if($IsNULL==0){
    echo "<script language=\"JavaScript\">"; //echo "<p>你沒有任何關於收支出紀錄</p>";
    echo "window.alert(\"時間內未做沒有任何紀錄\")";
    echo "</script>";
}else{
    //echo "<p>你有收支紀錄</p>";
}

/*$rs2 = mysql_query("SELECT * FROM `$DBAC` ORDER BY `time_stamp` DESC LIMIT 100");
while($row = mysql_fetch_array($rs2)){
    echo "<h1>".$row['time_stamp']."</h1>";
    $time=$row['time_stamp'];
    echo "<p>$time[0] $time[1] $time[2] $time[3] </p>";
    echo "<p>$time[4] $time[5] $time[6] $time[7] $time[8] $time[9]</p>";
    echo "<p>$time[10] $time[11] $time[12] $time[13] $time[14] $time[15]</p>";
}*/

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