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
        <title>計算機</title><!-- MadeBy Gheorghe Marin Adrian -->
    </head>
    <body>
        <div id="calc-contain">
          <h2 style="text-align: center;">計算機</h2>
          <form style="text-align: center;" name="calculator" method="post">
            <input type="hidden" name="ac" value="<?php echo $ac?>"/>
            <input type="hidden" name="pw" value="<?php echo $pw?>"/>
            <input type="text" name="answer" /><br>

            <br>

            <table style="text-align: center; margin: auto;"><tr>
              <td><input type="button" value=" 1 " onclick="calculator.answer.value += '1'" /></td>
              <td><input type="button" value=" 2 " onclick="calculator.answer.value += '2'" /></td>
              <td><input type="button" value=" 3 " onclick="calculator.answer.value += '3'" /></td>
              <td><input type="button" value=" + " onclick="calculator.answer.value += '+'" /></td>
            </tr><tr>
              <td><input type="button" value=" 4 " onclick="calculator.answer.value += '4'" /></td>
              <td><input type="button" value=" 5 " onclick="calculator.answer.value += '5'" /></td>
              <td><input type="button" value=" 6 " onclick="calculator.answer.value += '6'" /></td>
              <td><input type="button" value=" - " onclick="calculator.answer.value += '-'" /></td>
            </tr><tr>
              <td><input type="button" value=" 7 " onclick="calculator.answer.value += '7'" /></td>
              <td><input type="button" value=" 8 " onclick="calculator.answer.value += '8'" /></td>
              <td><input type="button" value=" 9 " onclick="calculator.answer.value += '9'" /></td>
              <td><input type="button" value=" x " onclick="calculator.answer.value += '*'" /></td>
            </tr><tr>
              <td><input type="button" value=" c " onclick="calculator.answer.value = ''" /></td>
              <td><input type="button" value=" 0 " onclick="calculator.answer.value += '0'" /></td>
              <td><input type="button" value=" = " onclick="calculator.answer.value = (eval(calculator.answer.value))?eval(calculator.answer.value):0" /></td>
              <td><input type="button" value=" / " onclick="calculator.answer.value += '/'" /></td>
            </tr></table>
          </form>
          <hr>
          <form style="text-align: center;" action="../function.php" method="post">
            <input type="hidden" name="ac" value="<?php echo $ac?>"/>
            <input type="hidden" name="pw" value="<?php echo $pw?>"/>
            <input type="submit" value="返回功能列表"></form>
        </div>
    </body>
</html>