<?php
    session_start();
    $locations = array();
    // Create connection
    $conn = mysqli_connect("localhost", $_SESSION["ac"], $_SESSION["pw"], "new_scs");

    $query = "	SELECT *
                FROM `location` ";
    $result = mysqli_query($conn, $query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>專案列表 | 員工派遣系統</title>
        <meta charset="utf-8" /> <!--語系UTF-8-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css\w3school.css">
        <link rel="stylesheet" href="css\emp_home.css">
        <link rel="stylesheet" href="css\sidebar.css">
        <link rel="stylesheet" href="css\form.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    </head>
    <body>
        <!--Sidebar-->
        <div class="w3-sidebar w3-bar-block w3-collapse w3-card" style="width:200px;" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Close &times;</button>
            <a href="mgr_home.php" class="w3-bar-item side_header w3-deep-purple">首頁</a>
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
                    <h1>專案地圖</h1> <!--GET-USER-ID-->
                </div>
            </div>
            <style>
            /*設定gmap_canvas顯示區(寬與高)*/
            #gmap_canvas{
                width:50%;
                height:30em;
                margin-top:60px;
                margin-left:60px;
            }
        </style>
        
        <!--地圖顯示區-->
        <div id="gmap_canvas"></div>

        <?php
        //-----Google map value Start-----
        while($row = mysqli_fetch_array($result)) {
            $set_address = $row["loc_addr"]; //填寫所要的地址，Example地址為勤美綠園道
            $data_array = geocode($set_address);
            $latitude = $data_array[0];
            $longitude = $data_array[1];
            $data_address = $data_array[2];
            $locations[]=array( 'name'=>$data_address, 'lat'=>$latitude, 'lng'=>$longitude );
        }
        $markers = json_encode( $locations );
        //-----Google map value End-----
        
        //-----function start-----
        function geocode($address){
            /*用來將字串編碼，在資料傳遞的時候，如果直接傳遞中文會出問題，所以在傳遞資料時，通常會使用urlencode先編碼之後再傳遞*/
            $address = urlencode($address);

            /*可參閱：(https://developers.google.com/maps/documentation/geocoding/intro)*/
            
            $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyDq7yqQl2pVk9YE0Uv4PcbQMhkKEBPTOkw";

            /*取得回傳的json值*/
            $response_json = file_get_contents($url);

            /*處理json轉為變數資料以便程式處理*/
            $response = json_decode($response_json, true);

            /*如果能夠進行地理編碼，則status會回傳OK*/ 
            if($response['status']='OK'){
                //取得需要的重要資訊
                $latitude_data = $response['results'][0]['geometry']['location']['lat']; //緯度
                $longitude_data = $response['results'][0]['geometry']['location']['lng']; //精度
                $data_address = $response['results'][0]['formatted_address'];

                if($latitude_data && $longitude_data && $data_address){

                    $data_array = array();            
                    
                    //一個或多個單元加入陣列末尾
                    array_push(
                        $data_array,
                        $latitude_data, //$data_array[0]
                        $longitude_data, //$data_array[1]
                        '<b>地址: </b> '.$data_address //$data_array[2]
                    );

                    return $data_array; //回傳$data_array

                }else{
                    return false;
                }

            }else{
                return false;
            }
        }
        //-----function end-----
        ?>





        </div>
    </body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDq7yqQl2pVk9YE0Uv4PcbQMhkKEBPTOkw&callback=initMap"></script>
<script>
    
    function init_map() {
        /*地圖參數相關設定 Start*/
        var Options = {
            zoom: 14, /*縮放比例*/
            center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>) /*所查詢位置的經緯度位置*/
        };
        
        map = new google.maps.Map(document.getElementById("gmap_canvas"), Options);
        /*地圖參數相關設定 End*/
        
        /*自行設定圖標 Start*/
        var image = {
            url: 'https://google-developers.appspot.com/maps/documentation/javascript/examples/full/images/beachflag.png', /*自定圖標檔案位置或網址*/
            // This marker is 20 pixels wide by 32 pixels high.
            size: new google.maps.Size(20, 32), /*自定圖標大小*/
            // The origin for this image is (0, 0).
            origin: new google.maps.Point(0, 0),
            // The anchor for this image is the base of the flagpole at (0, 32).
            anchor: new google.maps.Point(0, 32)
          };
        
        marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>), /*圖標經緯度位置*/
            icon: image
        });
        /*自行設定圖標 End*/
        
        /*所查詢位置詳細資料 Start*/
        infowindow = new google.maps.InfoWindow({
            content: "<?php echo $data_address; ?>"
        });
        
        infowindow.open(map, marker);
        /*所查詢位置詳細資料 End*/
    }
    
    /*
    事件偵聽器
    (可參閱：https://developers.google.com/maps/documentation/javascript/events)
    */
    google.maps.event.addDomListener(window, 'load', init_map);
</script>