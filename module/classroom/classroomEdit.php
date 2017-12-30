<?php
    include '../../function/global.php';
    $classroom_id = $_GET["id"];
    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", "../../connect/connect.php");
    $classroom_name = str_replace("\'", "&#39;", $classroom["classroom_name"]);
    $classroom_subname = str_replace("\'", "&#39;", $classroom["classroom_subname"]);
    $room_id = str_replace("\'", "&#39;", $classroom["room_id"]);
    $classroom_semeseter = str_replace("\'", "&#39;", $classroom["classroom_semester"]);
    $classroom_year = str_replace("\'", "&#39;", $classroom["classroom_year"]);
    $staff_id = str_replace("\'", "&#39;", $classroom["staff_id"]);
    
    //ห้องเรียน
    $room = dataGet("room", "WHERE room_id='$room_id'", '../../connect/connect.php');
    $room_name = str_replace("\'", "&#39;", $room["room_name"]);
    
    //ครูประจำชั้น
    $staff = dataGet("staff", "WHERE staff_id='$staff_id'", '../../connect/connect.php');
    $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
    $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
    //echo $classroom_id;
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
        จัดการห้องเรียน
        <small>ห้องเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> จัดการห้องเรียน</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <b>แก้ไขห้องเรียน</b></a></li>
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
                    
                    <form name="classroomEdit" id="classroomEdit">
                        
                        <fieldset>
                            <legend>รายละเอียดห้องเรียน</legend>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">ระดับชั้น</label>
                                    <select class="form-control" name="classroom_name" id="classroom_name">
                                        <option value="" disabled selected style="display: none;">เลือกระดับชั้น</option>
                                            <option value="1" <?php if($classroom_name=='1'){echo 'selected';} ?>>อนุบาล 1</option>
                                            <option value="2" <?php if($classroom_name=='2'){echo 'selected';} ?>>อนุบาล 2</option>
                                            <option value="31" <?php if($classroom_name=='31'){echo 'selected';} ?>>อนุบาล 3</option>
                                            <option value="3" <?php if($classroom_name=='3'){echo 'selected';} ?>>ป.1</option>
                                            <option value="4" <?php if($classroom_name=='4'){echo 'selected';} ?>>ป.2</option>
                                            <option value="5" <?php if($classroom_name=='5'){echo 'selected';} ?>>ป.3</option>
                                            <option value="6" <?php if($classroom_name=='6'){echo 'selected';} ?>>ป.4</option>
                                            <option value="7" <?php if($classroom_name=='7'){echo 'selected';} ?>>ป.5</option>
                                            <option value="8" <?php if($classroom_name=='8'){echo 'selected';} ?>>ป.6</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">ห้องที่</label>
                                    <input class="form-control" name="classroom_subname" id="classroom_subname" value="<?= $classroom_subname ?>">
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">เทอม</label>
                                    <select class="form-control" name="classroom_semester" id="classroom_semester">
                                        <option value="" disabled selected style="display: none;">เลือกเทอม</option>
                                        <option value="1" <?php if($classroom_semeseter=='1'){echo 'selected';} ?>>1</option>
                                        <option value="2" <?php if($classroom_semeseter=='2'){echo 'selected';} ?>>2</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentform">ปี</label>
                                    <select class="form-control" name="classroom_year" id="classroom_year">
                                        <option value="" disabled selected style="display: none;">เลือกปี</option>
                                        <?php for($cry=2540;$cry<=2590;$cry++){ ?>
                                        <option value="<?= $cry ?>" <?php if($classroom_year==$cry){echo 'selected';} ?>><?= $cry ?></option>
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
                                        <input type="text" class="form-control" name="room_id" id="room_id" onkeyup="classroomSelectSearch('classroomEdit')" onclick="classroomSelectSearchClick('classroomEdit')" value="<?= $room_name ?>">

                                    </div>
                                    <div id="listbox"></div>                           
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">ครูประจำชั้น</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control" name="staff_id" id="staff_id" onkeyup="teacherSelectSearch('classroomEdit')" onclick="teacherSelectSearchClick('classroomEdit')" value="<?= $staff_name ?> <?= $staff_surename ?>">

                                    </div>
                                    <div id="listboxTeacher"></div>                           
                                </div>
                            </div>
                            
                        </fieldset>
                        
                        <input type="hidden" name="classroom_id" id="classroom_id" value="<?= $classroom_id ?>">
                        <input type="hidden" name="room_id_value" id="room_id_value" value="<?= $room_id ?>">
                        <input type="hidden" name="staff_id_value" id="staff_id_value" value="<?= $staff_id ?>">
                        
                    </form>
                    <br>
                    <div align="center">
                        <a class="btn btn-success" onclick="classroom_edit('module/classroom/action/classroomEdit.php', 'classroomEdit')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>

                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>