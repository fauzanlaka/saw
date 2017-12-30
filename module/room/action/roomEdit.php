<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    
    //$operator = $_POST['operator'];
    $room_id = $_POST['room_id'];
    
    $form_data = array(
        'room_name' => addslashes($_POST['room_name']),
        'room_code' => addslashes($_POST['room_code']),
        'room_number' => addslashes($_POST['room_number']),
        'building_id' => addslashes($_POST['building_id']),
        'room_status' => addslashes($_POST['room_status'])
    );
    dbRowUpdate('room', $form_data, "WHERE room_id = '$room_id'");
    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "document.getElementById('process').innerHTML = '';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";
    //echo "formLoad('module/staff/staffAdd2.php', '$staff_id', '$operator');";
?>






