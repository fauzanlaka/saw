<?php
    include '../../connect/connect.php';
    include '../../function/global.php';
    $staff_id = $_GET["staff_id"];
    
    $staff = dataGet("staff", "WHERE staff_id='$staff_id'", "../../connect/connect.php");
    $sgender = str_replace("\'", "&#39;", $staff["sgender"]);
    $staff_name = str_replace("\'", "&#39;", $staff["staff_name"]);
    $staff_surename = str_replace("\'", "&#39;", $staff["staff_surename"]);
    $staff_idcard = str_replace("\'", "&#39;", $staff["staff_idcard"]);
    $staff_birth = str_replace("\'", "&#39;", $staff["staff_birth"]);
    $sedu_certif = str_replace("\'", "&#39;", $staff["sedu_certif"]);
    $sedu_grduated = str_replace("\'", "&#39;", $staff["sedu_grduated"]);
    $sedu_major = str_replace("\'", "&#39;", $staff["sedu_major"]);
    $sedu_minor = str_replace("\'", "&#39;", $staff["sedu_minor"]);
    $swoking_stated = str_replace("\'", "&#39;", $staff["swoking_stated"]);
    $sdepartment = str_replace("\'", "&#39;", $staff["sdepartment"]);
    $sposition = str_replace("\'", "&#39;", $staff["sposition"]);
    $staff_status = str_replace("\'", "&#39;", $staff["staff_status"]);
    $staff_home_no = str_replace("\'", "&#39;", $staff["staff_home_no"]);
    $staff_village_no = str_replace("\'", "&#39;", $staff["staff_village_no"]);
    $staff_soi_name = str_replace("\'", "&#39;", $staff["staff_soi_name"]);
    $staff_road_name = str_replace("\'", "&#39;", $staff["staff_road_name"]);
    $staff_tambom = str_replace("\'", "&#39;", $staff["staff_tambom"]);
    $staff_amphoe = str_replace("\'", "&#39;", $staff["staff_amphoe"]);
    $staff_province = str_replace("\'", "&#39;", $staff["staff_province"]);
    $staff_postno = str_replace("\'", "&#39;", $staff["staff_postno"]);
    $staff_phoneno = str_replace("\'", "&#39;", $staff["staff_phoneno"]);
    $staff_email = str_replace("\'", "&#39;", $staff["staff_email"]);
    $staff_socialmedia = str_replace("\'", "&#39;", $staff["staff_socialmedia"]);
    $staff_doc_home = str_replace("\'", "&#39;", $staff["staff_doc_home"]);
    $staff_doc_idcard = str_replace("\'", "&#39;", $staff["staff_doc_idcard"]);
    $staff_doc_edu_background = str_replace("\'", "&#39;", $staff["staff_doc_edu_background"]);
    $staff_status = str_replace("\'", "&#39;", $staff["staff_status"]);
    $staff_home_no = str_replace("\'", "&#39;", $staff["staff_home_no"]);
    $staff_village_no = str_replace("\'", "&#39;", $staff["staff_village_no"]);
    $staff_soi_name = str_replace("\'", "&#39;", $staff["staff_soi_name"]);
    $staff_road_name = str_replace("\'", "&#39;", $staff["staff_road_name"]);
    $staff_tambom = str_replace("\'", "&#39;", $staff["staff_tambom"]);
    $staff_amphoe = str_replace("\'", "&#39;", $staff["staff_amphoe"]);
    $staff_province = str_replace("\'", "&#39;", $staff["staff_province"]);
    $staff_postno = str_replace("\'", "&#39;", $staff["staff_postno"]);
    $staff_email = str_replace("\'", "&#39;", $staff["staff_email"]);
    $staff_socialmedia = str_replace("\'", "&#39;", $staff["staff_socialmedia"]);
    
    //รูปภาพ
    $staff_photo = str_replace("\'", "&#39;", $staff['staff_photo']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    
    <title>พิมพ์ประวัติบุคลากร</title>
    
    <style type="text/css">
                body {
                height: 860px;
                width: 600px;
                /* to centre page on screen*/
                margin-left: auto;
                margin-right: auto;
                }
   </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    
	<body>
            
            <div id="printableArea">
                <div class="box box-primary">
                
                    <div class="box-body">
                        <h4 class="text-center">ประวัติส่วนตัว</h4>
                    <br>
                    
                    <table width="100%" class="table">
                        <tr>
                            <td align="right" width="35%"><b>ชื่อ นามสกุล : </b></td>
                            <td align="left"><?php if($sgender=='1'){echo 'นาย';}else if($sgender=='2'){echo 'นาง';}else{echo 'นางสาว';} ?> <?= $staff_name ?> <?= $staff_surename ?></td>
                            <td colspan="4" rowspan="4" align="right">
                                <?php
                                        if($staff_photo==''){
                                    ?>
                                        <img src="../../pictures/student.jpg" class="img-thumbnail text-center" alt="Cinque Terre" width="190" height="336px">
                                    <?php    
                                        }else{
                                    ?>
                                        <img src="../../module/staff/proofOfAplication/<?= $staff_photo ?>" class="img-thumbnail text-center" alt="Cinque Terre" width="180" height="336px">
                                    <?php
                                        }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>เลขบัตรประจำตัวประชาชน :</b></td>
                            <td><?= $staff_idcard ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>วัน เดือน ปี เกิด :</b></td>
                            <td>
                                <?php $date = new DateTime($staff_birth);
                                    echo $date->format('d-m-Y');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>วุฒิการศึกษาล่าสุด :</b></td>
                            <td><?= $sedu_certif ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>ปีที่จบ :</b></td>
                            <td colspan="2">
                                <?php $date = new DateTime($sedu_grduated);
                                    echo $date->format('d-m-Y');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>วิชาเอก :</b></td>
                            <td colspan="2"><?= $sedu_major ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>วิชาโท :</b></td>
                            <td colspan="2"><?= $sedu_minor ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>วันที่เข้าทำงาน :</b></td>
                            <td colspan="2">
                                <?php $date = new DateTime($swoking_stated);
                                    echo $date->format('d-m-Y');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>ตำแหน่ง :</b></td>
                            <td colspan="2">
                                <?php
                                    if($sposition=='1'){
                                        echo 'ครู';
                                    }else if($sposition=='2'){
                                        echo 'เจ้าหน้าที่ทั่วไป';
                                    }else{
                                        echo 'ภารโรง';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>สถานะการทำงาน	 :</b></td>
                            <td colspan="2">
                                <?php
                                    if($staff_status=='1'){
                                        echo 'บุคลากรใหม่';
                                    }else if($staff_status=='2'){
                                        echo 'ทำงานอยู่';
                                    }else{
                                        echo 'ย้าย / ออก';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>ที่อยู่	 :</b></td>
                            <td colspan="2">
                                บ้านเลขที่ <i><?= $staff_home_no ?></i> หมู่ที่ <i><?= $staff_village_no ?></i> ซอย <i><?= $staff_soi_name ?></i> ถนน <i><?= $staff_road_name ?></i> ตำบล <i><?= $staff_amphoe ?></i> จังหวัด <i><?= $staff_province ?></i> รหัสไปรษณีย์ <i><?= $staff_postno ?></i>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>เบอร์โทรศัพท์	 :</b></td>
                            <td colspan="2">
                                <?= $staff_phoneno ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>E-mail	 :</b></td>
                            <td colspan="2">
                                <?= $staff_email ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>Social media	 :</b></td>
                            <td colspan="2">
                                <?= $staff_socialmedia ?>
                            </td>
                        </tr>
                    </table>
                    </div>  
                </div></div>
            <br>
            <div align="center">
                <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
            <br>
    </body>
</html>
