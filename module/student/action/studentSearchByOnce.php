<?php
    header("content-type: text/plain");
    include("../../../connect/connect.php");
    include("../../../function/global.php");
    
    $std_idtbl = $_POST['std_idtbl_value'];
    
    $classroom_name_for_add = $_POST['classroom_name_for_add'];
    $classroom_id = $_POST['classroom_id'];
    
    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", '../../../connect/connect.php');
    $classroom_semester = $classroom['classroom_semester'];
    $classroom_year = $classroom['classroom_year'];

    $search = mysqli_query($con, "SELECT * FROM student WHERE std_idtbl='$std_idtbl'");
    //echo "OK";
    
    $response = <<<FORM
        <form name="studentAddByOnce" id="studentAddByOnce" method='post'>
FORM;
    $table = <<<RES
	<table class="table table-bordered">
            <thead>
                <tr id='rd'>
                    <td align='center'>เลือก</td>
                    <td align='center'>รหัสนักเรียน</td>
                    <td align='center'>ชื่อ นามสกุล</td>
                    <td align='center'>เลขประจำตัวประชาชน</td>
                </tr>
            </thead>
            <tbody>
RES;
    $response .= $table;
    $i = 0;
    while($p = mysqli_fetch_array($search)){
        $std_idtbl = str_replace("\'", "&#39;", $p["std_idtbl"]);
        $fname = str_replace("\'", "&#39;", $p["std_name"]);
        $lname = str_replace("\'", "&#39;", $p["std_surename"]);
        $idcard = str_replace("\'", "&#39;", $p["stdid_card"]);
        $std_current_classroom = str_replace("\'", "&#39;", $p["std_current_classroom"]);
        $std_id = str_replace("\'", "&#39;", $p["std_id"]);
        $std_status = str_replace("\'", "&#39;", $p["std_status"]);
        
        //สถานะนักเรียน
        $std_status_name = std_status($std_status);
        
        $tbody = <<<TBODY
            
                    <tr id="r$std_idtbl">
                        <td align='center'><input type='checkbox' name='pay_status[$i]' value='1'></td>
                        <td align='center'>$std_id</td>
                        <td>$fname $lname</td>
                        <td align='center'>$idcard</td>
                        <input type='hidden' name='std_idtbl[$i]' value='$std_idtbl'>
                        <input type='hidden' name='classroom_id' value='$classroom_id'>
                        <input type='hidden' name='classroom_name' value='$classroom_name_for_add'>
                    </tr>
            
TBODY;
        $i++;
	$response .= $tbody;

	} //end block while

	$response .= "</tbody></table>";
        $endform = <<<ENDFORM
                </form>
ENDFORM;
        $response .= $endform;
        
        $button_save = <<<BTN
                <a id='btnd' onclick='student_add_to_class_by_once("module/student/action/studentAddToClassByOnce.php", "studentAddByOnce")' class='btn btn-success'><i class='fa fa-save'></i> บันทึก</a>
BTN;
        $response .= $button_save;
        
	if(mysqli_num_rows($search)==0){
		$response = "<b>ไม่พบข้อมูล</b>";
	}

	mysqli_close($con);
        
	echo $response;
     
?>