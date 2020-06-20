<!DOCTYPE html>
<!--按鈕視窗教學:https://www.webslesson.info/2016/10/php-ajax-update-mysql-data-through-bootstrap-modal.html-->
<html>
        <?php
        session_start();
        // Create connection
        $conn = mysqli_connect("localhost", $_SESSION["ac"], $_SESSION["pw"], "new_scs");
        $query = "	SELECT * FROM mgr_emp ORDER BY emp_id ";
        $result = mysqli_query($conn, $query);
        if (!$result) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
        }

        $data_nums = mysqli_num_rows($result); //統計總比數
        $per = 15; //每頁顯示項目數量
        $pages = ceil($data_nums/$per); //取得不小於值的下一個整數
        if (!isset($_GET["page"])){ //假如$_GET["page"]未設置
            $page=1; //則在此設定起始頁數
        } else {
            $page = intval($_GET["page"]); //確認頁數只能夠是數值資料
        }
        $start = ($page-1)*$per; //每一頁開始的資料序號
        ?>
    <head>
        <title>專案管理 | 員工派遣系統</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\home.css">
        <link rel="stylesheet" href="css\form.css">
        <link rel="stylesheet" href="css\sidebar.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        <link rel="stylesheet" href="css\project_list.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <script src="js/home.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    
    </head>
    <body>
        <!--Sidebar-->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large white" onclick="w3_close()">Close &times;</button>
            <a href="mgr_home.php" class="w3-bar-item side_header">首頁</a>
            <nav class="sidebar-nav">
                <ul>
                <li>
                    <a><img src="img\project.png"><span>專案</span></a>
                    <ul class="nav-flyout">
                      <li>
                        <a href="mgr_project.php"><img src="img\project_main.png">專案管理</a>
                      </li>
                      <li>
                        <a href="new_project.php"><img src="img\new_project.png">新建專案</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="mgr_employee.php"><img src="img\staff.png"><span>員工管理</span></a>
                  </li>
                  <li>
                    <a href="mgr_cal.php"><img src="img\calender.png"><span class="">行事歷</span></a>
                  </li>
                  <li>
                      <a href="mgr_map.php"><img src="img\map.png"><span class="">專案地圖</span></a>
                  </li>
                </ul>
              </nav>
        </div>

        <!-- Head -->
        <div class="w3-main" style="margin-left:200px">
            <div class="w3-teal">
                <!--nav-menu-button-->
                <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
                <!--Content-title-->
                <div class="w3-container">
                    <h1>員工管理</h1>
                </div>
            </div>
            <!--Main-->
            <!--table-->
            <div class="container-table_project">
                <div class="wrap-table_project">
                    <table class="table_project">
                        <thead>
                            <tr class="table_project-head">
                                <th class="column1">員工名稱</th>
                                <th class="column2">員工編號</th>
                                <th class="column4" style="max-width: 300px;">評價    </th>
                                <th class="column5">動作    </th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php  
                                    while($row = mysqli_fetch_array($result)) {   //印出未委派資料
							    ?>
                                <tr>
                                    <td class="column1 bold"><?php echo $row["emp_name"]; ?></td>
                                    <td class="column2"><?php echo $row["emp_id"]; ?></td>
                                    <td class="column4" style="max-width: 300px;"><?php echo $row["rating"]; ?></td>
                                    <td class="column5">
                                        <input type="button" name="view" value="查看" id="<?php echo $row["emp_id"]; ?>" class="button button-view view_data" />
                                        <input type="button" name="edit" value="修改" id="<?php echo $row["emp_id"]; ?>" class="button button-change edit_data" />  
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
                                    <!--
                                        <?php
                                            //分頁頁碼
                                            for( $i=1 ; $i<=$pages ; $i++ ) {
                                                if($i == $page)
                                                    echo "<a href=?page=".$i.">".$i."</a> ";
                                                else
                                                    echo "<a href=?page=".$pages.">末頁</a><br /><br />";
                                            } 
                                        ?>
                                    -->
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
<!-- employee data view-->
<div id="dataModal" class="w3-modal fade">
    <div class="w3-modal-content radius w3-animate-zoom">  
         <div class="w3-container radius" style="background-color: white;">  
            <span onclick="document.getElementById('dataModal').style.display='none'" class="w3-button w3-display-topright"  data-dismiss="modal">&times;</span>
            <h3>員工詳情</h3><hr>
            <div class="modal-body" id="employee_detail">
            </div>
            
            <button type="button" onclick="document.getElementById('dataModal').style.display='none'" class="button-close fl-lf" data-dismiss="modal">關閉</button>  
         </div>  
    </div>  
</div>
<!-- emp rating edit-->
<div id="edit_emp_Modal" class="w3-modal fade">
    <div class="w3-modal-content radius w3-animate-zoom">  
         <div class="w3-container radius" style="background-color: white;">  
            <span onclick="document.getElementById('edit_emp_Modal').style.display='none'" class="w3-button w3-display-topright"  data-dismiss="modal">&times;</span>
            <h3>評價</h3><hr>
            <div class="modal-body">
                <form action="/action_page.php" method="post" id="insert_form">
                    <div class="w3-container">
                        <table class="w3-table tab-w100_200 gray">
                            <tr>
                                <th>員工編號</th>
                                <td id="pid">[Pid]</td>         <!--eid-->
                            </tr>
                        </table>
                        <table class="w3-table tab-w100_200 gray">
                            <tr>
                                <th>員工名稱</th>               <!--ename-->
                                <td id="pname">[emp_name]</td>
                            </tr>
                        </table>
                        <div class="form-style-1">
                            <label for="detail">                <!--rating-->
                                <span>工作評價</span>
                                <textarea class="textarea-field" name="detail"></textarea>
                            </label>
                            <div class="submit">
                                <label><input type="submit" style="background-color: green;" value="Submit" /></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr>
            <button type="button" onclick="document.getElementById('edit_emp_Modal').style.display='none'" class="button-close" data-dismiss="modal">Close</button>  
         </div>  
    </div>  
</div>
<script>
    $(document).ready(function(){   
         $(document).on('click', '.edit_data', function(){  
              var project_id = $(this).attr("P_id");  
              $.ajax({  
                   url:"fetch.php",  
                   method:"POST",  
                   data:{project_id:project_id},  
                   dataType:"json",  
                   success:function(data){  
                        $('#name').val(data.name);  
                        $('#address').val(data.address);  
                        $('#gender').val(data.gender);  
                        $('#designation').val(data.designation);  
                        $('#age').val(data.age);  
                        $('#employee_id').val(data.id);  
                        $('#insert').val("Update");  
                        $('#edit_data_Modal').modal('show');  
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
                        url:"mgr_emp_view.php",  
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