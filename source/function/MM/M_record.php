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
  print mysql_error($conn);
  die ("無法連結資料庫<br>");
  exit;
}
if( !mysql_select_db("lm_data",$conn)) { //選擇資料庫
  die ("無法選擇資料庫<br>");
}
// 設定連線編碼
mysql_query("SET NAMES utf8");
//餘額計算
$rs = mysql_query("SELECT * FROM `$DBAC` ORDER BY `time_stamp` DESC LIMIT 1");
$row = mysql_fetch_array($rs);
$total =$row['total'];
if($inout == "1"){
  $total += $amo;
}else if($inout == "0"){
  $total -= $amo;
}

//寫入
$sqlin ="INSERT INTO `$DBAC` (`time_stamp`, `method`, `amount`, `total`, `descrption`)
VALUES ('$time', '$inout', '$amo', '$total', '$descrption');";
$pass = mysql_query($sqlin) or die(mysql_error());
mysql_close($conn);
?>
<html>

<head>
<title>收支結果</title>
</head>

<body>
<p style="text-align: center;">收入支出:&nbsp
<?php
if($inout == "1"){
  echo "收入";
}else if($inout == "0"){
  echo "支出";
}
?></p>
<p style="text-align: center;">輸入之金額:&nbsp<?php echo $amo?></p>
<p style="text-align: center;">詳細內容:</p>
<p style="text-align: center;"><?php echo $descrption; ?></p>
<h3 style="text-align: center; color:Red;"><?php 
if($total < "0" && $inout == "0"){
  echo "【注意：所剩餘額已達負值，提醒您請勿再支出】";
}
?></h3>
<br>

<form style="text-align: center;" action="../function.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="返回功能列表">
</body>

</html>