<?php
    //Authentication
    if($_SESSION['status']=='1' AND $_SESSION['position']=='0'){
        //ไอดีผู้ดำเนินการ
        //$operator = $_SESSION['adm_id'];
        //admin data
        $id = $_SESSION["adm_id"];
        $query = queryList("admin", "adm_id='$id'","adm_id");
        $status = $result['adm_status'];
        $operator = $id;
    }elseif($_SESSION['status']=='2' AND ($_SESSION['position']=='1')){
        $id = $_SESSION["staff_id"];
        $query = queryList("staff", "staff_id='$id'","");
        $operator = $id;
    }
    if(($_SESSION['status']=='1' AND $_SESSION['position']=='0') OR ($_SESSION['status']=='2' AND ($_SESSION['position']=='1') ) ){
?>
<section class="content-header">
      <h1>
        ห้องประจำชั้น
        <small>ประจำชั้น</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> รายการห้องประจำชั้น</a></li>
      </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
    <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
                
                <div class="box-header">
                    <button class="btn btn-success" onclick="openHide('filter')"><i class="fa fa-search"></i> เลือกห้องเรียน</button>
                </div>
                    
                    <div class="box-header" id="filter" style="display: none;">
                        
                            <form name="classroomSearch" id="classroomSearch">
                                
                                <div class="col-md-2"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
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
                                        <select class="form-control" name="classroom_semester" id="classroom_semester">
                                            <option value="" disabled selected style="display: none;">เทอม</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select class="form-control" name="classroom_year" id="classroom_year">
                                            <option value="" disabled selected style="display: none;">ปีการศึกษา</option>
                                            <?php
                                                for($cry=2540;$cry<=2590;$cry++){
                                            ?>
                                            <option value="<?= $cry ?>" <?php if($cry==date('Y')){echo 'selected';} ?>><?= $cry ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                                <div class="col-md-2">
                                    <a onclick="classroom_search('module/classTeacher/action/classroomSearch.php', 'classroomSearch')" class="btn btn-success" ><i class="fa fa-search"></i> ค้นหา</a>
                                </div>
                            </form>
                        
                    </div>
                
                    <div id="subcontent" align="left">
                        <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <td align='center'><b>ระดับชั้น</b></td>
                                            <td align='center'><b>ลำดับห้อง (ทับ)</b></td>
                                            <td align='center'><b>ครูประจำชั้น</b></td>
                                            <td align='center'><b>จำนวนนักเรียน</b></td>
                                            <td align='center'><b>เทอม / ปี</b></td>
                                            <td align='center'><b>รายชื่อนักเรียน</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $classroom = queryList('classroom', "WHERE staff_id='$id'", 'classroom_id');
                                            while($classroom_result = mysqli_fetch_array($classroom)){
                                                $classroom_id = str_replace("\'", "&#39;", $classroom_result["classroom_id"]);
                                                $classroom_name = str_replace("\'", "&#39;", $classroom_result["classroom_name"]);
                                                $classroom_subname = str_replace("\'", "&#39;", $classroom_result["classroom_subname"]);
                                                $staff_id = str_replace("\'", "&#39;", $classroom_result["staff_id"]);
                                                $classroom_semester = str_replace("\'", "&#39;", $classroom_result["classroom_semester"]);
                                                $classroom_year = str_replace("\'", "&#39;", $classroom_result["classroom_year"]);
                                                //จำนวนนักเรียน
                                                $totalStudent = rowCount("student_classroom", "WHERE classroom_id='$classroom_id'", "connect/connect.php");
                                                
                                                //ชั้นเรียน
                                                $className = className("$classroom_name");
                                                $staff = dataGet("staff", "WHERE staff_id='$staff_id'", $connect);
                                                $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
                                                $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
                                        ?>
                                        <tr id="r<?= $classroom_id ?>">
                                            <td align='center'><?= $className ?></td>
                                            <td align='center'><?= $classroom_subname ?></td>
                                            <td align='center'><?= $staff_name ?> <?= $staff_surename ?></td>
                                            <td align='center'><?= $totalStudent ?> คน</td>
                                            <td align='center'><?= $classroom_semester ?> / <?= $classroom_year ?></td>
                                            <td align='center'>
                                                <a href="#" onclick="formLoad('module/classTeacher/studentClassroom.php', '<?= $classroom_id ?>', '')" class="btn btn-success"><i class="fa fa-list"></i> ดูรายชื่อ</a>
                                                <a href="module/classroom/classStudentPrintExell.php?operator=<?= $operator ?>&classroom_id=<?= $classroom_id ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Exell export</a>
                                                <a href="module/classroom/classStudentPrint.php?operator=<?= $operator ?>&classroom_id=<?= $classroom_id ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> พิมพ์</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                    </div>
                
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
<!-- /.col -->
    </div>
</section>
<?php
    }else{
?>
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> ขออภัย</h4>
            ท่านไม่สามารถเข้าถึงข้อมูลส่วนนี้ได้
        </div>
    </div>
<?php
    }
?>