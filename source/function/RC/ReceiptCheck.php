<?php
$ac = $_POST["ac"];
$pw = $_POST["pw"];
$DBHOST = "localhost"; //主機位置
$conn = mysql_connect( $DBHOST,$ac,$pw); //連接資料庫
if (empty($conn)){
  echo '<p style="text-align: center;">登入資訊錯誤<br></p>';
  die('<br><form style="text-align: center;" 
      action="../../index.html" method="post">
      <input type="submit" value="返回首頁"/></form>');
}
mysql_close($conn);
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>發票核對</title>
        <link ref="stylesheet" href="style.css">
    </head>
    <body style="font-family: 'Lato', 'Microsoft JhengHei', '微軟正黑體', sans-serif;">
        <div class="container" style="margin-top: 30px;">
            <form style="text-align: center;">
              <div class="form-group">
                <label for="input-temp" id="label-temp">輸入愈核對之發票號碼:</label>
                
                <input type="number" class="form-control" id="input-temp" />
                <small id="error-msg" style="color: red;"></small>
              <button type="button" class="btn btn-primary" onclick="changeSrc_input()" >送出</button>
             <br><label for="input-temp" id="label-temp1">~待輸入~</label>
            </form> 
            <hr>
            <form style="text-align: center;" action="../function.php" method="post">
              <input type="hidden" name="ac" value="<?php echo $ac?>"/>
              <input type="hidden" name="pw" value="<?php echo $pw?>"/>
            <input type="submit" value="返回功能列表"></form>
          
       
        <script type="text/javascript">
          
          function changeSrc_input(){
              var numId = document.getElementById("input-temp").value;
                switch (numId) {
                  case '41482012':
                  document.getElementById("label-temp1").innerHTML = "特別獎!~獎金1,000萬元!"
                    break;

                  case '58837976':
                    document.getElementById("label-temp1").innerHTML = "特獎!~獎金200萬元!"
                    break;
                  
                  case '20379435':
                    document.getElementById("label-temp1").innerHTML = "頭獎!~獎金20萬元!"
                    break;

                  case '47430762':
                    document.getElementById("label-temp1").innerHTML = "頭獎!~獎金20萬元!"
                    break;

                  case '36193504':
                    document.getElementById("label-temp1").innerHTML = "頭獎!~獎金20萬元!"
                    break;
                
                  default:
                  	var numId1=numId%10000000;
                    switch (numId1){
                    
                    	case 0379435:
                        document.getElementById("label-temp1").innerHTML = "二獎!~獎金4萬元!"
                    	break;
                        case 7430762:
                        document.getElementById("label-temp1").innerHTML = "二獎!~獎金4萬元!"
                    	break;
                        case 6193504:
                        document.getElementById("label-temp1").innerHTML = "二獎!~獎金4萬元!"
                    	break;
                        
                        default:
                        var numId2=numId1%1000000;
                    	switch (numId2){
                        	case 379435:
                        	document.getElementById("label-temp1").innerHTML = "三獎!~獎金1萬元!"
                            break;
                            case 430762:
                        	document.getElementById("label-temp1").innerHTML = "三獎!~獎金1萬元!"
                            break;
                            case 193504:
                        	document.getElementById("label-temp1").innerHTML = "三獎!~獎金1萬元!"
                            break;
                            default:
                            var numId3=numId2%100000;
                            switch (numId3){
                            	case 79435:
                        		document.getElementById("label-temp1").innerHTML = "四獎!~獎金4千元!"
                                break;
                                case 30762:
                        		document.getElementById("label-temp1").innerHTML = "四獎!~獎金4千元!"
                                break;
                                case 93504:
                        		document.getElementById("label-temp1").innerHTML = "四獎!~獎金4千元!"
                                break;
                                default:
                            	var numId4=numId3%10000;
                                switch (numId4){
                                	case 9435:
                        			document.getElementById("label-temp1").innerHTML = "五獎!~獎金1千元!"
                                    break;
                                    case 0762:
                        			document.getElementById("label-temp1").innerHTML = "五獎!~獎金1千元!"
                                    break;
                                    case 3504:
                        			document.getElementById("label-temp1").innerHTML = "五獎!~獎金1千元!"
                                    break;
                                    default:
                            		var numId5=numId4%1000;
                                	switch (numId5){
                                    	case 435:
                        				document.getElementById("label-temp1").innerHTML = "六獎!~獎金2百元!"
                                        break;
                                        case 762:
                        				document.getElementById("label-temp1").innerHTML = "六獎!~獎金2百元!"
                                        break;
                                        case 504:
                        				document.getElementById("label-temp1").innerHTML = "六獎!~獎金2百元!"
                                        break;
                                        case 693:
                        				document.getElementById("label-temp1").innerHTML = "增開六獎!~獎金2百元!"
                                        break;
                                        case 043:
                        				document.getElementById("label-temp1").innerHTML = "增開六獎!~獎金2百元!"
                                        break;
                                        case 425:
                        				document.getElementById("label-temp1").innerHTML = "增開六獎!~獎金2百元!"
                                        break;
                                        default:
                                        document.getElementById("label-temp1").innerHTML = "可惜...沒中獎"
                						break;
                                    }
                                }
                            }
                        }
                        
                    }
                    
                  	
                }
          	}
      </script>
      <script type="text/javascript" id="jscode"></script>
      
    </body>
</html>