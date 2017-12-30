<?php
    //$operator = $_GET["userid"];
    include '../../function/global.php';
    $building_id = $_GET['id'];
    $building = dataGet("building", "WHERE building_id='$building_id'", '../../connect/connect.php');
    $building_name = str_replace("\'", "&#39;", $building["building_name"]);
    $building_code = str_replace("\'", "&#39;", $building["building_code"]);
    $building_staff = str_replace("\'", "&#39;", $building["staff_id"]);
    $building_floor_number = str_replace("\'", "&#39;", $building["building_floor_number"]);
    $building_room_number = str_replace("\'", "&#39;", $building["building_room_number"]);
    $building_color = str_replace("\'", "&#39;", $building["building_color"]);
    $building_status = str_replace("\'", "&#39;", $building["building_status"]);
    
    //ข้อมูลผู้ดูแลอาคาร
    $staff = dataGet("staff", "WHERE staff_id='$building_staff'", '../../connect/connect.php');
    $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
    $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
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
        อาคารสถานที่
        <small>อาคารสถานที่</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> รายการอาคารสถานที่</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <b>แก้ไขอาคาร</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <h4>แก้ไขอาคาร</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=room"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    
                    <form name="buildingEdit" id="buildingEdit">
                        
                        <fieldset>
                            <legend>ข้อมูลอาคาร</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">ชื่ออาคาร</label>
                                    <input type="text" class="form-control" id="building_name" name="building_name" value="<?= $building_name ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">รหัสอาคาร</label>
                                    <input type="text" class="form-control" id="building_code" name="building_code" placeholder="กรอกชื่อ">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="studentform">ผู้ดูเเลอาคาร</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control" name="link_id" id="link_id" onkeyup="staffSelectSearch('buildingEdit')" onclick="staffSelectSearchClick('buildingEdit')" value="<?= $staff_name ?> <?= $staff_name ?>">

                                    </div>
                                    <div id="listbox"></div>                           
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">จำนวนชั้น</label>
                                    <input type="text" class="form-control" id="building_floor_number" name="building_floor_number" value="<?= $building_floor_number ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">จำนวนห้อง</label>
                                    <input type="text" class="form-control" id="building_room_number" name="building_room_number" value="<?= $building_room_number ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">สีอาคาร</label>
                                    <input type="text" class="form-control" id="building_color" name="building_color" value="<?= $building_color ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">สีอาคาร</label>
                                    <select class="form-control" name="building_status" id="building_status">
                                        <option value="1" <?php if($building_status=='1'){echo 'selected';} ?>>ใช้งาน</option>
                                        <option value="2" <?php if($building_status=='2'){echo 'selected';} ?>>ปิดปรับปรุง</option>
                                        <option value="3" <?php if($building_status=='3'){echo 'selected';} ?>>ทุบทิ้ง</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4" id="building_room_number_alert">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </fieldset>
                        
                        <input type="hidden" name="staff_id" id="staff_id" value="">
                        <input type="hidden" name="building_id" id="building_id" value="<?= $building_id ?>">
                        
                    </form>
                    <br>
                    <div align="center">
                        <a class="btn btn-success" onclick="building_Edit('module/room/action/buildingEdit.php', 'buildingEdit')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>

                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>

