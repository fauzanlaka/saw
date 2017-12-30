<?php
    if($user_status=='1'){
        $user_id = $_SESSION["adm_id"];
        $result = userData($user_id,$connect);
        $user_fistname = str_replace("\'", "&#39;", $result['adm_firstname']);
        $user_lastname = str_replace("\'", "&#39;", $result['adm_lastname']);
        $statusText = statusText($user_status);
        $user_profileImage = str_replace("\'", "&#39;", $result["adm_profileImage"]);
        $profile_edit_link = "admin_profile";
        $sposition = "";
    }else{
        $user_id = $_SESSION["staff_id"];
        $result = dataGet("staff", "WHERE staff_id='$user_id'", $connect);
        $user_fistname = str_replace("\'", "&#39;", $result['staff_name']);
        $user_lastname = str_replace("\'", "&#39;", $result['staff_surename']);
        $statusText = statusText($user_status);
        $user_profileImage = str_replace("\'", "&#39;", $result["staff_photo"]);
        $profile_edit_link = "staff_profile";
        $sposition = str_replace("\'", "&#39;", $result["sposition"]);
    }
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <div class="user-panel">
            <div class="image">
                <center><img src="pictures/logo.png" class="img-circle" alt="User Image" width="35%" height="35%"></center>
                <br>
                <p class="text-center"><font color="white"><?= $user_fistname ?> <?= $user_lastname ?></font></p>
                <p class="text-center"><font color="white"><i class="fa fa-circle text-success"></i> Online</font></p>
            </div>
            <div class="pull-left info">
                
            </div>
        </div>
      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><b>เมนูหลัก</b></li>
            <?php
                $menu = menuAccess($user_status.$sposition);
                echo $menu;
            ?>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>