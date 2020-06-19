<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "new_scs");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "	SELECT *
				    FROM mgr_proj_info_emp
                    WHERE Pid = '".$_POST["employee_id"]."'";
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>