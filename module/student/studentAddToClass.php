<?php
    include '../../function/global.php';
    $operator = $_GET["userid"];
    $classroom_id = $_GET['id'];
    
    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", '../../connect/connect.php');
    $classroom_name = $classroom['classroom_name'];
    $classroom_subname = $classroom['classroom_subname'];
    $staff_id = $classroom['staff_id'];
    $classroom_semester = $classroom['classroom_semester'];
    $classroom_year = $classroom['classroom_year'];
?>

<section class="content-header" id="successAlert" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
                <a onclick="alertClose()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> เพิ่มนักเรียนสำเร็จ</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header" id="successAlert2" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible">
                <a onclick="alertClose2()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> รายชื่อนักเรียนซำ้ กรุณาตรวจสอบ</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header">
      <h1>
        นักเรียน
        <small>นักเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักเรียน</a></li>
        <li><a href="#"> ย้ายห้อง/เลื่อนชั้น</a></li>
        <li><a href="#"> <b>เพิ่ม/ลบนักเรียน</b></a></li>
      </ol>
</section>

<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    
                    <div class="pull-left">
                        <h4>เพิ่มนักเรียน</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=movingRoom"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    <a onclick="formLoad('module/student/classStudent.php', '<?= $classroom_id ?>', '<?= $operator ?>')" class="btn btn-success"><i class="fa fa-list-alt"></i> นักเรียนทั้งหมด</a>
                    <a class="btn btn-success" onclick="openFilter('1')"><i class="fa fa-search"></i> เลือกรายคน</a>
                    <a class="btn btn-success" onclick="openFilter('2')"><i class="fa fa-search"></i> เลือกตามห้อง</a>
                    <br><br>
                    <?php
                        $className = className($classroom_name);
                        $staff = dataGet("staff", "WHERE staff_id='$staff_id'", '../../connect/connect.php');
                        $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
                        $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
                        
                        //จำนวนนักเรียนในห้อง
                        $totalStudent = rowCount("student_classroom", "WHERE classroom_id='$classroom_id'", '../../connect/connect.php');
                    ?>
                    <fieldset>
                        <legend>ข้อมูลห้อง</legend>
                        <h5>ระดับชั้น : <?= $className ?>/<?= $classroom_subname ?></h5>
                        <h5>ครูประจำชั้น : <?= $staff_name ?> <?= $staff_surename ?></h5>
                        <h5>เทอม/ปีการศึกษา : <?= $classroom_semester ?>/<?= $classroom_year ?></h5>
                        <h5 id="studentNumber">จำนวนนักเรียน : <?= $totalStudent ?></h5>
                    </fieldset>
                    
                    <br>
                    
                    <div id="filter1" style="display: none">
                        <fieldset>
                            <legend>เพิ่มนักเรียนตามห้อง</legend>
                            <form name="studentSearch" id="studentSearch">
                                <div class="col-md-2" id="spaceCol" style="display: block;"></div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="student_type" id="student_type" onchange="studentTypeSelection()">
                                            <option value="" disabled selected style="display: none;">เลือกประเภท</option>
                                            <option value="1">นักเรียนใหม่</option>
                                            <option value="2">นักเรียนปัจจุบัน</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" name="classroom_name" id="classroom_name">
                                            <option value="" disabled selected style="display: none;">เลือกระดับชั้นเดิม</option>
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

                                <div class="col-md-2" id="classroom_subname" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="classroom_subname" id="classroom_subname" placeholder="ทับ" value="">
                                    </div>
                                </div>

                                <input type="hidden" name="classroom_id" id="classroom_id" value="<?= $classroom_id ?>">
                                <input type="hidden" name="classroom_name_for_add" id="classroom_name_for_add" value="<?= $classroom_name ?>">
                                <div class="col-md-2">
                                    <a onclick="student_search('module/student/action/studentSearch.php', 'studentSearch')" class="btn btn-success" ><i class="fa fa-search"></i> ค้นหา</a>
                                </div>
                            </form>

                            <div class="col-md-12">
                                <div id="subcontent" align="center"></div>
                                <div align="center" id="process"></div>
                            </div>

                        </fieldset>
                    </div>
                    
                    <div id="filter2" style="display: none">
                        <fieldset>
                            <legend>เพิ่มนักเรียนรายบุคคล</legend>
                                <form name="studentSearchByOnce" id="studentSearchByOnce">
                                    
                                    <div class="col-md-4"></div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="std_idtbl" id="std_idtbl" placeholder="ชื่อ หรือ หมายเลขประจำตัวประชาชน" onkeyup="studentSelectSearch('studentSearchByOnce')" onclick="studentSelectSearchClick('studentSearchByOnce')">
                                                <span class="input-group-btn">
                                                    <a class="btn btn-success" onclick="student_search_by_once('module/student/action/studentSearchByOnce.php', 'studentSearchByOnce')">
                                                        <span class="glyphicon glyphicon-search"></span> ค้นหา
                                                    </a>    
                                                </span>
                                            </div>
                                            <div id="listbox"></div>
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="std_idtbl_value" id="std_idtbl_value" value="">
                                    <input type="hidden" name="classroom_id" id="classroom_id" value="<?= $classroom_id ?>">
                                    <input type="hidden" name="classroom_name_for_add" id="classroom_name_for_add" value="<?= $classroom_name ?>">
                                
                                </form>
                            
                                <div class="col-md-12">
                                    <div id="subcontent2" align="center"></div>
                                    <div align="center" id="process"></div>
                                </div>
                        </fieldset>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>

