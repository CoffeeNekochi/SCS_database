<?php 
session_start();
?>
<!DOCTYPE html>
<html>
        <head>
            <title>首頁(員工)|員工派遣系統</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device width, initial-scale=1">
            <link rel="stylesheet" href="css/w3school.css">
            <link rel="stylesheet" href="css/emp_home.css">
            <link rel="stylesheet" href="css/sidebar.css">
        </head>
        <body>
        <!--Sidebar-->
        <?php
        //登入資料庫
        $DBHOST = "localhost"; //主機位置
        $conn = mysqli_connect( $DBHOST,$_SESSION["ac"],$_SESSION["pw"],"new_scs"); //連接資料庫
        $ac=$_SESSION["ac"];
        $query = "	SELECT *
                    FROM emp_info
                    WHERE emp_id = '$ac' ";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if (empty($conn)){
            session_destroy();
            echo "無法連結資料庫";
            die('<br><form style="text-align: center;" 
                  action="./index.html" method="post">
                  <input type="submit" value="返回首頁"/></form>');
            exit;
        }
        ?>
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <a href="emp_home.php" class="w3-bar-item side_header w3-deep-purple">首頁</a>
            <nav class="sidebar-nav">
                <ul>
                <li>
                        <a href="emp_project.php"><img src="img\project.png"><span class="">專案列表</span></a>
                    </li>
                    <li>
                        <a href="emp_cal.php"><img src="img\calender.png"><span class="">行事歷</span></a>
                    </li>
                    <li>
                        <a href="emp_map.php"><img src="img\map.png"><span class="">專案地圖</span></a>
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
                    <h1>早安你好！ <span><?php echo $row["emp_name"] ?></span></h1> <!--GET-USER-ID-->
                </div>
            </div>
            <div class="w3-container">
                <h2>專案</h2>
                <div class="columns">
                    <div class="block-button button-style1">
                        <a href="emp_project.php" class="button" id=""><!--emp_project-->
                          <span class="ico">
                            <img class="icoh_back" src="img\project_main_hv2.png">
                            <img class="icoh_front" src="img\project_main.png" width="55px">
                          </span>
                        </a>
                        <h4 >專案列表</h4>
                    </div>
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

