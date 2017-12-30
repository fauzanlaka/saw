<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';

    $staff_id = $_POST['staff_id'];
    $usernme = addslashes($_POST['staff_username']);
    $query1 = adminUsernameCheck("admin", "WHERE adm_username='$usernme'");
    $query2 = adminUsernameCheck("staff", "WHERE staff_username='$usernme' AND staff_id!='$staff_id'");
    
    if($query1 > 0){
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-red\'>ชื่อผู้ใช้นี้ถูกใช้เเล้ว กรุณาเลือกชื่อผู้ใช้อื่น</p>';";
        echo "document.getElementById('process').innerHTML = '';";
        echo "document.getElementById('staff_username').focus();";
    }else if($query1 < 1 && $query2 > 0){
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-red\'>ชื่อผู้ใช้นี้ถูกใช้เเล้ว กรุณาเลือกชื่อผู้ใช้อื่น</p>';";
        echo "document.getElementById('process').innerHTML = '';";
        echo "document.getElementById('staff_username').focus();";
    }else{
        $form_data = array(
            'sgender' => addslashes($_POST['sgender']),
            'staff_idcard' => addslashes($_POST['staff_idcard']),
            'staff_name' => addslashes($_POST['staff_name']),
            'staff_surename' => addslashes($_POST['staff_surename']),
            'staff_birth' => addslashes($_POST['staff_birth']),
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
            'staff_username' => addslashes($_POST['staff_username']),
            'staff_password' =>  addslashes($_POST['staff_password'])
        );
        dbRowUpdate('staff', $form_data, "WHERE staff_id='$staff_id'");
        echo "document.getElementById('successAlert').style.display = 'block';";
        echo "document.getElementById('usernameCheckAlert').innerHTML = '';";
        echo "document.getElementById('process').innerHTML = '';";
        echo "$('html, body').animate({scrollTop:0}, 'slow');";
    }
?>



