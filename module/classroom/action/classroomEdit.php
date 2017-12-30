<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    
    $classroom_id = $_POST['classroom_id'];
    
    $form_data = array(
        'classroom_name' => addslashes($_POST['classroom_name']),
        'classroom_subname' => addslashes($_POST['classroom_subname']),
        'classroom_semester' => addslashes($_POST['classroom_semester']),
        'classroom_year' => addslashes($_POST['classroom_year']),
        'room_id' => addslashes($_POST['room_id_value']),
        'staff_id' => addslashes($_POST['staff_id_value'])
    );
    
    $form_data_sc = array(
        'classroom_semester' => addslashes($_POST['classroom_semester']),
        'classroom_year' => addslashes($_POST['classroom_year'])
    );
        
    //อัพเดทตาราง classroom
    dbRowUpdate('classroom', $form_data, "WHERE classroom_id = '$classroom_id'");
    
    //อัพเดทตาราง student_classroom
    dbRowUpdate('student_classroom', $form_data_sc, "WHERE classroom_id = '$classroom_id'");
    
    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "document.getElementById('process').innerHTML = '';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";
?>







