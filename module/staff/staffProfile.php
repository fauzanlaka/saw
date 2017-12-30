<?php
    $operator = $_GET["userid"];
    $staff_id = $_GET['id'];
    
    include '../../function/global.php';
    $staff = dataGet("staff", "WHERE staff_id='$staff_id'", "../../connect/connect.php");
    $sgender = str_replace("\'", "&#39;", $staff["sgender"]);
    $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
    $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
    $staff_idcard = str_replace("\'", "&#39;", $staff["staff_idcard"]);
    $staff_birth = str_replace("\'", "&#39;", $staff["staff_birth"]);
    $sedu_certif = str_replace("\'", "&#39;", $staff["sedu_certif"]);
    $sedu_grduated = str_replace("\'", "&#39;", $staff["sedu_grduated"]);
    $sedu_major = str_replace("\'", "&#39;", $staff["sedu_major"]);
    $sedu_minor = str_replace("\'", "&#39;", $staff["sedu_minor"]);
    $swoking_stated = str_replace("\'", "&#39;", $staff["swoking_stated"]);
    $sdepartment = str_replace("\'", "&#39;", $staff["sdepartment"]);
    $sposition = str_replace("\'", "&#39;", $staff["sposition"]);
    $staff_status = str_replace("\'", "&#39;", $staff["staff_status"]);
    $staff_home_no = str_replace("\'", "&#39;", $staff["staff_home_no"]);
    $staff_village_no = str_replace("\'", "&#39;", $staff["staff_village_no"]);
    $staff_soi_name = str_replace("\'", "&#39;", $staff["staff_soi_name"]);
    $staff_road_name = str_replace("\'", "&#39;", $staff["staff_road_name"]);
    $staff_tambom = str_replace("\'", "&#39;", $staff["staff_tambom"]);
    $staff_amphoe = str_replace("\'", "&#39;", $staff["staff_amphoe"]);
    $staff_province = str_replace("\'", "&#39;", $staff["staff_province"]);
    $staff_postno = str_replace("\'", "&#39;", $staff["staff_postno"]);
    $staff_phoneno = str_replace("\'", "&#39;", $staff["staff_phoneno"]);
    $staff_email = str_replace("\'", "&#39;", $staff["staff_email"]);
    $staff_socialmedia = str_replace("\'", "&#39;", $staff["staff_socialmedia"]);
    $staff_doc_home = str_replace("\'", "&#39;", $staff["staff_doc_home"]);
    $staff_doc_idcard = str_replace("\'", "&#39;", $staff["staff_doc_idcard"]);
    $staff_doc_edu_background = str_replace("\'", "&#39;", $staff["staff_doc_edu_background"]);
    
    //รูปภาพ
    $staff_photo = str_replace("\'", "&#39;", $staff['staff_photo']);
    
    /*
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
     * 
     */
?>

<section class="content-header">
      <h1>
        ข้อมูลบุคลากร
        <small>บุคลากร</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลบุคลากร</a></li>
        <li><a href="#"> <b>ประวัติส่วนตัวบุคลากร</b></a></li>
      </ol>
</section>

<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    <div class="pull-left">
                        <h3><i class="fa fa-edit"></i> 1.ข้อมูลทั่วไป</h3>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="module/staff/staffProfilePrint.php?staff_id=<?= $staff_id ?>" target="_blnk"><i class="fa fa-print"></i> พิมพ์</a> 
                        <a class="btn btn-warning" href="?mod=staff"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>
                </div>
                
                <div class="box-body">
                    
                    <div class="col-md-3">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">รูป</h3>
                            </div>
                            <div class="box-body">
                                <div align="center">
                                    <?php
                                        if($staff_photo==''){
                                    ?>
                                        <img src="pictures/student.jpg" class="img-thumbnail text-center" alt="Cinque Terre" width="190" height="336px">
                                    <?php    
                                        }else{
                                    ?>
                                        <img src="module/staff/proofOfAplication/<?= $staff_photo ?>" class="img-thumbnail text-center" alt="Cinque Terre" width="190" height="336px">
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
                                        <td><?php if($sgender=='1'){echo 'นาย';}else if($sgender=='2'){echo 'นาง';}else{echo 'นางสาว';} ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ชื่อ นามสกุล</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_name ?> <?= $staff_surename ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>เลขบัตรประจำตัวประชาชน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_idcard ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>วัน เดือน ปี เกิด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td>
                                            <?php 
                                                if($staff_birth=="0000-00-00"){
                                                    echo "";
                                                }else{
                                                    $date = new DateTime($staff_birth);
                                                    echo $date->format('d-m-Y');
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-warning">
                                <h3 class="box-title">ข้อมูลวุฒิการศึกษา</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>วุฒิการศึกษาล่าสุด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $sedu_certif ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ปีที่จบ</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td>
                                            <?php 
                                                if($sedu_grduated=="0000-00-00"){
                                                    echo "";
                                                }else{
                                                    $date = new DateTime($sedu_grduated);
                                                    echo $date->format('d-m-Y');
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>วิชาเอก</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $sedu_major ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>วิชาโท</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $sedu_minor ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-warning">
                                <h3 class="box-title">ข้อมูลการทำงาน</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>วันที่เข้าทำงาน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td>
                                            <?php 
                                                if($swoking_stated=="0000-00-00"){
                                                    echo "";
                                                }else{
                                                    $date = new DateTime($swoking_stated);
                                                    echo $date->format('d-m-Y');
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ฝ่ายงาน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $sdepartment ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ตำแหน่งงาน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $sposition ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>สถานะการทำงาน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?php if($staff_status=='1'){echo 'บุคลากรใหม่';}else if($staff_status=='2'){echo 'ทำงานอยู่';}else{echo 'ย้าย / ออก';} ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-warning">
                                <h3 class="box-title">ข้อมูลที่อยู่</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>บ้านเลขที่</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_home_no ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>หมู่ที่</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_village_no ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ซอย</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_soi_name ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ถนน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_road_name ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ตำบล</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_tambom ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>อำเภอ</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_amphoe ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>จังวัด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_province ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>รหัสไปรษณีย์</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_postno ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                    </div>
                    <div class="col-md-9">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-warning">
                                <h3 class="box-title">ข้อมูลการติดต่อ</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>เบอร์โทรศัพท์</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_phoneno ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>E-mail</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_email ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ซอย</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $staff_socialmedia ?></td>
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
                                        <td width='30%' align='right'><b>สำเนาทะเบียนบ้าน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><a target="_blank" href="module/staff/proofOfAplication/<?= $staff_doc_home ?>"><?= $staff_doc_home ?></a></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>สำเนาบัตรประชาชน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><a target="_blank" href="module/staff/proofOfAplication/<?= $staff_doc_idcard ?>"><?= $staff_doc_idcard ?></a></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>สำเนาวุฒิการศึกษา </b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><a target="_blank" href="module/staff/proofOfAplication/<?= $staff_doc_edu_background ?>"><?= $staff_doc_edu_background ?></a></td>
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

