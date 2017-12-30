<?php
    header("content-type:text/javascript");
    include '../../../function/global.php';
    
    $operator = $_POST['operator'];
    $std_idtbl = $_POST['std_idtbl'];
    
    $form_data = array(
        'stdgender_name' => addslashes($_POST['stdgender_name']),
        'std_name' => addslashes($_POST['std_name']),
        'std_surename' => addslashes($_POST['std_surename']),
        'stdid_card' => addslashes($_POST['stdid_card']),
        'std_birth' => addslashes($_POST['std_birth']),
        'std_id' => addslashes($_POST['std_id']),
        'std_room_register' => addslashes($_POST['std_room_register']),
        'std_date_register' => addslashes($_POST['std_date_register']),
        'std_status' => addslashes($_POST['std_status']),
        'std_oldschool' => addslashes($_POST['std_oldschool']),
        'std_home_no' => addslashes($_POST['std_home_no']),
        'std_village_no' => addslashes($_POST['std_village_no']),
        'std_soi_name' => addslashes($_POST['std_soi_name']),
        'std_road_name' => addslashes($_POST['std_road_name']),
        'std_tambom' => addslashes($_POST['std_tambom']),
        'std_amphoe' => addslashes($_POST['std_amphoe']),
        'std_province' => addslashes($_POST['std_province']),
        'std_postno' => addslashes($_POST['std_postno']),
        'std_phoneno' => addslashes($_POST['std_phoneno']),
        'std_emil' => addslashes($_POST['std_emil']),
        'pgender_name' => addslashes($_POST['pgender_name']),
        'parent_name' => addslashes($_POST['parent_name']),
        'parent_surename' => addslashes($_POST['parent_surename']),
        'parent_idcard' => addslashes($_POST['parent_idcard']),
        'parent_job' => addslashes($_POST['parent_job']),
        'parent_phoneno' => addslashes($_POST['parent_phoneno'])
    );   
    dbRowUpdate('student', $form_data, "WHERE std_idtbl = '$std_idtbl'");
    //echo "document.getElementById('successAlert').style.display = 'block';";
    echo "document.getElementById('process').innerHTML = '';";
    //echo "$('html, body').animate({scrollTop:0}, 'slow');";
    echo "formLoad('module/student/studentAdd2.php', '$std_idtbl', '$operator');";
?>





