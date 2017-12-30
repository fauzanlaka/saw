<?php
    $operator = $_GET["userid"];
    $staff_id = $_GET['id'];
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
        ข้อมูลบุคลากร
        <small>บุคลากร</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลบุคลากร</a></li>
        <li><a href="#"> เพิ่มบุคลากรใหม่</a></li>
        <li><a href="#"> <b>อัพโหลดหลักฐาน</b></a></li>
      </ol>
</section>
<section class="content">
    
    <div class="row">
        
        <div class="col-xs-12">
            <div class="box box-primary">
                
                <div class="box-header">
                    
                    <div class="pull-left">
                        <button class="btn btn-success"><i class="glyphicon glyphicon-edit"></i>  1.ข้อมูลทั่วไป</button>
                        <button class="btn btn-success"><i class="glyphicon glyphicon-open"></i>  2.เพิ่มหลักฐาน</button> 
                    </div>
                    
                    <div class="pull-right">
                        <a class="btn btn-warning" onclick="formLoad('module/staff/staffEdit.php', '<?= $staff_id ?>', '<?= $operator ?>')"><i class="fa fa-arrow-left"></i> กลับ</a>
                    </div>
                    
                </div>
                
                <div class="box-body">
                
                    <h3><i class="fa fa-edit"></i> 2.อัพโหลดหลักฐาน</h3>
                
                    <form name="proofOfApplication" id="proofOfApplication" method="post" target="ifrm" enctype="multipart/form-data" action="module/staff/action/proofOfAplication.php">
                        <fieldset>

                            <legend>สำเนาหลักฐาน</legend>
                                <!-------------row1-------------->
                                    
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">รูปถ่าย</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" id="staff_photo" name="staff_photo">
                                          </div>
                                    </div>
                                
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สำเนาทะเบียนบ้าน</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" id="staff_doc_home" name="staff_doc_home">
                                          </div>
                                    </div>
                              
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สำเนาบัตรประชาชน</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" id="staff_doc_idcard" name="staff_doc_idcard">
                                          </div>
                                    </div>  
                                
                                    <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="studentform">สำเนาวุฒิการศึกษา</label> <i class="fa fa-photo"></i>
                                            <input type="file" class="form-control" id="staff_doc_edu_background" name="staff_doc_edu_background">
                                          </div>
                                    </div> 
                                <!-------------endrow1-------------->

                        </fieldset>
                        
                        <input type="hidden" name="staff_id" id="staff_id" value="<?= $staff_id ?>">
                        
                        <br>
                        <div align="center">
                            <a class="btn btn-warning" href="?mod=staff"><i class="fa fa-check"></i> <b>สิ้นสุด</b></a>
                            <button class="btn btn-success" type="submit"><i class="fa fa-save"></i> <b>บันทึก</b></button>
                        </div>
                        
                    </form>
                    
                    <iframe name="ifrm" style="display:none;"></iframe>
                    
                </div>
                
            </div>
        </div>
        
    </div>
    
</section>
