<?php
    $operator = $_GET["userid"];
?>

<section class="content-header" id="successAlert1" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible">
                <a onclick="alertClose1()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> ข้อมูลซำ้ โปรดตรวจสอบข้อมูล ระดับชั้น เทอมเเละปี</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header" id="successAlert2" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible">
                <a onclick="alertClose2()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> ข้อมูลซำ้ โปรดตรวจสอบครูประจำชั้น</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header">
      <h1>
        จัดการห้องเรียน
        <small>ห้องเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> จัดการห้องเรียน</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <b>เพิ่มห้องเรียน</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <h4>เพิ่มห้องเรียนใหม่</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=classroom"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    
                    <form name="classroomAdd" id="classroomAdd">
                        
                        <fieldset>
                            <legend>รายละเอียดห้องเรียน</legend>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">ระดับชั้น</label>
                                    <select class="form-control" name="classroom_name" id="classroom_name">
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
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">ห้องที่</label>
                                    <input class="form-control" name="classroom_subname" id="classroom_subname" placeholder="ระบุตัวเลข">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">เทอม</label>
                                    <select class="form-control" name="classroom_semester" id="classroom_semester">
                                        <option value="" disabled selected style="display: none;">เลือกเทอม</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">ปี</label>
                                    <select class="form-control" name="classroom_year" id="classroom_year">
                                        <option value="" disabled selected style="display: none;">เลือกปีการศึกษา</option>
                                        <?php for($cry=2540;$cry<=2590;$cry++){ ?>
                                        <option value="<?= $cry ?>" <?php if($cry==date('Y')+543){echo 'selected';} ?>><?= $cry ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">ห้องเรียน</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control" name="room_id" id="room_id" onkeyup="classroomSelectSearch('classroomAdd')" onclick="classroomSelectSearchClick('classroomAdd')">

                                    </div>
                                    <div id="listbox"></div>                           
                                </div>
                            </div>
                          
                            <div class="col-md-4">
                                
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">ครูประจำชั้น</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control" name="staff_id" id="staff_id" onkeyup="teacherSelectSearch('classroomAdd')" onclick="teacherSelectSearchClick('classroomAdd')">

                                    </div>
                                    <div id="listboxTeacher"></div>                           
                                </div>
                            </div>
                            
                            
                        </fieldset>
                        
                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                        <input type="hidden" name="room_id_value" id="room_id_value" value="">
                        <input type="hidden" name="staff_id_value" id="staff_id_value" value="">
                        
                    </form>
                    <br>
                    <div align="center">
                        <a class="btn btn-success" onclick="classroom_add('module/classroom/action/classroomAdd.php', 'classroomAdd')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>

                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>