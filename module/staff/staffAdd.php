<?php
    $operator = $_GET["userid"];
?>

<div id="successAlert" style="display: none">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
            <a onclick="alertClose()" class="close">&times;</a>
            <h4><i class="icon fa fa-check"></i> ลบข้อมูลเรียบร้อยเเล้ว</h4>
        </div>
    </div>
</div>

<section class="content-header">
      <h1>
        ข้อมูลบุคลากร
        <small>บุคลากร</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลบุคลากร</a></li>
        <li><a href="#"> <b>เพิ่มบุคลากรใหม่</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <button class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>  1.ข้อมูลทั่วไป</button>
                        <button class="btn btn-danger"><i class="glyphicon glyphicon-open"></i>  2.เพิ่มหลักฐาน</button> 
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=staff"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    <form role="form" name="staffAdd" id="staffAdd">
                        <fieldset>

                            <legend>ข้อมูลส่วนตัว</legend>
                                <!-------------row1-------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">คำนำหน้าชื่อ</label>
                                            <select class="form-control" id="sgender" name="sgender" >
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
                                            <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="กรอกชื่อ">
                                          </div>
                                    </div>
                              

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุล</label>
                                            <input type="text" class="form-control" id="staff_surename" name="staff_surename" placeholder="กรอกชื่อ">
                                          </div>
                                    </div>  
                                <!-------------endrow1-------------->

                                <!-------------row2---------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="staff_idcard" name="staff_idcard" placeholder="กรอกเลขบัตรประจำตัวประชาชน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วัน เดือน ปี เกิด</label>
                                            <input type="date" class="form-control" class="form-control" id="staff_birth" name="staff_birth" placeholder="กรอกเลขบัตรประจำตัวประชาชน">
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
                            <legend>ข้อมูลวุฒิการศึกษา</legend>
                               
                                    <div class="col-md-8">
                                          <div class="form-group">
                                            <label for="studentform">วุฒิการศึกษาล่าสุด</label>
                                            <input type="text" class="form-control" id="sedu_certif" name="sedu_certif" placeholder="ระบุวุฒิการศึกษาล่าสุด">
                                          </div>
                                    </div> 


                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ปีที่จบ</label>
                                            <input type="date" class="form-control" class="form-control" id="sedu_grduated" name="sedu_grduated" placeholder="ระบุวันที่เข้าเรียน">
                                          </div>
                                    </div> 


                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วิชาเอก</label>
                                            <input type="text" class="form-control" id="sedu_major" name="sedu_major" placeholder="ระบุวิชาเอก">
                                          </div>
                                    </div> 

                          

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วิชาโท</label>
                                            <input type="text" class="form-control" id="sedu_minor" name="sedu_minor" placeholder="ระบุวิชาโท">
                                          </div>
                                    </div> 

                                  
                                 
                        </fieldset>
                        <br>

                        <!-- ข้้อมูลการทำงาน -->
                         <fieldset>      
                            <legend>ข้อมูลการทำงาน</legend> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วันที่เข้าทำงาน</label>
                                            <input type="date" class="form-control" class="form-control" id="swoking_stated" name="swoking_stated" placeholder="ระบุวันที่เริ่มทำงาน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ตำแหน่งงาน</label>
                                            <select class="form-control" id="sposition" name="sposition">
                                                <option value="" disabled selected style="display: none;">เลือกตำแหน่ง</option>
                                                <option value="4">ผู้รับใบอนุญาต</option>
                                                <option value="5">ผู้อำนวยการ</option>
                                                <option value="1">ครู</option>
                                                <option value="2">เจ้าหน้าที่ทั่วไป</option>
                                                <option value="3">ภารโรง</option>
                                                <option value="6">แม่บ้าน</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สถานะการทำงาน</label>
                                            <select class="form-control" id="staff_status" name="staff_status" >
                                                <option value="" disabled selected style="display: none;">เลือกสถานะการทำงาน</option>
                                                <option value="1">บุคลากรใหม่</option>
                                                <option value="2">ทำงานอยุ๋</option>
                                                <option value="3">ย้าย / ออก</option>
                                            </select>
                                          </div>
                                    </div> 
                        </fieldset> 
                        <br>
                       
                        <!-------------ข้อมูลที่อยู่-------------->
                        <fieldset>      
                            <legend>ที่อยู่บุคลากร</legend>      
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">บ้านเลขที่</label>
                                            <input type="text" class="form-control" id="staff_home_no" name="staff_home_no" placeholder="กรอกบ้านเลขที่">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">หมู่ที่</label>
                                            <input type="text" class="form-control" id="staff_village_no" name="staff_village_no" placeholder="กรอกหมู่">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ซอย</label>
                                            <input type="text" class="form-control" id="staff_soi_name" name="staff_soi_name" placeholder="กรอกซอย">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ถนน</label>
                                            <input type="text" class="form-control" id="staff_road_name" name="staff_road_name" placeholder="กรอกชื่อถนน">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ตำบล</label>
                                            <input type="text" class="form-control" id="staff_tambom" name="staff_tambom" placeholder="กรอกตำบล">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">อำเภอ</label>
                                            <input type="text" class="form-control" id="staff_amphoe" name="staff_amphoe" placeholder="ระบุอำเภอ">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">จังวัด</label>
                                            <input type="text" class="form-control" id="staff_province" name="staff_province" placeholder="กรอกจังหวัด">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="staff_postno" name="staff_postno" placeholder="กรอกรหัสไปรษณีย์">
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
                                            <input type="text" class="form-control" id="staff_phoneno" name="staff_phoneno" placeholder="กรอกหมายเลขโทรศัพท์">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">E-mail</label>
                                            <input type="text" class="form-control" id="staff_email" name="staff_email" placeholder="กรอกอีเมลล์">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">Social media</label>
                                            <input type="text" class="form-control" id="staff_socialmedia" name="staff_socialmedia" placeholder="กรอกอีเมลล์">
                                          </div>
                                    </div> 
                        </fieldset> 
                        <br>

                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                    </form>

                     <div align="center">
                        <a class="btn btn-success" onclick="staff_add('module/staff/action/staffAdd.php', 'staffAdd')"><i class="fa fa-save"></i> บันทึก</a>
                        </div>

                        <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>
