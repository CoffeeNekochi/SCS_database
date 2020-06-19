<?php
$P_name="P_name";
$start_date="start_date";
$end_date="end_date";
$detail="detail";
$num_req="num_req";
$client="client";
$link=mysql_pconnect($P_name,$start_date,$end_date,$detail,$num_req,$client);

mysql_query("set names utf8");
$id=$_GET["id"];
$sql="DELETE FROM project WHERE id='$id'";
$result=mysql_query($sql,$link);
mysql_close($link);

header("location:mgr_project.php");

?>