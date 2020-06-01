<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$DBHOST = "localhost"; //主機位置
$conn = mysql_connect( $DBHOST,$ac,$pw); //連接資料庫
if (empty($conn)){
  echo '<p style="text-align: center;">登入資訊錯誤<br></p>';
  die('<br><form style="text-align: center;" 
      action="../../index.html" method="post">
      <input type="submit" value="返回首頁"/></form>');
}
mysql_close($conn);
?>

<html>
    <head><title>基本理財</title></head>
<body>
    <!--測試-->
    <h1 style="text-align: center;">基本理財</h1>
    
    <form style="text-align: center;" action="./M_record.php" method="post">
        <input type="hidden" name="ac" value="<?php echo $ac?>"/>
        <input type="hidden" name="pw" value="<?php echo $pw?>"/>
        請選擇收入或支出: <br>
        <input type="radio" name="inout" value="1" checked/>收入<br>
        <input type="radio" name="inout" value="0"/>支出<br>
        本次收入/支出金額(NTD): <br>
        <input type="number" name="amount" required="required" placeholder="請輸入金額"/> <br>
        詳細內容(非必填): <br>
        <textarea cols="25" rows="5" name="descrption"></textarea> <br>
        <input type="submit" value="送出"/>
    </form>
    <br>
    <hr>
    <form style="text-align: center;" action="../function.php" method="post">
    <input type="hidden" name="ac" value="<?php echo $ac?>"/>
    <input type="hidden" name="pw" value="<?php echo $pw?>"/>
    <input type="submit" value="返回功能列表"></form>
</body>
</html>