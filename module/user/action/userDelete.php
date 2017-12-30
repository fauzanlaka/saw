<?php
    header("content-type: text/javascript");
    
    include '../../../function/global.php';
    $id = $_POST['id']; //id is from usr_id
    dbRowDelete('user', "WHERE usr_id = '$id'");
    
    echo "document.getElementById('$id').style.display = 'none';";
    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";

    //echo "alert('$id');";
?>

