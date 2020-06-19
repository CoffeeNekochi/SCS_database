<?php 
header("Content-Type:text/html; charset=utf-8");
session_start();
$_SESSION['ac']=@$_POST["ac"];
$_SESSION['pw']=@$_POST["pw"];
$time=date("Y-m-d H:i:s");
if($_SESSION['ac'][0]=='E'){
  $url="./emp_home.php";
}else{
  $url="./mgr_home.php";
}
?>

<html>
<head>
<meta http_equiv="refresh" content="1;
url=<?php echo $url; ?>">
<title>登入...</title>
</head>

<body>
<p style="text-align: center;">
<?php
    //登入資料庫
    $DBHOST = "localhost"; //主機位置
    $conn = mysqli_connect( $DBHOST,$_SESSION["ac"],$_SESSION["pw"]); //連接資料庫
    if (empty($conn)){
        session_unset();
        echo "無法連結資料庫";
        die('<br><form style="text-align: center;" 
              action="./index.html" method="post">
              <input type="submit" value="返回首頁"/></form>');
        exit;
      }else{
        header("Location: ".$url);
      }
?></p>
</body>
</html>