<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    
    //$operator = $_POST['operator'];
    $building_id = $_POST['building_id'];
    
    $form_data = array(
        'building_name' => addslashes($_POST['building_name']),
        'building_code' => addslashes($_POST['building_name']),
        'building_floor_number' => addslashes($_POST['building_floor_number']),
        'building_room_number' => addslashes($_POST['building_room_number']),
        'building_color' => addslashes($_POST['building_color']),
        'building_status' => addslashes($_POST['building_status']),
        'staff_id' => addslashes($_POST['staff_id'])
    );
    dbRowUpdate('building', $form_data, "WHERE building_id = '$building_id'");
    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "document.getElementById('process').innerHTML = '';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";
    //echo "formLoad('module/staff/staffAdd2.php', '$staff_id', '$operator');";
?>





