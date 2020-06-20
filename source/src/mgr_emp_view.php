<?php  
 if(isset($_POST["employee_id"]))  {  
    $output = '';  
    $connect = mysqli_connect("localhost", "root", "", "new_scs");
	$query = "	SELECT *
				FROM mgr_emp_info
                WHERE emp_id = '".$_POST["employee_id"]."'";
    $query2 = "	SELECT *
                FROM mgr_emp_info
                WHERE emp_id = '".$_POST["employee_id"]."'" ;
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
            <table class="w3-table tab-w100_80">
                <tr>
                    <th class="bold2">員工編號</th>
                    <td>'.$row["emp_id"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-w100_200">
                <tr>
                    <th class="bold2">員工名稱</th>
                    <td>'.$row["emp_name"].'</td>
                </tr>
                <tr>
                    <th class="bold2">電話號碼</th>
                    <td>'.$row["tel"].'</td>
                </tr>
            </table>
            <table class="w3-table tab-w30p_5p"">
                <tr>
                    <th class="bold2">工作評價</th>
                    <td>'.$row["detail"].'</td>
                </tr>
            </table>
        ';  
    }
    $output .= '
            <table class="w3-table tab-works-on">
            <tr>
                <th class="bold2" style="width: 100px;">負責專案</th>
                <th class="bold2" style="width: 300px;">專案名稱</th>
                <th class="bold2" style="width: 60px;"> 領隊    </th>
                <th class="bold2">                      工作详情</th>
            </tr>
        ';
    while($row2 = mysqli_fetch_array($result2))  {  
        $output .= '
                <tr>
                    <td>'.$row2["P_id"].'</td>
                    <td>'.$row2["P_name"].'</td>
        ';
        if($row2["lead.flag"] == 1){
            $output .= '
            <td class="green">&#10004;</td>
            ';
        }else{
            $output .= '
            <td class="red">&#10008;</td>
            ';
        }

        $output .= '
                    <td>'.$row2["detail"].'</td>
                </tr>
        ';
    }
      $output .= '  
      </table>
      ';  
      echo $output;  
 }  
 ?>