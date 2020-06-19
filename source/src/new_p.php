<?php
$pid=$_POST['pid'];
$p_name=$_POST['p_name'];
$s_time=$_POST['s_time'];
$e_time=$_POST['e_time'];
$detail=$_POST['detail'];
$num_req=$_POST['num_req'];
$client=$_POST['client'];
$loc_addr=$_POST['loc_addr'];

header("Content-Type:text/html; charset=utf-8");
$url="./mgr_project.php";
session_start();
// Create connection
$conn = mysqli_connect("localhost", $_SESSION['ac'], $_SESSION['pw'], "new_scs");

// Check connection
if (empty($conn)){
    session_destroy();
    echo "無法連結資料庫";
    die('<br><form style="text-align: center;" 
          action="./index.html" method="post">
          <input type="submit" value="返回首頁"/></form>');
    exit;
}

//寫入
$sqlin ="INSERT INTO `project` (`P_id`, `P_name`, `start_date`, `end_date`, `detail`, `num_req`, `client`) VALUES ('$pid', '$p_name', '$s_time', '$e_time', '$detail', '$num_req', '$client');";
$sqlin2 ="INSERT INTO `location` (`loc_pid`, `loc_addr`, `lat`, `lng`) VALUES ('$pid', '$loc_addr', '0.0000', '0.0000');";
$pass = mysqli_query($conn, $sqlin);
$pass2 = mysqli_query($conn, $sqlin2);
mysqli_close($conn);
header("Location: ".$url);
?>