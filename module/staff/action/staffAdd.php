<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    $operator = $_POST['operator'];
    $staff_idcard = addslashes($_POST['staff_idcard']);
    echo "document.getElementById('id_card_alert').innerHTML = '';";
    
    //ตรวจสอบข้อมูลซำ้ด้วยหมายเลขบัตรประชาชน
    $staff_idcard = $_POST['staff_idcard'];

    $checking1 = dubbleData("staff", "staff_idcard='$staff_idcard'");
    if($checking1 > 0){
        echo "document.getElementById('id_card_alert').innerHTML = '<p class=\'text-red\'>ข้อมูลนี้มีในระบบเเล้ว...</p>';";
        echo "document.getElementById('staff_idcard').focus();";
        echo "document.getElementById('process').innerHTML = '';";
    }else{
        $form_data = array(
            'recorder_id' => $operator,
            'sgender' => addslashes($_POST['sgender']),
            'staff_idcard' => addslashes($_POST['staff_idcard']),
            'staff_name' => addslashes($_POST['staff_name']),
            'staff_surename' => addslashes($_POST['staff_surename']),
            'staff_birth' => addslashes($_POST['staff_birth']),
            'sedu_certif' => addslashes($_POST['sedu_certif']),
            'sedu_grduated' => addslashes($_POST['sedu_grduated']),
            'sedu_major' => addslashes($_POST['sedu_major']),
            'sedu_minor' => addslashes($_POST['sedu_minor']),
            'swoking_stated' => addslashes($_POST['swoking_stated']),
            'sposition' => addslashes($_POST['sposition']),
            'staff_status' => addslashes($_POST['staff_status']),
            'staff_home_no' => addslashes($_POST['staff_home_no']),
            'staff_village_no' => addslashes($_POST['staff_village_no']),
            'staff_soi_name' => addslashes($_POST['staff_soi_name']),
            'staff_road_name' => addslashes($_POST['staff_road_name']),
            'staff_tambom' => addslashes($_POST['staff_tambom']),
            'staff_amphoe' => addslashes($_POST['staff_amphoe']),
            'staff_province' => addslashes($_POST['staff_province']),
            'staff_postno' => addslashes($_POST['staff_postno']),
            'staff_phoneno' => addslashes($_POST['staff_phoneno']),
            'staff_email' => addslashes($_POST['staff_email']),
            'staff_socialmedia' => addslashes($_POST['staff_socialmedia']),
            'staff_username' => addslashes($_POST['staff_idcard']),
            'staff_password' =>  addslashes($_POST['staff_idcard'])
        ); 
        dbRowInsert('staff', $form_data);
        $result = lastRecord("staff", "WHERE staff_idcard='$staff_idcard'", "../../../connect/connect.php");
        $staff_id = $result['staff_id'];
        
        echo "formLoad('module/staff/staffAdd2.php', '$staff_id', '$operator');";
    }
?>