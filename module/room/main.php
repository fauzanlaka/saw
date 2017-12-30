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
    //นับจำนวนนักเรียนชาย
    $studentMaleCount = rowCount("student", "WHERE stdgender_name='1'", "connect/connect.php");
    $studentFemaleCount = rowCount("student", "WHERE stdgender_name='2'", "connect/connect.php");
    $studentFirstCount = rowCount("student", "WHERE std_room_register='1' OR std_room_register='2'", "connect/connect.php");
    $studentSecondCount = rowCount("student", "WHERE std_room_register BETWEEN '3' AND '8'", "connect/connect.php");
?>

<section class="content-header" id="successAlert" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible">
                <a onclick="alertClose()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> ลบข้อมูลเรียบร้อยเเล้ว</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header">
      <h1>
        อาคารสถานที่
        <small>อาคารสถานที่</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> รายการอาคารสถานที่</a></li>
      </ol>
</section>

<section class="content-header" id="successAlert" style="display: block">
    <div class="row">
        <div class="col-sm-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>1</h3>
                        <p>ห้องทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="fa fa-navicon"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>1</h3>
                        <p>ห้องเรียนอนุบาล</p>
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
                    <h3>1</h3>
                        <p>ห้องเรียนประถม</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>1</h3>
                        <p>ห้องอื่นๆ</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
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
                <div class="box-body">
                    <div class="box-header">
                        <button class="btn btn-success" onclick="formLoad('module/room/buildingAdd.php', '', '<?= $operator ?>')"><i class="fa fa-plus"></i> เพื่มอาคารใหม่</button>
                        <button class="btn btn-success" onclick="formLoad('module/room/roomAdd.php', '', '<?= $operator ?>')"><i class="fa fa-plus"></i> เพื่มห้องใหม่</button>
                    </div>
                    <div class="col-sm-6">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">อาคาร</h3>
                            </div>
                            <div class="box-body">
                                <div class="sawscroll">
                                    <table class="table table-bordered">
                                        <tr>
                                          <td style="width: 10px">#</td>
                                          <td align="center">ชื่ออาคาร</td>
                                          <td align="center">จำนวนห้อง</td>
                                          <td align="center">สถานะ</td>
                                          <td align="center">แก้ไข</td>
                                        </tr>
                                        <?php 
                                            $bi = 1;
                                            $building = queryList("building", "", "building_id");
                                            while($building_result = mysqli_fetch_array($building)){
                                                $building_id = $building_result['building_id'];
                                                $building_name = str_replace("\'", "&#39;", $building_result["building_name"]);
                                                $building_status = str_replace("\'", "&#39;", $building_result["building_status"]);
                                                $building_room_number = str_replace("\'", "&#39;", $building_result["building_room_number"]);
                                                
                                                //สถานะการใช้งานอาคาร
                                                if($building_status=='1'){
                                                    $building_status_text = '<span class="badge bg-green">ใช้งาน</span>';
                                                }else if($building_status=='2'){
                                                    $building_status_text = '<span class="badge bg-orange">ปิดปรับปรุง</span>';
                                                }else{
                                                    $building_status_text = '<span class="badge bg-red">ทุบทิ้ง</span>';
                                                }
                                        ?>
                                        <tr>
                                            <td><?= $bi ?></td>
                                            <td><?= $building_name ?></td>
                                            <td align="center"><?= $building_room_number ?></td>
                                            <td align="center"><?= $building_status_text ?></td>
                                            <td align="center"><a onclick="formLoad('module/room/buildingEdit.php', '<?= $building_id ?>', '')" class="badge bg-orange"><i class="fa fa-edit"></i> แก้ไข</a></td>
                                        </tr>
                                        <?php
                                            $bi++;
                                            }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box box-solid box-warning">
                            <div class="box-header box-solid box-primary">
                                <h3 class="box-title">ห้องเรียน</h3>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <td align='center'>รหัสห้อง</td>
                                            <td align='center'>ชื่อห้อง</td>
                                            <td align='center'>อาคาร</td>
                                            <td align='center'>แก้ไข ลบ</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $room = queryList('room', '', 'room_id');
                                            while($room_result = mysqli_fetch_array($room)){
                                                $room_id = str_replace("\'", "&#39;", $room_result["room_id"]);
                                                $room_name = str_replace("\'", "&#39;", $room_result["room_name"]);
                                                $room_code = str_replace("\'", "&#39;", $room_result["room_code"]);
                                                $building_id_room = str_replace("\'", "&#39;", $room_result["building_id"]);
                                                
                                                $building_data = dataGet("building", "WHERE building_id='$building_id_room'", $connect);
                                                $room_building_name = str_replace("\'", "&#39;", $building_data["building_name"]);
                                        ?>
                                        <tr id="r<?= $room_id ?>">
                                            <td align='center'><?= $room_code ?></td>
                                            <td align='center'><?= $room_name ?></td>
                                            <td align='center'><?= $room_building_name ?></td>
                                            <td align="center">
                                                <a onclick="formLoad('module/room/roomEdit.php', '<?= $room_id ?>', '')" class="badge bg-orange"><i class="fa fa-edit"></i> แก้ไข</a>&nbsp;
                                                <a onclick="dbRowDelete('module/room/action/roomDelete.php', '<?= $room_id ?>', '')" class="badge bg-red"><i class="fa fa-remove"></i> ลบ</a>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
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

