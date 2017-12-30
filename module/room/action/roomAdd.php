<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    //$operator = $_POST['operator'];
    
    //เพิ่มอาคาร
    $form_data = array(
        'room_name' => addslashes($_POST['room_name']),
        'room_code' => addslashes($_POST['room_code']),
        'room_number' => addslashes($_POST['room_number']),
        'building_id' => addslashes($_POST['building_id']),
        'room_status' => addslashes($_POST['room_status']),
        'room_use_status' => '2'
    ); 
    dbRowInsert('room', $form_data);
    echo "window.location.assign(\"?mod=room\");";
?>

