<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$DBHOST = "localhost"; //主機位置
$conn = mysql_connect( $DBHOST,$ac,$pw); 
if (empty($conn)){
  echo '<p style="text-align: center;">登入資訊錯誤<br></p>';
  die('<br><form style="text-align: center;" 
      action="../../index.html" method="post">
      <input type="submit" value="返回首頁"/></form>');
}
mysql_close($conn);//關閉連結
?>

<html>
<body>
    <h1 style="text-align: center;">查詢</h1>
    
    <form style="text-align: center;" action="./S_record.php" method="post">
        <input type="hidden" name="ac" value="<?php echo $ac?>"/>
        <input type="hidden" name="pw" value="<?php echo $pw?>"/>
        <input type="submit" value="顯示月報表(前十筆)"/>
    </form>
    <form style="text-align: center;" action="./S_Yrecord.php" method="post">
        <input type="hidden" name="ac" value="<?php echo $ac?>"/>
        <input type="hidden" name="pw" value="<?php echo $pw?>"/>
        <input type="submit" name="year" value="顯示年報表(2019)"/>
        <input type="submit" name="year" value="顯示年報表(2020)"/>
    </form>
    <form style="text-align: center;" action="./S_Mrecord.php" method="post">
        <input type="hidden" name="ac" value="<?php echo $ac?>"/>
        <input type="hidden" name="pw" value="<?php echo $pw?>"/>
        <input type="submit" name="month" value="顯示月報表(12)"/>
        <input type="submit" name="month" value="顯示月報表(11)"/>
        <input type="submit" name="month" value="顯示月報表(10)"/>
        <input type="submit" name="month" value="顯示月報表(09)"/>
        <input type="submit" name="month" value="顯示月報表(08)"/>
        <input type="submit" name="month" value="顯示月報表(07)"/>
        <input type="submit" name="month" value="顯示月報表(06)"/>
        <input type="submit" name="month" value="顯示月報表(05)"/>
        <input type="submit" name="month" value="顯示月報表(04)"/>
        <input type="submit" name="month" value="顯示月報表(03)"/>
        <input type="submit" name="month" value="顯示月報表(02)"/>
        <input type="submit" name="month" value="顯示月報表(01)"/>
    </form>
    <!--<form style="text-align: center;" action="" method="post">
        <input type="hidden" name="ac" value="<?php echo $ac?>"/>
        <input type="hidden" name="pw" value="<?php echo $pw?>"/>
        <input type="submit" value="顯示日報表"/>
    </form>-->
    <h3 style="text-align: center">↓請用這個↓(請輸入完整)</h3>
    <form style="text-align: center;" action="./S_inputdata.php" method="post">
        <input type="hidden" name="ac" value="<?php echo $ac?>"/>
        <input type="hidden" name="pw" value="<?php echo $pw?>"/>
        <input type="text" placeholder="YYYY-MM-DD" name="inputdata" value=""/>
        <input type="submit" value="如果要完整輸入日期請用這個提交" />
    </form>           
    <br>
    <hr>
    <form style="text-align: center;" action="../function.php" method="post">
    <input type="hidden" name="ac" value="<?php echo $ac?>"/>
    <input type="hidden" name="pw" value="<?php echo $pw?>"/>
    <input type="submit" value="返回功能列表"></form>
</body>
</html>