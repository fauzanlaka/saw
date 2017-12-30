<?php
    $operator = $_GET['userid'];
?>
<section class="content-header">
      <h1>
        ผู้ใช้งานระบบ
        <small>ผู้ใช้งาน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ผู้ใช้งานระบบ</a></li>
        <li><a href="#"> <b>เพิ่มผู้ใช้ใหม่</b></a></li>
      </ol>
</section>

<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <h4><i class="fa fa-user-plus"></i> เพิ่มผู้ใช้ใหม่</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=user"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>
                </div>
                
                <div class="box-body">
                    <form role="form" name="userAdd" id="userAdd">
                        
                        <fieldset>

                            <legend>ข้อมูลส่วนตัว</legend>
                                    <!-------------row1-------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">คำนำหน้าชื่อ</label>
                                            <select class="form-control" id="agender_name" name="agender_name" >
                                                <option value="" disabled selected style="display: none;">เลือกคำนำหน้า</option>
                                                <option value="1">นาย</option>
                                                <option value="2">นาง</option>
                                                <option value="3">นางสาว</option>
                                            </select>
                                          </div>
                                    </div>
                           
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="studentform">ชื่อ</label>
                                            <input type="text" class="form-control" id="adm_firstname" name="adm_firstname" placeholder="กรอกชื่อ">
                                        </div>
                                    </div>
                              

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุล</label>
                                            <input type="text" class="form-control" id="adm_lastname" name="adm_lastname" placeholder="กรอกชื่อ">
                                          </div>
                                    </div>  
                                <!-------------endrow1-------------->

                                <!-------------row2---------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="adm_idcard" name="adm_idcard" placeholder="กรอกเลขบัตรประจำตัวประชาชน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วัน เดือน ปี เกิด</label>
                                            <input type="date" class="form-control" id="adm_birth_date" name="adm_birth_date">
                                          </div>
                                    </div> 
                                    
                                    <div class="col-md-4">
                                          <div class="form-group">
                                              <br><br><br>
                                          </div>
                                    </div>
                                <!-------------endrow2----------------> 
                                
                                <!-------------row3---------------->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div id="id_card_alert"></div>
                                        </div>
                                    </div> 
                                <!-------------endrow3---------------->
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>ข้อมูลที่อยู่</legend>
                                <!-------------row1-------------->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">บ้านเลขที่</label>
                                        <input type="text" class="form-control" name="admin_home_no" id="admin_home_no">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">หมู่ที่</label>
                                        <input type="text" class="form-control" name="admin_village_no" id="admin_village_no">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">ซอย</label>
                                        <input type="text" class="form-control" name="admin_soi_name" id="admin_soi_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">ถนน</label>
                                        <input type="text" class="form-control" name="admin_road_name" id="admin_road_name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">ตำบล</label>
                                        <input type="text" class="form-control" name="admin_tambom" id="admin_tambom">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">อำเภอ</label>
                                        <input type="text" class="form-control" name="admin_amphoe" id="admin_amphoe">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">จังหวัด</label>
                                        <input type="text" class="form-control" name="admin_province" id="admin_province">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">รหัสไปรษณี</label>
                                        <input type="text" class="form-control" name="admin_postno" id="admin_postno">
                                    </div>
                                </div>
                        </fieldset>
                        <br>
                        <fieldset>
                            <legend>ข้อมูลติดต่อ</legend>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">เบอร์โทรศัพท์</label>
                                        <input type="text" class="form-control" name="admin_phoneno" id="admin_phoneno">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studentform">Email</label>
                                        <input type="text" class="form-control" name="admin_email" id="admin_email">
                                    </div>
                                </div>
                        </fieldset>
                        
                        <br>
                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                    </form>
                    
                    <div align="center">
                        <a class="btn btn-success" onclick="user_add('module/user/action/userAdd.php', 'userAdd')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>
                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>