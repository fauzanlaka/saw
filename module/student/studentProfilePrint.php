<?php
    include '../../connect/connect.php';
    include '../../function/global.php';
    $std_idtbl = $_GET['std_idtbl'];
    $student = dataGet("student", "WHERE std_idtbl='$std_idtbl'", "../../connect/connect.php");
    $stdgender_name = str_replace("\'", "&#39;", $student["stdgender_name"]);
    $std_name = str_replace("\'", "&#39;", $student["std_name"]);
    $std_surename = str_replace("\'", "&#39;", $student["std_surename"]);
    $stdid_card = str_replace("\'", "&#39;", $student["stdid_card"]);
    $std_birth = str_replace("\'", "&#39;", $student["std_birth"]);
    $std_id = str_replace("\'", "&#39;", $student["std_id"]);
    $std_room_register = str_replace("\'", "&#39;", $student["std_room_register"]);
    $std_date_register = str_replace("\'", "&#39;", $student["std_date_register"]);
    $std_status = str_replace("\'", "&#39;", $student["std_status"]);
    $std_oldschool = str_replace("\'", "&#39;", $student["std_oldschool"]);
    $std_home_no = str_replace("\'", "&#39;", $student["std_home_no"]);
    $std_village_no = str_replace("\'", "&#39;", $student["std_village_no"]);
    $std_soi_name = str_replace("\'", "&#39;", $student["std_soi_name"]);
    $std_road_name = str_replace("\'", "&#39;", $student["std_road_name"]);
    $std_tambom = str_replace("\'", "&#39;", $student["std_tambom"]);
    $std_amphoe = str_replace("\'", "&#39;", $student["std_amphoe"]);
    $std_province = str_replace("\'", "&#39;", $student["std_province"]);
    $std_postno = str_replace("\'", "&#39;", $student["std_postno"]);
    $std_phoneno = str_replace("\'", "&#39;", $student["std_phoneno"]);
    $std_emil = str_replace("\'", "&#39;", $student["std_emil"]);
    $pgender_name = str_replace("\'", "&#39;", $student["pgender_name"]);
    $parent_name = str_replace("\'", "&#39;", $student["parent_name"]);
    $parent_surename = str_replace("\'", "&#39;", $student["parent_surename"]);
    $parent_idcard = str_replace("\'", "&#39;", $student["parent_idcard"]);
    $parent_job = str_replace("\'", "&#39;", $student["parent_job"]);
    $parent_phoneno = str_replace("\'", "&#39;", $student["parent_phoneno"]);
    $std_photo = str_replace("\'", "&#39;", $student["std_photo"]);
    $std_type = str_replace("\'", "&#39;", $student["std_type"]);
    
    $std_doc_birth = str_replace("\'", "&#39;", $student["std_doc_birth"]);
    $std_doc_home = str_replace("\'", "&#39;", $student["std_doc_home"]);
    $std_doc_idcard = str_replace("\'", "&#39;", $student["std_doc_idcard"]);
    
    
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
    
    <title>พิมพ์ประวัตินักเรียน</title>
    
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
                            <td align="right"><b>รหัสนักเรียน :</b></td>
                            <td><?= $std_id ?></td>
                            <td colspan="4" rowspan="5" align="right" width="35%">
                                <?php
                                        if($std_photo==''){
                                    ?>
                                        <img src="../../pictures/student.jpg" class="img-thumbnail text-center" alt="Cinque Terre" width="180" height="336px">
                                    <?php    
                                        }else{
                                    ?>
                                        <img src="../../module/student/proofOfAplication/<?= $std_photo ?>" width="130" height="170">
                                    <?php
                                        }
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" width="35%"><b>ชื่อ นามสกุล : </b></td>
                            <td align="left"><?= $std_name ?> <?= $std_surename ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>เลขบัตรประจำตัวประชาชน :</b></td>
                            <td><?= $stdid_card ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>วัน เดือน ปี เกิด :</b></td>
                            <td>
                                <?php $date = new DateTime($std_birth);
                                    echo $date->format('d-m-Y');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>ระดับชั้น ณ วันที่สมัคร :</b></td>
                            <td colspan="2">
                                
                                    <?php if($std_room_register=='1'){echo 'อ.1';} ?>
                                            <?php if($std_room_register=='2'){echo 'อ.2';} ?>
                                            <?php if($std_room_register=='3'){echo 'ป.1';} ?>
                                            <?php if($std_room_register=='4'){echo 'ป.2';}?>
                                            <?php if($std_room_register=='5'){echo 'ป.3';} ?>
                                            <?php if($std_room_register=='6'){echo 'ป.4';} ?>
                                            <?php if($std_room_register=='7'){echo 'ป.5';} ?>
                                            <?php if($std_room_register=='8'){echo 'ป.6';} ?>
                               
                            </td>
                        </tr>
                        
                        <tr>
                            <td align="right"><b>ระดับชั้นปัจจุบัน :</b></td>
                            <td colspan="2">
                              <?php
                                        $student_in_class = mysqli_query($con, "SELECT MAX(classroom_id) AS mxc FROM student_classroom WHERE std_idtbl='$std_idtbl'");
                                        $student_in_class_result = mysqli_fetch_array($student_in_class);
                                        $mxc = $student_in_class_result['mxc'];//classroom_id
                                        $classroom_name = mysqli_query($con, "SELECT classroom_name,classroom_subname FROM classroom WHERE classroom_id='$mxc'");
                                        $classroom_name_result = mysqli_fetch_array($classroom_name);
                                        $cln = $classroom_name_result['classroom_name'];
                                        $clsn = $classroom_name_result['classroom_subname'];
                                        
                                        //กำหนดชั้นอนุบาลหรือประถม
                                        if($cln==1){
                                            $ccln = '1';
                                        }elseif($cln=='2'){
                                            $ccln = '2';
                                        }elseif($cln=='31'){
                                            $ccln = '3';
                                        }elseif($cln=='3'){//ป.1
                                            $ccln = '1';
                                        }elseif($cln=='4'){//ป.2
                                            $ccln = '2';
                                        }elseif($cln=='5'){//ป.3
                                            $ccln = '3';
                                        }elseif($cln=='6'){//ป.4
                                            $ccln = '4';
                                        }elseif($cln=='7'){//ป.5
                                            $ccln = '5';
                                        }else{//ป.6
                                            $ccln = '6';
                                        }
                                        
                                        if($cln=='1' OR $cln=='2' OR $cln=='31'){
                                            $tc = "อ.";
                                        }else{
                                            $tc = "ป.";
                                        }
                                        
                                        if($cln==""){
                                            $currentClass = "";
                                        }else{
                                            $currentClass = "$tc ".$ccln."/".$clsn;
                                        }
                                        
                                        echo $currentClass;
                              ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <td align="right"><b>วันที่สมัคร :</b></td>
                            <td colspan="2"><?= $std_date_register ?></td>
                        </tr>
                        <tr>
                            <td align="right"><b>สถานะปัจจุบัน :</b></td>
                            <td colspan="2">
                                <?php
                                    if($std_type==0){
                                        echo "นักเรียนใหม่";
                                    }elseif($std_type==1){
                                        echo "กำลังศึกษา";
                                    }elseif($std_type==2){
                                        echo "จบการศึกษา";
                                    }else{
                                        echo 'ออก/ย้าย';
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>โรงเรียนเดิม :</b></td>
                            <td colspan="2">
                                <?= $std_oldschool ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>ที่อยู่ :</b></td>
                            <td colspan="2">
                                <?php
                                    echo "บ้านเลขที่ ".$std_home_no." หมู่ที่ ".$std_village_no." ซอย ".$std_soi_name." ถนน ".$std_road_name." ตำบล ".$std_tambom." อำเภอ ".$std_amphoe." จังหวัด ".$std_province." รหัสไปาษณีย์ ".$std_postno;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>ข้อมูลการติดต่อ :</b></td>
                            <td colspan="2">
                                <?php
                                    echo "โทรศัพท์ ".$std_phoneno." email ".$std_emil
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><b>ผู้ปกครอง	 :</b></td>
                            <td colspan="2">
                                <?php
                                    echo "ชื่อ-นามสกุล ".$parent_name." ".$parent_surename." โทรศัพท์ ".$parent_phoneno; 
                                ?>
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
