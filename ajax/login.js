function isPressEnterLogin(){
    if(event.keyCode==13){
        login();
        return false;
    }
}
function login(){ 
    if(document.getElementById('username').value==""){
        document.getElementById('username').focus();
    }else if(document.getElementById('password').value==""){
        document.getElementById('password').focus();
    }else{
        var URL = "login.php?dummy=" + Math.random();
        var data = getFrmData('loginForm');
        ajaxLoadFrw('post', URL, data, 'content');
        document.getElementById("loginStatus").innerHTML = "กำลังเข้าสู่ระบบ...";
    }
}
function logOut(){
    var URL = "logout.php?dummy=" + Math.random();
    var data = '';
    document.getElementById("content").innerHTML = "<div class='loader' id='loader' style='display: block'></div>";
    ajaxLoadFrw('post', URL, data, 'content');
}


