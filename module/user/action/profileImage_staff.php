<?php
    include '../../../connect/connect.php';
    $staff_id = $_POST['staff_id'];
    $tmp_name = $_FILES['profileImage']['tmp_name'];
    $name = $_FILES['profileImage']['name'];
    move_uploaded_file($tmp_name, "../../staff/proofOfAplication/".time()."$staff_id".$name);
    $documentName = time()."$staff_id".$name;
    $insert = mysqli_query($con, "UPDATE staff SET staff_photo='$documentName' WHERE staff_id='$staff_id'");
?>
//แสดงข้อความที่เพจ upload.php ตามลักษณะการเชื่มโยงระหว่าเฟรมที่ได้กล่าวถึงไปแล้ว
<script>
    top.formLoad('module/user/staff_profile.php', '', '<?= $staff_id ?>');
</script>

