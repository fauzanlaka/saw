<?php
    $user_status = $_SESSION["status"];
    if($user_status=='1'){
        $user_id = $_SESSION["adm_id"];
        $result = userData($user_id,$connect);
        $user_fistname = str_replace("\'", "&#39;", $result['adm_firstname']);
        $user_lastname = str_replace("\'", "&#39;", $result['adm_lastname']);
        $statusText = statusText($user_status);
        $user_profileImage = str_replace("\'", "&#39;", $result["adm_profileImage"]);
        $imge_link = "module/user/profileImage/";
        $profile_edit_link = "module/user/admin_profile.php";
    }else{
        $user_id = $_SESSION["staff_id"];
        $result = dataGet("staff", "WHERE staff_id='$user_id'", $connect);
        $user_fistname = str_replace("\'", "&#39;", $result['staff_name']);
        $user_lastname = str_replace("\'", "&#39;", $result['staff_surename']);
        $statusText = statusText($user_status);
        $user_profileImage = str_replace("\'", "&#39;", $result["staff_photo"]);
        $imge_link = "module/staff/proofOfAplication/";
        $profile_edit_link = "module/user/staff_profile.php";
    }
?>
<header class="main-header">
    <!-- Logo -->
    <a href="http://system.sawbannangseta.com/main.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>เมนู</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>S.A.W</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
                  <!-- end message -->
                  
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="pictures/userpic.svg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= ucfirst($user_fistname) ?> <?= ucfirst($user_lastname) ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                  <?php
                      if($user_profileImage==""){
                    ?>
                    <img src="pictures/userpic.svg" class="img-circle" alt="User Image">
                    <?php
                      }else{
                    ?>
                        <img src="<?= $imge_link ?><?= $user_profileImage ?>" class="img-circle" alt="User Image">
                    <?php
                      }
                    ?>
                <p>
                  <?= ucfirst($user_fistname) ?> <?= ucfirst($user_lastname) ?> - <?= $statusText ?>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="#" onclick="formLoad('<?= $profile_edit_link ?>', '', <?= $user_id ?>)" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="#" onclick="logOut()" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>