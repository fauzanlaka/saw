<?php
    header("content-type: text/javascript");
    include '../../../connect/connect.php';
    $text = $_POST['std_idtbl'];
    $title = addslashes($text);
    
    //echo "alert('$title');";

    if(empty($title)){
        listbox("", "none", "");
        exit();
   }

    $sql = mysqli_query($con, "SELECT * FROM student WHERE std_name LIKE '$title%' OR std_surename LIKE '%$title%' OR stdid_card LIKE '%$title%'");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $name = str_replace("'", "&#39;", $data["std_name"]);
        $lname = str_replace("'", "&#39;", $data["std_surename"]);
        $std_idtbl = $data['std_idtbl'];
        $list .= "<div id=\"$std_idtbl\" onclick=\"readTextStudent(this, this.id)\" ";
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

