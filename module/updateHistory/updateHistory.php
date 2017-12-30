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

<section class="content-header">
      <h1>
        ประวัติอัพเดทระบบ
        <small>อัพเดท</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> ประวัติการอัพเดทระบบ</a></li>
      </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                  วันที่อัพเดท 14/07/2560
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ol>
                                    1.ปรับปรุงเมนู <b>นักเรียน</b>
                                    <ul><i class="fa fa-check"></i> 1.1 เพิ่มลิงค์เพื่อเข้าถึงประวัติส่วนตัวของนักเรียนสำหรับเมนูรายชื่อนักเรียนในส่วนของแอดมินและครูประจำชั้น</ul>
                                    <ul><i class="fa fa-check"></i> 1.2 แก้ไขข้อผิดพลาดจำนวนนักเรียนอนุบาลและประถมล่าสุด</ul>
                                    <ul> <i class="fa fa-check"></i> 1.3 แก้ไขข้อผิดพลาดการเพิ่มนักเรียนในห้องเรียนสำหรับเมนู ย้ายห้อง/เลื่อนชั้น</ul>
                                    2.ปรับปรุงเมนู <b>บุคลากร</b>
                                    <ul><i class="fa fa-check"></i> 2.1 แก้ไขรูปแบบการแสดงวันที่จาก ปี-เดือน-วัน เป็น วัน-เดือน-ปี</ul>
                                </ol>
                            </div>
                        </div>
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  วันที่อัพเดท 21/06/2560
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                <ol>
                                    1.ปรับปรุงเมนู <b>นักเรียน</b>
                                    <ul>1.1 เพิ่มลิงค์เพื่อเข้าถึงประวัติส่วนตัวของนักเรียนสำหรับเมนูรายชื่อนักเรียนในส่วนของแอดมินและครูประจำชั้น
                                        <ul><i class="fa fa-check"></i> รับเข้าเรียน แสดงชั้นปัจจุบันของนักเรียน</ul>
                                        <ul><i class="fa fa-check"></i> รายชื่อนักเรียน สามารถพิมพ์นายชื่อนักเรียนตามห้องได้ , สามารถส่งออกรายชื่อนักเรียนเป็นไฟล์ Exell ได้</ul>
                                        <ul><i class="fa fa-check"></i> ย้ายห้อง/เลื่อนชั้น สามารถค้นหาเเละเพิ่มนักเรียนเป็นรายคนได้</ul>
                                        <ul><i class="fa fa-check"></i> ย้ายโรงเรียน</ul>
                                    </ul>
                                    <ul>1.1 สั่งพิมพ์
                                        <ul><i class="fa fa-check"></i> แสดงและสั่งพิมพ์ประวัตินักเรียน</ul>
                                    </ul>
                                    2.ปรับปรุงเมนู <b>บุคลากร</b>
                                    <ul>1.1 แสดงและสั่งพิมพ์ประวัติบุลากร
                                        <ul><i class="fa fa-check"></i> แสดงและสั่งพิมพ์ประวัติบุลากร</ul>
                                    </ul>
                                    <ul>1.2 ค้นหารายชื่อบุคลากรตามตำแหน่งงาน
                                        <ul><i class="fa fa-check"></i> ค้นหารายชื่อบุคลากรตามตำแหน่งงาน</ul>
                                        <ul><i class="fa fa-check"></i> พิมพ์รายชื่อบุคลากรที่เลือกตามตำแหน่งงาน</ul>
                                    </ul>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <!-- /.box -->
        </div>
<!-- /.col -->
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

