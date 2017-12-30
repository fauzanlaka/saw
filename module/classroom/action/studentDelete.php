<?php
    header("content-type: text/javascript");
    
    include '../../../function/global.php';
    $stdroom_id = $_POST['id']; //id is from room
    dbRowDelete('student_classroom', "WHERE stdroom_id = '$stdroom_id'");
    
    echo "document.getElementById('$stdroom_id').style.display = 'none';";
    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";

    //echo "alert('$id');";
?>



