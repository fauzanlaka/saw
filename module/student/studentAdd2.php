<?php
    include '../../function/global.php';
    $operator = $_GET["userid"];
    $std_idtbl = $_GET['id'];
    
    //ข้อมูลนักเรียน
    $student = dataGet("student", "WHERE std_idtbl='$std_idtbl'", "../../connect/connect.php");
    $std_name = str_replace("\'", "&#39;", $student["std_name"]);
    $std_surename = str_replace("\'", "&#39;", $student["std_surename"]);
    $stdid_card = str_replace("\'", "&#39;", $student["stdid_card"]);
    $std_photo = str_replace("\'", "&#39;", $student["std_photo"]);
    $std_doc_birth = str_replace("\'", "&#39;", $student["std_doc_birth"]);
    $std_doc_home = str_replace("\'", "&#39;", $student["std_doc_home"]);
    $std_doc_idcard = str_replace("\'", "&#39;", $student["std_doc_idcard"]);
?>

<section class="content-header" id="successAlert" style="display: none">
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
                <a onclick="alertClose()" class="close">&times;</a>
                <h4><i class="icon fa fa-check"></i> อัพโหลดไฟล์สำเร็จ กรุณาคลิกสิ้นสุด</h4>
            </div>
        </div>
    </div>
</section>

<section class="content-header">
      <h1>
        ข้อมูลนักเรียน
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลนักเรียน</a></li>
        <li><a href="#"> เพิ่มนักเรียนใหม่</a></li>
        <li><a href="#"> <b>อัพโหลดหลักฐาน</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="col-lg-3">
                        <div class="callout callout-success text-center">
                            <h4> 1. <i class="fa fa-edit"></i> ข้อมูลทั่วไป</h4>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="callout callout-success text-center">
                            <h4> 2. <i class="fa fa-upload"></i> หลักฐาน</h4>
                        </div>
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" onclick="formLoad('module/student/studentEdit.php', '<?= $std_idtbl ?>', '<?= $operator ?>')"><i class="fa fa-arrow-left"></i> กลับ</a> 
                    </div>

                </div>
                <div class="box-body">
                    
                    <h3><i class="fa fa-edit"></i> 2.หลักฐานการสมัคร</h3>
                    
                    <blockquote>
                        <p>เลขประจำตัวประชาชน : <?= $stdid_card ?></p>
                        <p>ชื่อ นามสกุล : <?= $std_name ?> <?= $std_surename ?></p>
                    </blockquote>
                    
                    <form name="proofOfApplication" id="proofOfApplication" method="post" target="ifrm" enctype="multipart/form-data" action="module/student/action/proofOfAplication.php">
                        
                        <fieldset>
                            <legend>อัพโหลดหลักฐานการสมัคร</legend>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">รูปถ่าย</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" name="std_photo" id="std_photo">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">สูติบัตร</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" name="std_doc_birth" id="std_doc_birth">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">ทะเบียนบ้าน</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" name="std_doc_home" id="std_doc_home">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">บัตรประชาชน</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" name="std_doc_idcard" id="std_doc_idcard">
                                        </div>
                                    </div>
                        </fieldset>
                        <input type="hidden" name="std_idtbl" id="std_idtbl" value="<?= $std_idtbl ?>">
                        <br>
                        <div align="center">
                            <a class="btn btn-warning" href="?mod=student"><i class="fa fa-check"></i> <b>สิ้นสุด</b></a>
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> <b>บันทึก</b></button>
                        </div>
                        
                    </form>
                    
                    <iframe name="ifrm" style="display:none;"></iframe>
                    <br>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>


