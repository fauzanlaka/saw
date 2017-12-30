<?php
    include '../../../connect/connect.php';
    $staff_id = $_POST['staff_id'];
    
    $sql = mysqli_query($con, "SELECT * FROM staff WHERE staff_id='$staff_id'");
    $result = mysqli_fetch_array($sql);
    $staff_photo_value = $result['staff_photo'];
    $staff_doc_home_value = $result['staff_doc_home'];
    $staff_doc_idcard_value = $result['staff_doc_idcard'];
    $staff_doc_edu_background_value = $result['staff_doc_edu_background'];
    
    //รูปถ่าย
    if($_FILES['staff_photo']['tmp_name']==""){
        $staff_photoName = $staff_photo_value;
    }else{
        $tmp_staff_photo = $_FILES['staff_photo']['tmp_name'];
        $staff_photo = $_FILES['staff_photo']['name'];
        $staff_photoName = time()."$staff_id".$staff_photo;
    }
    
    //สำเนาทะเบียนบ้าน
    if($_FILES['staff_doc_home']['tmp_name']==""){
        $staff_doc_homeName = $staff_doc_home_value;
    }else{
        $tmp_staff_doc_home = $_FILES['staff_doc_home']['tmp_name'];
        $staff_doc_home = $_FILES['staff_doc_home']['name'];
        $staff_doc_homeName = time()."$staff_id".$staff_doc_home;
    }
    
    //สำเนาบัตรประชาชน
    if($_FILES['staff_doc_idcard']['tmp_name']==""){
        $staff_doc_idcardName = $staff_doc_idcard_value;
    }else{
        $tmp_staff_doc_idcard = $_FILES['staff_doc_idcard']['tmp_name'];
        $staff_doc_idcard = $_FILES['staff_doc_idcard']['name'];
        $staff_doc_idcardName = time()."$staff_id".$staff_doc_idcard;
    }
    
    //สำเนาวุฒิการศึกษา
    if($_FILES['staff_doc_edu_background']['tmp_name']==""){
        $std_doc_idcardName = $std_doc_idcard_value;
    }else{
        $tmp_staff_doc_edu_background = $_FILES['staff_doc_edu_background']['tmp_name'];
        $staff_doc_edu_background = $_FILES['staff_doc_edu_background']['name'];
        $staff_doc_edu_backgroundName = time()."$staff_id".$staff_doc_edu_background;
    }
    
    //ทำการอัพโหลดไฟล์
    //1.อัพโหลดไฟล์ รูปถ่าย
    move_uploaded_file($tmp_staff_photo, "../proofOfAplication/".$staff_photoName);
    //2.อัพโหลดไฟล์ สำเนาทะเบียนบ้าน
    move_uploaded_file($tmp_staff_doc_home, "../proofOfAplication/".$staff_doc_homeName);
    //3.อัพโหลดไฟล์ สำเนาบัตรประชาชน
    move_uploaded_file($tmp_staff_doc_idcard, "../proofOfAplication/".$staff_doc_idcardName);
    //4.อัพโหลดไฟล์ สำเนาวุฒิการศึกษา
    move_uploaded_file($tmp_staff_doc_edu_background, "../proofOfAplication/".$staff_doc_edu_backgroundName);
    
    //อัพเดทฐานข้อมูล
    $insert = mysqli_query($con, "UPDATE staff
                           SET staff_photo='$staff_photoName',
                           staff_doc_home='$staff_doc_homeName',
                           staff_doc_idcard='$staff_doc_idcardName',
                           staff_doc_edu_background='$staff_doc_edu_backgroundName'
                           WHERE staff_id='$staff_id'");
?>
<script>
    top.document.getElementById('successAlert').style.display = 'block';
    top.$('html, body').animate({scrollTop:0}, 'slow');
</script>

