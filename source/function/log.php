<?php
$url="./function.php";
$lr = $_POST["logreg"]; //1 LOG,0 REG
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$time=date("Y-m-d H:i:s");
?>

<html>

<head>
<title>登入...</title>
</head>

<body>
<p style="text-align: center;"><?php
if($lr == "0"){   //reg
    //登入資料庫
    $DBHOST = "localhost"; //主機位置
    $DBAC = "root"; //登入資料庫的帳號
    $conn = mysql_connect( $DBHOST,$DBAC,"error"); //連接資料庫
    if (empty($conn)){
      echo "無法連結資料庫";
      die('<br><form style="text-align: center;" 
            action="../index.html" method="post">
            <input type="submit" value="返回首頁"/></form>');
      exit;
}
//創建帳號
$result = mysql_query("CREATE USER '$ac'@'localhost' IDENTIFIED BY '$pw';");
if(!$result){
    echo "帳號已經創建";
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}else{
    echo "成功創建";
}
$result = mysql_query("GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO '$ac'@'localhost';");
if(!$result){
    echo "&nbsp授權失敗";
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}else{
    echo "&nbsp成功授權";
}
$result = mysql_select_db("lm_data",$conn);
$result = mysql_query("CREATE TABLE `$ac`
(time_stamp datetime, method int(11), amount int(11), total int(11), descrption text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL);");
if(!$result){
    echo "&nbsp創建資料表失敗";
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}else{
    echo "&nbsp成功創建資料表";
}
$result = mysql_query("ALTER TABLE `$ac` ADD PRIMARY KEY(`time_stamp`);");
$result = mysql_query("INSERT INTO `$ac` (`time_stamp`, `method`, `amount`, `total`, `descrption`)
VALUES ('$time', '-1', '0', '0', 'Account Setup.');");
if(!$result){
    echo "&nbsp創建流程失敗";
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}else{
    echo "&nbsp創建流程完成";
}
mysql_close($conn);
}else{         //log
    $DBHOST = "localhost"; //主機位置
    $DBAC = $ac; //登入資料庫的帳號
    $conn = mysql_connect( $DBHOST,$DBAC,$pw); //連接資料庫
    if (empty($conn)){
        echo "帳號或密碼錯誤";
        die('<br><form style="text-align: center;" 
            action="../index.html" method="post">
            <input type="submit" value="返回首頁"/></form>');
        exit;
    }else{
        echo "成功登入";
    }
mysql_close($conn);
}
?></p>
<br>
<form style="text-align: center;" action="./function.php" method="post">
    <input type="hidden" name="ac" value="<?php echo $ac?>"/>
    <input type="hidden" name="pw" value="<?php echo $pw?>"/>
    <input type="submit" value="進入功能介面"/>
</form>

</body>

</html>