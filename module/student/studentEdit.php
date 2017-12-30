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
        ข้อมูลนักเรียน
        <small>นักเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักเรียน</a></li>
        <li><a href="#"> <b>แก้ไขข้อมูล</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="col-lg-3">
                        <div class="callout callout-success text-center">
                            <h4> 1. <i class="fa fa-edit"></i> ข้อมูลทั่วไป</h4>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="callout callout-danger text-center">
                            <h4> 2. <i class="fa fa-upload"></i> หลักฐาน</h4>
                        </div>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=admission"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>
                    <br><br><br><hr>
                </div>
                
                <div class="box-body">
                    <form role="form" name="studentAdd" id="studentAdd">
                        
                        <h3><i class="fa fa-edit"></i> 1.ข้อมูลทั่วไป</h3>
                        
                        <fieldset>

                            <legend>ข้อมูลส่วนตัว</legend>
                                <!-------------row1-------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">คำนำหน้าชื่อ</label>
                                            <select class="form-control" id="stdgender_name" name="stdgender_name" >
                                                <option value="" disabled selected style="display: none;">เลือกคำนำหน้า</option>
                                                <option value="1" <?php if($stdgender_name=='1'){echo 'selected';} ?>>เด็กชาย</option>
                                                <option value="2" <?php if($stdgender_name=='2'){echo 'selected';} ?>>เด็กหญิง</option>
                                            </select>
                                          </div>
                                    </div>
                           
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="studentform">ชื่อ</label>
                                            <input type="text" class="form-control" id="std_name" name="std_name" value="<?= $std_name ?>">
                                        </div>
                                    </div>
                              

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุล</label>
                                            <input type="text" class="form-control" id="std_surename" name="std_surename" value="<?= $std_surename ?>">
                                          </div>
                                    </div>  
                                <!-------------endrow1-------------->

                                <!-------------row2---------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="stdid_card" name="stdid_card" value="<?= $stdid_card ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วัน เดือน ปี เกิด</label>
                                            <input type="date" class="form-control" data-provide="datepicker" data-date-language="th-th" class="form-control" id="std_birth" name="std_birth" value="<?= $std_birth ?>">
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
                    
                     <!-------------รายละเอียดนักเรียน-------------->
                        <fieldset>    	
                            <legend>รายละเอียดนักเรียน</legend>
                               
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">รหัสนักเรียน</label>
                                            <input type="text" class="form-control" id="std_id" name="std_id" value="<?= $std_id ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ระดับชั้น ณ วันที่สมัคร</label>
                                            <select class="form-control" id="std_room_register" name="std_room_register" >
                                                <option value="" disabled selected style="display: none;">เลือกระดับชั้น</option>
                                                <option value="1" <?php if($std_room_register=='1'){echo 'selected';} ?>>อ.1</option>
                                                <option value="2" <?php if($std_room_register=='2'){echo 'selected';} ?>>อ.2</option>
                                                <option value="2" <?php if($std_room_register=='31'){echo 'selected';} ?>>อ.3</option>
                                                <option value="3" <?php if($std_room_register=='3'){echo 'selected';} ?>>ป.1</option>
                                                <option value="4" <?php if($std_room_register=='4'){echo 'selected';} ?>>ป.2</option>
                                                <option value="5" <?php if($std_room_register=='5'){echo 'selected';} ?>>ป.3</option>
                                                <option value="6" <?php if($std_room_register=='6'){echo 'selected';} ?>>ป.4</option>
                                                <option value="7" <?php if($std_room_register=='7'){echo 'selected';} ?>>ป.5</option>
                                                <option value="8" <?php if($std_room_register=='8'){echo 'selected';} ?>>ป.6</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วันที่เข้าเรียน</label>
                                            <input type="date" class="form-control" class="form-control" id="std_date_register" name="std_date_register" value="<?= $std_date_register ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สถานะของนักเรียน</label>
                                            <select class="form-control" id="std_status" name="std_status" >
                                                <option value="" disabled selected style="display: none;">เลือกสถานะของนักเรียน</option>
                                                <option value="1" <?php if($std_status=='1'){echo 'selected';} ?>>นักเรียนใหม่</option>
                                                <option value="2" <?php if($std_status=='2'){echo 'selected';} ?>>กำลังศึกษา</option>
                                                <option value="3" <?php if($std_status=='3'){echo 'selected';} ?>>สำเร็จการศึกษา</option>
                                                <option value="4" <?php if($std_status=='4'){echo 'selected';} ?>>ย้ายออก</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">โรงเรียนเดิม</label>
                                            <input type="text" class="form-control" id="std_oldschool" name="std_oldschool" value="<?= $std_oldschool ?>">
                                          </div>
                                    </div> 

                                  
                                 
                        </fieldset>
                        <br>
                       
                        <!-------------ข้อมูลที่อยู่-------------->
                        <fieldset>      
                            <legend>ที่อยู่นักเรียน</legend>      
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">บ้านเลขที่</label>
                                            <input type="text" class="form-control" id="std_home_no" name="std_home_no" value="<?= $std_home_no ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">หมู่ที่</label>
                                            <input type="text" class="form-control" id="std_village_no" name="std_village_no" value="<?= $std_village_no ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ซอย</label>
                                            <input type="text" class="form-control" id="std_soi_name" name="std_soi_name" value="<?= $std_soi_name ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ถนน</label>
                                            <input type="text" class="form-control" id="std_road_name" name="std_road_name" value="<?= $std_room_register ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ตำบล</label>
                                            <input type="text" class="form-control" id="std_tambom" name="std_tambom" value="<?= $std_tambom ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">อำเภอ</label>
                                            <input type="text" class="form-control" id="std_amphoe" name="std_amphoe" value="<?= $std_amphoe ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">จังวัด</label>
                                            <input type="text" class="form-control" id="std_province" name="std_province" value="<?= $std_province ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">รหหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="std_postno" name="std_postno" value="<?= $std_postno ?>">
                                          </div>
                                    </div> 
                        </fieldset>

                        <br>
                       
                        <!-------------ข้อมูลการติดต่อ-------------->
                        <fieldset>      
                            <legend>ข้อมูลการติดต่อ</legend> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" id="std_phoneno" name="std_phoneno" value="<?= $std_phoneno ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">E-mail</label>
                                            <input type="text" class="form-control" id="std_emil" name="std_emil" value="<?= $std_emil ?>">
                                          </div>
                                    </div> 
                        </fieldset> 
                        <br>

                        <!-------------ข้อมูลผู้ปกครอง-------------->
                        <fieldset>      
                            <legend>ข้อมูลผู้ปกครอง</legend> 
                                   

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">คำนำหน้า</label>
                                            <select class="form-control" id="pgender_name" name="pgender_name" >
                                                <option value="" disabled selected style="display: none;">เลือกคำนำหน้า</option>
                                                <option value="1" <?php if($pgender_name=='1'){echo 'selected';} ?>>นาย</option>
                                                <option value="2" <?php if($pgender_name=='2'){echo 'selected';} ?>>นาง</option>
                                                <option value="3" <?php if($pgender_name=='3'){echo 'selected';} ?>>นางสาว</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ชื่อผู้ปกครอง</label>
                                            <input type="text" class="form-control" id="parent_name" name="parent_name" value="<?= $parent_name ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุลผู้ปกครอง</label>
                                            <input type="text" class="form-control" id="parent_surename" name="parent_surename" value="<?= $parent_surename ?>">
                                          </div>
                                    </div> 

                                     <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="parent_idcard" name="parent_idcard" value="<?= $parent_idcard ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">อาชีพผู้ปกครอง</label>
                                            <input type="text" class="form-control" id="parent_job" name="parent_job" value="<?= $parent_job ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" id="parent_phoneno" name="parent_phoneno" value="<?= $parent_phoneno ?>">
                                          </div>
                                    </div> 
                        </fieldset>
                        <br>
                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                        <input type="hidden" name="std_idtbl" id="std_idtbl" value="<?= $std_idtbl ?>">
                    </form>
                    
                    <div align="center">
                        <a class="btn btn-success" onclick="student_edit('module/student/action/studentEdit.php', 'studentAdd')"><i class="fa fa-angle-double-right"></i> ถัดไป</a>
                    </div>
                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>
