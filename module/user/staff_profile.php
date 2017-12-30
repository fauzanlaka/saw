<?php
    $staff_id = $_GET['userid'];
    include '../../function/global.php';
    $result = dataGet("staff", "WHERE staff_id='$staff_id'", "../../connect/connect.php");
    $staff_name = str_replace("\'", "&#39;", $result["staff_name"]);
    $staff_surename = str_replace("\'", "&#39;", $result["staff_surename"]);
    $staff_photo = str_replace("\'", "&#39;", $result["staff_photo"]);
    $staff_email = str_replace("\'", "&#39;", $result["staff_email"]);
    $staff_socialmedia = str_replace("\'", "&#39;", $result["staff_socialmedia"]);
    $sgender = str_replace("\'", "&#39;", $result["sgender"]);
    $staff_birth = str_replace("\'", "&#39;", $result["staff_birth"]);
    $staff_idcard = str_replace("\'", "&#39;", $result["staff_idcard"]);
    $staff_phoneno = str_replace("\'", "&#39;", $result["staff_phoneno"]);
    $staff_home_no = str_replace("\'", "&#39;", $result["staff_home_no"]);
    $staff_village_no = str_replace("\'", "&#39;", $result["staff_village_no"]);
    $staff_soi_name = str_replace("\'", "&#39;", $result["staff_soi_name"]);
    $staff_road_name = str_replace("\'", "&#39;", $result["staff_road_name"]);
    $staff_tambom = str_replace("\'", "&#39;", $result["staff_tambom"]);
    $staff_amphoe = str_replace("\'", "&#39;", $result["staff_amphoe"]);
    $staff_province = str_replace("\'", "&#39;", $result["staff_province"]);
    $staff_postno = str_replace("\'", "&#39;", $result["staff_postno"]);
    $staff_username = str_replace("\'", "&#39;", $result["staff_username"]);
    $staff_password = str_replace("\'", "&#39;", $result["staff_password"]);
    $sposition = str_replace("\'", "&#39;", $result["sposition"]);
?>

<section class="content-header" id="successAlert" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
                <a onclick="alertClose()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> แก้ไขข้อมูลเรียบร้อยเเล้ว</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header">
      <h1>
        โปรไฟล์
        <small>ผู้ใช้งาน</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> <b>แก้ไขโปรไฟล์</b></a></li>
      </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
                <?php
                    if($staff_photo==""){
                ?>
                <div align="center">
                    <img src="pictures/userpic.svg" class="user-image" alt="User Image" width="190" height="200px">
                </div>
                <?php
                    }else{
                ?>
                <div align="center">
                    <img src="module/staff/proofOfAplication/<?= $staff_photo ?>" class="img-thumbnail text-center" alt="Cinque Terre" width="220" height="336px">
                </div>
                <?php
                    }
                ?>
                <h3 class="profile-username text-center"><?= strtoupper($staff_name) ?> <?= strtoupper($staff_surename) ?></h3>

              <p class="text-muted text-center">
                <?php
                    $text = positionText($sposition);
                    echo $text;
                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Username</b> <a class="pull-right"><?= $staff_username ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?= $staff_email ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>เปลี่ยนรูป</b> 
                            <form name="profileImage" id="profileImage" method="post" target="ifrm" enctype="multipart/form-data" action="module/user/action/profileImage_staff.php">
                                <input type="file" name="profileImage" id="profileImage" required="">
                                <input type="hidden" id="staff_id" name="staff_id" value="<?= $staff_id ?>">
                                <br>
                                <button class="btn btn-success btn-block" type="submit"><b>บันทึก</b></button>
                            </form>
                            <iframe name="ifrm" style="display:none;"></iframe>
                    </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#profile" data-toggle="tab">โปรไฟล์</a></li>
                    <li><a href="#log" data-toggle="tab">บันทึกการใช้งาน</a></li>
                </ul>
                <div class="tab-content">
                
                <div class="active tab-pane" id="profile">

                <!-- form start -->
                <form class="form-horizontal" id="profileEdit" name="profileEdit">
                        
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ชื่อ - นามสกุล :</label>

                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_name" name="staff_name" value="<?= $staff_name ?>">
                                </div>
        
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_surename" name="staff_surename" value="<?= $staff_surename ?>">
                                </div>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">วัน เดือน ปีเกิด :</label>
                                
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="staff_birth" name="staff_birth" value="<?= $staff_birth ?>">
                                </div>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">เพศ :</label>
                                
                                <div class="col-sm-5">
                                    <input type="radio" name="sgender" id="sgender" value="1" <?php if($sgender==1){echo 'checked';} ?>>&nbsp;ชาย &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="sgender" id="sgender" value="2" <?php if($sgender==2){echo 'checked';} ?>> &nbsp;หญิง
                                </div>                             
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">เลขประจำตัวประชาชน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_idcard" name="staff_idcard" maxlength="13 " value="<?= $staff_idcard ?>">
                                </div>
                                
                                <div id="id_card_alert"></div>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">เบอร์โทรศัพท์ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_phoneno" name="staff_phoneno" value="<?= $staff_phoneno ?>">
                                </div>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">email :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_email" name="staff_email" value="<?= $staff_email ?>">
                                </div>                               
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">social media :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_socialmedia" name="staff_socialmedia" value="<?= $staff_socialmedia ?>">
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">บ้านเลขที่ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_home_no" name="staff_home_no" value="<?= $staff_home_no ?>">
                                </div>                               
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">หมู่ที่ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_village_no" name="staff_village_no" value="<?= $staff_village_no ?>">
                                </div>                               
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ถนน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_road_name" name="staff_road_name" value="<?= $staff_road_name ?>">
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ซอย :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_soi_name" name="staff_soi_name" value="<?= $staff_soi_name ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ตำบล :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_tambom" name="staff_tambom" value="<?= $staff_tambom ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">อำเภอ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_amphoe" name="staff_amphoe" value="<?= $staff_amphoe ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">จังหวัด :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_province" name="staff_province" value="<?= $staff_province ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">รหัสไปรษณีย์ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_postno" name="staff_postno" value="<?= $staff_postno ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ชื่อผู้ใช้งาน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="staff_username" name="staff_username" value="<?= $staff_username ?>" onkeyup="staffUsernameCheck('module/user/action/usernameCheck2.php', '<?= $staff_id ?>')">
                                </div>
                                <div class="col-sm-4">
                                    <div id="usernameCheckAlert"></div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">รหัสผ่าน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="staff_password" name="staff_password" value="<?= $staff_password ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">กรอกรหัสผ่านอีกครั้ง :</label>
                                
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" value="<?= $staff_password ?>">
                                </div>
                                <div class="col-sm-4">
                                    <div id="confirmPasswordAlert"></div>
                                </div>
                            </div>
                          
                        </div>
                        
                        <input type="hidden" name="staff_id" id="staff_id" value="<?= $staff_id ?>">
                    
                        <!-- /.box-footer -->
                        
                    </form>
                
                    <div class="box-footer text-center">
                        <a onclick="editStaffProfile('module/user/action/staff_profile.php', 'profileEdit')" class="btn btn-success">บันทึก</a>
                    </div>
                    <div id="process" align="center"></div>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="log">
                
              </div>
              <!-- /.tab-pane -->

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->  
</section>


