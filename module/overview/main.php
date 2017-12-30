<?php
    $admin = rowCount("admin", "", $connect);
    $staff = rowCount("staff", "", $connect);
    $officer = $admin + $staff;
    
    $student = rowCount("student", "WHERE std_status='1' OR std_status='2'", $connect);
    $maleStudent = rowCount("student", "WHERE stdgender_name='1' AND (std_status='1' OR std_status='2')", $connect);
    $femaleStudent = rowCount("student", "WHERE stdgender_name='2' AND (std_status='1' OR std_status='2')", $connect);
?>
<!-- col-lg-3 col-xs-6 -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                          <h3><?= $staff; ?></h3>
                          <p>จำนวนบุคลากรทั้งหมด</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-user"></i>
                        </div>
                        <a href="#" class="small-box-footer">ดูรายละเอียดทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col-lg-3 col-xs-6 -->

                <!-- col-lg-3 col-xs-6 -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                          <h3><?= $student ?></h3>

                          <p>จำนวนนักเรียนปัจจุบัน</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa fa-list"></i>
                        </div>
                        <a href="#" class="small-box-footer">ดูรายละเอียดทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col-lg-3 col-xs-6 -->
                
                <!-- col-lg-3 col-xs-6 -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                          <h3><?= $maleStudent ?></h3>

                          <p>นักเรียนชายทั้งหมด</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-male"></i>
                        </div>
                        <a href="#" class="small-box-footer">ดูรายละเอียดทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col-lg-3 col-xs-6 -->
                
                <!-- col-lg-3 col-xs-6 -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                          <h3><?= $femaleStudent ?></h3>

                          <p>นักเรียนหญิงทั้งหมด</p>
                        </div>
                        <div class="icon">
                          <i class="fa fa-female"></i>
                        </div>
                        <a href="#" class="small-box-footer">ดูรายละเอียดทั้งหมด <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col-lg-3 col-xs-6 -->
                <div class="col-lg-12">
                    <fieldset>
                        <legend>ข่าวสาร</legend>
                        <p><a href="?mod=admission"># ระบบลงทะเบียนนักเรียนใหม่</a></p>
                        <br><br><br><br>
                    </fieldset>
                </div><!-- ./col-lg-3 col-xs-6 -->

