<?php
    $adm_id = $_GET['id'];
    
     include '../../function/global.php';
     $admin = dataGet("admin", "WHERE adm_id='$adm_id'", "../../connect/connect.php");
     $adm_profileImage = str_replace("\'", "&#39;", $admin["adm_profileImage"]); 
     $agender_name = str_replace("\'", "&#39;", $admin["agender_name"]); 
     $adm_firstname = str_replace("\'", "&#39;", $admin["adm_firstname"]); 
     $adm_lastname = str_replace("\'", "&#39;", $admin["adm_lastname"]); 
     $adm_birth_date = str_replace("\'", "&#39;", $admin["adm_birth_date"]);
    $adm_idcard = str_replace("\'", "&#39;", $admin["adm_idcard"]);
    $admin_phoneno = str_replace("\'", "&#39;", $admin["admin_phoneno"]);
    $admin_email = str_replace("\'", "&#39;", $admin["admin_email"]);
    $admin_home_no = str_replace("\'", "&#39;", $admin["admin_home_no"]);
    $admin_village_no = str_replace("\'", "&#39;", $admin["admin_village_no"]);
    $admin_soi_name = str_replace("\'", "&#39;", $admin["admin_soi_name"]);
    $admin_road_name = str_replace("\'", "&#39;", $admin["admin_road_name"]);
    $admin_tambom = str_replace("\'", "&#39;", $admin["admin_tambom"]);
    $admin_amphoe = str_replace("\'", "&#39;", $admin["admin_amphoe"]);
    $admin_province = str_replace("\'", "&#39;", $admin["admin_province"]);
    $admin_postno = str_replace("\'", "&#39;", $admin["admin_postno"]);
?>
<section class="content-header">
      <h1>
        ข้อมูลผู้ใช้งาน
        <small>นักเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลผู้ใช้งาน</a></li>
        <li><a href="#"> <b>ประวัติผู้ใช้งาน</b></a></li>
      </ol>
</section>

<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    <div class="pull-left">
                        <h3><i class="fa fa-edit"></i> ประวัติผู้ใช้งาน</h3>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="#" onclick="alert('ยังไม่พร้อมให้ใช้งาน !')"><i class="fa fa-print"></i> พิมพ์</a> 
                        <a class="btn btn-warning" href="?mod=user"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>
                </div>
                
                <div class="box-body">
                    
                    <div class="col-md-3">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">รูปโปรไฟล์</h3>
                            </div>
                            <div class="box-body">
                                <div align="center">
                                    <?php
                                        if($adm_profileImage==''){
                                    ?>
                                        <img src="pictures/userpic.svg" class="img-thumbnail text-center" alt="Cinque Terre" width="190" height="336px">
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
                                        <td><?php if($agender_name=='1'){echo 'นาย';}else if($agender_name=='2'){echo 'นาง';}else{echo 'นางสาว';} ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ชื่อ นามสกุล</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $adm_firstname ?> <?= $adm_lastname ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>เลขบัตรประจำตัวประชาชน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $adm_idcard ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>วัน เดือน ปี เกิด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $adm_birth_date ?></td>
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
                                        <td><?= $admin_home_no ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>หมู่ที่</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_village_no ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ซอย</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_soi_name ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ถนน</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_road_name ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>ตำบล</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_tambom ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>อำเภอ</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_amphoe ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>จังหวัด</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_province ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>รหัสไปษณี</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_postno ?></td>
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
                                <h3 class="box-title">ข้อมูลติดต่อ</h3>
                            </div>
                            <div class="box-body">
                                <table class="table">
                                    <tr>
                                        <td width='30%' align='right'><b>เบอร์โทรศัพท์</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_phoneno ?></td>
                                    </tr>
                                    <tr>
                                        <td width='30%' align='right'><b>Email</b></td>
                                        <td width='2%'> <b>:</b> </td>
                                        <td><?= $admin_email ?></td>
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

