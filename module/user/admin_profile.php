<?php
    $adm_id = $_GET['userid'];
    include '../../function/global.php';
    $result = dataGet("admin", "WHERE adm_id='$adm_id'", "../../connect/connect.php");
    $adm_firstname = str_replace("\'", "&#39;", $result["adm_firstname"]);
    $adm_lastname = str_replace("\'", "&#39;", $result["adm_lastname"]);
    $adm_profileImage = str_replace("\'", "&#39;", $result["adm_profileImage"]);
    $adm_username = str_replace("\'", "&#39;", $result["adm_username"]);
    $admin_email = str_replace("\'", "&#39;", $result["admin_email"]);
    $adm_status = $result["adm_status"];
    $agender_name = str_replace("\'", "&#39;", $result["agender_name"]);
    $adm_birth_date = str_replace("\'", "&#39;", $result["adm_birth_date"]);
    $adm_idcard = str_replace("\'", "&#39;", $result["adm_idcard"]);
    $admin_phoneno = str_replace("\'", "&#39;", $result["admin_phoneno"]);
    $admin_home_no = str_replace("\'", "&#39;", $result["admin_home_no"]);
    $admin_village_no = str_replace("\'", "&#39;", $result["admin_village_no"]);
    $admin_soi_name = str_replace("\'", "&#39;", $result["admin_soi_name"]);
    $admin_road_name = str_replace("\'", "&#39;", $result["admin_road_name"]);
    $admin_tambom = str_replace("\'", "&#39;", $result["admin_tambom"]);
    $admin_amphoe = str_replace("\'", "&#39;", $result["admin_amphoe"]);
    $admin_province = str_replace("\'", "&#39;", $result["admin_province"]);
    $admin_postno = str_replace("\'", "&#39;", $result["admin_postno"]);
    $adm_username = str_replace("\'", "&#39;", $result["adm_username"]);
    $adm_password = str_replace("\'", "&#39;", $result["adm_password"]);
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
                    if($adm_profileImage==""){
                ?>
                <div align="center">
                    <img src="pictures/userpic.svg" class="user-image" alt="User Image" width="190" height="200px">
                </div>
                <?php
                    }else{
                ?>
                <div align="center">
                    <img src="module/user/profileImage/<?= $adm_profileImage ?>" class="img-thumbnail text-center" alt="Cinque Terre" width="220" height="336px">
                </div>
                <?php
                    }
                ?>
                <h3 class="profile-username text-center"><?= strtoupper($adm_firstname) ?> <?= strtoupper($adm_lastname) ?></h3>

              <p class="text-muted text-center">
                <?php
                    $text = statusText($adm_status);
                    echo $text;
                ?>
              </p>

              <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Username</b> <a class="pull-right"><?= $adm_username ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a class="pull-right"><?= $admin_email ?></a>
                    </li>
                    <li class="list-group-item">
                        <b>เปลี่ยนรูป</b> 
                            <form name="profileImage" id="profileImage" method="post" target="ifrm" enctype="multipart/form-data" action="module/user/action/profileImage.php">
                                <input type="file" name="profileImage" id="profileImage" required="">
                                <input type="hidden" id="adm_id" name="adm_id" value="<?= $adm_id ?>">
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
                                    <input type="text" class="form-control" id="adm_firstname" name="adm_firstname" value="<?= $adm_firstname ?>">
                                </div>
        
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="adm_lastname" name="adm_lastname" value="<?= $adm_lastname ?>">
                                </div>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">วัน เดือน ปีเกิด :</label>
                                
                                <div class="col-sm-3">
                                    <input type="date" class="form-control" id="adm_birth_date" name="adm_birth_date" value="<?= $adm_birth_date ?>">
                                </div>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">เพศ :</label>
                                
                                <div class="col-sm-5">
                                    <input type="radio" name="agender_name" id="agender_name" value="1" <?php if($agender_name==1){echo 'checked';} ?>>&nbsp;ชาย &nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="agender_name" id="agender_name" value="2" <?php if($agender_name==2){echo 'checked';} ?>> &nbsp;หญิง
                                </div>                             
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">เลขประจำตัวประชาชน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="adm_idcard" name="adm_idcard" maxlength="13 " value="<?= $adm_idcard ?>">
                                </div>
                                
                                <div id="id_card_alert"></div>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">เบอร์โทรศัพท์ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_phoneno" name="admin_phoneno" value="<?= $admin_phoneno ?>">
                                </div>                              
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">email :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_email" name="admin_email" value="<?= $admin_email ?>">
                                </div>                               
                            </div>
                           
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">บ้านเลขที่ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_home_no" name="admin_home_no" value="<?= $admin_home_no ?>">
                                </div>                               
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">หมู่ที่ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_village_no" name="admin_village_no" value="<?= $admin_village_no ?>">
                                </div>                               
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ถนน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_road_name" name="admin_road_name" value="<?= $admin_road_name ?>">
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ซอย :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_soi_name" name="admin_soi_name" value="<?= $admin_soi_name ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ตำบล :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_tambom" name="admin_tambom" value="<?= $admin_tambom ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">อำเภอ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_amphoe" name="admin_amphoe" value="<?= $admin_amphoe ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">จังหวัด :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_province" name="admin_province" value="<?= $admin_province ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">รหัสไปรษณีย์ :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="admin_postno" name="admin_postno" value="<?= $admin_postno ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">ชื่อผู้ใช้งาน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="adm_username" name="adm_username" value="<?= $adm_username ?>" onkeyup="adminUsernameCheck('module/user/action/usernameCheck.php', '<?= $adm_id ?>')">
                                </div>
                                <div class="col-sm-4">
                                    <div id="usernameCheckAlert"></div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">รหัสผ่าน :</label>
                                
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="adm_password" name="adm_password" value="<?= $adm_password ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">กรอกรหัสผ่านอีกครั้ง :</label>
                                
                                <div class="col-sm-3">
                                    <input type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" value="<?= $adm_password ?>">
                                </div>
                                <div class="col-sm-4">
                                    <div id="confirmPasswordAlert"></div>
                                </div>
                            </div>
                          
                        </div>
                        
                        <input type="hidden" name="adm_id" id="adm_id" value="<?= $adm_id ?>">
                    
                        <!-- /.box-footer -->
                        
                    </form>
                
                    <div class="box-footer text-center">
                        <a onclick="editProfile('module/user/action/profile.php', 'profileEdit')" class="btn btn-success">บันทึก</a>
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


