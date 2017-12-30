<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    
    $adm_id = $_POST['adm_id'];
    $form_data = array(
        'agender_name' => addslashes($_POST['agender_name']),
        'adm_firstname' => addslashes($_POST['adm_firstname']),
        'adm_lastname' => addslashes($_POST['adm_lastname']),
        'adm_idcard' => addslashes($_POST['adm_idcard']),
        'adm_birth_date' => addslashes($_POST['adm_birth_date']),
        'admin_home_no' => addslashes($_POST['admin_home_no']),
        'admin_village_no' => addslashes($_POST['admin_village_no']),
        'admin_soi_name' => addslashes($_POST['admin_soi_name']),
        'admin_road_name' => addslashes($_POST['admin_road_name']),
        'admin_tambom' => addslashes($_POST['admin_tambom']),
        'admin_amphoe' => addslashes($_POST['admin_amphoe']),
        'admin_province' => addslashes($_POST['admin_province']),
        'admin_postno' => addslashes($_POST['admin_postno']),
        'admin_phoneno' => addslashes($_POST['admin_phoneno']),
        'admin_email' => addslashes($_POST['admin_email'])
    );

    dbRowUpdate('admin', $form_data, "WHERE adm_id = '$adm_id'");

    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "document.getElementById('process').innerHTML = '';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";
?>



