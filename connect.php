<?php 
$connection =  mysqli_connect("localhost","root", "");
	if(!$connection){
		die("database connectio faild" . mysqli_error($connection));
	}
	$select_db=mysqli_select_db($connection,'project');
	if(!$select_db){
		die("database connection failed" . mysqli_error($connection));
	}
 ?>