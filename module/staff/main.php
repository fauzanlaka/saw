<?php
    //Authentication
    if($_SESSION['status']=='1' AND $_SESSION['position']=='0'){
        //ไอดีผู้ดำเนินการ
        //$operator = $_SESSION['adm_id'];
        //admin data
        $id = $_SESSION["adm_id"];
        $query = queryList("admin", "adm_id='$id'","adm_id");
        $status = $result['adm_status'];
        $operator = $id;
        
    }elseif($_SESSION['status']=='2' AND ($_SESSION['position']=='4' OR $_SESSION['position']=='5')){
        $id = $_SESSION["staff_id"];
        $query = queryList("staff", "staff_id='$id'","");
        $operator = $id;
    }
    if(($_SESSION['status']=='1' AND $_SESSION['position']=='0') OR ($_SESSION['status']=='2' AND ($_SESSION['position']=='4' OR $_SESSION['position']=='5') ) ){
?>
<?php
    //นับจำนวนบุคลากร
    $total_staff = rowCount("staff", "WHERE (staff_status='1' OR staff_status='2')", "connect/connect.php");
    $total_male_staff = rowCount("staff", "WHERE sgender='1' AND (staff_status='1' OR staff_status='2')", "connect/connect.php");
    $total_female_staff = rowCount("staff", "WHERE (sgender='2' OR sgender='3') AND (staff_status='1' OR staff_status='2')", "connect/connect.php");
?>
<section class="content-header">
      <h1>
        ข้อมูลบุคลากร
        <small>บุคลากร</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> บุคลากร</a></li>
      </ol>
</section>

<section class="content-header" id="successAlert" style="display: block">
    <div class="row">
        <div class="col-sm-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $total_staff ?></h3>
                        <p>จำนวนบุคลากรทั้งหมด</p>
                </div>
                <div class="icon">
                    <i class="fa fa-navicon"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?= $total_male_staff ?></h3>
                        <p>จำนวนบุคลากรชาย</p>
                </div>
                <div class="icon">
                    <i class="fa fa-female"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?= $total_female_staff ?></h3>
                        <p>จำนวนบุคลากรหญิง</p>
                </div>
                <div class="icon">
                    <i class="fa fa-child"></i>
                </div>
                <a href="#" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-sm-3" id="chartContainer" style="height: 130px;">
            
            <!-- Chart 
            <script type="text/javascript">
                    window.onload = function () {
                        var chart = new CanvasJS.Chart("chartContainer",
                        {
                            title:{
                                text: "สัดส่วนบุคลากร"
                            },
                            exportFileName: "Pie Chart",
                            exportEnabled: true,
                                    animationEnabled: true,
                            legend:{
                                verticalAlign: "bottom",
                                horizontalAlign: "center"
                            },
                            data: [
                            {       
                                type: "doughnut",
                                showInLegend: true,
                                toolTipContent: "{name}: <strong>{y}%</strong>",
                                indexLabel: "{name} {y}%",
                                dataPoints: [
                                    {  y: 35, name: "บุคลากรหญิง"},
                                    {  y: 20, name: "บุคลากรชาย"},
                                   
                                ]
                        }
                        ]
                        });
                        chart.render();
                                            }
                        </script>
                        <script type="text/javascript" src="bootstrap/js/canvasjs.min.js"></script>
                      --> 

        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
            <button class="btn btn-success" onclick="formLoad('module/staff/staffAdd.php', '', '<?= $operator ?>')"><i class="fa fa-user-plus"></i> เพื่ม</button>
            <button class="btn btn-success" onclick="openHide('filter')"><i class="fa fa-search"></i> ค้นหา</button>
        </div>
        
        <div class="box-header" id="filter" style="display: none;">
            
            <form name="staffSearch" id="staffSearch">
                                
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <div class="form-group">
                        <select class="form-control" name="sposition" id="sposition">
                            <option value="" disabled selected style="display: none;">ตำแหน่งบุคลากร</option>
                            <option value="4">ผู้รับใบอนุญาต</option>
                            <option value="5">ผู้อำนวยการ</option>
                            <option value="1">ครู</option>
                            <option value="2">เจ้าหน้าที่ทั่วไป</option>
                            <option value="3">ภารโรง</option>
                            <option value="6">แม่บ้าน</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-2">
                    <a onclick="staff_search('module/staff/action/staffSearch.php', 'staffSearch')" class="btn btn-success" ><i class="fa fa-search"></i> ค้นหา</a>
                </div>
                
            </form>
            
        </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div id="subcontent" align="left">
                    <table id="example1" class="table table-bordered table-striped table-hover table-responsive">
                        <thead>
                            <tr>
                                <td align='center'>#</td>
                                <td align="center"><b>ชื่อ นามสกุล</b></td>
                                <td align="center"><b>เลขประจำตัวประชาชน</b></td>
                                <td align="center"><b>เริ่มทำงานเมื่อ</b></td>
                                <td align="center"><b>อายุ</b></td>
                                <td align="center"><b>เพศ</b></td>
                                <td align="center"><b>ผู้เพิ่ม</b></td>
                                <td align="center"><b>แก้ไข / รายละเอีด</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                $staff = queryList("staff","","staff_id");
                                while($result = mysqli_fetch_array($staff)){
                                    $staff_id = str_replace("\'", "&#39;", $result['staff_id']);
                                    $recorder_id = str_replace("\'", "&#39;", $result['recorder_id']);
                                    $sgender_name =  str_replace("\'", "&#39;", $result['sgender']);
                                    $staff_name = str_replace("\'", "&#39;", $result['staff_name']);
                                    $staff_surename = str_replace("\'", "&#39;", $result['staff_surename']);
                                    $staff_idcard = str_replace("\'", "&#39;", $result['staff_idcard']);
                                    $swoking_stated = str_replace("\'", "&#39;", $result['swoking_stated']);
                                    $staff_birth = str_replace("\'", "&#39;", $result['staff_birth']);


                                    //ผู้เพิ่มข้อมูล
                                    $recorder = dataGet("admin", "WHERE adm_id='$recorder_id'", "connect/connect.php");
                                    $adm_firstname = str_replace("\'", "&#39;", $recorder['adm_firstname']);
                                    $adm_lastname = str_replace("\'", "&#39;", $recorder['adm_lastname']);

                                    //อายุ
                                    if($staff_birth=='0000-00-00'){
                                        $age = "";
                                    }else{
                                        $age = (date('Y-m-d')+543) - $staff_birth;
                                    }
                            ?>
                            <tr id="<?= $staff_id ?>">
                                <td align='center'><?= $i ?></td>
                                <td align="left"><?= $staff_name ?> <?= $staff_surename ?></td>
                                <td align="center"><?= $staff_idcard ?></td>
                                <td align="center">
                                    <?php
                                        if($swoking_stated=="0000-00-00"){
                                            echo "";
                                        }else{
                                            $date = new DateTime($swoking_stated);
                                            echo $date->format('d-m-Y');
                                        }
                                    ?>
                                </td>
                                <td align="center"><?= $age ?></td>
                                <td align="center"><?php if($sgender_name=='1'){echo 'ชาย';}else if($sgender_name=='2' OR $sgender_name=='3'){echo 'หญิง';} ?></td>
                                <td align="left"><?= $adm_firstname ?> <?= $adm_lastname ?></td>
                                <td align="center">
                                    <button type="button" onclick="formLoad('module/staff/staffEdit.php', '<?= $staff_id ?>', '<?= $operator ?>')" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> แก้ไข</button>
                                    <button type="button" onclick="formLoad('module/staff/staffProfile.php', '<?= $staff_id ?>', '<?= $operator ?>')" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i> แสดง</button>
                                </td>
                            </tr>
                            <?php
                            $i++;
                                }
                            ?>
                        </tbody>
                    
                    </table>
                </div>
            </div>
            <!-- /.box-body -->
    </div>
          <!-- /.box -->
</div>
<!-- /.col -->
    </div>
</section>
<?php
    }else{
?>
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> ขออภัย</h4>
            ท่านไม่สามารถเข้าถึงข้อมูลส่วนนี้ได้
        </div>
    </div>
<?php
    }
?>

