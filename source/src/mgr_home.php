<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>首頁（主管）| 員工派遣系統</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\home.css">
    </head>
    <body>
        <!--Sidebar-->
        <?php
        //登入資料庫
        $DBHOST = "localhost"; //主機位置
        $conn = mysqli_connect( $DBHOST,$_SESSION["ac"],$_SESSION["pw"]); //連接資料庫
        if (empty($conn)){
            session_destroy();
            echo "無法連結資料庫";
            die('<br><form style="text-align: center;" 
                  action="./index.html" method="post">
                  <input type="submit" value="返回首頁"/></form>');
            exit;
        }
        ?>
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <a href="mgr_home.php" class="w3-bar-item w3-button">首頁</a>
            <div class="w3-dropdown-hover">
                <button class="w3-button">專案 <i class="fa fa-caret-down"></i></button>
                <div class="w3-dropdown-content w3-bar-block">
                    <a href="mgr_project.php" class="w3-bar-item w3-button">專案列表</a>
                    <a href="new_project.html" class="w3-bar-item w3-button">新建專案</a>
                </div>
              </div>
            <a href="#" class="w3-bar-item w3-button">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>

        <!-- Head -->
        <div class="w3-main" style="margin-left:200px">
            <div class="w3-teal">
                <!--nav-menu-button-->
                <button class="w3-button w3-teal w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
                <!--Content-title-->
                <div class="w3-container">
                    <h1>歡迎！主管 <span> <?php echo $_SESSION["ac"] ?></span></h1> <!--GET-USER-ID-->
                </div>
            </div>

            <div class="w3-container">
                <h2>專案</h2>
                <hr>
                <div class="columns">
                    <div class="block-button button-style1">
                        <a href="mgr_project.php" class="button" id="">
                          <span class="ico">
                            <img class="icoh_back" src="img\project_main_hv.png">
                            <img class="icoh_front" src="img\project_main.png" width="55px">
                          </span>
                        </a>
                        <h4 >專案管理</h4>
                    </div>
                    <div class="block-button button-style1">
                        <a href="new_project.html" class="button" id="">
                          <span class="ico">
                              <img class="icoh_back" src="img\new_project_hv.png">
                              <img class="icoh_front" src="img\new_project.png" width="55px">
                          </span>
                        </a>
                        <h4 class="text" >新建專案</h4>
                    </div>
                </div>
                <h2>員工</h2>
                <hr>
                <div class="columns">
                    <div class="block-button button-style2">
                        <a href="#" class="button" id="">
                          <span class="ico">
                            <img class="icoh_back" src="img\new_project_hv.png">
                              <img class="icoh_front" src="img\new_project.png" width="55px">
                          </span>
                        </a>
                        <h4 >員工管理</h4>
                    </div>
                    <div class="block-button button-style2">
                        <a href="#" class="button" id="">
                          <span class="ico">
                              <img class="icoh_back" src="img\委托管理_hover.png">
                              <img class="icoh_front" src="img\委托管理.png" width="60px">
                          </span>
                        </a>
                        <h4 class="text" >新增員工</h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
