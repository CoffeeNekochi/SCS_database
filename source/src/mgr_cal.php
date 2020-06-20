<?php
session_start();
// Create connection
//$conn = mysqli_connect("localhost","root", "", "new_scs");
$conn = mysqli_connect("localhost",$_SESSION["ac"], $_SESSION["pw"], "new_scs");

// Check connection
if (empty($conn)){
    session_destroy();
    echo "無法連結資料庫";
    die('<br><form style="text-align: center;" 
          action="./index.html" method="post">
          <input type="submit" value="返回首頁"/></form>');
    exit;
}
$query = " SELECT * FROM mgr_cal ORDER BY P_id ";
$result = mysqli_query($conn, $query);
$query2 = " SELECT * FROM mgr_cal ORDER BY P_id ";
$result2 = mysqli_query($conn, $query2);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>首頁(主管)|行事曆</title>
<link href="./packages/core/main.css" rel="stylesheet" />
<link href="./packages/daygrid/main.css" rel="stylesheet" />
<link href="./packages/timegrid/main.css" rel="stylesheet" />
<link href="./packages/list/main.css" rel="stylesheet" />
<link href="./packages-premium/timeline/main.css" rel="stylesheet" />
<link href="./packages-premium/resource-timeline/main.css" rel="stylesheet" />
<link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\home.css">
        <link rel="stylesheet" href="css\form.css">
        <link rel="stylesheet" href="css\sidebar.css">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
<script src="./packages/core/main.js"></script>
<script src="./packages/interaction/main.js"></script>
<script src="./packages/daygrid/main.js"></script>
<script src="./packages/timegrid/main.js"></script>
<script src="./packages/list/main.js"></script>
<script src="./packages-premium/timeline/main.js"></script>
<script src="./packages-premium/resource-common/main.js"></script>
<script src="./packages-premium/resource-timeline/main.js"></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'resourceTimeline' ],
      now: '<?php echo date("Y-m-d") ?>',
      editable: true, // enable draggable events
      aspectRatio: 1.8,
      scrollTime: '00:00', // undo default 6am scrollTime
      header: {
        left: 'today prev,next',
        center: 'title',
        right: 'resourceTimelineDay,resourceTimelineThreeDays,timeGridWeek,dayGridMonth'
      },
      defaultView: 'resourceTimelineDay',
      views: {
        resourceTimelineThreeDays: {
          type: 'resourceTimeline',
          duration: { days: 3 },
          buttonText: '3 days'
        }
      },
      resourceLabelText: 'Rooms',
      resources: [
        <?php  
          while($row = mysqli_fetch_array($result)) {
				?>
            { id: '<?php echo $row["P_id"] ?>', title: '<?php echo $row["client"]." ".$row["loc_addr"]?>' },
        <?php  
          }  
        ?>
      ],
      events: [
        <?php  
          while($row = mysqli_fetch_array($result2)) {
            
				?>
            { id: '', resourceId: '<?php echo $row["P_id"] ?>', start: '<?php echo date("Y-m-d\TH:i:s",strtotime($row["start_date"])) ?>', end: '<?php echo date("Y-m-d\TH:i:s",strtotime($row["end_date"])) ?>', title: '<?php echo $row["P_name"] ?>' },
        <?php  
          }  
        ?>
      ]
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 50px auto;
  }

</style>
</head>
<body style="background-image: url("../img/download.jpg");">
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
                        <a href="emp_map.php"><img src="img\map.png"><span class="">專案地圖</span></a>
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
                    <h1>行事歷</h1>
                </div>
            </div>
  <div id="calendar"></div></div>

</body>
</html>
