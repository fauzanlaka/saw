<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    $staff_id = $_POST['staff_id'];
    $usernme = addslashes($_POST['staff_username']);
    
    $query1 = adminUsernameCheck("admin", "WHERE adm_username='$usernme'");
    $query2 = adminUsernameCheck("staff", "WHERE staff_username='$usernme' AND staff_id!='$staff_id'");
    
    if($query1 > 0){
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-red\'>ชื่อผู้ใช้นี้ถูกใช้เเล้ว กรุณาเลือกชื่อผู้ใช้อื่น</p>'";
    }else if($query1 < 1 && $query2 > 0){
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-red\'>ชื่อผู้ใช้นี้ถูกใช้เเล้ว กรุณาเลือกชื่อผู้ใช้อื่น</p>'";
    }else{
        echo "document.getElementById('usernameCheckAlert').innerHTML = '<p class=\'text-green\'>ชื่อผู้ใช้สามารถใช้งานได้</p>'";
    }
?>

