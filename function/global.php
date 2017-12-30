<?php
    function userCount($connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM admin");
        $num = mysqli_num_rows($sql);
        return $num;
    }
    function userData($adm_id,$connect){
        //get data from caling table
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM admin WHERE adm_id='$adm_id'");
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    function dataGet($table, $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM $table $condition");
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    function dbRowInsert($table_name, $form_data){
        include '../../../connect/connect.php';
            // retrieve the keys of the array (column titles)
            $fields = array_keys($form_data);

            // build the query
            $sql = "INSERT INTO ".$table_name."
            (`".implode('`,`', $fields)."`)
            VALUES('".implode("','", $form_data)."')";

            // run and return the query result resource
            return mysqli_query($con, $sql);
    }
    function statusText($usr_status){
        switch ($usr_status){
            case 1:
                $text = "ผู้ดูเเลระบบ";
                break;
            case 2:
                $text = "บุคลากร";
        }
        return $text;
    }
    function positionText($usr_status){
        switch ($usr_status){
            case 1:
                $text = "ครู";
                break;
            case 2:
                $text = "เจ้าหน้าที่";
                break;
            case 3:
                $text = "ภารโรง";
                break;
            case 4:
                $text = "ผู้รับใบอนุญาต";
                break;
            case 5:
                $text = "ผู้อำนวยการ";
                break;
        }
        return $text;
    }
    function menuAccess($adm_status){
        switch ($adm_status){
            case 1:
                $menu = '
                        <li><a href="?mod=overview"><i class="fa fa-dashboard"></i> <span>รายงานภาพรวม</span></a></li>
                        <li><a href="?mod=staff"><i class="fa fa-users"></i> <span>บุคลากร</span></a></li>
                        <li><a href="?mod=user"><i class="fa fa-user"></i> <span>ผู้ใช้งาน</span></a></li>
                        <li><a href="?mod=student"><i class="fa fa-male"></i> <span>นักเรียน</span></a></li>
                        <li><a href="?mod=room"><i class="fa fa-building-o"></i> <span>อาคารสถานที่</span></a></li>
                        <li><a href="?mod=classroom"><i class="fa fa-object-group"></i> <span>จัดการห้องเรียน</span></a></li>
                        <li><a href="?mod=updteHistory"><i class="fa fa-history"></i> <span>ประวัติการอัพเดทระบบ</span></a></li>
                        ';
                break;
            case 21:
                $menu = '
                        <li><a href="?mod=overview"><i class="fa fa-dashboard"></i> <span>รายงานภาพรวม</span></a></li>
                        <li><a href="?mod=classTeacher"><i class="fa fa-print"></i> <span>พิมพ์รายชื่อนักเรียน</span></a></li>
                        ';
                break;
            case 24:
                $menu = '
                        <li><a href="?mod=overview"><i class="fa fa-dashboard"></i> <span>รายงานภาพรวม</span></a></li>
                        <li><a href="?mod=staff"><i class="fa fa-users"></i> <span>บุคลากร</span></a></li>
                        <li><a href="?mod=student"><i class="fa fa-male"></i> <span>นักเรียน</span></a></li>
                        <li><a href="?mod=room"><i class="fa fa-building-o"></i> <span>อาคารสถานที่</span></a></li>
                        <li><a href="?mod=classroom"><i class="fa fa-object-group"></i> <span>จัดการห้องเรียน</span></a></li>
                        <li><a href="?mod=updteHistory"><i class="fa fa-history"></i> <span>ประวัติการอัพเดทระบบ</span></a></li>
                        ';
                break;
            case 25:
                $menu = '
                        <li><a href="?mod=overview"><i class="fa fa-dashboard"></i> <span>รายงานภาพรวม</span></a></li>
                        <li><a href="?mod=staff"><i class="fa fa-users"></i> <span>บุคลากร</span></a></li>
                        <li><a href="?mod=student"><i class="fa fa-male"></i> <span>นักเรียน</span></a></li>
                        <li><a href="?mod=room"><i class="fa fa-building-o"></i> <span>อาคารสถานที่</span></a></li>
                        <li><a href="?mod=classroom"><i class="fa fa-object-group"></i> <span>จัดการห้องเรียน</span></a></li>
                        <li><a href="?mod=updteHistory"><i class="fa fa-history"></i> <span>ประวัติการอัพเดทระบบ</span></a></li>
                        ';
                break;
        }
        return $menu;
    }
    function queryList($table,$condition,$orderBy){
        include 'connect/connect.php';
        $query = mysqli_query($con, "SELECT * FROM $table $condition ORDER BY $orderBy DESC");
        return $query;
    }
    function queryListInner($table,$condition,$orderBy,$connect){
        include $connect;
        $query = mysqli_query($con, "SELECT * FROM $table $condition ORDER BY $orderBy DESC");
        return $query;
    }
    function dubbleData($table, $contition){
        include '../../../connect/connect.php';
        $sql = mysqli_query($con, "SELECT * FROM $table WHERE $contition");
        $result = mysqli_num_rows($sql);
        return $result;
    }
    function gettingData($table, $usr_id, $condition){
        include '../../connect/connect.php';
        $sql = mysqli_query($con, "SELECT * FROM user WHERE usr_id='$usr_id'");
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    function lastRecord($table, $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM $table $condition");
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    function dbRowUpdate($table_name, $form_data, $where_clause='')
    {
        include '../../../connect/connect.php';
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add key word
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
        // start the actual SQL statement
        $sql = "UPDATE ".$table_name." SET ";

        // loop and build the column /
        $sets = array();
        foreach($form_data as $column => $value)
        {
             $sets[] = "`".$column."` = '".$value."'";
        }
        $sql .= implode(', ', $sets);

        // append the where statement
        $sql .= $whereSQL;

        // run and return the query result
        return mysqli_query($con, $sql);
    }
    function rowCount($table, $condition ,$connect){
        include $connect;
        $sql = mysqli_query($con, "select * from $table $condition");
        $result = mysqli_num_rows($sql);
        return $result;
    }
    function adminUsernameCheck($table, $condition){
        include '../../../connect/connect.php';
        $sql = mysqli_query($con, "SELECT * FROM $table $condition");
        $query = mysqli_num_rows($sql);
        return $query;
    }
    function dbRowDelete($table_name, $where_clause=''){
        include '../../../connect/connect.php';
        // check for optional where clause
        $whereSQL = '';
        if(!empty($where_clause))
        {
            // check to see if the 'where' keyword exists
            if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
            {
                // not found, add keyword
                $whereSQL = " WHERE ".$where_clause;
            } else
            {
                $whereSQL = " ".trim($where_clause);
            }
        }
        // build the query
        $sql = "DELETE FROM ".$table_name.$whereSQL;

        // run and return the query result resource
        return mysqli_query($con, $sql);
    }
    function className($classroom_name){
        switch ($classroom_name){
            case '1':
                $className = "อ.1";
                break;
            case '2':
                $className = "อ.2";
                break;
            case '31':
                $className = "อ.3";
                break;
            case '3':
                $className = "ป.1";
                break;
            case '4':
                $className = "ป.2";
                break;
            case '5':
                $className = "ป.3";
                break;
            case '6':
                $className = "ป.4";
                break;
            case '7':
                $className = "ป.5";
                break;
            case '8':
                $className = "ป.6";
                break;
        }
        return $className;
    }
    function std_status($std_status){
        switch ($std_status){
            case '1':
                $std_name = "<span class='badge bg-green'> นักเรียนใหม่</span>";
                break;
            case '2':
                $std_name = "<span class='badge bg-green'> กำลังศึกษา</span>";
                break;
            case '3':
                $std_name = "<span class='badge bg-green'> สำเร็จการศึกษา</span>";
                break;
            case '4':
                $std_name = "<span class='badge bg-green'> ย้ายออก</span>";
                break;
        }
        return $std_name;
    }
   