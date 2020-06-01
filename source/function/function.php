<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$DBHOST = "localhost"; //主機位置
$conn = mysql_connect( $DBHOST,$ac,$pw); //連接資料庫
if (empty($conn)){
    echo '<p style="text-align: center;">登入資訊錯誤<br></p>';
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}
mysql_close($conn);
?>

<html>

<head>
<title>功能列表</title>
</head>

<body>
<h2 style="text-align: center;">歡迎!&nbsp"<?php echo $ac; ?>"</h2>
<!-- 基本理財測試 -->
<br>
<form style="text-align: center;" action="./MM/MoneyManage.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="基 本 理 財">
</form>
<!-- 查詢測試 -->
<br>
<form style="text-align: center;" action="./SR/SearchRecord.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="查 詢">
</form>
<!-- 股票查閱測試 -->
<br>
<form style="text-align: center;" action="./SC/StockCode.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="股 票 查 閱">
</form>
<!-- 發票核對測試 -->
<br>
<form style="text-align: center;" action="./RC/ReceiptCheck.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="發 票 核 對">
</form>
<!-- 計算機測試 -->
<br>
<form style="text-align: center;" action="./CC/Caculator.php" method="post">
<input type="hidden" name="ac" value="<?php echo $ac?>"/>
<input type="hidden" name="pw" value="<?php echo $pw?>"/>
<input type="submit" value="計 算 機">
</form>
<!-- 登出(返回首頁) -->
<br>
<hr>
<form style="text-align: center;" action="../index.html" method="post">
<input type="submit" value="登出">
</form>
</body>

</html>