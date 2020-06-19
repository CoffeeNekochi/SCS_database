<?php  
 if(isset($_POST["employee_id"]))  {  
    $output = '';  
    $connect = mysqli_connect("localhost", "root", "", "new_scs");
	$query = "	SELECT *
				FROM mgr_proj_info
                WHERE P_id = '".$_POST["employee_id"]."'";
    $query2 = "	SELECT *
                FROM mgr_proj_info_emp
                WHERE Pid = '".$_POST["employee_id"]."'" ;
    $result = mysqli_query($connect, $query);
    $result2 = mysqli_query($connect, $query2);
	if (!$result) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }
    if (!$result2) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    }
    while($row = mysqli_fetch_array($result))  {  
        $output .= '
            <table class="w3-table tab-pid">
                <tr>
                    <th class="bold2">專案編號</th>
                    <td>'.$row["P_id"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-pname">
                <tr>
                    <th class="bold2">專案名稱</th>
                    <td>'.$row["P_name"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-time">
                <tr>
                    <th class="bold2">開始時間</th>
                    <td>'.$row["start_date"].'</td>
                </tr>
                <tr>
                    <th class="bold2">結束時間</th>
                    <td>'.$row["end_date"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-location">
                <tr>
                    <th class="bold2">派遣地點</th>
                    <td>'.$row["loc_addr"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-detail">
                <tr>
                    <th class="bold2">工作描述</th>
                    <td>'.$row["p_detail"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-num">
                <tr>
                    <th class="bold2">需求人數</th>
                    <td>'.$row["num_req"].'</td>
                </tr>
                <tr>
                    <th class="bold2">委託單位</th>
                    <td>'.$row["client"].'</td>
                </tr>
                <tr>
                    <th class="bold2">領隊</th>
                    <td>'.$row["lead_id"].'&emsp;'.$row["lead_name"].'</td>
                </tr>
            </table>
        ';  
    }
    $output .= '
            <table class="w3-table tab-emp">
                <tr>
                    <th class="bold2">員工</th>
                    <th class="bold2" style="width: 70%;">工作詳情</th>
                </tr>
                <tr>
        ';
    while($row2 = mysqli_fetch_array($result2))  {  
        $output .= '
                <tr>
                    <td class="bold2">'.$row2["emp_id"].'&emsp;'.$row2["emp_name"].'</td>
                    <td>'.$row2["emp_detail"].'</td>
                </tr>
        ';
    }
      $output .= '  
      </table>
      ';  
      echo $output;  
 }  
 ?>