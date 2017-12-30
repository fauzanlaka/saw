<?php
    include '../../function/global.php';
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
        <li><a href="#"> <b>แก้ไขห้อง</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <h4>แก้ไขห้อง</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=room"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    
                    <form name="roomAdd" id="roomAdd">
                        
                        <fieldset>
                            <legend>ข้อมูลห้อง</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">ชื่อห้อง</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="ชื่อห้อง">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">รหัสห้อง</label>
                                    <input type="text" class="form-control" id="room_code" name="room_code" placeholder="รหัสห้อง">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">หมายเลขห้อง</label>
                                    <input type="text" class="form-control" id="room_number" name="room_number" placeholder="หมายเลขห้อง">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">อาคารที่ตั้ง</label>
                                    <select class="form-control" name="building_id" id="building_id">
                                        <?php
                                            $building = queryListInner("building", "", "building_id", "../../connect/connect.php");
                                                while($building_result = mysqli_fetch_array($building)){
                                                    $building_id = $building_result['building_id'];
                                                    $building_name = str_replace("\'", "&#39;", $building_result["building_name"]);
                                        ?>    
                                        <option value="<?= $building_id ?>"><?= $building_name ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">สถานะ</label>
                                    <select class="form-control" name="room_status" id="room_status">
                                        <option value="1">พร้อมใช้งาน</option>
                                        <option value="2">ปิดปรับปรุง</option>
                                    </select>
                                </div>
                            </div>
                            
                        </fieldset>
                        
                    </form>
                    <br>
                    <div align="center">
                        <a class="btn btn-success" onclick="room_Add('module/room/action/roomAdd.php', 'roomAdd')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>

                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>