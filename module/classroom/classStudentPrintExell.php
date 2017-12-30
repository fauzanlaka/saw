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
    
    $header = "Content-Disposition: attachment; filename=\"$className/$classroom_subname เทอม $classroom_semester ปี $classroom_year.xls\"";
?>
<?php
    header("Content-Type: application/vnd.ms-excel");
    header($header);#ชื่อไฟล์
    header('Cache-Control: max-age=0');
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"

xmlns:x="urn:schemas-microsoft-com:office:excel"

xmlns="http://www.w3.org/TR/REC-html40">

<HTML lang="en">

<HEAD>

    <meta http-equiv="Content-type" content="text/html;charset=utf-8" />
</HEAD>
    
    <BODY>
        <table x:str BORDER="1" width="70%">
            <tr>
                <td colspan="6" align="center"><b>รายชื่อนักเรียน</b><br>

                <b>ชั้น <?= $className ?>/<?= $classroom_subname ?> เทอม  <?= $classroom_semester ?> ปีการศึกษา <?= $classroom_year ?></b><br>

                    <b>ครูประจำชั้น <?= $teacherName ?> <?= $teacherSurename ?></b><br>
              </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#c5c5c5" width="70" valign="middle"><b>ลำดับ</b></td>
                <td align="center" bgcolor="#c5c5c5" width="100" valign="middle"><b>เลขประจำตัวนักเรียน</b></td>
                <td align="center" bgcolor="#c5c5c5" width="100" valign="middle"><b>เลขประชำตัวประชาชน</b></td>
                <td align="center" bgcolor="#c5c5c5" width="180" valign="middle"><b>ชื่อ นามสกุล</b></td>
                <td align="center" bgcolor="#c5c5c5" width="70" valign="middle"><b>เพศ</b></td>
                <td align="center" bgcolor="#c5c5c5" width="70" valign="middle"><b>อายุ</b></td>
            </tr>
            <?php
               
                        $i = 1;
                        $student = mysqli_query($con, "SELECT s.*,sc.* FROM student s INNER JOIN student_classroom sc ON s.std_idtbl=sc.std_idtbl WHERE sc.classroom_id='$classroom_id' ORDER BY std_id");
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
    </BODY>
</HTML>