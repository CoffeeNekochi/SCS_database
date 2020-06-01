<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$inout=$_POST["inout"];
$amo=$_POST["amount"];
$descrption=$_POST["descrption"];
$time=date("Y-m-d H:i:s");
//資料庫設定
$DBNAME = "lm_data"; //資料庫名稱
$DBHOST = "localhost"; //主機位置
$DBAC = $ac; //登入資料庫的帳號
$conn = mysql_connect( $DBHOST,$DBAC,$pw); //連接資料庫
if (empty($conn)){
  //print mysql_error($conn);
  die ("無法連結資料庫<br>");
  //exit;
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
<table border="1" style="text-align: center; margin: auto;">
<tr>
    <tr>
    <td>時間戳記</td>
    <td>方式</td>
    <td>收支金額</td>
    <td>餘額</td>
    <td>詳細內容</td>
    </tr>
<?php
//印出
$rs = mysql_query("SELECT * FROM `$DBAC` ORDER BY `time_stamp` DESC LIMIT 10");
while($row = mysql_fetch_array($rs)){//印出資料
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