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
$query = "	SELECT S.P_id, S.P_name, S.start_date, S.end_date, S.location
			FROM project S
			WHERE NOT EXISTS(SELECT * FROM project_member R WHERE S.P_id = R.Pid )
			ORDER BY S.P_id";
$query2 = "	SELECT S.P_id, S.P_name, S.start_date, S.end_date, S.location
			FROM project S
			WHERE EXISTS(SELECT * FROM project_member R WHERE S.P_id = R.Pid )
			ORDER BY S.P_id";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
if (!$result) {
 printf("Error: %s\n", mysqli_error($conn));
 exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>專案列表 | 員工派遣系統</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\home.css">
        <link rel="stylesheet" href="css\project_list.css">
    </head>
    <body>
        <!--Sidebar-->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">
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
                    <h1>專案列表</h1>
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
                                <td class="column4"><?php echo $row["location"]; ?></td>
                                <td class="column5 red">&#10008;</td>
                                <td class="column6">
                                    <input type="button" name="view" value="查看" id="<?php echo $row["P_name"]; ?>" class="button button-change view_data" />
                                    <input type="button" name="edit" value="修改" id="<?php echo $row["P_name"]; ?>" class="button button-view edit_data" />  
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
									<td class="column4"><?php echo $row["location"]; ?></td>
									<td class="column5 green">&#10004;</td>
									<td class="column6">
                                        <input type="button" name="view" value="查看" id="<?php echo $row["P_name"]; ?>" class="button button-change view_data" />
                                        <input type="button" name="edit" value="修改" id="<?php echo $row["P_name"]; ?>" class="button button-view edit_data" /> 
									</td>
								</tr>
                            <?php  
                               }  
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>