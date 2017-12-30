<?php
    header("content-type: text/javascript");
    session_start();
    unset($_SESSION["adm_id"]);
    echo "location = 'index.html';";
?>