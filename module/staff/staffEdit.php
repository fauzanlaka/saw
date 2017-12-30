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
?>

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
                    <form role="form" name="staffEdit" id="staffEdit">
                        <fieldset>

                            <legend>ข้อมูลส่วนตัว</legend>
                                <!-------------row1-------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">คำนำหน้าชื่อ</label>
                                            <select class="form-control" id="sgender" name="sgender" >
                                                <option value="" disabled selected style="display: none;">เลือกคำนำหน้า</option>
                                                <option value="1" <?php if($sgender=='1'){echo 'selected';} ?>>นาย</option>
                                                <option value="2" <?php if($sgender=='2'){echo 'selected';} ?>>นาง</option>
                                                <option value="3" <?php if($sgender=='3'){echo 'selected';} ?>>นางสาว</option>
                                            </select>
                                          </div>
                                    </div>
                           
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ชื่อ</label>
                                            <input type="text" class="form-control" id="staff_name" name="staff_name" value="<?= $staff_name ?>">
                                          </div>
                                    </div>
                              

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">นามสกุล</label>
                                            <input type="text" class="form-control" id="staff_surename" name="staff_surename" value="<?= $staff_surename ?>">
                                          </div>
                                    </div>  
                                <!-------------endrow1-------------->

                                <!-------------row2---------------->
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">เลขบัตรประจำตัวประชาชน</label>
                                            <input type="text" class="form-control" id="staff_idcard" name="staff_idcard" value="<?= $staff_idcard ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วัน เดือน ปี เกิด</label>
                                            <input type="date" class="form-control" class="form-control" id="staff_birth" name="staff_birth" value="<?= $staff_birth ?>">
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
                                            <input type="text" class="form-control" id="sedu_certif" name="sedu_certif" value="<?= $sedu_certif ?>">
                                          </div>
                                    </div> 


                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ปีที่จบ</label>
                                            <input type="date" class="form-control" class="form-control" id="sedu_grduated" name="sedu_grduated" value="<?= $sedu_grduated ?>">
                                          </div>
                                    </div> 


                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วิชาเอก</label>
                                            <input type="text" class="form-control" id="sedu_major" name="sedu_major" value="<?= $sedu_major ?>">
                                          </div>
                                    </div> 

                          

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">วิชาโท</label>
                                            <input type="text" class="form-control" id="sedu_minor" name="sedu_minor" value="<?= $sedu_minor ?>">
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
                                            <input type="date" class="form-control" id="swoking_stated" name="swoking_stated" value="<?= $swoking_stated ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ตำแหน่งงาน</label>
                                            <select class="form-control" id="sposition" name="sposition">
                                                <option value="" disabled selected style="display: none;">เลือกตำแหน่ง</option>
                                                <option value="4" <?php if($sposition=='4'){echo 'selected';} ?>>ผู้รับใบอนุญาต</option>
                                                <option value="5" <?php if($sposition=='5'){echo 'selected';} ?>>ผู้อำนวยการ</option>
                                                <option value="1" <?php if($sposition=='1'){echo 'selected';} ?>>ครู</option>
                                                <option value="2" <?php if($sposition=='2'){echo 'selected';} ?>>เจ้าหน้าที่ทั่วไป</option>
                                                <option value="3" <?php if($sposition=='3'){echo 'selected';} ?>>ภารโรง</option>
                                                <option value="6" <?php if($sposition=='6'){echo 'selected';} ?>>แม่บ้าน</option>
                                            </select>
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สถานะการทำงาน</label>
                                            <select class="form-control" id="staff_status" name="staff_status" >
                                                <option value="" disabled selected style="display: none;">เลือกสถานะการทำงาน</option>
                                                <option value="1" <?php if($staff_status=='1'){echo 'selected';} ?>>บุคลากรใหม่</option>
                                                <option value="2" <?php if($staff_status=='2'){echo 'selected';} ?>>ทำงานอยุ๋</option>
                                                <option value="3" <?php if($staff_status=='3'){echo 'selected';} ?>>ย้าย / ออก</option>
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
                                            <input type="text" class="form-control" id="staff_home_no" name="staff_home_no" value="<?= $staff_home_no ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">หมู่ที่</label>
                                            <input type="text" class="form-control" id="staff_village_no" name="staff_village_no" value="<?= $staff_village_no ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ซอย</label>
                                            <input type="text" class="form-control" id="staff_soi_name" name="staff_soi_name" value="<?= $staff_soi_name ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ถนน</label>
                                            <input type="text" class="form-control" id="staff_road_name" name="staff_road_name" value="<?= $staff_road_name ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">ตำบล</label>
                                            <input type="text" class="form-control" id="staff_tambom" name="staff_tambom" value="<?= $staff_tambom ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">อำเภอ</label>
                                            <input type="text" class="form-control" id="staff_amphoe" name="staff_amphoe" value="<?= $staff_amphoe ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">จังวัด</label>
                                            <input type="text" class="form-control" id="staff_province" name="staff_province" value="<?= $staff_province ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="staff_postno" name="staff_postno" value="<?= $staff_postno ?>">
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
                                            <input type="text" class="form-control" id="staff_phoneno" name="staff_phoneno" value="<?= $staff_phoneno ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">E-mail</label>
                                            <input type="text" class="form-control" id="staff_email" name="staff_email" value="<?= $staff_email ?>">
                                          </div>
                                    </div> 

                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">Social media</label>
                                            <input type="text" class="form-control" id="staff_socialmedia" name="staff_socialmedia" value="<?= $staff_socialmedia ?>">
                                          </div>
                                    </div> 
                        </fieldset> 
                        <br>

                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                        <input type="hidden" name="staff_id" id="staff_id" value="<?= $staff_id ?>">
                    </form>

                    <div align="center">
                        <a class="btn btn-success" onclick="staff_edit('module/staff/action/staffEdit.php', 'staffEdit')"><i class="fa fa-angle-double-right"></i> ถัดไป</a>
                    </div>
                    <div align="center" id="process"></div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>
