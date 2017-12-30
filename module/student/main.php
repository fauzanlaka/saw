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
    }elseif($_SESSION['status']=='2' AND ($_SESSION['position']=='4' OR $_SESSION['position']=='5')){
        $id = $_SESSION["staff_id"];
        $query = queryList("staff", "staff_id='$id'","");
        $operator = $id;
    }
    if(($_SESSION['status']=='1' AND $_SESSION['position']=='0') OR ($_SESSION['status']=='2' AND ($_SESSION['position']=='4' OR $_SESSION['position']=='5') ) ){
?>
<?php
    //นับจำนวนนักเรียน
    $studentMaleCount = rowCount("student", "WHERE stdgender_name='1' AND (std_status='1' OR std_status='2')", "connect/connect.php");
    $studentFemaleCount = rowCount("student", "WHERE stdgender_name='2' AND (std_status='1' OR std_status='2')", "connect/connect.php");
    //$studentFirstCount = rowCount("student", "WHERE std_room_register='1' OR std_room_register='2' AND (std_status='1' OR std_status='2')", "connect/connect.php");
    //$studentSecondCount = rowCount("student", "WHERE (std_room_register BETWEEN '3' AND '8') AND (std_status='1' OR std_status='2')", "connect/connect.php");

    $total_a = 0;
    $total_b = 0;
    $student = queryList("student","WHERE std_type='1'","std_idtbl");
    while($result = mysqli_fetch_array($student)){
        $std_idtbl = $result['std_idtbl'];
        //ระดับชั้นปัจจุบัน
        include 'connect/connect.php';
        $student_in_class = mysqli_query($con, "SELECT MAX(classroom_id) AS mxc FROM student_classroom WHERE std_idtbl='$std_idtbl'");
        $student_in_class_result = mysqli_fetch_array($student_in_class);
        $mxc = $student_in_class_result['mxc'];//classroom_id
        $classroom_name = mysqli_query($con, "SELECT classroom_name,classroom_subname FROM classroom WHERE classroom_id='$mxc'");
        $classroom_name_result = mysqli_fetch_array($classroom_name);
        $cln = $classroom_name_result['classroom_name'];
        $clsn = $classroom_name_result['classroom_subname'];
        if($cln==""){
            $currentClass = "";
        }else{
            $currentClass = $cln."/".$clsn;
        }
                                        
        //นับจำนวนนักเรียนแบ่งตามระดับชื้อ (อนุบาลและประถม)
        if($cln==1 OR $cln==2 OR $cln==31){
            $total_a = $total_a + 1;
        }elseif($cln>=3 AND $cln<=8){
            $total_b = $total_b + 1;
        }
    }
?>

<section class="content-header">
      <h1>
        นักเรียน
        <small>นักเรียน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักเรียน</a></li>
      </ol>
</section>

<section class="content-header" id="successAlert" style="display: block">
    <div class="row">
        <div class="col-sm-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $studentMaleCount ?></h3>
                        <p>จำนวนนักเรียนชายล่าสุด</p>
                </div>
                <div class="icon">
                    <i class="fa fa-male"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $studentFemaleCount ?></h3>
                        <p>จำนวนนักเรียนหญิงล่าสุด</p>
                </div>
                <div class="icon">
                    <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $total_a ?></h3>
                        <p>จำนวนนักเรียนอนุบาลล่าสุด</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?= $total_b ?></h3>
                        <p>จำนวนนักเรียนประถมล่าสุด</p>
                </div>
                <div class="icon">
                    <i class="fa fa-navicon"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a class="btn btn-app" href="?mod=admission">
                        <i class="fa fa-user-plus"></i> <b>รับเข้าเรียน</b>
                    </a>
                    <a class="btn btn-app" href="?mod=classroomList">
                        <i class="fa fa-list-ul"></i> <b>รายชื่อนักเรียน</b>
                    </a>
                    <a class="btn btn-app" href="?mod=movingRoom">
                        <i class="fa fa-list-alt"></i> <b>ย้ายห้อง/เลื่อนชั้น</b>
                    </a>
                    <a class="btn btn-app" href="?mod=student_blank_page">
                        <i class="fa fa-exchange"></i> <b>ย้ายโรงเรียน</b>
                    </a>
                    <a class="btn btn-app" href="?mod=student_blank_page">
                        <i class="fa  fa-graduation-cap"></i> <b>สำเร็จการศึกษา</b>
                    </a>
                </div>
                <hr>
                
                <!--
                <div class="box-header">
                    <h4>รายชื่อนักเรียนทั้งหมด</h4>
                </div>
                    
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-hover table-responsive"">
                            <thead>
                                <tr>
                                    <td align="center"><b>สถานะข้อมูล</b></td>
                                    <td align='center'><b>รหัสประจำตัว</b></td>
                                    <td align="center"><b>ชื่อ นามสกุล</b></td>
                                    <td align="center"><b>เลขประจำตัวประชาชน</b></td>
                                    <td align="center"><b>ระดับชั้น</b></td>
                                    <td align="center"><b>อายุ</b></td>
                                    <td align="center"><b>เพศ</b></td>
                                    <td align="center"><b>ผู้เพิ่ม</b></td>
                                    <td align="center"><b>แก้ไข / รายละเอีด</b></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    $student = queryList("student","","std_idtbl");
                                    while($result = mysqli_fetch_array($student)){
                                        $std_idtbl = $result['std_idtbl'];
                                        $std_name = str_replace("\'", "&#39;", $result['std_name']);
                                        $std_id = str_replace("\'", "&#39;", $result['std_id']);
                                        $std_surename = str_replace("\'", "&#39;", $result['std_surename']);
                                        $stdid_card = str_replace("\'", "&#39;", $result['stdid_card']);
                                        $std_birth = str_replace("\'", "&#39;", $result['std_birth']);
                                        $age = date("d/m/y") - $std_birth;
                                        $stdgender_name = str_replace("\'", "&#39;", $result['stdgender_name']);
                                        $recorder_id = $result['recorder_id'];
                                        $std_room_register = $result['std_current_classroom'];
                                        $std_date_register = str_replace("\'", "&#39;", $result["std_date_register"]);
                                        $std_status = str_replace("\'", "&#39;", $result["std_status"]);
                                        $std_oldschool = str_replace("\'", "&#39;", $result["std_oldschool"]);
                                        $std_home_no = str_replace("\'", "&#39;", $result["std_home_no"]);
                                        $std_village_no = str_replace("\'", "&#39;", $result["std_village_no"]);
                                        $std_soi_name = str_replace("\'", "&#39;", $result["std_soi_name"]);
                                        $std_road_name = str_replace("\'", "&#39;", $result["std_road_name"]);
                                        $std_tambom = str_replace("\'", "&#39;", $result["std_tambom"]);
                                        $std_amphoe = str_replace("\'", "&#39;", $result["std_amphoe"]);
                                        $std_province = str_replace("\'", "&#39;", $result["std_province"]);
                                        $std_postno = str_replace("\'", "&#39;", $result["std_postno"]);
                                        $std_phoneno = str_replace("\'", "&#39;", $result["std_phoneno"]);
                                        $std_emil = str_replace("\'", "&#39;", $result["std_emil"]);
                                        $pgender_name = str_replace("\'", "&#39;", $result["pgender_name"]);
                                        $parent_name = str_replace("\'", "&#39;", $result["parent_name"]);
                                        $parent_surename = str_replace("\'", "&#39;", $result["parent_surename"]);
                                        $parent_idcard = str_replace("\'", "&#39;", $result["parent_idcard"]);
                                        $parent_job = str_replace("\'", "&#39;", $result["parent_job"]);
                                        $parent_phoneno = str_replace("\'", "&#39;", $result["parent_phoneno"]);
                                        $std_photo = str_replace("\'", "&#39;", $result["std_photo"]);
                                        $std_doc_birth = str_replace("\'", "&#39;", $result["std_doc_birth"]);
                                        $std_doc_home = str_replace("\'", "&#39;", $result["std_doc_home"]);
                                        $std_doc_idcard = str_replace("\'", "&#39;", $result["std_doc_idcard"]);

                                        //ผู้เพิ่มข้อมูล
                                        $recorder = dataGet("admin", "WHERE adm_id='$recorder_id'", "connect/connect.php");
                                        $adm_firstname = str_replace("\'", "&#39;", $recorder['adm_firstname']);
                                        $adm_lastname = str_replace("\'", "&#39;", $recorder['adm_firstname']);

                                        //ตรวจสอบการกรอกข้อมูลว่าครบหรือไม่
                                        if($std_birth=='0000-00-00' OR $stdid_card=='' OR $std_oldschool=='' OR $std_home_no=='' OR $std_village_no=='' OR $std_soi_name=='' OR $std_road_name=='' OR $std_tambom=='' OR $std_amphoe=='' OR $std_province=='' OR $std_postno=='' OR $std_emil=='' OR $pgender_name=='' OR $parent_name=='' OR $parent_surename=='' OR $parent_idcard=='' OR $parent_job=='' OR $parent_phoneno=='' OR $std_photo=='' OR $std_doc_birth=='' OR $std_doc_home=='' OR $std_doc_idcard==''){
                                            $resultCheck = '1';
                                            $imgStatus = "<img src='pictures/uncomp.png' width='30px' height='30px'>";
                                        }else{
                                            $resultCheck = '2';
                                            $imgStatus = "<img src='pictures/complete_data.jpg' width='25px' height='25px'>";
                                        }
                                ?>
                                <tr id="<?= $std_idtbl ?>">
                                    <td align="center"><?= $imgStatus ?></td>
                                    <td align='center'><?= $std_id ?></td>
                                    <td align="left"><?= $std_name ?> <?= $std_surename ?></td>
                                    <td align="center"><?= $stdid_card ?></td>
                                    <td align="center">
                                        <?php if($std_room_register=='1'){echo 'อ.1';} ?>
                                        <?php if($std_room_register=='2'){echo 'อ.2';} ?>
                                        <?php if($std_room_register=='31'){echo 'อ.3';} ?>
                                        <?php if($std_room_register=='3'){echo 'ป.1';} ?>
                                        <?php if($std_room_register=='4'){echo 'ป.2';}?>
                                        <?php if($std_room_register=='5'){echo 'ป.3';} ?>
                                        <?php if($std_room_register=='6'){echo 'ป.4';} ?>
                                        <?php if($std_room_register=='7'){echo 'ป.5';} ?>
                                        <?php if($std_room_register=='8'){echo 'ป.6';} ?>
                                    </td>
                                    <td align="center"><?php if($std_birth=='0000-00-00'){echo '';}else{echo $age;} ?></td>
                                    <td align="center"><?php if($stdgender_name=='1'){echo 'ชาย';}else if($stdgender_name=='2'){echo 'หญิง';}else{echo '';} ?></td>
                                    <td align="left"><?= $adm_firstname ?></td>
                                    <td align="center">
                                        <button type="button" onclick="formLoad('module/student/studentEdit.php', '<?= $std_idtbl ?>', '<?= $operator ?>')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> แก้ไข</button>
                                        <button type="button" onclick="formLoad('module/student/studentProfile.php', '<?= $std_idtbl ?>', '<?= $operator ?>')" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> แสดง</button>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                    }
                                ?>
                            </tbody>

                        </table>
                    </div>
                -->    <!-- /.box-body -->
            </div>
                  <!-- /.box -->
        </div>
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

