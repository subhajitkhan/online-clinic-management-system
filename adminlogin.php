<?php 
	require_once('connect.php');
	if(isset($_POST) & !empty($_POST)){
		$mail = $_POST['adminmail'];
		$pswd = $_POST['adminpswd'];

		 $sql = "SELECT * FROM admin_registration WHERE mail_id=? AND password = ?";
		 $stmt = mysqli_prepare($connection, $sql);
		 mysqli_stmt_bind_param($stmt, "ss", $mail, $pswd);
		 mysqli_stmt_execute($stmt);
		 $result = mysqli_stmt_get_result($stmt);
		 $count = mysqli_num_rows($result);
		 if($count == 1){
		 session_start();
		 	$_SESSION['adminmail'] = $mail;
		 	header("Location:adminhome.php");
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
	<title>adminlogin</title>
	<link rel="stylesheet" type="text/css" href="adminloginstyle.css">
</head>
<body>
	<div class="adminlogin">
	  <form class="admin_form" method="POST">
		<h2 id="adminhead">Admin Login</h2>
		<input type="text" name="adminmail" placeholder="Enter your E-mail Id">
		<input type="password" name="adminpswd" placeholder="Enter your password">
		<button class="btnlogin">Login</button>
	 </form>	
	</div>
</body>
</html>