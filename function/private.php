<?php
    //----------------------------circulation-------------------------------------
    //cover pay
    function overPay($table, $collumn , $condition, $connect){
        include $connect;
        $sql = mysqli_query($con, "SELECT SUM($collumn) AS money  FROM $table $condition");
        $result = mysqli_fetch_assoc($sql);
        $money = $result['money'];
        return $money;
    }
?>

