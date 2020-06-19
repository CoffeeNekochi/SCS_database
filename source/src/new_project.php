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
<html>
        <?php
        $query = " SELECT * FROM `project` ";

        $result = mysqli_query($conn, $query);
        $num = mysqli_num_rows($result) + 1;

        $str = "P".str_pad( $num , 5, "0", STR_PAD_LEFT );

        ?>



    <head>
        <title>新建專案 | 員工派遣系統</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\home.css">
        <link rel="stylesheet" href="css\form.css">
        <link rel="stylesheet" href="css\sidebar.css">
        <script src="js/home.js"></script>
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
                    <h1>新建專案</h1>
                </div>
            </div>
            <!--Form-->
            <form class="w3-modal-content w3-animate-zoom" action="./new_p.php" method="post" onsubmit="var conf = confirm('確認送出並回到專案管理界面嗎？'); if (conf == true) { location.href= './mgr_home.php';} else { return false;}">
                <div class="w3-container">
                    <table class="project-head">
                        <tr>
                            <th>專案編號</th>
                            <th id="pid"><?php echo $str; ?></th>         <!--pid-->
                            <input type="hidden" name="pid" value="<?php echo $str?>"/>
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
                        <label for="loc_addr">              <!--location-->
                            <span>地點 <span class="required">*</span></span>
                            <textarea class="textarea-field" placeholder="輸入地點（市-區-路-號）" name="loc_addr" required></textarea>
                        </label>
                        <label for="detail">                <!--detail-->
                            <span>專案描述</span>
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
                        <div class="submit">
                            <label><span></span><input type="submit" value="Submit" /></label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="pop_up" title="Email Not Valid">
            <p>Type Your Email Again</p>
        </div>
        <script>
        </script>
    </body>
</html>
