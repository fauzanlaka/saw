<?php
    header("content-type: text/plain");
    include("../../../connect/connect.php");
    include("../../../function/global.php");
    
    $classroom_name = $_POST['classroom_name'];
    $classroom_subname = $_POST['classroom_subname'];
    $classroom_name_for_add = $_POST['classroom_name_for_add'];
    $student_type = $_POST['student_type'];
    $classroom_id = $_POST['classroom_id'];
    
    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", '../../../connect/connect.php');
    $classroom_semester = $classroom['classroom_semester'];
    $classroom_year = $classroom['classroom_year'];

    $currentYear = date('Y')+543;
    
    if($student_type==1){
        $search = mysqli_query($con, "SELECT * FROM student WHERE student.std_idtbl NOT IN(SELECT std_idtbl FROM student_classroom WHERE classroom_semester='$classroom_semester' AND classroom_year='$classroom_year') AND student.std_room_register='$classroom_name' AND YEAR(student.std_date_register)='$currentYear'");
    }else{
        $search = mysqli_query($con, "select sc.*,s.*,c.* from student_classroom sc INNER join student s on s.std_idtbl=sc.std_idtbl INNER JOIN classroom c ON sc.classroom_id=c.classroom_id WHERE c.classroom_name='$classroom_name' AND c.classroom_subname='$classroom_subname' AND s.std_idtbl NOT IN (SELECT std_idtbl FROM student_classroom WHERE classroom_id='$classroom_id') GROUP BY s.std_idtbl");
    }
    $response = <<<FORM
        <form name="studentAdd" id="studentAdd" method='post'>
FORM;
    $table = <<<RES
	<table class="table table-bordered">
            <thead>
                <tr>
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
            
                    <tr id="">
                        <td align='center'><input type='checkbox' name='pay_status[$i]' value='1'></td>
                        <td align='center'>$std_id</td>
                        <td>$fname $lname</td>
                        <td align='center'>$idcard</td>
                        <input type='hidden' name='std_idtbl[$i]' value='$std_idtbl'>
                        <input type='hidden' name='classroom_id' value='$classroom_id'>
                        <input type='hidden' name='student_type' value='$student_type'>
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
                <a onclick='student_add_to_class("module/student/action/studentAddToClass.php", "studentAdd")' class='btn btn-success'><i class='fa fa-save'></i> บันทึก</a>
BTN;
        $response .= $button_save;
        
	if(mysqli_num_rows($search)==0){
		$response = "<b>ไม่พบข้อมูล</b>";
	}

	mysqli_close($con);
        
	echo $response;
?>