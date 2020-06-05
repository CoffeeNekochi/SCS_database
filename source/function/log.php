<?php
$url="./function.php";
$lr = $_POST["logreg"]; //1 LOG,0 REG

setcookie("ac" , $_POST["ac"] , time()+3600);
setcookie("pw" , $_POST["pw"] , time()+3600);
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
$result = mysql_query("CREATE USER '$_COOKIE["ac"]'@'localhost' IDENTIFIED BY '$_COOKIE["pw"]';");
if(!$result){
    echo "帳號已經創建";
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}else{
    echo "成功創建";
}
$result = mysql_query("GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO '$_COOKIE["ac"]'@'localhost';");
if(!$result){
    echo "&nbsp授權失敗";
    die('<br><form style="text-align: center;" 
        action="../index.html" method="post">
        <input type="submit" value="返回首頁"/></form>');
}else{
    echo "&nbsp成功授權";
}
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
    $DBAC = $_COOKIE["ac"]; //登入資料庫的帳號
    $conn = mysql_connect( $DBHOST,$DBAC,$_COOKIE["pw"]); //連接資料庫
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
    <input type="submit" value="進入功能介面"/>
</form>

</body>

</html>