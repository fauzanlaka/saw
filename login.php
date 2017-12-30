<?php
    header("content-type: text/javascript");
    session_start();
    include 'connect/connect.php';
    $login = mysqli_real_escape_string($con, $_POST['username']);
    $loginText = addslashes($login);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $passwordText = addslashes($password);
     
    $sql_admin = mysqli_query($con, "SELECT * FROM admin WHERE adm_username='$loginText' AND adm_password='$passwordText'");
    $num_admin = mysqli_num_rows($sql_admin); 
    $result_admin = mysqli_fetch_array($sql_admin);
    
    $sql_staff = mysqli_query($con, "SELECT * FROM staff WHERE staff_username='$loginText' AND 	staff_password='$passwordText'");
    $num_staff = mysqli_num_rows($sql_staff); 
    $result_staff = mysqli_fetch_array($sql_staff);

    if($num_admin > 0){ 
        $_SESSION["adm_id"] = $result_admin["adm_id"];
        //$id = $_SESSION["adm_id"];
        $_SESSION["status"] = '1';
        $_SESSION["position"] = '0';
        echo "location = 'main.php';"; 
    }else if($num_staff > 0 && $num_admin < 1){
        $_SESSION["staff_id"] = $result_staff["staff_id"];
        //$id = $_SESSION["adm_id"];
        $_SESSION["status"] = '2';
        $_SESSION["position"] = $result_staff["sposition"];
        echo "location = 'main.php';";
    }else{
        echo "document.getElementById('loginStatus').innerHTML = '<font color=\"red\">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</font>'";
    }
?>
