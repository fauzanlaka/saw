//----------------------------------------User--------------------------------------------
function userValidationCheck(path, formId){
    //dataAdd(path, formId);
    var idcard = document.getElementById('id_card').value.length;
    if(document.getElementById('name_thai').value==""){
        document.getElementById('name_thai').focus();
    }else if(document.getElementById('lastname_thai').value==""){
        document.getElementById('lastname_thai').focus();
    }else if(document.getElementById('name_eng').value==""){
        document.getElementById('name_eng').focus();
    }else if(document.getElementById('lastname_eng').value==""){
        document.getElementById('lastname_eng').focus();
    }else if(document.getElementById('date_of_birth').value==""){
        document.getElementById('date_of_birth').focus();
    }else if(idcard < 13){
        document.getElementById('id_card').focus();
    }else if(document.getElementById('passport').value==""){
        document.getElementById('passport').focus();
    }else if(document.getElementById('telephone').value==""){
        document.getElementById('telephone').focus();
    }else if(document.getElementById('email').value==""){
        document.getElementById('email').focus();
    }else{
        dataAdd(path, formId);
    }
}   
function profileValidationCheck(path, formId){
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('passwordConfirm').value;
    if(password!=confirmPassword){
        document.getElementById('confirmPasswordAlert').innerHTML = "<font color='red'>รหัสผ่านไม่ตรงกัน กรุณากรอกอีกครั้ง</font>";
    }else if(username==''){
        document.getElementById('usernameCheckAlert').innerHTML = "<font color='red'>กรุณากรอกชื่อผู้ใช้</font>";
        document.getElementById('username').focus();
    }else{
        document.getElementById('confirmPasswordAlert').innerHTML = "";
        dataUpdate(path, formId);
        //alert(formId);
    }
}
//Check dubble username
function usernameCheck(path, userId){
    var username = document.getElementById('username').value;
    if(document.getElementById('username').value.length < 1){
        document.getElementById('usernameCheckAlert').innerHTML = "<font color=\'red\'>กรุณากรอกชื่อผู้ใช้งาน</font>";
        document.getElementById('usernameCheckAlert').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = "&userId=" + userId + "&username=" + username;
        document.getElementById('usernameCheckAlert').innerHTML = "กำลังตรวจสอบ...";
        ajaxLoadFrw('post', URL, data, 'content');
    }
}
//----------------------------------------project--------------------------------------------
function projectValidationCheck(path, formId){
    if(document.getElementById('prj_name').value==""){
        document.getElementById('prj_name').focus();
    }else if(document.getElementById('prj_startDate').value==""){
        document.getElementById('prj_startDate').focus();
    }else if(document.getElementById('prj_endDate').value==""){
        document.getElementById('prj_endDate').focus();
    }else{
        dataAdd(path, formId);
    }
}   
function projectCostValidationCheck(path, formId){
    if(document.getElementById('cot_name').value==""){
        document.getElementById('cot_name').focus();
    }else if(document.getElementById('cot_money').value==""){
        document.getElementById('cot_money').focus();
    }else{
        dataAdd(path, formId);
    }
}
function projectCostEditValidationCheck(path, formId, iCount){
    var cn = "cot_name" + iCount;
    var cm = "cot_money" + iCount;
    if(document.getElementById(cn).value==""){
        document.getElementById(cn).focus();
    }else if(document.getElementById(cm).value==""){
      document.getElementById(cm).focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = getFrmData(formId);
        document.getElementById('processEditCost').innerHTML = "กำลังประมวลผล...";
        ajaxLoadFrw('post', URL, data, 'content');
    }
}
function projectEditValidationCheck(path, formId){
    if(document.getElementById('prj_name').value==""){
        document.getElementById('prj_name').focus();
    }else if(document.getElementById('prj_startDate').value==""){
        document.getElementById('prj_startDate').focus();
    }else if(document.getElementById('prj_endDate').value==""){
        document.getElementById('prj_endDate').focus();
    }else{
        //alert('OK');
        dataUpdate(path, formId);
    }
}
function custumerValidationCheck(path, formId){
    if(document.getElementById('cut_name_th').value==""){
        document.getElementById('cut_name_th').focus();
    }else if(document.getElementById('cut_lastname_th').value==""){
        document.getElementById('cut_lastname_th').focus();
    }else if(document.getElementById('cut_name_en').value==""){
        document.getElementById('cut_name_en').focus();
    }else if(document.getElementById('cut_lastname_en').value==""){
        document.getElementById('cut_lastname_en').focus();
    }else if(document.getElementById('cut_idcard').value=="" || document.getElementById('cut_idcard').value.length < 13){
        document.getElementById('cut_idcard').focus();
    }else if(document.getElementById('cut_date_of_birdth').value==""){
        document.getElementById('cut_date_of_birdth').focus();
    }else if(document.getElementById('cut_telephone').value==""){
        document.getElementById('cut_telephone').focus();
    }else{
        //alert(path);
        dataAdd(path, formId);
    }
}
function custumerEditValidationCheck(path, formId){
    if(document.getElementById('cut_name_th').value==""){
        document.getElementById('cut_name_th').focus();
    }else if(document.getElementById('cut_lastname_th').value==""){
        document.getElementById('cut_lastname_th').focus();
    }else if(document.getElementById('cut_name_en').value==""){
        document.getElementById('cut_name_en').focus();
    }else if(document.getElementById('cut_lastname_en').value==""){
        document.getElementById('cut_lastname_en').focus();
    }else if(document.getElementById('cut_idcard').value=="" || document.getElementById('cut_idcard').value.length < 13){
        document.getElementById('cut_idcard').focus();
    }else if(document.getElementById('cut_date_of_birdth').value==""){
        document.getElementById('cut_date_of_birdth').focus();
    }else if(document.getElementById('cut_telephone').value==""){
        document.getElementById('cut_telephone').focus();
    }else{
        //alert(path);
        dataUpdate(path, formId);
    }
}
//--------------------------------------Custumer--------------------------------------
function formLoadTab(path, id, usrid, tabValue){
    var URL = path + "?id=" + id + "&userid=" + usrid + "&tabValue=" + tabValue;
    var data = null;
    document.getElementById('content').innerHTML = "<div class='loader' id='loader' style='display: block'></div>";
    ajaxLoadFrw("GET", URL, data, "content");
}
function custumerSelectSearch(formId){
    var URL = "module/custumer/action/custumerSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function custumerSelectSearchClick(formId){
    var URL = "module/custumer/action/custumerSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextCustumer(el, id){
    document.getElementById('usr_id').value = el.innerHTML;
    document.getElementById('listbox').style.display = 'none';
    document.getElementById('user').value = id;
}
//--------------------------------------Member--------------------------------------
function selectMemberType(id){
    if(document.getElementById('usr_type').value=='2'){
        document.getElementById('memberOf').style.display = "block";
    }else{
        document.getElementById('memberOf').style.display = "none";
        document.getElementById('usr_recommended_by').value = "0";
    }
}
function memberSelectSearch(formId){
    var URL = "module/member/action/memberSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function memberSelectSearchClick(formId){
    var URL = "module/member/action/memberSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextMember(el, id){
    document.getElementById('usr_id').value = el.innerHTML;
    document.getElementById('listbox').style.display = 'none';
    document.getElementById('usr_recommended_by').value = id;
}
//--------------------------------------circulation--------------------------------------
function oni_status_select(){
    if(document.getElementById('oni_status').value=='1'){
        document.getElementById('allowed_year').style.display = 'none';
    }else{
        document.getElementById('allowed_year').style.display = 'block';
    }
}
function onlineValidationCheck(path, formId){
    if(document.getElementById('oni_online_date').value==""){
        document.getElementById('oni_online_date').focus();
    }else{
        dataAdd(path, formId);
    }
}
function custumerSelectSearch(formId){
    var URL = "module/circulation/action/custumerSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function custumerSelectSearchClick(formId){
    var URL = "module/circulation/action/custumerSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextCustumer(el, id){
    document.getElementById('usr_id').value = el.innerHTML;
    document.getElementById('listbox').style.display = 'none';
    document.getElementById('custumer_of').value = id;
}
function formLoadOnlineEdit(path, oni_id, usrid){
    var URL = path + "?oni_id=" + oni_id + "&userid=" + usrid;
    var data = null;
    document.getElementById('content').innerHTML = "<div class='loader' id='loader' style='display: block'></div>";
    ajaxLoadFrw("GET", URL, data, "content");
    alert(url);
}
function onlineEditValidationCheck(path, formId){
    if(document.getElementById('oni_online_date').value==""){
        document.getElementById('oni_online_date').focus();
    }else if(document.getElementById('usr_id').value==""){
        document.getElementById('usr_id').focus();
    }else{
        dataUpdate(path, formId);
    }
}
function cutPay(path, formId){
    //alert(formId);
    dataAdd(path, formId);
}