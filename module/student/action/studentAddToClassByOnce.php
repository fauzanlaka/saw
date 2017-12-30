<?php
    header("content-type: text/javascript");
    include("../../../connect/connect.php");
    include("../../../function/global.php");
    $size = count($_POST['std_idtbl']);
    $classroom_id = $_POST['classroom_id'];

    $classroom = dataGet("classroom", "WHERE classroom_id='$classroom_id'", "../../../connect/connect.php");
    $classroom_semester = $classroom['classroom_semester'];
    $classroom_year = $classroom['classroom_year'];    
    $i = 0;
    while ($i < $size){
            $pay_status[$i] = $_POST['pay_status'][$i];
            if($pay_status[$i] != ""){
                $std_idtbl = $_POST['std_idtbl'][$i];
                
                $check = dubbleData("student_classroom", "std_idtbl='$std_idtbl' AND classroom_semester='$classroom_semester' AND classroom_year='$classroom_year'");
                if($check > 0){
                    echo "document.getElementById('successAlert2').style.display = 'block';";
                }else{
                    $form_data = array(
                    'std_idtbl' => $std_idtbl,
                    'classroom_id' => $_POST['classroom_id'],
                    'classroom_semester' => $classroom_semester,
                    'classroom_year' => $classroom_year
                );
                dbRowInsert('student_classroom', $form_data);
                
                $form_data_update = array(
                    'std_type' => 1
                );
                dbRowUpdate('student', $form_data_update, "WHERE std_idtbl='$std_idtbl'");
                echo "document.getElementById('r$std_idtbl').style.display = 'none';";
                echo "document.getElementById('rd').style.display = 'none';";
                echo "document.getElementById('btnd').style.display = 'none';";
                echo "document.getElementById('successAlert').style.display = 'block';";
                }
            }else{
            
            }
            ++$i;
    }
    //จำนวนนักเรียนในห้อง
    $totalStudent = rowCount("student_classroom", "WHERE classroom_id='$classroom_id'", '../../../connect/connect.php');
    echo "document.getElementById('studentNumber').innerHTML = 'จำนวนนักเรียน : $totalStudent';";
    echo "$('html, body').animate({scrollTop:0}, 'slow');";
    echo "document.getElementById('process').innerHTML = '';";
?>

