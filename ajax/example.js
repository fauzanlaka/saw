//------------------------------------------------------------------- Students  ------------------------------------------------------
function isPressEnter(){
    if(event.keyCode==13){
        searchStudent();
        return false;
    }
}

function saveEditBachelor1(){
    var URL = "content/student/action/saveEditBachelor1.php?dummy=" + Math.random();
    var data = getFrmData('editStudentBachelor1');
    document.getElementById('msg1').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'content');
}

function saveEditBachelor2(){
    var URL = "content/student/action/saveEditBachelor2.php?dummy=" + Math.random();
    var data = getFrmData('editStudentBachelor2');
    document.getElementById('msg2').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'content');
}

function saveEditBachelor3(){
    var URL = "content/student/action/saveEditBachelor3.php?dummy=" + Math.random();
    var data = getFrmData('editStudentBachelor3');
    document.getElementById('msg3').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'content');
}

function saveEditMaster1(){
    var URL = "content/student/action/saveEditMaster1.php?dummy=" + Math.random();
    var data = getFrmData('editStudent');
    document.getElementById('msg').innerHTML = 'Processing...';
    ajaxLoadFrw('post', URL, data, 'content');
}

function saveEditMaster2(){
    var URL = "content/student/action/saveEditMaster2.php?dummy=" + Math.random();
    var data = getFrmData('editStudentMaster2');
    document.getElementById('msg2').innerHTML = 'Processing...';
    ajaxLoadFrw('post', URL, data, 'content');
}

function deleteStudentDoc(id){
    var URL = "content/student/action/deleteStudentDoc.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
    if(result){
	var data = "id=" + id;
	ajaxLoadFrw('post', URL, data, '');
	}
}

function loadContent(content, folder, id){
	var URL = "content/" + folder + "/" + content + ".php?id=" + id  ;
	var data = null;
	ajaxLoadFrw('get', URL, data, "content");
	document.getElementById('content').innerHTML = "Loading....";
	document.getElementById('masterPagination').style.display = "none";
        document.getElementById('statistic').style.display = "none";
	alert(url);
	//Set timeout
	var t = 60000;
	timeoutF = setTimeout("ajaxTimeoutFrw()", t);
}

function hideData(){
    document.getElementById('statistic').style.display = "none";
    alert('1');
}

function searchStudent(){
	if(document.getElementById('q').value==""){
		document.getElementById('q').focus();
	}else{
		var data = getFrmData('studentSearchForm');
		var URL = "content/student/studentSearch.php?" + data;
		document.getElementById('content').innerHTML = "Sedang cari ! tunnggu sekejab...";
		ajaxLoadFrw('get', URL, data, 'content');
		document.getElementById('studentSearchForm').reset();
                document.getElementById('masterPagination').style.display = "none";
	}
}

function saveAddStudents2(){
    if(document.getElementById('student_id').value==""){
        document.getElementById('student_id').focus();
    }else if(document.getElementById('program').value==""){
        document.getElementById('program').focus();
    }else if(document.getElementById('firstname_rumi').value==""){
        document.getElementById('firstname_rumi').focus();
    }else if(document.getElementById('firstname_jawi').value==""){
        document.getElementById('firstname_jawi').focus();
    }else if(document.getElementById('firstname_eng').value==""){
        document.getElementById('firstname_eng').focus();
    }else if(document.getElementById('gender').value==""){
        document.getElementById('gender').focus();
    }else if(document.getElementById('cityzen_id').value==""){
        document.getElementById('cityzen_id').focus();
    }else if(document.getElementById('telephone').value==""){
        document.getElementById('telephone').focus();
    }else if(document.getElementById('password').value==""){
        document.getElementById('password').focus();
    }else{
        var URL = "content/student/action/saveAddStudents2.php?dummy=" + Math.random();
        var data = getFrmData('addForm');
        ajaxLoadFrw('post', URL, data, 'content');
    }
}

//Delete sudent data
function deleteData(id){
	var URL = "content/student/deleteData.php?dummy=" + Math.random();
	var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
		var data = "id=" + id;
		ajaxLoadFrw('post', URL, data, '');
	}
}

//------------------------------------------------------------------- Register  ------------------------------------------------------
//Data program
function saveProgram(){
	if(document.getElementById('p_name').value==""){
		document.getElementById('p_name').focus();
	}else if(document.getElementById('p_code').value==""){
		document.getElementById('p_code').focus();
	}else if(document.getElementById('p_semCount').value==""){
		document.getElementById('p_semCount').focus();
	}else{
		var URL = "content/register/saveProgram.php?dummy=" + Math.random();
		var data = getFrmData("program");
		document.getElementById('msg').innerHTML = "Uploading...";
		ajaxLoadFrw('post', URL, data, '');
	}
}

function loadRegisterContent(content, folder, id){
	var URL = "content/" + folder + "/" + content + ".php?id=" + id  ;
	var data = null;
	ajaxLoadFrw('get', URL, data, "content");
	document.getElementById('content').innerHTML = "Loading....";
	alert(url);
}

function programList(){
	loadContent('programList', 'register', '');
	document.getElementById('content').innerHTML = "Loading...";
}

function deleteProgram(id){
	var URL = "content/register/deleteProgram.php?dummy=" + Math.random();
	var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
		var data = "id=" + id;
		ajaxLoadFrw('post', URL, data, '');
	}
}

function deleteMou(id){
    var URL = "content/register/deleteMou.php?dummy=" + Math.random();
	var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
		var data = "id=" + id;
		ajaxLoadFrw('post', URL, data, '');
	}
}

function deleteDoc(id){
    var URL = "content/register/deleteDoc.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
    if(result){
	var data = "id=" + id;
	ajaxLoadFrw('post', URL, data, '');
	}
}

function saveEditProgram(id){
    if(document.getElementById('p_name').value==""){
            document.getElementById('p_name').focus();
	}else if(document.getElementById('p_code').value==""){
            document.getElementById('p_code').focus();
	}else if(document.getElementById('p_semCount').value==""){
            document.getElementById('p_semCount').focus();
	}else{
            var URL = "content/register/saveEditProgram.php?dummy=" + Math.random() + "&id=" + id;
            var data = getFrmData("program");
            document.getElementById('msg').innerHTML = "Updating...";
            ajaxLoadFrw('post', URL, data, '');
	}
}

function studySave(){
    if(document.getElementById('semister').value==""){
        document.getElementById('semister').focus();
    }else if(document.getElementById('start_date').value==""){
        document.getElementById('start_date').focus();
    }else if(document.getElementById('end_date').value==""){
        document.getElementById('end_date').focus();
    }else if(document.getElementById('common_prize').value==""){
        document.getElementById('common_prize').focus();
    }else if(document.getElementById('special_prize').value==""){
        document.getElementById('special_prize').focus();
    }else if(document.getElementById('exam').value==""){
        document.getElementById('exam').focus();
    }else{
        var URL = "content/register/studySave.php?dummy=" + Math.random();
        var data = getFrmData("studyForm");
        document.getElementById('msg').innerHTML = "Processing...";
        ajaxLoadFrw('post', URL, data, '');
    }
}

function saveEditStudy(){
    var URL = "content/register/saveEditStudy.php?dummy=" + Math.random();
    var data = getFrmData("studyForm");
    document.getElementById('msg').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, '');
}

function deleteStudy(id){
    var URL = "content/register/deleteStudy.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
    if(result){
	var data = "id=" + id;
	ajaxLoadFrw('post', URL, data, '');
	}
}

function m1StudySave(){
    if(document.getElementById('semister').value==""){
        document.getElementById('semister').focus();
    }else if(document.getElementById('start_date').value==""){
        document.getElementById('start_date').focus();
    }else if(document.getElementById('end_date').value==""){
        document.getElementById('end_date').focus();
    }else if(document.getElementById('common_prize').value==""){
        document.getElementById('common_prize').focus();
    }else{
        var URL = "content/register/m1StudySave.php?dummy=" + Math.random();
        var data = getFrmData("studyForm");
        document.getElementById('msg').innerHTML = "Processing...";
        ajaxLoadFrw('post', URL, data, '');
    }
}

function m1SaveEditStudy(){
    var URL = "content/register/m1SaveEditStudy.php?dummy=" + Math.random();
    var data = getFrmData("studyForm");
    document.getElementById('msg').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, '');
}

//----------------------------------------------------Payment-------------------------------------------------------
function isPressEnterYuran(){
    if(event.keyCode==13){
        searchYuran();
        return false;
    }
}

function searchYuran(){
    if(document.getElementById('q').value==""){
        document.getElementById('q').focus();
    }else{
	var data = getFrmData("yuranSearchForm");
	var URL = "content/payment/action/yuranSearch.php?dummy=" + Math.random();
	document.getElementById('content').innerHTML = "Sedang cari ! tunnggu sekejab...";
	ajaxLoadFrw('post', URL, data, 'content');
        document.getElementById('masterPagination').style.display = "none";
	}
}

function yuranPay(){
    document.getElementById('msg').innerHTML = 'Processing...';
    var URL = "content/payment/action/yuranPay.php?dummy=" + Math.random();
    var data = getFrmData('paymentForm');
    ajaxLoadFrw('post', URL, data, 'content');
}

function deleteYuran(id, sr_id){
    var URL = "content/payment/action/deleteYuran.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
        var data = "id=" + id + "&sr_id=" + sr_id;
        ajaxLoadFrw('post', URL, data, '');
    }
}

function deleteYuranRegister(id){
    var URL = "content/payment/action/deleteYuranRegister.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
        var data = "id=" + id;
        ajaxLoadFrw('post', URL, data, '');
    }
}

function deleteMuqaddimah(id, st_id){
    var URL = "content/payment/action/deleteMuqaddiamh.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
        var data = "id=" + id + "&st_id=" + st_id;
        ajaxLoadFrw('post', URL, data, '');
    }
}

function muqaddimahPay(){
    document.getElementById('msg').innerHTML = 'Processing...';
    var URL = "content/payment/action/muqaddimahPay.php?dummy=" + Math.random();
    var data = getFrmData('paymentForm');
    ajaxLoadFrw('post', URL, data, 'content');
}

function isPressEnterMuq(){
    if(event.keyCode==13){
        searchMuq();
        return false;
    }
}

function searchMuq(){
    if(document.getElementById('q').value==""){
        document.getElementById('q').focus();
    }else{
	var data = getFrmData("muqaddimahSearchForm");
	var URL = "content/payment/action/muqaddimahSearch.php?dummy=" + Math.random();
	document.getElementById('content').innerHTML = "Sedang cari ! tunnggu sekejab...";
	ajaxLoadFrw('post', URL, data, 'content');
        document.getElementById('masterPagination').style.display = "none";
	}
}

function examPay(){
    var URL = "content/payment/action/examPay.php?dummy=" + Math.random();
    var data = getFrmData('paymentForm');
    document.getElementById('msg').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'content');
}

function deleteExam(id, srx_id){
    var URL = "content/payment/action/deleteExam.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
        var data = "id=" + id + "&srx_id=" + srx_id;
        ajaxLoadFrw('post', URL, data, '');
    }
}

function deleteRegisterExam(id){
    var URL = "content/payment/action/deleteRegisterExam.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
        var data = "id=" + id;
        ajaxLoadFrw('post', URL, data, '');
    }
}

function isPressEnterExam(){
    if(event.keyCode==13){
        searchExam();
        return false;
    }
}

function searchExam(){
    if(document.getElementById('q').value==""){
        document.getElementById('q').focus();
    }else{
	var URL = "content/payment/action/searchExam.php?dummy=" + Math.random();
        var data = getFrmData("examSearchForm");
	document.getElementById('content').innerHTML = "Sedang cari ! tunnggu sekejab...";
	ajaxLoadFrw('post', URL, data, 'content');
        document.getElementById('masterPagination').style.display = "none";
	}    
}

function examPayByClass(term, year, classId, faculty, department){
    var URL = "content/payment/exam/payByClassList.php?term=" + term + "&year=" + year + "&classId=" + classId + "&faculty=" + faculty +"&department=" + department ;
    var data = null;
    ajaxLoadFrw('get', URL, data, "content");
    document.getElementById('content').innerHTML = "Loading....";
}

function examPayClass(){
    var URL = "content/payment/action/examPayClass.php?dummy=" + Math.random();
    var data = getFrmData('examPay');
    ajaxLoadFrw('post', URL, data, 'content');
    document.getElementById('msg').innerHTML = "Processing...";
}

//------------------------------------------------------Attendance--------------------------------------------------------
function loadAttendanceContent(content, folder, classId, ftId, dpId, re_id){
	var URL = "content/" + folder + "/" + content + ".php?re_id=" + re_id + "&classId=" + classId + "&ft_id=" + ftId + "&dp_id=" + dpId ;
	var data = null;
	ajaxLoadFrw('get', URL, data, "content");
	document.getElementById('content').innerHTML = "Loading....";
	document.getElementById('masterPagination').style.display = "none";
	alert(url);
	//Set timeout
	var t = 60000;
	timeoutF = setTimeout("ajaxTimeoutFrw()", t);
}

function addListSave(){
    var URL = "content/attendance/action/addListSave.php?dummy=" + Math.random();
    var data = getFrmData('addList');
    ajaxLoadFrw('post', URL, data, 'content');
    document.getElementById('msg').innerHTML = "Processing...";
}

function refreshAddList(content, folder, re_id, ft_id, dp_id, classId){
    var URL = "content/" + folder + "/" + content + ".php?re_id=" + re_id + "&classId=" + classId + "&ft_id=" + ft_id + "&dp_id=" + dp_id ;
    var data = null;
    ajaxLoadFrw('get', URL, data, "content");
    document.getElementById('content').innerHTML = "Loading....";
    document.getElementById('masterPagination').style.display = "none";
    alert(url);
    //Set timeout
    var t = 60000;
    timeoutF = setTimeout("ajaxTimeoutFrw()", t);
}

function deleteAttendance(id){
    var URL = "content/attendance/action/deleteAttendance.php?dummy=" + Math.random();
    var result = confirm("Anda yakin untuk hapus data ini?");
	if(result){
        var data = "id=" + id;
        ajaxLoadFrw('post', URL, data, '');
    }
}

//------------------------------------------------------------Report-------------------------------------------------------
function reportContent(reportContent, folder, id){
    var URL = "content/" + folder + "/" + reportContent + ".php?id=" + id;
    var data = null;
    ajaxLoadFrw('get', URL, data, "reportContent");
    document.getElementById('reportContent').innerHTML = "Loading....";
    alert(url);
	//Set timeout
    var t = 60000;
    timeoutF = setTimeout("ajaxTimeoutFrw()", t);        
}
function searchFromTo(content, folder){
    var URL = "content/" + folder + "/" + content + ".php?dummy=" + Math.random();
    //document.getElementById('lastStatement').style.display = "none";
    var data = getFrmData('searchFromTo');
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
}
function formLoad(content, folder){
    var URL = "content/" + folder + "/" + content + ".php";
    var data = null;
    ajaxLoadFrw('get', URL, data, "form");
    document.getElementById('form').innerHTML = "Loading....";
    alert(url); //Set timeout
    var t = 60000;
    timeoutF = setTimeout("ajaxTimeoutFrw()", t);   
}
function yuranReportByClass(year){
    var term = document.getElementById('term').value;
    var classRoom = document.getElementById('class').value;
    var faculty = document.getElementById('faculty').value;
    var department = document.getElementById('department').value;
    var status = document.getElementById('status').value;
    var data = "&term=" + term + "&status=" + status + "&faculty=" + faculty + "&department=" + department + "&classRoom=" + classRoom + "&year=" + year;
    var URL = "content/payment/report/action/yuranReportByclass.php?&dummy=" + Math.random();
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
}
function printDiv(printableArea){
    var printContents = document.getElementById(printableArea).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
function yuranReportByTerm(){
    var URL = "content/payment/report/action/yuranReportByterm.php?dummy=" + Math.random();
    var data = getFrmData('yuranReportByTerm');
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
}
function MasterSearchFromTo(content, folder){
    var program = document.getElementById('program').value;
    if(program=='1'){
        alert('Sila pilih program');
    }else{
    var URL = "content/" + folder + "/" + content + ".php?dummy=" + Math.random();
    var data = getFrmData('masterSearchFromTo');
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
    }
}
function MasteryuranReportByTerm(){
    var program = document.getElementById('program').value;
    if(program=='1'){
        alert('Sila pilih program');
    }else{
    var URL = "content/payment/report/action/masterFillByterm.php?dummy=" + Math.random();
    var data = getFrmData('yuranReportByTerm');
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
    }
}
function examAccess(year){
    var term = document.getElementById('term').value;
    var classRoom = document.getElementById('class').value;
    var faculty = document.getElementById('faculty').value;
    var department = document.getElementById('department').value;
    var data = "termRg=" + term + "&faculty=" + faculty + "&department=" + department + "&classRoom=" + classRoom + "&year=" + year;
    var URL = "content/payment/report/action/examAccess.php?&dummy=" + Math.random();
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
}
function examReportByClass(year){
    var term = document.getElementById('term').value;
    var classRoom = document.getElementById('class').value;
    var faculty = document.getElementById('faculty').value;
    var department = document.getElementById('department').value;
    var status = document.getElementById('status').value;
    var data = "termRg=" + term + "&status=" + status + "&faculty=" + faculty + "&department=" + department + "&classRoom=" + classRoom + "&year=" + year;
    var URL = "content/payment/report/action/examReportByClass.php?&dummy=" + Math.random();
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
}
function examReportByTerm(){
    var URL = "content/payment/report/action/examReportByTerm.php?dummy=" + Math.random();
    var data = getFrmData('examReportByTerm');
    document.getElementById('lastStatement').innerHTML = "Processing...";
    ajaxLoadFrw('post', URL, data, 'lastStatement');
}
function proof(){
    var URL = "content/proof/action/proofSearch.php?dummy=" + Math.random();
    var data = getFrmData('proofSearch');
    document.getElementById('proofContent').innerHTML = "Sedang proses...";
    ajaxLoadFrw('post', URL, data, 'proofContent');
    
}
    