<?php
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
?>
<!DOCTYPE html>
<!--按鈕視窗教學:https://www.webslesson.info/2016/10/php-ajax-update-mysql-data-through-bootstrap-modal.html-->
<html>
    <!--
        <?php
        $query = "	SELECT S.P_id, S.P_name, S.start_date, S.end_date, S.loc_addr
			FROM mgr_proj S
			WHERE NOT EXISTS(SELECT * FROM project_member R WHERE S.P_id = R.Pid )
			ORDER BY S.P_id";
        $query2 = "	SELECT S.P_id, S.P_name, S.start_date, S.end_date, S.loc_addr
			FROM mgr_proj S
			WHERE EXISTS(SELECT * FROM project_member R WHERE S.P_id = R.Pid )
            ORDER BY S.P_id";
        
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);

        $data_nums = mysqli_num_rows($result) + mysqli_num_rows($result2);
        $page = 1;
        ?>
    -->
    <head>
        <title>專案管理 | 員工派遣系統</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\home.css">
        <link rel="stylesheet" href="css\form.css">
        <link rel="stylesheet" href="css\sidebar.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        <link rel="stylesheet" href="css\project_list.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
        <script src="js/home.js"></script>
        
    </head>
    <body>
        <!--Sidebar-->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card white" style="width:200px;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <a href="mgr_home.html" class="w3-bar-item side_header">首頁</a>
            <nav class="sidebar-nav">
                <ul>
                  <li>
                    <a><img src="img\project.png"><span>專案</span></a>
                    <ul class="nav-flyout">
                      <li>
                        <a href="mgr_project.html"><img src="img\project_main.png">專案管理</a>
                      </li>
                      <li>
                        <a href="new_project.html"><img src="img\new_project.png">新建專案</a>
                      </li>
                    </ul>
                  </li>
                  <li>
                    <a href="mgr_employee.html"><img src="img\staff.png"><span>員工管理</span></a>
                  </li>
                  <li>
                    <a href="#"><img src="img\calender.png"><span class="">行事歷</span></a>
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
                    <h1>專案管理</h1>
                </div>
            </div>
            <!--Main-->
            <div>
                <button type="button" class="button-add button-change" onclick="window.location.href='new_project.html';">新增專案</button>
            </div>
            <!--table-->
            <div class="container-table_project">
                <div class="wrap-table_project">
                    <table class="table_project">
                        <thead>
                            <tr class="table_project-head">
                                <th class="column1">專案名稱</th>
                                <th class="column2">專案編號</th>
                                <th class="column3">開始時間</th>
                                <th class="column3">結束時間</th>
                                <th class="column5">地點</th>
                                <th class="column6" style="text-align: center;">已委派</th>
                                <th class="column7">動作</th>
                            </tr>
                        </thead>
                        <tbody>

                                <?php  
                                    while($row = mysqli_fetch_array($result)) {   //印出未委派資料
							    ?>
                                <tr>
                                    <td class="column1 bold"><?php echo $row["P_name"]; ?></td>
                                    <td class="column2"><?php echo $row["P_id"]; ?></td>
                                    <td class="column3"><?php echo $row["start_date"]; ?></td>
                                    <td class="column3"><?php echo $row["end_date"]; ?></td>
                                    <td class="column4"><?php echo $row["loc_addr"]; ?></td>
                                    <td class="column5 red">&#10008;</td>
                                    <td class="column6">
                                        <input type="button" name="edit" value="查看" id="view1"   onclick="document.getElementById('dataModal').style.display='block'"         class="button button-view edit_data"/>
                                        <input type="button" name="view" value="修改" id="change2" onclick="document.getElementById('edit_data_Modal').style.display='block'"   class="button button-change view_data"/>
                                        <input type="button" name="edit" value="刪除" id="delete3" onclick="document.getElementById('delete_data_Modal').style.display='block'" class="button button-delete view_data"/>
                                    </td>
                                </tr>
                                <?php  
                                    }  
                                ?>
                                <?php  
                                    while($row = mysqli_fetch_array($result2)) {   //印出已委派資料
                                ?>
                                <tr>
                                    <td class="column1 bold"><?php echo $row["P_name"]; ?></td>
                                    <td class="column2"><?php echo $row["P_id"]; ?></td>
                                    <td class="column3"><?php echo $row["start_date"]; ?></td>
                                    <td class="column3"><?php echo $row["end_date"]; ?></td>
                                    <td class="column4"><?php echo $row["loc_addr"]; ?></td>
                                    <td class="column5 green">&#10004;</td>
                                    <td class="column6">
                                        <input type="button" name="edit" value="查看" id="view1"   onclick="document.getElementById('dataModal').style.display='block'"         class="button button-view edit_data"/>
                                        <input type="button" name="view" value="修改" id="change2" onclick="document.getElementById('edit_data_Modal').style.display='block'"   class="button button-change view_data"/>
                                        <input type="button" name="edit" value="刪除" id="delete3" onclick="document.getElementById('delete_data_Modal').style.display='block'" class="button button-delete view_data"/>
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
                                                    echo '<a href=?page=".$i." class="active">".$i."</a>';
                                                else
                                                    echo "<a href=?page=".$i.">".$i."</a> ";
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
<!-- project data view-->
<div id="dataModal" class="w3-modal fade">
    <div class="w3-modal-content radius w3-animate-zoom">  
         <div class="w3-container radius" style="background-color: white;">  
            <span onclick="document.getElementById('dataModal').style.display='none'" class="w3-button w3-display-topright"  data-dismiss="modal">&times;</span>
            <h3>專案詳情</h3><hr>
            <div class="modal-body" id="project_detail">
                <table class="w3-table tab-pid">
                    <tr>
                        <th class="bold2">專案編號</th>
                        <td>P00000</td>
                    </tr>
                </table>
                <table class="w3-table tab-pname">
                    <tr>
                        <th class="bold2">專案名稱</th>
                        <td>P00000</td>
                    </tr>
                </table>
                <table class="w3-table tab-time">
                    <tr>
                        <th class="bold2">開始時間</th>
                        <td>s_time</td>
                    </tr>
                    <tr>
                        <th class="bold2">結束時間</th>
                        <td>e_time</td>
                    </tr>
                </table>
                <table class="w3-table tab-location">
                    <tr>
                        <th class="bold2">派遣地點</th>
                        <td>location</td>
                    </tr>
                </table>
                <table class="w3-table tab-detail">
                    <tr>
                        <th class="bold2">工作描述</th>
                        <td>detail</td>
                    </tr>
                </table>
                <table class="w3-table tab-num">
                    <tr>
                        <th class="bold2">需求人數</th>
                        <td>num</td>
                    </tr>
                    <tr>
                        <th class="bold2">委託單位</th>
                        <td>num</td>
                    </tr>
                    <tr>
                        <th class="bold2">領隊</th>
                        <td>E_id&emsp;E_name</td>
                    </tr>
                </table>
                
                <table class="w3-table tab-emp">
                    <tr>
                        <th class="bold2">員工</th>
                        <th class="bold2" style="width: 70%;">工作详情</th>
                    </tr>
                    <tr>
                        <td class="bold2">E_id&emsp;E_name</td>
                        <td>job_detail</td>
                    </tr>
                </table>
            </div>
            
            <button type="button" onclick="document.getElementById('dataModal').style.display='none'" class="button-close fl-lf" data-dismiss="modal">Close</button>  
         </div>  
    </div>  
</div>
<!-- project data edit-->
<div id="edit_data_Modal" class="w3-modal fade">
    <div class="w3-modal-content radius w3-animate-zoom">  
         <div class="w3-container radius" style="background-color: white;">  
            <span onclick="document.getElementById('edit_data_Modal').style.display='none'" class="w3-button w3-display-topright"  data-dismiss="modal">&times;</span>
            <h3>專案詳情</h3><hr>
            <div class="modal-body">
                <form action="/action_page.php" method="post" id="insert_form">
                    <div class="w3-container">
                        <table class="project-head">
                            <tr>
                                <th>專案編號</th>
                                <th id="pid">[Pid]</th>         <!--pid-->
                            </tr>
                        </table>
                        <div class="form-style-1">
                            <label for="p_name">                <!--pname-->
                                <span>專案名稱 <span class="required">*</span></span>
                                <input type="text" class="input-field" placeholder="輸入專案名稱" name="p_name" required/>
                            </label>
                            <label for="s_time">                <!--s_time-->
                                <span>開始時間 <span class="required">*</span></span>
                                <input type="datetime-local" class="datetime-field" name="s_time" required/>
                            </label>
                            <label for="e_time">                <!--e_time-->
                                <span>結束時間 <span class="required">*</span></span>
                                <input type="datetime-local" class="datetime-field" name="e_time" required/>
                            </label>
                            <label for="location">              <!--location-->
                                <span>派遣地點 <span class="required">*</span></span>
                                <textarea class="textarea-field" placeholder="輸入地點（市-區-路-號）" name="location" required></textarea>
                            </label>
                            <label for="detail">                <!--detail-->
                                <span>工作描述</span>
                                <textarea class="textarea-field" name="detail"></textarea>
                            </label>
                            <label for="num_req">               <!--num_req-->
                                <span>人數需求 <span class="required">*</span></span>
                                <input type="number" class="number-field" name="num_req" min="0" />
                            </label>
                            <label for="client">                <!--client-->
                                <span>委託單位 <span class="required">*</span></span>
                                <input type="text" class="input-field" placeholder="輸入委託者姓名" name="client" required/>
                            </label>
                            <label for="leader">                <!--leader-->
                                <span>領隊</span>
                                <select id="search_emp" name="search_emp">
                                    <option value="#">-- 选择员工 --</option>
                                    <option value="#">李焕良 E00001</option>
                                    <option value="#">Simon Ghost E00002</option>
                                    <option value="#">David Maso E00003</option>
                                    
                                    <!--
                                        while($row = mysqli_fetch_array()){
                                            echo "<option value="$row[emp_id]">$row[emp_name] $row[emp_id]</option>";
                                        }
                                    -->
                                </select>
                            </label>
                            <div class="member_job_list">
                                <h4 style="padding-top: 20px;">员工委派</h4><hr>
                                <table style="margin-bottom: 20px;">
                                    <tr>
                                        <th class="bold2">员工</th>
                                        <th class="bold2" style="width: 390px;">工作详情</th>
                                    </tr>
                                    <!-- 读取人数需求数 生成多个 员工工作输入表-->
                                    <tr>
                                        <td>
                                            <label for="member">
                                                <select id="search_emp" name="search_emp">
                                                    <option value="#">-- 选择员工 --</option>
                                                    <option value="#">李焕良 E00001</option>
                                                    <option value="#">Simon Ghost E00002</option>
                                                    <option value="#">David Maso E00003</option>
                                                    
                                                    <!--
                                                        while($row = mysqli_fetch_array()){
                                                            echo "<option value="$row[emp_id]">$row[emp_name] $row[emp_id]</option>";
                                                        }
                                                    -->
                                                </select>
                                            </label>
                                        </td>
                                        <td>
                                            <textarea class="textarea-field2" name="job_detail"></textarea>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="submit">
                                <label><input type="submit" style="background-color: green;" value="Submit" /></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <button type="button" onclick="document.getElementById('edit_data_Modal').style.display='none'" class="button-close" data-dismiss="modal">Close</button>  
         </div>  
    </div>  
</div>
<!-- delete data view-->
<div id="delete_data_Modal" class="w3-modal fade">
    <div class="w3-modal-content radius w3-animate-zoom">  
         <div class="w3-container radius" style="background-color: white;">  
            <span onclick="document.getElementById('delete_data_Modal').style.display='none'" class="w3-button w3-display-topright"  data-dismiss="modal">&times;</span>
            <h3>確認要刪除嗎</h3><hr>
            <div class="modal-body" id="project_detail_delete">
                <table class="w3-table tab-pid">
                    <tr>
                        <th class="bold2">專案編號</th>
                        <td>P00000</td>
                    </tr>
                </table>
                <table class="w3-table tab-pname">
                    <tr>
                        <th class="bold2">專案名稱</th>
                        <td>P00000</td>
                    </tr>
                </table>
                <table class="w3-table tab-time">
                    <tr>
                        <th class="bold2">開始時間</th>
                        <td>s_time</td>
                    </tr>
                    <tr>
                        <th class="bold2">結束時間</th>
                        <td>e_time</td>
                    </tr>
                </table>
                <table class="w3-table tab-location">
                    <tr>
                        <th class="bold2">派遣地點</th>
                        <td>location</td>
                    </tr>
                </table>
            </div>
            
            <div style="padding-top: 120px; margin-left: 42%; margin-right: 42%;">
                <hr>
                <br>
                <button type="button" onclick="is_remove();" class="button-delete fl-lf result-delete" data-dismiss="modal">刪除</button>  
                <button type="button" onclick="document.getElementById('delete_data_Modal').style.display='none'" class="button-close fl-rg" data-dismiss="modal">取消</button>  
            </div>
            </div>  
    </div>  
</div>
<script>
    $("#search_emp").chosen();
    function is_remove(P_id){
        if(confirm("確定要刪除此專案嗎？")){
            window.location.href = "./remove.php?P_id=" + P_id;
        }
    }
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
                        url:"select.php",  
                        method:"POST",  
                        data:{employee_id:employee_id},  
                        success:function(data){  
                             $('#employee_detail').html(data);  
                             $('#dataModal').modal('show');  
                        }  
                   });  
              }            
         });
         $(document).on('click', '.result_data', function(){  
              var employee_id = $(this).attr("id");  
              if(employee_id != '')  
              {  
                   $.ajax({  
                        url:"select.php",  
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