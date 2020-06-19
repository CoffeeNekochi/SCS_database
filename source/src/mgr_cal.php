<?php
session_start();
// Create connection
$conn = mysqli_connect("localhost", $_SESSION["ac"], $_SESSION["pw"], "new_scs");

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
<body>

  <div id="calendar"></div>

</body>
</html>
