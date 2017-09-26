<?php 
	require_once('connect.php');
	if(isset($_POST) & !empty($_POST)){
		$pat_mail = $_POST['pat_mail'];
		$pat_pswd = $_POST['pat_pswd'];


		 $sql = "SELECT * FROM pat_registration WHERE pat_mail='$pat_mail'  AND pat_pswd = '$pat_pswd' ";
		 $result = mysqli_query($connection, $sql);
		 $count = mysqli_num_rows($result);
		 if($count == 1){

		 //$sql_name = "SELECT pat_name FROM pat_registration WHERE pat_mail='$pat_mail'  AND pat_pswd = '$pat_pswd' ";
		 //$result_name = mysqli_query($connection, $sql_name);

		 	session_start();
		 	$_SESSION['patmail'] = $pat_mail;
		 	header("Location:patienthome.php");
		 }
		 	else{
		 		echo '<script language="javascript">';
                echo 'alert("PLEASE ENTER CORRECT EMAIL ID/PASSWORD COMBINATION")';
                echo '</script>';
		 	}
		}

?>




<!DOCTYPE html>
<html>
<head>
	<title>patientlogin</title>
	<link rel="stylesheet" type="text/css" href="patientloginstyle.css">
</head>
<body style="background-image: url(jj.jpg);background-size: cover;  ">
	<div class="patlogin">
	  <form class="pat_form" method="POST">
		<h2 id="pathead">Patient Login</h2>
		<input type="text" name="pat_mail" placeholder="Enter your mail Id">
		<input type="password" name="pat_pswd" placeholder="Enter your password">
		<button class="btnlogin" type="submit">Login</button>
	  </form>	
	</div>
</body>
</html>