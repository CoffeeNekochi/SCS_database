<?php

    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "new_scs");

    // Check connection
    if ($conn) {
        echo "Server is connected";
    }else{
        echo "Error";
    }
    $query = "	SELECT *
                FROM emp_proj
                WHERE emp_id = 'E00001'
                ORDER BY P_id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
    }
    
    $data_nums = mysqli_num_rows($result); //統計總比數
    $per = 10; //每頁顯示項目數量
    $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
    if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
        $page=1; //則在此設定起始頁數
    } else {
        $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
    }
    $start = ($page-1)*$per; //每一頁開始的資料序號
?>
<!DOCTYPE html>
<html>
    <head>
        <title>專案列表 | 員工派遣系統</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\emp_home.css">
        <link rel="stylesheet" href="css\form.css">
        <link rel="stylesheet" href="css\sidebar.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        <link rel="stylesheet" href="css\project_list.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <!--Sidebar-->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <a href="emp_home.html" class="w3-bar-item side_header w3-deep-purple">首頁</a>
            <nav class="sidebar-nav">
                <ul>
                    <li>
                        <a href="emp_project.html"><img src="img\project.png"><span class="">專案列表</span></a>
                    </li>
                    <li>
                        <a href="#"><img src="img\calender.png"><span class="">行事歷</span></a>
                    </li>
                </ul>
            </nav>
        </div>
         <!-- Head -->
         <div class="w3-main" style="margin-left:200px">
            <div class="w3-deep-purple">
                <!--nav-menu-button-->
                <button class="w3-button w3-deep-purple w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
                <!--Content-title-->
                <div class="w3-container">
                    <h1>專案列表</h1> <!--GET-USER-ID-->
                </div>
            </div>
            <!--table-->
            <div class="container-table_project">
                <div class="wrap-table_project">
                    <table class="table_project">
                        <thead>
                            <tr class="table_project-head">
                                <th class="column1" style="border: unset">專案名稱</th>
                                <th class="column2" style="border: unset">專案編號</th>
                                <th class="column3" style="border: unset">開始時間</th>
                                <th class="column3" style="border: unset">結束時間</th>
                                <th class="column5" style="border: unset; text-align: center;">地點</th>
                                <th class="column6" style="border: unset; text-align: center;">動作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                               while($row = mysqli_fetch_array($result)) {   //印出未委派資料
							?>
                            <tr>
                                <td class="column1 bold"><?php echo $row["P_name"]; ?></td>
                                <td class="column2"><?php echo $row["P_id"]; ?></td>
                                <td class="column3"><?php echo date( 'Y-m-d H:i', strtotime($row["start_date"])); ?></td>
                                <td class="column3"><?php echo date( 'Y-m-d H:i', strtotime($row["end_date"])); ?></td>
                                <td class="column5"><?php echo $row["loc_addr"]; ?></td>
                                <td class="column6">
                                    <input type="button" name="view" value="查看" id="<?php echo $row["P_id"]; ?>" class="button button-view view_data"/>
                                    <?php
                                        $flag = $row["lead_flag"];
                                        if($row["lead_flag"] == 1){
                                            echo "<input type='button' name='edit' value='修改' id=". $flag ." class='button button-change edit_data'/>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php  
                               }  
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagi">
                    <table class="pagi_table">
                        <tr>
                            <td>
                                <?php   //分頁頁碼
                                    echo "<p>共 ".$data_nums." 筆-在 ".$page." 頁-共 ".$pages." 頁";
                                ?>
                            </td>
                            <td>
                                <div class="pagination">
                                        <?php
                                            //分頁頁碼
                                            for( $i=1 ; $i<=$pages ; $i++ ) {
                                                if($i == $page)
                                                    echo "<a href=?page=".$i.">".$i."</a> ";
                                                else
                                                    echo " 頁 <a href=?page=".$pages.">末頁</a><br /><br />";
                                            }
                                        ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <script>
            function w3_open() {
              document.getElementById("mySidebar").style.display = "block";
            }
    
            function w3_close() {
              document.getElementById("mySidebar").style.display = "none";
            }
            </script>
    </body>
</html>
<!-- project data view-->
<div id="dataModal" class="w3-modal fade">
    <div class="w3-modal-content radius w3-animate-zoom">  
         <div class="w3-container radius" style="background-color: white;">  
            <span onclick="document.getElementById('dataModal').style.display='none'" class="w3-button w3-display-topright"  data-dismiss="modal">&times;</span>
            <h3>專案詳情</h3><hr>
            <div class="modal-body" id="employee_detail">
            </div>
            
            <button type="button" onclick="document.getElementById('dataModal').style.display='none'" class="button-close fl-lf" data-dismiss="modal">Close</button>  
         </div>  
    </div>  
</div>
<script>
    $("#search_emp").chosen();
    $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#address').val(data.address);  
                     $('#gender').val(data.gender);  
                     $('#designation').val(data.designation);  
                     $('#age').val(data.age);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"emp_prj_info_select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
    </script>