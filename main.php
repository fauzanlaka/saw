<?php
    session_start();
    if(!isset($_SESSION["adm_id"]) && !isset($_SESSION["staff_id"])){
        header("location: index.html");
    }else{
        include 'function/global.php';
        $connect = 'connect/connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>S.A.W | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- indicator -->
  <link rel="stylesheet" href="bootstrap/css/indicator.css">
  <!-- saw style -->
  <link rel="stylesheet" href="bootstrap/css/sawStyle.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php
          include 'topMenu.php';
          include 'sidebarMenu.php';
    ?>
    <!-- Left side column. contains the logo and sidebar -->
  

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
                <div class="row" id="content">
                    
                    <div class="loader" id="loader" style="display: none"></div>
                    
                    <?php

                        if(isset($_GET['mod'])){
                            $mod = $_GET['mod'];
                        }else{
                            $mod = "overview";
                        }

                        switch ($mod){
                            case 'overview':
                                include 'module/overview/main.php';
                                break;
                            case 'student':
                                include 'module/student/main.php';
                                break;
                            case 'user':
                                include 'module/user/main.php';
                                break;
                            case 'room':
                                include 'module/room/main.php';
                                break;
                            case 'staff':
                                include 'module/staff/main.php';
                                break;
                            case 'classroom':
                                include 'module/classroom/main.php';
                                break;
                            case 'classTeacher':
                                include 'module/classTeacher/main.php';
                                break;
                            case 'admission':
                                include 'module/student/admission.php';
                                break;
                            case 'classroomList':
                                include 'module/student/classroom.php';
                                break;
                            case 'movingRoom':
                                include 'module/student/movingRoom.php';
                                break;
                            case 'student_blank_page':
                                include 'module/student/blank_page.php';
                                break;
                            case 'updteHistory':
                                include 'module/updateHistory/updateHistory.php';
                                break;
                        }

                    ?>
            </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    <footer class="main-footer">
        <div align="center">
          <b>Version</b> 1.0
        </div>
        <p class="text-center"><b>พัฒนาระบบโดย IT4SC GROUP</b></p>
        <p class="text-center">Copy right @ แสงอรุณวิทยา</p>
    </footer>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- ./wrapper -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<!-- Ajax -->
<script type="text/javascript" src="ajax/framework.js"></script>
<script type="text/javascript" src="ajax/login.js"></script>
<script type="text/javascript" src="ajax/global.js"></script>
<script type="text/javascript" src="ajax/private.js"></script>
<!-- thai date picker -->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-datepicker-thai.js"></script>
<script src="js/locales/bootstrap-datepicker.th.js"></script>
</body>
</html>
<?php
    }
?>