<?php
    include '../../function/global.php';
    include '../../connect/connect.php';
    $operator = $_GET["userid"];
    $classroom_id = $_GET['id'];
    
    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", '../../connect/connect.php');
    $classroom_name = $classroom['classroom_name'];
    $classroom_subname = $classroom['classroom_subname'];
    $staff_id = $classroom['staff_id'];
    $classroom_semester = $classroom['classroom_semester'];
    $classroom_year = $classroom['classroom_year'];
?>

<section class="content-header">
      <h1>
        ห้องประจำชั้น
        <small>ประจำชั้น</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> รายการห้องประจำชั้น</a></li>
        <li><a href="#"> <b>รายชื่อนักเรียน</b></a></li>
      </ol>
</section>

<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <h4>นักเรียนทั้งหมด</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a href="module/classroom/classStudentPrintExell.php?operator=<?= $operator ?>&classroom_id=<?= $classroom_id ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Exell export</a>
                        <a href="module/classroom/classStudentPrint.php?operator=<?= $operator ?>&classroom_id=<?= $classroom_id ?>" target="_blank" class="btn btn-success"><i class="fa fa-print"></i> พิมพ์</a>
                        <a href="?mod=classTeacher" class="btn btn-warning"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    
                    <?php
                        $className = className($classroom_name);
                        $staff = dataGet("staff", "WHERE staff_id='$staff_id'", '../../connect/connect.php');
                        $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
                        $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
                    ?>
                    <fieldset>
                        <legend>ข้อมูลห้อง</legend>
                        <h5>ระดับชั้น : <?= $className ?>/<?= $classroom_subname ?></h5>
                        <h5>ครูประจำชั้น : <?= $staff_name ?> <?= $staff_surename ?></h5>
                        <h5>เทอม/ปีการศึกษา : <?= $classroom_semester ?>/<?= $classroom_year ?></h5>
                        
                    </fieldset>
                    
                    <br>
                    
                    <fieldset>
                        <legend>รายชื่อนักเรียน</legend>
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <td align="center"><b>#</b></td>
                                    <td align="center"><b>รหัสประจำตัว</b></td>
                                    <td align="center"><b>ชื่อ นามสกุล</b></td>
                                    <td align="center"><b>เลขประจำตัวประชาชน</b></td>
                                    <td align="center"><b>เพศ</b></td>
                                    <td align="center"><b>อายุ</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $student = mysqli_query($con, "SELECT s.*,sc.* FROM student s INNER JOIN student_classroom sc ON s.std_idtbl=sc.std_idtbl WHERE sc.classroom_id='$classroom_id' ORDER BY std_id");
                                    while($studentResult = mysqli_fetch_array($student)){
                                        $std_idtbl = $studentResult['std_idtbl'];
                                        $stdroom_id = $studentResult['stdroom_id'];
                                        $std_name = str_replace("\'", "&#39;", $studentResult["std_name"]);
                                        $std_surename = str_replace("\'", "&#39;", $studentResult["std_surename"]);
                                        $stdid_card = str_replace("\'", "&#39;", $studentResult["stdid_card"]);
                                        $std_birth = str_replace("\'", "&#39;", $studentResult["std_birth"]);
                                        $stdgender_name = str_replace("\'", "&#39;", $studentResult["stdgender_name"]);
                                        $std_id = str_replace("\'", "&#39;", $studentResult["std_id"]);
                                        //เพศ
                                        if($stdgender_name=='1'){
                                            $gender = "ชาย";
                                        }else{
                                            $gender = "หญิง";
                                        }
                                        //อายุ
                                        $age = (date('Y-m-d')+543) - $std_birth;
                                ?>
                                <tr id="<?= $stdroom_id ?>">
                                    <td align="center"><?= $i ?></td>
                                    <td align="center"><a href="#" onclick="formLoad('module/classTeacher/studentProfileForClass.php', '<?= $std_idtbl ?>', '<?= $classroom_id ?>')"><?= $std_id ?></a></td>
                                    <td align="left"><?= $std_name ?> <?= $std_surename ?></td>
                                    <td align="center"><?= $stdid_card ?></td>
                                    <td align="center"><?= $gender ?></td>
                                    <td align="center"><?= $age ?></td>
                                </tr>
                                <?php
                                $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </fieldset>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>

