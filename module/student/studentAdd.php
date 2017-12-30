<?php
    $operator = $_GET["userid"];
?>

<section class="content-header">
      <h1>
        ข้อมูลนักเรียน
        <small>นักเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักเรียน</a></li>
        <li><a href="#"> รายชื่อนักเรียนทั้งหมด</a></li>
        <li><a href="#"> <b>เพิ่มนักเรียนใหม่</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <a class="btn btn-success">
                        1. <i class="fa fa-edit"></i> ข้อมูลทั่วไป
                    </a>
                    <a class="btn btn-danger">
                        2. <i class="fa fa-upload"></i> หลักฐาน
                    </a>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=admission"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>
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
                                                <option value="1">เด็กชาย</option>
                                                <option value="2">เด็กหญิง</option>
                                            </select>
                                          </div>
                                    </div>
                           
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="studentform">ชื่อ</label>
                                            <input type="text" class="form-control" id="std_name" name="std_name" placeholder="กรอกชื่อ">
                                        </div>
                                    </div>
                              

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุล</label>
                                            <input type="text" class="form-control" id="std_surename" name="std_surename" placeholder="กรอกชื่อ">
                                          </div>
                                    </div>  
                                <!-------------endrow1-------------->

                                <!-------------row2---------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="stdid_card" name="stdid_card" placeholder="กรอกเลขบัตรประจำตัวประชาชน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วัน เดือน ปี เกิด</label>
                                            <input type="date" class="form-control" id="std_birth" name="std_birth">
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
                                            <input type="text" class="form-control" id="std_id" name="std_id" placeholder="กรอกรหัสนักเรียน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ระดับชั้น ณ วันที่สมัคร</label>
                                            <select class="form-control" id="std_room_register" name="std_room_register" >
                                                <option value="" disabled selected style="display: none;">เลือกระดับชั้น</option>
                                                <option value="1">อนุบาล 1</option>
                                                <option value="2">อนุบาล 2</option>
                                                <option value="31">อนุบาล 3</option>
                                                <option value="3">ป.1</option>
                                                <option value="4">ป.2</option>
                                                <option value="5">ป.3</option>
                                                <option value="6">ป.4</option>
                                                <option value="7">ป.5</option>
                                                <option value="8">ป.6</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วันที่เข้าเรียน</label>
                                            <input type="date" class="form-control" id="std_date_register" name="std_date_register" placeholder="ระบุวันที่เข้าเรียน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สถานะของนักเรียน</label>
                                            <select class="form-control" id="std_status" name="std_status" >
                                                <option value="" disabled selected style="display: none;">เลือกสถานะของนักเรียน</option>
                                                <option value="1">นักเรียนใหม่</option>
                                                <option value="2">กำลังศึกษา</option>
                                                <option value="3">สำเร็จการศึกษา</option>
                                                <option value="4">ย้ายออก</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">โรงเรียนเดิม</label>
                                            <input type="text" class="form-control" id="std_oldschool" name="std_oldschool" placeholder="ระบุโรงเรียนเดิม">
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
                                            <input type="text" class="form-control" id="std_home_no" name="std_home_no" placeholder="กรอกบ้านเลขที่">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">หมู่ที่</label>
                                            <input type="text" class="form-control" id="std_village_no" name="std_village_no" placeholder="กรอกหมู่">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ซอย</label>
                                            <input type="text" class="form-control" id="std_soi_name" name="std_soi_name" placeholder="กรอกซอย">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ถนน</label>
                                            <input type="text" class="form-control" id="std_road_name" name="std_road_name" placeholder="กรอกชื่อถนน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ตำบล</label>
                                            <input type="text" class="form-control" id="std_tambom" name="std_tambom" placeholder="กรอกตำบล">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">อำเภอ</label>
                                            <input type="text" class="form-control" id="std_amphoe" name="std_amphoe" placeholder="ระบุอำเภอ">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">จังวัด</label>
                                            <input type="text" class="form-control" id="std_province" name="std_province" placeholder="กรอกจังหวัด">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">รหหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="std_postno" name="std_postno" placeholder="กรอกรหัสไปรษณีย์">
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
                                            <input type="text" class="form-control" id="std_phoneno" name="std_phoneno" placeholder="กรอกหมายเลขโทรศัพท์">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">E-mail</label>
                                            <input type="text" class="form-control" id="std_emil" name="std_emil" placeholder="กรอกอีเมลล์">
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
                                                <option value="1">นาย</option>
                                                <option value="2">นาง</option>
                                                <option value="3">นางสาว</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ชื่อผู้ปกครอง</label>
                                            <input type="text" class="form-control" id="parent_name" name="parent_name" placeholder="กรอกชื่อผู้ปกครอง">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุลผู้ปกครอง</label>
                                            <input type="text" class="form-control" id="parent_surename" name="parent_surename" placeholder="กรอกนามสกุลผู้ปกครอง">
                                          </div>
                                    </div> 

                                     <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="parent_idcard" name="parent_idcard" placeholder="กรอกหมายเลขบัตรประชาชน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">อาชีพผู้ปกครอง</label>
                                            <input type="text" class="form-control" id="parent_job" name="parent_job" placeholder="กรอกอาชีพผู้ปกครอง">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" id="parent_phoneno" name="parent_phoneno" placeholder="กรอกหมายเลขโทรศัพท์">
                                          </div>
                                    </div> 
                        </fieldset>
                        <br>
                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                    </form>
                    
                    <div align="center">
                        <a class="btn btn-success" onclick="student_add('module/student/action/studentAdd.php', 'studentAdd')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>
                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>

