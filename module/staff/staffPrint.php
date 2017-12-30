<?php
    include '../../connect/connect.php';
    include '../../function/global.php';
    $sposition = $_GET['sposition'];
    
    $staff = dataGet("staff", "WHERE sposition='$sposition'", "../../connect/connect.php");
    $teacherName = str_replace("\'", "&#39;", $staff["staff_name"]);
    $teacherSurename = str_replace("\'", "&#39;", $staff["staff_surename"]);
    
    //ตำแน่งบุคลากร
    if($sposition=='1'){
        $staffPosition = 'ครู';
    }else if($sposition=='1'){
        $staffPosition = 'เจ้าหน้าที่ทั่วไป';
    }else{
        $staffPosition = 'ภารโรง';
    }

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
    
    <title>พิมพ์รายชื่อบ</title>
    
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
                <p align='center'><b>รายชื่อบุคลากร</b></p>
                <p align='center'><b><?= $staffPosition ?></b></p>
                <br>
                
                <table class="table table-bordered">
                    <tr>
                        <td align="center"><b>ลำดับ</b></td>
                        <td align="center"><b>เลขประชำตัวประชาชน</b></td>
                        <td align="center"><b>ชื่อ นามสกุล</b></td>
                        <td align="center"><b>เพศ</b></td>
                        <td align="center"><b>อายุ</b></td>
                        <td align="center"><b>สถานะ</b></td>
                    </tr>
                    <?php
                        $i = 1;
                        $staffQuery = mysqli_query($con, "SELECT * FROM staff WHERE sposition='$sposition'");
                        while($staffResult = mysqli_fetch_array($staffQuery)){
                            $staff_idcard = $staffResult['staff_idcard'];
                            $staff_name = str_replace("\'", "&#39;", $staffResult["staff_name"]);
                            $staff_surename = str_replace("\'", "&#39;", $staffResult["staff_surename"]);
                            $sgender = $staffResult['sgender'];
                            $std_birth = $staffResult['staff_birth'];
                            $staff_status = $staffResult['staff_status'];

                            if($sgender=='1'){
                                $gender = "ชาย";
                            }else{
                            $gender = "หญิง";
                            }
                            //อายุ
                            $age = (date('Y-m-d')+543) - $std_birth;
                            
                            //สถานะการทำงาน
                            if($staff_status=='1'){
                                $status = "บุคลากรใหม่";
                            }else if($staff_status=='2'){
                                $status = "ทำงานอยู่";
                            }else{
                                $status = "ย้าย/ออก";
                            }
                    ?>
                    <tr>
                        <td align="center"><?= $i ?></td>
                        <td align="center"><?= $staff_idcard ?></td>
                        <td align="left"><?= $staff_name ?> <?= $staff_surename ?></td>
                        <td align="center"><?= $gender ?></td>
                        <td align="center"><?= $age ?></td>
                        <td align="center"><?= $status ?></td>
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

