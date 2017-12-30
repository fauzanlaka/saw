<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';

    $adm_id = $_POST['adm_id'];
    $usernme = addslashes($_POST['adm_username']);
    $query1 = adminUsernameCheck("admin", "WHERE adm_username='$usernme' AND adm_id!='$adm_id'");
    $query2 = adminUsernameCheck("staff", "WHERE staff_username='$usernme'");
  
    if($query1 > 0){
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-red\'>ชื่อผู้ใช้นี้ถูกใช้เเล้ว กรุณาเลือกชื่อผู้ใช้อื่น</p>';";
        echo "document.getElementById('process').innerHTML = '';";
        echo "document.getElementById('adm_username').focus();";
    }else if($query1 < 1 && $query2 > 0){
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-red\'>ชื่อผู้ใช้นี้ถูกใช้เเล้ว กรุณาเลือกชื่อผู้ใช้อื่น</p>';";
        echo "document.getElementById('process').innerHTML = '';";
        echo "document.getElementById('adm_username').focus();";
    }else{
        $form_data = array(
            'adm_firstname' => addslashes($_POST['adm_firstname']),
            'adm_lastname' => addslashes($_POST['adm_lastname']),
            'adm_birth_date' => addslashes($_POST['adm_birth_date']),
            'agender_name' => addslashes($_POST['agender_name']),
            'adm_idcard' => addslashes($_POST['adm_idcard']),
            'admin_phoneno' => addslashes($_POST['admin_phoneno']),
            'admin_email' => addslashes($_POST['admin_email']),
            'admin_email' => addslashes($_POST['admin_email']),
            'admin_home_no' => addslashes($_POST['admin_home_no']),
            'admin_village_no' => addslashes($_POST['admin_village_no']),
            'admin_road_name' => addslashes($_POST['admin_road_name']),
            'admin_soi_name' => addslashes($_POST['admin_soi_name']),
            'admin_tambom' => addslashes($_POST['admin_tambom']),
            'admin_amphoe' => addslashes($_POST['admin_amphoe']),
            'admin_province' => addslashes($_POST['admin_province']),
            'admin_postno' => addslashes($_POST['admin_postno']),
            'adm_username' => addslashes($_POST['adm_username']),
            'adm_password' => addslashes($_POST['adm_password'])
        );

        dbRowUpdate('admin', $form_data, "WHERE adm_id='$adm_id'");
        echo "document.getElementById('successAlert').style.display = 'block';";
        echo "document.getElementById('usernameCheckAlert').innerHTML = '';";
        echo "document.getElementById('process').innerHTML = '';";
        echo "$('html, body').animate({scrollTop:0}, 'slow');";
    }

?>



