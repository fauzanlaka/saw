<?php
    include '../../../connect/connect.php';
    $adm_id = $_POST['adm_id'];
    $tmp_name = $_FILES['profileImage']['tmp_name'];
    $name = $_FILES['profileImage']['name'];
    move_uploaded_file($tmp_name, "../profileImage/".time()."$adm_id".$name);
    $documentName = time()."$adm_id".$name;
    $insert = mysqli_query($con, "UPDATE admin SET adm_profileImage='$documentName' WHERE adm_id='$adm_id'");
?>
//แสดงข้อความที่เพจ upload.php ตามลักษณะการเชื่มโยงระหว่าเฟรมที่ได้กล่าวถึงไปแล้ว
<script>
    top.formLoad('module/user/admin_profile.php', '', '<?= $adm_id ?>');
</script>

