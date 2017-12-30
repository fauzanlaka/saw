<?php
    if($_SESSION["status"]==1){
        $operator = $_SESSION['adm_id'];
?>
    
    <div class="col-xs-12">
        <div class="pull-right">
            <a href="?mod=student" class="btn btn-warning" ><i class="fa fa-arrow-left"></i> กลับ</a>
        </div>
    </div>
<br><br>
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> ขออภัย</h4>
                เมนูนี้ยังไม่พร้อมให้ใช้งาน <b>กรุณาติดต่อผู้พัฒนา</b>
        </div>
    </div>
<?php
    }else{
?>
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> ขออภัย</h4>
            ท่านไม่สามารถเข้าถึงข้อมูลส่วนนี้ได้
        </div>
    </div>
<?php } ?>
