<?php
    header("content-type: text/javascript");
    include '../../../connect/connect.php';
    $text = $_POST['room_id'];
    $title = addslashes($text);
    
    if(empty($title)){
        listbox("", "none", "");
        exit();
   }

    $sql = mysqli_query($con, "SELECT * FROM room WHERE room_name LIKE '$title%' OR room_number LIKE '%$title%' OR room_code LIKE '%$title%'");
    $num = mysqli_num_rows($sql);
    
    if($num==0){
        listbox("", "none", $con);
        exit();
    }
    
    $list = "";
    while($data = mysqli_fetch_array($sql)){
        $room_name = str_replace("'", "&#39;", $data["room_name"]);
        $room_code = str_replace("'", "&#39;", $data["room_code"]);
        $room_id = $data['room_id'];
        $list .= "<div id=\"$room_id\" onclick=\"readTextClassroom(this, this.id)\" ";
        $list .= "onmouseover=\"msOverList(this)\" ";
        $list .= "onmouseout=\"msOutList(this)\">";
        $list .= "$room_code - $room_name";
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

