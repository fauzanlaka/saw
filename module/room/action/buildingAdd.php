<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    $operator = $_POST['operator'];
    
    //เพิ่มอาคาร
    $form_data = array(
        'recorder_id' => $operator,
        'building_name' => addslashes($_POST['building_name']),
        'building_code' => addslashes($_POST['building_code']),
        'building_floor_number' => addslashes($_POST['building_floor_number']),
        'building_color' => addslashes($_POST['building_color']),
        'building_room_number' => addslashes($_POST['building_room_number']),
        'staff_id' => addslashes($_POST['staff_id']),
        'building_status' => '1'
    ); 
    dbRowInsert('building', $form_data);
       
    //เพิ่มห้อง
    $building_name = addslashes($_POST['building_name']);
    $last_building = lastRecord("building", "WHERE building_name='$building_name'", "../../../connect/connect.php");
    $building_id = $last_building['building_id'];
    $building_room_number = addslashes($_POST['building_room_number']);
    for($i=1;$i<=$building_room_number;$i++){
        $form_data2 = array(
            'room_name' => "$building_name".$i,
            'room_number' => "",
            'room_code' => "",
            'building_id' => $building_id,
            'room_use_status' => '2',
            'room_status' => '1'
        );
        dbRowInsert('room', $form_data2);
    }
    echo "window.location.assign(\"?mod=room\");";
?>

