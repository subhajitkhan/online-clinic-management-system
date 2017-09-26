<?php 
	mysql_connect('localhost', 'root', '');
    mysql_select_db('project');
	if(isset($_POST) & !empty($_POST)){
		$doc_mail = $_POST['doc_mail'];
		$doc_pswd = $_POST['doc_pswd'];

		 $sql = "SELECT * FROM doc_registration WHERE doc_mail='$doc_mail'  AND doc_pswd = '$doc_pswd' ";
		 $result = mysql_query($sql);
		 $count = mysql_num_rows($result);
		 if($count == 1){
		 	//$sql_name = "SELECT doc_name FROM doc_registration WHERE doc_mail='$doc_mail' " ;
		 	//$resultname = mysqli_query($connection, $sql_name);
		 	session_start();
		 	$_SESSION['docmail'] = $doc_mail;

		 	header("Location:doctorhome.php");
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
	<title>doctorlogin</title>
	<link rel="stylesheet" type="text/css" href="doctorloginstyle.css">
</head>
<body style="background-image: url(jj.jpg); background-size: cover; ">
	<div class="doclogin">
	   <form class="doc_form" method="POST">
		<h2 id="dochead">Doctor Login</h2>
		<input type="text" name="doc_mail" placeholder="Enter your mail id">
		<input type="password" name="doc_pswd" placeholder="Enter your password">
		<button class="btnlogin" type="submit">Login</button>
	  </form>
	</div>
</body>
</html>