<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    $operator = $_POST['operator'];
    //echo "document.getElementById('successAlert').style.display = 'block';";
    
    //ตรวจสอบข้อมูลซำ้
    $classroom_name = $_POST['classroom_name'];
    $classroom_subname = $_POST['classroom_subname'];
    $classroom_semester = $_POST['classroom_semester'];
    $classroom_year = $_POST['classroom_year'];
    $staff_id  = $_POST['staff_id_value'];
    
    $checking1 = dubbleData("classroom", "classroom_name='$classroom_name' AND classroom_subname='$classroom_subname' AND classroom_semester='$classroom_semester' AND classroom_year='$classroom_year'");
    //echo "alert('$checking1');";
    $checking2 = dubbleData("classroom", "classroom_semester='$classroom_semester' AND classroom_year='$classroom_year' AND classroom_name='$classroom_name' AND classroom_subname='$classroom_subname' AND staff_id='$staff_id'");
    
    if($checking1 > 0){
        echo "document.getElementById('successAlert1').style.display = 'block';";
        echo "document.getElementById('successAlert2').style.display = 'none';";
        echo "document.getElementById('process').innerHTML = '';";
    }else{
        
        if($checking2 > 0){
            echo "document.getElementById('successAlert1').style.display = 'none';";
            echo "document.getElementById('successAlert2').style.display = 'block';";
            echo "document.getElementById('process').innerHTML = '';";
        }else{
            $form_data = array(
                'classroom_name' => addslashes($_POST['classroom_name']),
                'classroom_subname' => addslashes($_POST['classroom_subname']),
                'classroom_semester' => addslashes($_POST['classroom_semester']),
                'classroom_year' => addslashes($_POST['classroom_year']),
                'room_id' => addslashes($_POST['room_id_value']),
                'staff_id' => addslashes($_POST['staff_id_value']),
                'recorder_id' => $operator
            );   
            dbRowInsert('classroom', $form_data);
            echo "window.location.assign(\"?mod=classroom\");";
        }
        //$result = lastRecord("student", "WHERE stdid_card='$stdid_card'", "../../../connect/connect.php");
        //$std_idtbl = $result['std_idtbl'];
        
        //echo "formLoad('module/student/studentAdd2.php', '$std_idtbl', '$operator');";
    }
?>