<?php
    //ตรวจสอบสิทธิเข้าใช้
    if($_SESSION["status"]==1){
        $operator = $_SESSION['adm_id'];
    
    //admin data
    $query = queryList("admin", "","");
    $adm_id = $result['adm_id'];
    $status = $result['adm_status'];
?>
<section class="content-header">
      <h1>
        ผู้ใช้งานระบบ
        <small>ผู้ใช้งาน</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ผู้ใช้งานระบบ</a></li>
      </ol>
</section>
<br>
<div id="successAlert" style="display: none">
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
            <a onclick="alertClose()" class="close">&times;</a>
            <h4><i class="icon fa fa-check"></i> ลบข้อมูลเรียบร้อยเเล้ว</h4>
        </div>
    </div>
</div>
<div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <button class="btn btn-success" onclick="formLoad('module/user/userAdd.php', '', '<?= $adm_id ?>')"><i class="fa fa-user-plus"></i> เพื่ม</button>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped table-hover table-responsive"">
                    <thead>
                        <tr>
                            <td align="center"><b>ชื่อ นามสกุล</b></td>
                            <td align="center"><b>เลขประจำตัวประชาชน</b></td>
                            <td align="center"><b>เบอร์โทรศัพท์</b></td>
                            <td align="center"><b>Email</b></td>
                            <td align="center"><b>อายุ</b></td>
                            <td align="center"><b>แก้ไข / ลบ</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query1 = queryList("admin", "WHERE adm_id!='$adm_id'", "adm_id");
                            while($result = mysqli_fetch_array($query1)){  
                                $adm_id = $result['adm_id'];
                                $adm_firstname = str_replace("\'", "&#39;", $result['adm_firstname']);
                                $adm_lastname = str_replace("\'", "&#39;", $result['adm_lastname']);
                                $adm_idcard = str_replace("\'", "&#39;", $result['adm_idcard']);
                                $admin_phoneno = str_replace("\'", "&#39;", $result['admin_phoneno']);
                                $adm_birth_date = str_replace("\'", "&#39;", $result['adm_birth_date']);
                                $age = (date('Y-m-d')+543) - $adm_birth_date;
                                $admin_email = str_replace("\'", "&#39;", $result['admin_email']);
                        ?>
                        <tr id="">
                            <td align="left"><?= $adm_firstname ?> <?= $adm_lastname ?></td>
                            <td align="center"><?= $adm_idcard ?></td>
                            <td align="center"><?= $admin_phoneno ?></td>
                            <td align="center"><?= $admin_email ?></td>
                            <td align="center"><?= $age ?></td>
                            <td align="center">
                                <button type="button" onclick="formLoad('module/user/userEdit.php', '<?= $adm_id ?>', '<?= $operator ?>')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> แก้ไข</button>
                                &nbsp;&nbsp;
                                <button type="button" onclick="formLoad('module/user/userProfile.php', '<?= $adm_id ?>', '<?= $operator ?>')" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> แสดง</button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    
                </table>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
<!-- /.col -->
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


