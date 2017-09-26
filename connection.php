<?php
	$con=mysqli_connect("localhost","root","","project");


	if(mysqli_connect_errno()){
		echo "Faild to connect".mysqli_connect_errno();
	}	

?>	