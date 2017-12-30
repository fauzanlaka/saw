<?php
    header("content-type: text/plain");
    include ("../../../connect/connect.php");
    include("../../../function/global.php");
    
    $sposition = $_POST['sposition'];
    
    $search = queryListInner("staff", "WHERE sposition='$sposition'", "staff_id", "../../../connect/connect.php");
    
    $response = <<<RES
        <div class='pull-right'>
            <a href='module/staff/staffPrint.php?sposition=$sposition' target='_blank' class='btn btn-success'><i class='fa fa-print'></i> พิมพ์</a>
        </div>
        <br><br>
	<table class="table table-bordered">
            <thead>
                <tr>
                    <td align='center'>#</td>
                    <td align="center"><b>ชื่อ นามสกุล</b></td>
                    <td align="center"><b>เลขประจำตัวประชาชน</b></td>
                    <td align="center"><b>เริ่มทำงานเมื่อ</b></td>
                    <td align="center"><b>อายุ</b></td>
                    <td align="center"><b>เพศ</b></td>
                    <td align="center"><b>ผู้เพิ่ม</b></td>
                    <td align="center"><b>แก้ไข / รายละเอีด</b></td>
                </tr>
            </thead>
            <tbody>
RES;
    $i = 1;
    while($result = mysqli_fetch_array($search)){
        $staff_id = str_replace("\'", "&#39;", $result['staff_id']);
        $recorder_id = str_replace("\'", "&#39;", $result['recorder_id']);
        $sgender_name =  str_replace("\'", "&#39;", $result['sgender']);
        $staff_name = str_replace("\'", "&#39;", $result['staff_name']);
        $staff_surename = str_replace("\'", "&#39;", $result['staff_surename']);
        $staff_idcard = str_replace("\'", "&#39;", $result['staff_idcard']);
        $swoking_stated = str_replace("\'", "&#39;", $result['swoking_stated']);
        $staff_birth = str_replace("\'", "&#39;", $result['staff_birth']);

        //ผู้เพิ่มข้อมูล
        $recorder = dataGet("admin", "WHERE adm_id='$recorder_id'", "../../../connect/connect.php");
        $adm_firstname = str_replace("\'", "&#39;", $recorder['adm_firstname']);
        $adm_lastname = str_replace("\'", "&#39;", $recorder['adm_lastname']);
        
        //อายุ
        $age = (date('Y-m-d')+543) - $staff_birth;
        
        //เพศ
        if($sgender_name=='1'){
            $gender = 'ชาย';
        }else if($sgender_name=='2' OR $sgender_name=='3'){
            $gender = 'หญิง';
        }
        
        $tbody = <<<TBODY
            <tr id="$staff_id">
                <td align='center'>$i</td>
                <td align="left">$staff_name $staff_surename</td>
                <td align="center">$staff_idcard</td>
                <td align="center">$swoking_stated</td>
                <td align="center">$age</td>
                <td align="center">$gender</td>
                <td align="left">$adm_firstname $adm_lastname </td>
                <td align="center">
                    <button type="button" onclick="formLoad('module/staff/staffEdit.php', '$staff_id', '')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> แก้ไข</button>
                    <button type="button" onclick="formLoad('module/staff/staffProfile.php', '$staff_id', '')" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> แสดง</button>
                </td>
            </tr>
            
TBODY;
	$response .= $tbody;
        $i++;
	} //end block while

	$response .= "</tbody></table>";
        
	if(mysqli_num_rows($search)==0){
		$response = "<b>ไม่พบข้อมูล</b>";
	}

	mysqli_close($con);

	echo $response;
 
?>