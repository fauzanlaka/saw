<?php 
	$serverName	  = "localhost";
	$userName	  = "root";
	$userPassword	  = "";
	$dbName	  = "saw";

	$con = mysqli_connect($serverName,$userName,$userPassword,$dbName);
        mysqli_query($con,"SET NAMES UTF8"); 
        
	if (mysqli_connect_errno())
	{
		echo "Database Connect Failed : " . mysqli_connect_error();
		exit();
	}
?>
