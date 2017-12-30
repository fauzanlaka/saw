//--------------------------------------Page Loading--------------------------------------
function formLoad(path, id, usrid){
    var URL = path + "?id=" + id + "&userid=" + usrid;
    var data = null;
    document.getElementById('content').innerHTML = "<div class='loader' id='loader' style='display: block'></div>";
    ajaxLoadFrw("GET", URL, data, "content");
    alert(url);
}
//--------------------------------------Data insert--------------------------------------
function dataAdd(path, formId){
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    document.getElementById('process').innerHTML = "กำลังประมวลผล...";
    ajaxLoadFrw('post', URL, data, 'content');
    //alert(data);
} 
//--------------------------------------Data update--------------------------------------
function dataUpdate(path, formId){
    var URL = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    document.getElementById('process').innerHTML = "กำลังประมวลผล...";
    ajaxLoadFrw('post', URL, data, 'content');
}
//--------------------------------------success alert action--------------------------------------
function alertClose(){
    document.getElementById('successAlert').style.display = 'none';
}
function alertClose2(){
    document.getElementById('successAlert2').style.display = 'none';
}
function deleteAlertClose(){
    document.getElementById('deleteAlert').style.display = 'none';
}
//--------------------------------------Edit profile image--------------------------------------
function editProfileImage(path, formId){
    var url = path + "?dummy=" + Math.random();
    var data = getFrmData(formId);
    document.getElementById('imageProcess').innerHTML = "กำลังประมวลผล...";
    ajaxLoadFrw('post', URL, data, 'content');
}
//--------------------------------------Data row delete--------------------------------------
function dbRowDelete(path, id, idRe){
    var URL = path + "?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
    if(result){
	var data = "&id=" + id + "&idRe=" + idRe;
	ajaxLoadFrw('post', URL, data, '');
    }
}
function hideModal(){
    $("#myModal").removeClass("in");
    $(".modal-backdrop").remove();
    $("#myModal").hide();
}
//Exist data check
function existDataCheck(path, fieldId, alertId, length){
    if(document.getElementById(fieldId).value.length < length){
        document.getElementById(alertId).innerHTML = "<font color='orange'>กรุณากรอกให้ครบ 13 หลัก...</font>";
    }else{
        var fieldValue = document.getElementById(fieldId).value;
        var URL = path + "?dummy=" + Math.random();
        var data = "&fieldValue=" + fieldValue;
        document.getElementById(alertId).innerHTML = "<font color='orange'>กำลังตรวจสอบ...</font>";
        ajaxLoadFrw('post', URL, data, 'content');
        //alert(alertId);
    }
}
//--------------------------------------selector search box--------------------------------------
function msOverList(el){
    el.style.backgroundColor = '#00c0ef';
    el.style.cursor = 'pointer';
}
function msOutList(el){
    el.style.backgroundColor = '#f9fafc';
}
function hideList(){
    document.getElementById('listbox').style.display = 'none';
}