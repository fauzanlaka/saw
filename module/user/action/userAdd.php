<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    $operator = $_POST['operator'];
    $string_username = addslashes($_POST['adm_firstname']);
    $string_password = addslashes($_POST['adm_idcard']);
    
    //ตรวจสอบข้อมูลซำ้ด้วยเลขบัตรประชาชน
    $adm_idcard = $_POST['adm_idcard'];
    $dubble_data_query_result = dubbleData("admin", "adm_idcard='$adm_idcard'");
    if($dubble_data_query_result > 0){
        echo "document.getElementById('id_card_alert').innerHTML = '<p class=\'text-red\'>ข้อมูลผู้ใช้นี้มีอยู่ในระบบเเล้ว...</p>';";
        echo "document.getElementById('adm_idcard').focus();";
        echo "document.getElementById('process').innerHTML = '';";
    }else{
    
        $form_data = array(
            'agender_name' => addslashes($_POST['agender_name']),
            'adm_firstname' => addslashes($_POST['adm_firstname']),
            'adm_lastname' => addslashes($_POST['adm_lastname']),
            'adm_idcard' => addslashes($_POST['adm_idcard']),
            'adm_birth_date' => addslashes($_POST['adm_birth_date']),
            'admin_phoneno' => addslashes($_POST['admin_phoneno']),
            'admin_email' => addslashes($_POST['admin_email']),
            'admin_home_no' => addslashes($_POST['admin_home_no']),
            'admin_village_no' => addslashes($_POST['admin_village_no']),
            'admin_soi_name' => addslashes($_POST['admin_soi_name']),
            'admin_road_name' => addslashes($_POST['admin_road_name']),
            'admin_tambom' => addslashes($_POST['admin_tambom']),
            'admin_amphoe' => addslashes($_POST['admin_amphoe']),
            'admin_province' => addslashes($_POST['admin_province']),
            'admin_postno' => addslashes($_POST['admin_postno']),
            'adm_username' => $string_username,
            'adm_password' => $string_password,
            'adm_status' => '1',
            'adm_profileImage' => ''
        );   

        dbRowInsert('admin', $form_data);

        echo "window.location.assign(\"?mod=user\");";
    }
        
?>

