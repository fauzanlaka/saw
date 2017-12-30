//----------------------------------------student--------------------------------------------
function student_add(path, formId){
    if(document.getElementById('stdgender_name').value==""){
        document.getElementById('stdgender_name').focus();
    }else if(document.getElementById('std_name').value==""){
        document.getElementById('std_name').focus();
    }else if(document.getElementById('stdid_card').value==""){
        document.getElementById('stdid_card').focus();
    }else if(document.getElementById('std_birth').value==""){
        document.getElementById('std_birth').focus();
    }else if(document.getElementById('std_room_register').value==""){
        document.getElementById('std_room_register').focus();
    }else if(document.getElementById('std_date_register').value==""){
        document.getElementById('std_date_register').focus();
    }else if(document.getElementById('std_status').value==""){
        document.getElementById('std_status').focus();
    }else{
        dataAdd(path, formId);
    }
}  
function student_edit(path, formId){
    if(document.getElementById('std_name').value==""){
        document.getElementById('std_name').focus();
    }else if(document.getElementById('stdid_card').value==""){
        document.getElementById('stdid_card').focus();
    }else{
        dataUpdate(path, formId);
    }
}
function openFilter(id){
    if(id=='1'){
        document.getElementById('filter2').style.display = "block";
        document.getElementById('filter1').style.display = "none";
    }else{
        document.getElementById('filter2').style.display = "none";
        document.getElementById('filter1').style.display = "block";
    }
}
function studentSelectSearch(formId){
    var URL = "module/student/action/studentSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function studentSelectSearchClick(formId){
    var URL = "module/student/action/studentSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextStudent(el, id){
    document.getElementById('std_idtbl').value = el.innerHTML;
    document.getElementById('listbox').style.display = 'none';
    document.getElementById('std_idtbl_value').value = id;
}
function student_search(path, formId){
    if(document.getElementById('student_type').value==""){
        document.getElementById('student_type').focus();
    }else if(document.getElementById('classroom_name').value==""){
        document.getElementById('classroom_name').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = getFrmData(formId);
        document.getElementById('subcontent').innerHTML = "กำลังค้นหา...";
        ajaxLoadFrw('post', URL, data, 'subcontent');
        alert(url);
    }
}
function student_search_by_once(path, formId){
    if(document.getElementById('std_idtbl').value==""){
        document.getElementById('std_idtbl').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = getFrmData(formId);
        document.getElementById('subcontent2').innerHTML = "กำลังค้นหา...";
        ajaxLoadFrw('post', URL, data, 'subcontent2');
        //alert(url);
    }
}
function student_add_to_class(path, formId){
    dataAdd(path, formId);
}
function student_add_to_class_by_once(path, formId){
    dataAdd(path, formId);
}
//----------------------------------------user--------------------------------------------
//Check admin username
function adminUsernameCheck(path, adm_id){
    var adm_username = document.getElementById('adm_username').value;
    if(document.getElementById('adm_username').value.length <= 1 ){
        document.getElementById('usernameCheckAlert').innerHTML = "<font color=\'red\'>กรุณากรอกชื่อผู้ใช้งาน</font>";
        document.getElementById('usernameCheckAlert').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = "&adm_id=" + adm_id + "&adm_username=" + adm_username;
        document.getElementById('usernameCheckAlert').innerHTML = "กำลังตรวจสอบ...";
        ajaxLoadFrw('post', URL, data, 'content');
    }
}
function editProfile(path, formId){
    if(document.getElementById('adm_username').value==""){
        document.getElementById('adm_username').focus();
        document.getElementById('usernameCheckAlert').innerHTML = "<font color=\'red\'>กรุณากรอกชื่อผู้ใช้งาน</font>";
    }else if(document.getElementById('adm_password').value!=document.getElementById('passwordConfirm').value){
        document.getElementById('passwordConfirm').focus();
        document.getElementById('confirmPasswordAlert').innerHTML = "<font color=\'red\'>รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบ</font>";
    }else{
        dataUpdate(path, formId);
    }
}
function user_add(path, formId){
    if(document.getElementById('agender_name').value==""){
        document.getElementById('agender_name').focus();
    }else if(document.getElementById('adm_firstname').value==""){
        document.getElementById('adm_firstname').focus();
    }else if(document.getElementById('adm_lastname').value==""){
        document.getElementById('adm_lastname').focus();
    }else if(document.getElementById('adm_idcard').value==""){
        document.getElementById('adm_idcard').focus();
    }else{
        dataUpdate(path, formId);
    }
}
function editStaffProfile(path, formId){
    if(document.getElementById('staff_username').value==""){
        document.getElementById('staff_username').focus();
        document.getElementById('usernameCheckAlert').innerHTML = "<font color=\'red\'>กรุณากรอกชื่อผู้ใช้งาน</font>";
    }else if(document.getElementById('staff_password').value!=document.getElementById('passwordConfirm').value){
        document.getElementById('passwordConfirm').focus();
        document.getElementById('confirmPasswordAlert').innerHTML = "<font color=\'red\'>รหัสผ่านไม่ตรงกัน กรุณาตรวจสอบ</font>";
    }else{
        document.getElementById('confirmPasswordAlert').innerHTML = "";
        dataUpdate(path, formId);
    }
}
function staffUsernameCheck(path, staff_id){
    var staff_username = document.getElementById('staff_username').value;
    if(document.getElementById('staff_username').value.length <= 1 ){
        document.getElementById('usernameCheckAlert').innerHTML = "<font color=\'red\'>กรุณากรอกชื่อผู้ใช้งาน</font>";
        document.getElementById('usernameCheckAlert').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = "&staff_id=" + staff_id + "&staff_username=" + staff_username;
        document.getElementById('usernameCheckAlert').innerHTML = "กำลังตรวจสอบ...";
        ajaxLoadFrw('post', URL, data, 'content');
    }
}
//----------------------------------------staff--------------------------------------------
function staff_add(path, formId){
    if(document.getElementById('sgender').value==''){
        document.getElementById('sgender').focus();
    }else if(document.getElementById('staff_name').value==''){
        document.getElementById('staff_name').focus();
    }else if(document.getElementById('staff_surename').value==''){
        document.getElementById('staff_surename').focus();
    }else if(document.getElementById('staff_idcard').value==''){
        document.getElementById('staff_idcard').focus();
    }else if(document.getElementById('staff_birth').value==''){
        document.getElementById('staff_birth').focus();
    }else{
        dataAdd(path, formId);
    }
}
function staff_edit(path, formId){
    if(document.getElementById('staff_name').value==""){
        document.getElementById('staff_name').focus();
    }else if(document.getElementById('staff_idcard').value==""){
        document.getElementById('staff_idcard').focus();
    }else{
        dataUpdate(path, formId);
    }
}
//-----------------------------------room------------------------------------
function staffSelectSearch(formId){
    var URL = "module/room/action/staffSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function staffSelectSearchClick(formId){
    var URL = "module/room/action/staffSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextStaff(el, id){
    document.getElementById('link_id').value = el.innerHTML;
    document.getElementById('listbox').style.display = 'none';
    document.getElementById('staff_id').value = id;
}
function building_add(path, formId){
    var room_number = document.getElementById('building_room_number').value;
    if(document.getElementById('building_name').value==""){
        document.getElementById('building_name').focus();
    }else if(document.getElementById('building_room_number').value==""){
        document.getElementById('building_room_number').focus();
        document.getElementById('building_room_number_alert').innerHTML = "<font color='red'>กรุณาระบุข้อมูลเป็นตัวเลข</font>";
    }else if(isNaN(room_number)){
        document.getElementById('building_room_number').focus();
        document.getElementById('building_room_number_alert').innerHTML = "<font color='red'>กรุณาระบุข้อมูลเป็นตัวเลข</font>";
    }else{
        document.getElementById('building_room_number_alert').innerHTML = "";
        dataAdd(path, formId);
    }
}
function building_Edit(path, formId){
    var room_number = document.getElementById('building_room_number').value;
    if(document.getElementById('building_name').value==""){
        document.getElementById('building_name').focus();
    }else if(document.getElementById('building_room_number').value==""){
        document.getElementById('building_room_number').focus();
        document.getElementById('building_room_number_alert').innerHTML = "<font color='red'>กรุณาระบุข้อมูลเป็นตัวเลข</font>";
    }else if(isNaN(room_number)){
        document.getElementById('building_room_number').focus();
        document.getElementById('building_room_number_alert').innerHTML = "<font color='red'>กรุณาระบุข้อมูลเป็นตัวเลข</font>";
    }else{
        document.getElementById('building_room_number_alert').innerHTML = "";
        dataUpdate(path, formId);
    }
}
function room_edit(path, formId){
    if(document.getElementById('room_name').value==""){
        document.getElementById('room_name').focus();
    }else{
        dataUpdate(path, formId);
    }
}
function room_Add(path, formId){
    if(document.getElementById('room_name').value==""){
        document.getElementById('room_name').focus();
    }else{
        dataAdd(path, formId);
    }
}
//-----------------------------------classroom----------------------------------
function classroomSelectSearch(formId){
    var URL = "module/classroom/action/classroomSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function classroomSelectSearchClick(formId){
    var URL = "module/classroom/action/classroomSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextClassroom(el, id){
    document.getElementById('room_id').value = el.innerHTML;
    document.getElementById('listbox').style.display = 'none';
    document.getElementById('room_id_value').value = id;
}
function teacherSelectSearch(formId){
    var URL = "module/classroom/action/teacherSelectSearch.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function teacherSelectSearchClick(formId){
    var URL = "module/classroom/action/teacherSelectSearchClick.php?dummy= " + Math.random();
    var data = getFrmData(formId);
    ajaxLoadFrw('post', URL, data, 'msg');
}
function readTextTeacher(el, id){
    document.getElementById('staff_id').value = el.innerHTML;
    document.getElementById('listboxTeacher').style.display = 'none';
    document.getElementById('staff_id_value').value = id;
}
function classroom_add(path, formId){
    if(document.getElementById('classroom_name').value==""){
        document.getElementById('classroom_name').focus();
    }else if(document.getElementById('classroom_semester').value==""){
        document.getElementById('classroom_semester').focus();
    }else{
        dataAdd(path, formId);
    }
}
function classroom_edit(path, formId){
    if(document.getElementById('classroom_name').value==""){
        document.getElementById('classroom_name').focus();
    }else if(document.getElementById('classroom_semester').value==""){
        document.getElementById('classroom_semester').focus();
    }else{
        dataUpdate(path, formId);
    }
}
function classroom_search(path, formId){
    if(document.getElementById('classroom_name').value==""){
        document.getElementById('classroom_name').focus();
    }else if(document.getElementById('classroom_semester').value==""){
        document.getElementById('classroom_semester').focus();
    }else if(document.getElementById('classroom_year').value==""){
        document.getElementById('classroom_year').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = getFrmData(formId);
        document.getElementById('subcontent').innerHTML = "กำลังค้นหา...";
        ajaxLoadFrw('post', URL, data, 'subcontent');
        alert(url);
    }
}
function studentTypeSelection(){
    if(document.getElementById('student_type').value =='2'){
        document.getElementById('classroom_subname').style.display = "block";
        document.getElementById('spaceCol').style.display = "block";
    }else if(document.getElementById('student_type').value =='1'){
        document.getElementById('classroom_subname').style.display = "none";
        document.getElementById('spaceCol').style.display = "block";
    }
}
function staff_search(path, formId){
    if(document.getElementById('sposition').value==''){
        document.getElementById('sposition').focus();
    }else{
        var URL = path + "?dummy=" + Math.random();
        var data = getFrmData(formId);
        document.getElementById('subcontent').innerHTML = "กำลังค้นหา...";
        ajaxLoadFrw('post', URL, data, 'subcontent');
        alert(url);
    }
}