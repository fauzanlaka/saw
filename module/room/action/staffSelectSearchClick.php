<?php
    include '../../../connect/connect.php';

    $sql = mysqli_query($con, "SELECT * FROM staff");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $name = str_replace("'", "&#39;", $data["staff_name"]);
        $lname = str_replace("'", "&#39;", $data["staff_surename"]);
        $staff_id = $data['staff_id'];
        $list .= "<div id=\"$staff_id\" onclick=\"readTextStaff(this, this.id)\" ";
        $list .= "onmouseover=\"msOverList(this)\" ";
        $list .= "onmouseout=\"msOutList(this)\">";
        $list .= "$name - $lname";
        $list .= "</div>";
    }
    
    listbox($list, "block", $con);
?>

<?php
    function listbox($innerHTML, $display, $con){
$javascript = <<<JS
        document.getElementById('listbox').innerHTML = '$innerHTML';
        document.getElementById('listbox').style.display = '$display';
JS;
        header("content-type: text/javascript");
        echo $javascript;
    
        if($con){
            mysqli_close($con);
        }
    }

?>

