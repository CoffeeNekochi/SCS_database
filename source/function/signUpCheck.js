
document.getElementById("submitBtn").disabled = true;
var mailOK, accountOK, passOK, botOk;
var buttonValue;

function checkEmail(){
    var email = document.getElementById("mail").value;
    if( email == ""){
        mailOK = 0;
        visBot();
        document.getElementById("toSubmit").disabled = true;
        document.getElementById("msg-mail").innerHTML = "<br>&ensp;請輸入電子郵件&ensp;<br>";
    }
    else{
        var ch = document.getElementById("mail").value;
        if(ch.indexOf('@') >= 0){
            accountOK = 1;
            document.getElementById("msg-mail").innerHTML = "";
            visBot();
        }
        else{
            accountOK = 0;
            document.getElementById("toSubmit").disabled = true;
            document.getElementById("msg-mail").innerHTML = "<br>&ensp;必須包含&quot;@&quot;字符&ensp;<br>";
            visBot();
        }
        
    } 
}

function checkAccount(){
    var email = document.getElementById("acnt").value;
    if( email == ""){
        accountOK = 0;
        visBot();
        document.getElementById("toSubmit").disabled = true;
        document.getElementById("msg-acnt").innerHTML = "<br>&ensp;請輸入帳號名稱&ensp;<br>";
    }
    else{
        accountOK = 1;
        document.getElementById("msg-acnt").innerHTML = "";
        visBot();
    } 
}

function checkPassword(){
    var pass = document.getElementById("pwd").value;
    var checkPass = document.getElementById("chk-pwd").value;

    if(pass == ""){
        accountOK = 0;
        visBot();
        document.getElementById("toSubmit").disabled = true;
        document.getElementById("msg-pwd").innerHTML = "<br>&ensp;請輸入密碼&ensp;<br>";
    }
    else{
        document.getElementById("msg-pwd").innerHTML = "";
        if( checkPass!=pass && checkPass!=""){
            passOK = 0;
            visBot();
            document.getElementById("toSubmit").disabled = true;
            document.getElementById("msg-chkpwd").innerHTML = "<br>&ensp;請確認兩次輸入密碼相符&ensp;<br>";
        }
        else{
            document.getElementById("msg-chkpwd").innerHTML = "";
            if( checkPass == pass){
                passOK = 1;
                visBot();
            } 
            else{
                document.getElementById("toSubmit").disabled = true;
                passOK = 0;
            }
        }
    }
    
}

function button1(){
    buttonValue = document.getElementById("btn1").value;
    botCheck();
}
function button2(){
    buttonValue = document.getElementById("btn2").value;
    botCheck();
}
function button3(){
    buttonValue = document.getElementById("btn3").value;
    botCheck();
}

function botCheck(){ 
    if(buttonValue == "human"){
        document.getElementById("msg").innerHTML = "<br>✔ 您已通過驗證<br>";
        msg.style.color = "limegreen";
        var i;

        botOK = 1;
        document.getElementById("toSubmit").disabled = false;
        for( i=1; i<=3; i++){
            document.getElementById("btn"+i).className = "btn btn-outline-secondary";
            document.getElementById("btn"+i).disabled = true;
        }
            
    }
    else if(buttonValue == "bot"){
        document.getElementById("msg").innerHTML = "<br>✖ 未通過驗證<br>";
        msg.style.color = "tomato";
        document.getElementById("toSubmit").disabled = true;
    }
}

function visBot(){
    btnDiv.style.display = "inline";

    var inputOK = accountOK + passOK;
    if( inputOK == 2){
        tips.style.display = "none"
        btnDiv.style.display = "inline";
        if( botOK == 1)
            document.getElementById("toSubmit").disabled = false;   
    }
    else{
        document.getElementById("toSubmit").disabled = true;
        tips.style.display = "inline";
        btnDiv.style.display = "none";
    }
}
function btnColor(color){
    if( color == 0)
        document.getElementById("rein-submit").style.backgroundColor = "green"
    else
        document.getElementById("rein-submit").style.backgroundColor = "darkgreen"
}