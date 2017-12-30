<?php
    include '../../../connect/connect.php';
    $std_idtbl = $_POST['std_idtbl'];
    $std_photo = $_POST['std_photo'];
    
    $sql = mysqli_query($con, "SELECT * FROM student WHERE std_idtbl='$std_idtbl'");
    $result = mysqli_fetch_array($sql);
    $std_photo_value = $result['std_photo'];
    $std_doc_birth_value = $result['std_doc_birth'];
    $std_doc_home_value = $result['std_doc_home'];
    $std_doc_idcard_value = $result['std_doc_idcard'];
    
    //รูปถ่าย
    if($_FILES['std_photo']['tmp_name']==""){
        $std_photoName = $std_photo_value;
    }else{
        $tmp_std_photo = $_FILES['std_photo']['tmp_name'];
        $std_photo = $_FILES['std_photo']['name'];
        $std_photoName = time()."$std_idtbl".$std_photo;
    }
    
    //สูติบัตร
    if($_FILES['std_doc_birth']['tmp_name']==""){
        $std_doc_birthName = $std_doc_birth_value;
    }else{
        $tmp_std_doc_birth = $_FILES['std_doc_birth']['tmp_name'];
        $std_doc_birth = $_FILES['std_doc_birth']['name'];
        $std_doc_birthName = time()."$std_idtbl".$std_doc_birth;
    }
    
    //ทะเบียนบ้าน
    if($_FILES['std_doc_home']['tmp_name']==""){
        $std_doc_homeName = $std_doc_home_value;
    }else{
        $tmp_std_doc_home = $_FILES['std_doc_home']['tmp_name'];
        $std_doc_home = $_FILES['std_doc_home']['name'];
        $std_doc_homeName = time()."$std_idtbl".$std_doc_home;
    }
    
    //บัตรประชาชน
    if($_FILES['std_doc_idcard']['tmp_name']==""){
        $std_doc_idcardName = $std_doc_idcard_value;
    }else{
        $tmp_std_doc_idcard = $_FILES['std_doc_idcard']['tmp_name'];
        $std_doc_idcard = $_FILES['std_doc_idcard']['name'];
        $std_doc_idcardName = time()."$std_idtbl".$std_doc_idcard;
    }
    
    //ทำการอัพโหลดไฟล์
    //1.อัพโหลดไฟล์ รูปถ่าย
    move_uploaded_file($tmp_std_photo, "../proofOfAplication/".$std_photoName);
    //2.อัพโหลดไฟล์ สูติบัตร
    move_uploaded_file($tmp_std_doc_birth, "../proofOfAplication/".$std_doc_birthName);
    //3.อัพโหลดไฟล์ ทะเบียนบ้าน
    move_uploaded_file($tmp_std_doc_home, "../proofOfAplication/".$std_doc_homeName);
    //4.อัพโหลดไฟล์ บัตรประชาชน
    move_uploaded_file($tmp_std_doc_idcard, "../proofOfAplication/".$std_doc_idcardName);
    
    //อัพเดทฐานข้อมูล
    $insert = mysqli_query($con, "UPDATE student
                           SET std_photo='$std_photoName',
                           std_doc_birth='$std_doc_birthName',
                           std_doc_home='$std_doc_homeName',
                           std_doc_idcard='$std_doc_idcardName'
                           WHERE std_idtbl='$std_idtbl'");
?>
//แสดงข้อความที่เพจ upload.php ตามลักษณะการเชื่มโยงระหว่าเฟรมที่ได้กล่าวถึงไปแล้ว
<script>
    top.document.getElementById('successAlert').style.display = 'block';
    top.$('html, body').animate({scrollTop:0}, 'slow');
</script>

