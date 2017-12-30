<?php
    header("content-type: text/javascript");
    
    include '../../../function/global.php';
    $room_id = $_POST['id']; //id is from room
    dbRowDelete('room', "WHERE room_id = '$room_id'");
    $ii = "r".$room_id;
    
    echo "document.getElementById('$ii').style.display = 'none';";
    echo "document.getElementById('successAlert').style.display = 'block';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";

    //echo "alert('$id');";
?>

