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
    function random_username($string_username){
        $pattern = " ";
        $firstPart = strstr(strtolower($string_username), $pattern, true);
        $secondPart = substr(strstr(strtolower($string_username), $pattern, false), 0, 3);
        $nrRand = rand(0, 100);

        $username = $firstPart.$secondPart.$nrRand;
        return $username;
    }
    function random_password($string_password){
        $pattern = " ";
        $firstPart = strstr(strtolower($string_password), $pattern, true);
        $secondPart = substr(strstr(strtolower($string_password), $pattern, false), 0, 3);
        $nrRand = rand(0, 100);

        $username = $firstPart.$secondPart.$nrRand;
        return $username;
    }
    function queryList($table,$condition,$orderBy){
        include 'connect/connect.php';
        $query = mysqli_query($con, "SELECT * FROM $table WHERE $condition ORDER BY $orderBy DESC");
        return $query;
    }
    function queryListInner($table,$condition,$orderBy,$connect){
        include $connect;
        $query = mysqli_query($con, "SELECT * FROM $table $condition $orderBy");
        return $query;
    }
    //Dubble data check
    function dubbleData($table, $id_card){
        include '../../../connect/connect.php';
        $dubble_data_query = mysqli_query($con, "SELECT * FROM user WHERE usr_idcard='$id_card'");
        $dubble_data_query_result = mysqli_num_rows($dubble_data_query);
        return $dubble_data_query_result;
    }
    function gettingData($table, $usr_id, $condition){
        include '../../connect/connect.php';
        $sql = mysqli_query($con, "SELECT * FROM user WHERE usr_id='$usr_id'");
        $result = mysqli_fetch_array($sql);
        return $result;
    }
    // again where clause is left optional
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
    function usernameCheck($userId, $usernme){
        include '../../../connect/connect.php';
        $sql = mysqli_query($con, "SELECT * FROM user WHERE usr_username='$usernme' AND usr_id!='$userId'");
        $query = mysqli_num_rows($sql);
        return $query;
        //echo "alert('OK');";
    }
    function statusText($usr_status){
        switch ($usr_status){
            case 1:
                $text = "ผู้ดูเเลระบบ";
                break;
            case 2:
                $text = "ผู้บริหาร";
                break;
            case 3:
                $text = "เจ้าหน้าที่สำนักงาน";
                break;
            case 4:
                $text = "เจ้าหน้าที่การเงิน";
                break;
            case 5:
                $text = "สมาชิก";
                break;
        }
        return $text;
    }
    // the where clause is left optional incase the user wants to delete every row!
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
    function menuAccess($adm_status){
        switch ($adm_status){
            case 1:
                $menu = '
                        <li><a href="?mod=overview"><i class="fa fa-dashboard"></i> <span>รายงานภาพรวม</span></a></li>
                        <li><a href="?mod=staff"><i class="fa fa-users"></i> <span>บุคลากร</span></a></li>
                        <li><a href="?mod=user"><i class="fa fa-user"></i> <span>ผู้ใช้งาน</span></a></li>
                        <li><a href="?mod=student"><i class="fa fa-male"></i> <span>นักเรียน</span></a></li>
                        <li><a href="?mod=room"><i class="fa fa-building-o"></i> <span>ห้องเรียน</span></a></li>
                        ';
                break;
        }
        return $menu;
    }
    function sumProjectCostMoney($table, $collum, $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT SUM($collum) AS money FROM $table $condition");
        $resultProjectCost = mysqli_fetch_assoc($sql);
        $sumCost = $resultProjectCost['money'];
        return $sumCost;
    }
    function sumCustumerPayment($table, $collum, $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT SUM($collum) AS money FROM $table $condition");
        $resultProjectCost = mysqli_fetch_assoc($sql);
        $sumPay = $resultProjectCost['money'];
        return $sumPay;
    }
    //Exist data check
    function existData($table, $condition){
        include '../../../connect/connect.php';
        $sql_exist = mysqli_query($con, "SELECT * FROM $table $condition");
        $result_exist = mysqli_num_rows($sql_exist);
        return $result_exist;
    }
    //Dubble data check
    function existingDataCheck($table, $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT * FROM $table $condition");
        $num = mysqli_num_rows($sql);
        return $num;
    }
    //global existing data check
    function existingCheck($table, $condition){
        include '../../../connect/connect.php';
        $sql = mysqli_query($con, "SELECT * FROM $table $condition");
        $result = mysqli_num_rows($sql);
        return $result;
    }
?>

