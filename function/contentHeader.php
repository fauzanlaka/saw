<?php
    function contentHeader($headerId){
        switch ($headerId):
            case 'overview':
                return 
                "
                    <h1>
                        รายงานภาพรวมของระบบ
                        <small>Abu Adli Data Center</small>
                    </h1>
                    <ol class=\"breadcrumb\">
                        <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> หน้าหลัก</a></li>
                        <li class=\"active\">Dashboard</li>
                    </ol>
                ";
            break;
        
            case 'user':
                return 
                "
                    <h1>
                        ผู้ใช้งานระบบ
                        <small>Abu Adli Data Center</small>
                    </h1>
                    <ol class=\"breadcrumb\">
                        <li><a href=\"#\"><i class=\"fa fa-user-secret\"></i>  ผู้ใช้งานระบบ</a></li>
                        <li class=\"active\">รายการผู้ใช้งานระบบ</li>
                    </ol>
                ";
            break;
            
        endswitch;
    }
?>

