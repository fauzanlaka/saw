<?php
    header("content-type: text/plain");
    include ("../../../connect/connect.php");
    include("../../../function/global.php");
    
    $operator = $_POST['operator'];
    $classroom_name = $_POST['classroom_name'];
    $classroom_semester = $_POST['classroom_semester'];
    $classroom_year = $_POST['classroom_year'];
    
    $search = queryListInner("classroom", "WHERE classroom_name='$classroom_name' AND classroom_semester='$classroom_semester' AND classroom_year='$classroom_year'", "classroom_id", "../../../connect/connect.php");
    
    $response = <<<RES
	<table class="table table-bordered">
            <thead>
                <tr>
                    <td align='center'><b>ระดับชั้น</b></td>
                    <td align='center'><b>ลำดับห้อง (ทับ)</b></td>
                    <td align='center'><b>ครูประจำชั้น</b></td>
                    <td align='center'><b>จำนวนนักเรียน</b></td>
                    <td align='center'><b>เทอม / ปี</b></td>
                    <td align='center'><b>เพิ่ม/ลบ นักเรียน</b></td>
                </tr>
            </thead>
            <tbody>
RES;
    while($classroom_result = mysqli_fetch_array($search)){
        $classroom_id = str_replace("\'", "&#39;", $classroom_result["classroom_id"]);
        $classroom_name = str_replace("\'", "&#39;", $classroom_result["classroom_name"]);
        $classroom_subname = str_replace("\'", "&#39;", $classroom_result["classroom_subname"]);
        $staff_id = str_replace("\'", "&#39;", $classroom_result["staff_id"]);
        $classroom_semester = str_replace("\'", "&#39;", $classroom_result["classroom_semester"]);
        $classroom_year = str_replace("\'", "&#39;", $classroom_result["classroom_year"]);
        
        //จำนวนนักเรียน
        $totalStudent = rowCount("student_classroom", "WHERE classroom_id='$classroom_id'", "../../../connect/connect.php");
                                                
        //ชั้นเรียน
        $className = className("$classroom_name");
        $staff = dataGet("staff", "WHERE staff_id='$staff_id'", "../../../connect/connect.php");
        $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
        $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
        
        $tbody = <<<TBODY
            <tr id="">
                <td align='center'>$className</td>
                <td align='center'>$classroom_subname</td>
                <td align='center'>$staff_name $staff_surename </td>
                <td align='center'>$totalStudent คน</td>
                <td align='center'>$classroom_semester/$classroom_year</td>
                <td align='center'>
                    <a onclick="formLoad('module/student/studentAddToClass.php', '$classroom_id', '$operator')" class="btn btn-openid btn-sm"><i class="fa  fa-database"></i> เพิ่ม/ลบ นักเรียน</a>
                </td>
            </tr>
            
TBODY;
	$response .= $tbody;

	} //end block while

	$response .= "</tbody></table>";
        
	if(mysqli_num_rows($search)==0){
		$response = "<b>ไม่พบข้อมูล</b>";
	}

	mysqli_close($con);

	echo $response;
 
?>