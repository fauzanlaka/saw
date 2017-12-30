<?php
    include '../../connect/connect.php';
    include '../../function/global.php';
    $operator = $_GET["operator"];
    $classroom_id = $_GET['classroom_id'];
    
    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", '../../connect/connect.php');
    $classroom_name = $classroom['classroom_name'];
    $classroom_subname = $classroom['classroom_subname'];
    $classroom_semester = $classroom['classroom_semester'];
    $classroom_year = $classroom['classroom_year'];
    $staff_id = $classroom['staff_id'];
    
    //ชั้นเรียน
    $className = className($classroom_name);
    
    //ข้อมูลครู
    $teacher = dataGet("staff", "WHERE staff_id='$staff_id'", '../../connect/connect.php');
    $teacherName = str_replace("\'", "&#39;", $teacher["staff_name"]);
    $teacherSurename = str_replace("\'", "&#39;", $teacher["staff_surename"]);
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
    
    <title>พิมพ์รายชื่อนักเรียน</title>
    
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
                <p align='center'><img src="../../pictures/logo.png" width="15%" height="15%"></p>
                <p align='center'><b>รายชื่อนักเรียน</b></p>
                <p align='center'><b>ชั้น <?= $className ?>/<?= $classroom_subname ?> เทอม  <?= $classroom_semester ?> ปีการศึกษา <?= $classroom_year ?></b></p>
                <p align='center'><b>ครูประจำชั้น <?= $teacherName ?> <?= $teacherSurename ?></b></p>
                <br>
                
                <table class="table table-bordered">
                    <tr>
                        <td align="center"><b>ลำดับ</b></td>
                        <td align="center"><b>เลขประจำตัวนักเรียน</b></td>
                        <td align="center"><b>เลขประชำตัวประชาชน</b></td>
                        <td align="center"><b>ชื่อ นามสกุล</b></td>
                        <td align="center"><b>เพศ</b></td>
                        <td align="center"><b>อายุ</b></td>
                    </tr>
                    <?php
                        $i = 1;
                        $student = mysqli_query($con, "SELECT s.*,sc.* FROM student s INNER JOIN student_classroom sc ON s.std_idtbl=sc.std_idtbl WHERE sc.classroom_id='$classroom_id' ORDER BY stdroom_id");
                        while($studentResult = mysqli_fetch_array($student)){
                            $stdroom_id = $studentResult['stdroom_id'];
                            $std_name = str_replace("\'", "&#39;", $studentResult["std_name"]);
                            $std_surename = str_replace("\'", "&#39;", $studentResult["std_surename"]);
                            $stdid_card = str_replace("\'", "&#39;", $studentResult["stdid_card"]);
                            $std_birth = str_replace("\'", "&#39;", $studentResult["std_birth"]);
                            $stdgender_name = str_replace("\'", "&#39;", $studentResult["stdgender_name"]);
                            $std_id = str_replace("\'", "&#39;", $studentResult["std_id"]);
                            //เพศ
                            if($stdgender_name=='1'){
                                $gender = "ชาย";
                            }else{
                            $gender = "หญิง";
                            }
                            //อายุ
                            $age = (date('Y-m-d')+543) - $std_birth;
                    ?>
                    <tr>
                        <td align="center"><?= $i ?></td>
                        <td align="center"><?= $std_id ?></td>
                        <td align="center"><?= $stdid_card ?></td>
                        <td align="left"><?= $std_name ?> <?= $std_surename ?></td>
                        <td align="center"><?= $gender ?></td>
                        <td align="center"><?= $age ?></td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                </table>
            </div>
            
            <br>
            <div align="center">
                <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </div>
            
            <br>
    </body>
</html>
