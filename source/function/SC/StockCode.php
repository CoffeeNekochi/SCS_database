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
        <title>股票查閱</title>
        <link ref="stylesheet" href="style.css">
    </head>
    <body style="font-family: 'Lato', 'Microsoft JhengHei', '微軟正黑體', sans-serif;">
        <div class="container" style="margin-top: 30px;">
            <form style="text-align: center;" method="post">
              <input type="hidden" name="ac" value="<?php echo $ac?>"/>
              <input type="hidden" name="pw" value="<?php echo $pw?>"/>
              <div class="form-group">
                <label for="input-temp" id="label-temp">請輸入股票代碼</label><br>
                <input type="number" class="form-control" id="input-temp" />
                <small id="error-msg" style="color: red;"></small>
              </div>
              <br>
              <button type="button" class="btn btn-primary" onclick="changeSrc_input()" >確認</button>
            </form>  

            <div class="card" style="margin-top: 20px;">
              <div class="card-body">
                <hr>
                <h2 id="Name" style="text-align: center;"></h2>
                <table style="margin-left:auto; margin-right:auto;">
                  <tr>
                    <td rowspan="4" colspan="2"><h2 id="price" style="text-align: center;"></h2></td>
                    <td><p id="flat" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                    <td><p id="buy" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                  </tr>
                  <tr>
                    <td><p id="up" style="color: red; margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                    <td><p id="sell" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                  </tr>
                  <tr>
                    <td><p id="down" style="color:blue; margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                    <td><p id="volume" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                  </tr>
                  <tr>
                    <td><p id="close" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                  </tr>
                  <tr>
                    <td><p id="date" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                    <td><p id="time" style="margin-block-start: 1px; margin-block-end: 1px;"></p></td>
                  </tr>
                </table>
              </div>
            </div>
            <hr>

            <form style="text-align: center;">
              <span><h5>查詢股票代碼</h5></span>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601000()" >601000 唐山港</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601001()" >601001 大同煤业</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601002()" >601002 晋亿实业</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601003()" >601003 柳钢股份</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601005()" >601005 重庆钢铁</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601006()" >601006 大秦铁路</button><br><br>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601007()" >601007 金陵饭店</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601008()" >601008 连云港</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601009()" >601009 南京银行</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601010()" >601010 文峰股份</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601011()" >601011 宝泰隆</button>
              <button type="button" class="btn btn-primary" onclick="changeSrc_601012()" >601012 隆基股份</button><br><br>
            </form>
          </div>
            <hr>
            <form style="text-align: center;" action="../function.php" method="post">
              <input type="hidden" name="ac" value="<?php echo $ac?>"/>
              <input type="hidden" name="pw" value="<?php echo $pw?>"/>
            <input type="submit" value="返回功能列表"></form>
          
        <script type="text/javascript">
            function changeSrc_601000(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601000");
                document.body.appendChild(code);
                elements = hq_str_sh601000.split(",");
                update();
            }
            function changeSrc_601001(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601001");
                document.body.appendChild(code);
                elements = hq_str_sh601001.split(",");
                update();
            }
            function changeSrc_601002(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601002");
                document.body.appendChild(code);
                elements = hq_str_sh601002.split(",");
                update();
            }
            function changeSrc_601003(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601003");
                document.body.appendChild(code);
                elements = hq_str_sh601003.split(",");
                update();
            }
            function changeSrc_601005(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601005");
                document.body.appendChild(code);
                elements = hq_str_sh601005.split(",");
                update();
            }
            function changeSrc_601006(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601006");
                document.body.appendChild(code);
                elements = hq_str_sh601006.split(",");
                update();
            }
            function changeSrc_601007(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601007");
                document.body.appendChild(code);
                elements = hq_str_sh601007.split(",");
                update();
            }
            function changeSrc_601008(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601008");
                document.body.appendChild(code);
                elements = hq_str_sh601008.split(",");
                update();
            }
            function changeSrc_601009(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601009");
                document.body.appendChild(code);
                elements = hq_str_sh601009.split(",");
                update();
            }
            function changeSrc_601010(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601010");
                document.body.appendChild(code);
                elements = hq_str_sh601010.split(",");
                update();
            }
            function changeSrc_601011(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601011");
                document.body.appendChild(code);
                elements = hq_str_sh601011.split(",");
                update();
            }
            function changeSrc_601012(){
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                code.src=("http://hq.sinajs.cn/list=sh601012");
                document.body.appendChild(code);
                elements = hq_str_sh601012.split(",");
                update();
            }
            function update(){
              document.getElementById("Name").innerHTML = elements[0];
              document.getElementById("flat").innerHTML = "今日開盤: " + elements[1];
              document.getElementById("close").innerHTML = "昨日收盤: " + elements[2];
              document.getElementById("price").innerHTML = "當前價格: <br>" + elements[3];
              document.getElementById("up").innerHTML = "今日最高: " + elements[4];
              document.getElementById("down").innerHTML = "今日最低: " + elements[5];
              document.getElementById("buy").innerHTML = "&nbsp;&nbsp;競買價: " + elements[6];
              document.getElementById("sell").innerHTML = "&nbsp;&nbsp;競賣價: " + elements[7];
              document.getElementById("volume").innerHTML = "&nbsp;&nbsp;成交量: " + (elements[8]/1000000) + "萬手";
              document.getElementById("volume").innerHTML = "&nbsp;&nbsp;成交額: " + (elements[9]/1000) + "萬元";
              document.getElementById("date").innerHTML = elements[30];
              document.getElementById("time").innerHTML = elements[31];
            }
        </script>
        <script type="text/javascript">
          function check(){
              if(document.getElementById("input-temp").value==""){
                document.getElementById("error-msg").innerHTML = "<br>輸入不可為空白";
                return false;
              }
              else if (document.getElementById("input-temp").value < 601000 || document.getElementById("input-temp").value > 601012 || document.getElementById("input-temp").value == 601004){
                document.getElementById("error-msg").innerHTML = "<br>此代碼不存在";
                return false;
              }
              document.getElementById("error-msg").innerHTML = "";
              return true;
          }
          function changeSrc_input(){
              var numId = document.getElementById("input-temp").value;
              if (check()) {
                var code=document.getElementById("jscode");
                if(!code) return;
                document.body.removeChild(code);
                code=document.createElement("script");
                code.id="jscode";
                switch (numId) {
                  case '601000':
                    code.src=("http://hq.sinajs.cn/list=sh601000");
                    document.body.appendChild(code);
                    elements = hq_str_sh601000.split(",");
                    break;

                  case '601001':
                    code.src=("http://hq.sinajs.cn/list=sh601001");
                    document.body.appendChild(code);
                    elements = hq_str_sh601001.split(",");
                    break;
                  
                  case '601002':
                    code.src=("http://hq.sinajs.cn/list=sh601002");
                    document.body.appendChild(code);
                    elements = hq_str_sh601002.split(",");
                    break;

                  case '601003':
                    code.src=("http://hq.sinajs.cn/list=sh601003");
                    document.body.appendChild(code);
                    elements = hq_str_sh601003.split(",");
                    break;

                  case '601005':
                    code.src=("http://hq.sinajs.cn/list=sh601005");
                    document.body.appendChild(code);
                    elements = hq_str_sh601005.split(",");
                    break;
                
                  case '601006':
                    code.src=("http://hq.sinajs.cn/list=sh601006");
                    document.body.appendChild(code);
                    elements = hq_str_sh601006.split(",");
                    break;
                  
                  case '601007':
                    code.src=("http://hq.sinajs.cn/list=sh601007");
                    document.body.appendChild(code);
                    elements = hq_str_sh601007.split(",");
                    break;
                  
                  case '601008':
                    code.src=("http://hq.sinajs.cn/list=sh601008");
                    document.body.appendChild(code);
                    elements = hq_str_sh601008.split(",");
                    break;
                  
                  case '601009':
                    code.src=("http://hq.sinajs.cn/list=sh601009");
                    document.body.appendChild(code);
                    elements = hq_str_sh601009.split(",");
                    break;
                  
                  case '601010':
                    code.src=("http://hq.sinajs.cn/list=sh601010");
                    document.body.appendChild(code);
                    elements = hq_str_sh601010.split(",");
                    break;
                  
                  case '601011':
                    code.src=("http://hq.sinajs.cn/list=sh601011");
                    document.body.appendChild(code);
                    elements = hq_str_sh601011.split(",");
                    break;
                  
                  case '601012':
                    code.src=("http://hq.sinajs.cn/list=sh601012");
                    document.body.appendChild(code);
                    elements = hq_str_sh601012.split(",");
                    break;

                  default:
                    break;
                }
                update();
              }
          }
      </script>
      <script type="text/javascript" id="jscode" src="http://hq.sinajs.cn/list="></script>
      
    </body>
</html>