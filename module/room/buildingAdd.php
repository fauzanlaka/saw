<?php
    $operator = $_GET["userid"];
?>
<section class="content-header">
      <h1>
        อาคารสถานที่
        <small>อาคารสถานที่</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> รายการอาคารสถานที่</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> <b>เพิ่มอาคารใหม่</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <h4>เพิ่มอาคารใหม่</h4>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" href="?mod=room"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                    
                    <form name="buildingAdd" id="buildingAdd">
                        
                        <fieldset>
                            <legend>ข้อมูลอาคาร</legend>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">ชื่ออาคาร</label>
                                    <input type="text" class="form-control" id="building_name" name="building_name" placeholder="ชื่ออาคาร">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">รหัสอาคาร</label>
                                    <input type="text" class="form-control" id="building_code" name="building_code" placeholder="รหัสอาคาร">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="studentform">ผู้ดูเเลอาคาร</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                          <i class="fa fa-search"></i>
                                        </div>
                                        <input type="text" class="form-control" name="link_id" id="link_id" onkeyup="staffSelectSearch('buildingAdd')" onclick="staffSelectSearchClick('buildingAdd')">

                                    </div>
                                    <div id="listbox"></div>                           
                            </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">จำนวนชั้น</label>
                                    <input type="text" class="form-control" id="building_floor_number" name="building_floor_number" placeholder="จำนวนชั้น">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">จำนวนห้อง</label>
                                    <input type="text" class="form-control" id="building_room_number" name="building_room_number" placeholder="จำนวนห้อง">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentform">สีอาคาร</label>
                                    <input type="text" class="form-control" id="building_color" name="building_color" placeholder="สีอาคาร">
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4" id="building_room_number_alert">
                            </div>
                            <div class="col-md-4">
                            </div>
                        </fieldset>
                        
                        <input type="hidden" name="operator" id="operator" value="<?= $operator ?>">
                        <input type="hidden" name="staff_id" id="staff_id" value="">
                        
                    </form>
                    <br>
                    <div align="center">
                        <a class="btn btn-success" onclick="building_add('module/room/action/buildingAdd.php', 'buildingAdd')"><i class="fa fa-save"></i> บันทึก</a>
                    </div>

                    <div align="center" id="process"></div>
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>