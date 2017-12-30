<?php
    $operator = $_GET["userid"];
    $std_idtbl = $_GET['id'];
    
    include '../../function/global.php';
    $student = dataGet("student", "WHERE std_idtbl='$std_idtbl'", "../../connect/connect.php");
    $stdgender_name = str_replace("\'", "&#39;", $student["stdgender_name"]);
    $std_name = str_replace("\'", "&#39;", $student["std_name"]);
    $std_surename = str_replace("\'", "&#39;", $student["std_surename"]);
    $stdid_card = str_replace("\'", "&#39;", $student["stdid_card"]);
    $std_birth = str_replace("\'", "&#39;", $student["std_birth"]);
    $std_id = str_replace("\'", "&#39;", $student["std_id"]);
    $std_room_register = str_replace("\'", "&#39;", $student["std_room_register"]);
    $std_date_register = str_replace("\'", "&#39;", $student["std_date_register"]);
    $std_status = str_replace("\'", "&#39;", $student["std_status"]);
    $std_oldschool = str_replace("\'", "&#39;", $student["std_oldschool"]);
    $std_home_no = str_replace("\'", "&#39;", $student["std_home_no"]);
    $std_village_no = str_replace("\'", "&#39;", $student["std_village_no"]);
    $std_soi_name = str_replace("\'", "&#39;", $student["std_soi_name"]);
    $std_road_name = str_replace("\'", "&#39;", $student["std_road_name"]);
    $std_tambom = str_replace("\'", "&#39;", $student["std_tambom"]);
    $std_amphoe = str_replace("\'", "&#39;", $student["std_amphoe"]);
    $std_province = str_replace("\'", "&#39;", $student["std_province"]);
    $std_postno = str_replace("\'", "&#39;", $student["std_postno"]);
    $std_phoneno = str_replace("\'", "&#39;", $student["std_phoneno"]);
    $std_emil = str_replace("\'", "&#39;", $student["std_emil"]);
    $pgender_name = str_replace("\'", "&#39;", $student["pgender_name"]);
    $parent_name = str_replace("\'", "&#39;", $student["parent_name"]);
    $parent_surename = str_replace("\'", "&#39;", $student["parent_surename"]);
    $parent_idcard = str_replace("\'", "&#39;", $student["parent_idcard"]);
    $parent_job = str_replace("\'", "&#39;", $student["parent_job"]);
    $parent_phoneno = str_replace("\'", "&#39;", $student["parent_phoneno"]);
    $std_photo = str_replace("\'", "&#39;", $student["std_photo"]);
    $std_type = str_replace("\'", "&#39;", $student["std_type"]);
    
    $std_doc_birth = str_replace("\'", "&#39;", $student["std_doc_birth"]);
    $std_doc_home = str_replace("\'", "&#39;", $student["std_doc_home"]);
    $std_doc_idcard = str_replace("\'", "&#39;", $student["std_doc_idcard"]);
    
    if($std_doc_birth==''){
        $doc_birth = "";
    }else{
        $doc_birth = "คลิกดูไฟล์";
    }
    
    if($std_doc_home==''){
        $doc_home = "";
    }else{
        $doc_home = "คลิกดูไฟล์";
    }
    
    if($std_doc_idcard==''){
        $doc_idcard = "";
    }else{
        $doc_idcard = "คลิกดูไฟล์";
    }
?>

<section class="content-header">
      <h1>
        ข้อมูลนักเรียน
        <small>นักเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักเรียน</a></li>
        <li><a href="#"> <b>เพิ่มนักเรียนใหม่</b></a></li>
      </ol>
</section>

<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    <div class="pull-left">
                        <h3><i class="fa fa-edit"></i> 1.ประวัตินักเรียน</h3>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="module/student/studentProfilePrint.php?std_idtbl=<?= $std_idtbl ?>" target="_blank"><i class="fa fa-print"></i> พิมพ์</a> 
                        <a class="btn btn-warning" href="?mod=admission"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>
                </div>
                
                <div class="box-body">
                    
                    <div class="col-md-3">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">รูปนักเรียน</h3>
                            </div>
                            <div class="box-body">
                                <div align="center">
                                    <?php
                                        if($std_photo==''){
                                    ?>
                                        <img src="pictures/student.jpg" class="img-thumbnail text-center" alt="Cinque Terre" width="190" height="336px">
                                    <?php    
                                        }else{
                                    ?>
                                        <img src="module/student/proofOfAplication/<?= $std_photo ?>" class="img-thumbnail text-center" alt="Cinque Terre" width="190" height="336px">
                                    <?php
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-warning">
                                <h3 class="box-title">ข้อมูลทั่วไป</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>คำนำหน้าชื่อ</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?php if($stdgender_name=='1'){echo 'เด็กชาย';}else{echo 'เด็กหญิง';} ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ชื่อ นามสกุล</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_name ?> <?= $std_surename ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>เลขบัตรประจำตัวประชาชน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $stdid_card ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>วัน เดือน ปี เกิด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_birth ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">รายละเอียดนักเรียน</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>รหัสนักเรียน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_id ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ระดับชั้น ณ วันที่สมัคร</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td>
                                            <?php if($std_room_register=='1'){echo 'อ.1';} ?>
                                            <?php if($std_room_register=='2'){echo 'อ.2';} ?>
                                            <?php if($std_room_register=='3'){echo 'ป.1';} ?>
                                            <?php if($std_room_register=='4'){echo 'ป.2';}?>
                                            <?php if($std_room_register=='5'){echo 'ป.3';} ?>
                                            <?php if($std_room_register=='6'){echo 'ป.4';} ?>
                                            <?php if($std_room_register=='7'){echo 'ป.5';} ?>
                                            <?php if($std_room_register=='8'){echo 'ป.6';} ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>วันที่เข้าเรียน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_date_register ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>สถานะของนักเรียน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td>
                                            <?php
                                                if($std_type==0){
                                                    echo "นักเรียนใหม่";
                                                }elseif($std_type==1){
                                                    echo "กำลังศึกษา";
                                                }elseif($std_type==2){
                                                    echo "จบการศึกษา";
                                                }else{
                                                    echo 'ออก/ย้าย';
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>โรงเรียนเดิม</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_oldschool ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">ที่อยู่นักเรียน</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>บ้านเลขที่</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_home_no ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>หมู่ที่</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_village_no ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ซอย</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_soi_name ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ถนน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_road_name ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ตำบล</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_tambom ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>อำเภอ</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_amphoe ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>จังวัด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_province ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>รหหัสไปรษณีย์</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_postno ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">ข้อมูลการติดต่อ</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>เบอร์โทรศัพท์</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_phoneno ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>E-mail</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $std_emil ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">ข้อมูลผู้ปกครอง</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>คำนำหน้า</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?php if($pgender_name=='1'){echo 'นาย';}else if($pgender_name=='2'){echo 'นาง';}else{echo 'นางสาว';} ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ชื่อ นามสกุลผู้ปกครอง</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $parent_name ?> <?= $parent_surename ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>เลขประจำตัวประชาชน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $parent_idcard ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>อาชีพผู้ปกครอง</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $parent_job ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>เบอร์โทรศัพท์</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $parent_phoneno ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">หลักฐานการสมัคร</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>สูติบัตร</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><a target="_blank" href="module/student/proofOfAplication/<?= $std_doc_birth ?>"><?= $doc_birth ?></a></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ทะเบียนบ้าน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><a target="_blank" href="module/student/proofOfAplication/<?= $std_doc_home ?>"><?= $doc_home ?></a></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>บัตรประชาชน </b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><a target="_blank" href="module/student/proofOfAplication/<?= $std_doc_idcard ?>"><?= $doc_idcard ?></a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>

