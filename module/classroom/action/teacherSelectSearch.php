<?php
    header("content-type: text/javascript");
    include '../../../connect/connect.php';
    $text = $_POST['staff_id'];
    $title = addslashes($text);
    
    if(empty($title)){
        listbox("", "none", "");
        exit();
   }

    $sql = mysqli_query($con, "SELECT * FROM staff WHERE (staff_name LIKE '$title%' OR staff_surename LIKE '%$title%') AND sposition='1'");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $saff_name = str_replace("'", "&#39;", $data["staff_name"]);
        $staff_surename = str_replace("'", "&#39;", $data["staff_surename"]);
        $staff_id = $data['staff_id'];
        $list .= "<div id=\"$staff_id\" onclick=\"readTextTeacher(this, this.id)\" ";
        $list .= "onmouseover=\"msOverList(this)\" ";
        $list .= "onmouseout=\"msOutList(this)\">";
        $list .= "$saff_name - $staff_surename";
        $list .= "</div>";
    }
    
    listbox($list, "block", $con);
?>

<?php
    function listbox($innerHTML, $display, $con){
$javascript = <<<JS
        document.getElementById('listboxTeacher').innerHTML = '$innerHTML';
        document.getElementById('listboxTeacher').style.display = '$display';
JS;
        header("content-type: text/javascript");
        echo $javascript;
    
        if($con){
            mysqli_close($con);
        }
    }

?>


