<?php 
  require_once('connect.php');
  if(isset($_POST) & !empty($_POST)){
    $name= $_POST['name'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $phn=$_POST['phn'];
    $mail=$_POST['mail'];
    $pswd=$_POST['pswd'];
    $repswd=$_POST['repswd'];
    $gender=$_POST['gender'];

    $sql="INSERT INTO admin_registration (name,address,dob,phn,mail,pswd,repswd,gender) VALUES ('$name','$address','$dob','$phn','$mail', '$pswd','$repswd','$gender')" ;
    $result = mysqli_query($connection,$sql);
    if($result){
      echo "successfull";
    }
      else{
        echo "failed";
      }
  }

?>





<!DOCTYPE html>
<html>
<head>
    <title>admin registraion</title>
    <link rel="stylesheet" type="text/css" href="patientregistrationstyle.css">
</head>
<body>
    <div class="pat_wrapper">
      <h2 id="head">Admin Registration</h2>

      <form class="pat_form" method="POST">
        <p class="field">
          <input type="text" name="name" id="name" placeholder="Enter your name">
          <label for name>Admin Name</label>
        </p>

        <p class="field">
          <input type="text" name="address" id="address" placeholder="Enter your address">
          <label for address>Address</label>
        </p>

        <p class="field">
          <input type="date" name="dob" id="dob" >
          <label for dob>Date of Birth</label>
        </p>

        

        <p class="field">
          <input type="text" name="phn" id="phn" placeholder="+91">
          <label for phn>Contact No</label>
        </p>

        <p class="field">
          <input type="text" name="mail" id="mail" placeholder="@gmail.com">
          <label for mail>Mail Id</label>
        </p>

        <p class="field">
          <input type="password" name="pswd" id="pswd" placeholder="***********">
          <label for pswd>Password</label>
        </p>

        <p class="field">
          <input type="password" name="repswd" id="repswd" placeholder="***********">
          <label for pswd>Re-enter Password</label>
        </p>

        <p class="gender">
          <input type="radio" name="gender" id="gender" value="Male">Male
          <input type="radio" name="gender" id="gender" value="Female">Female
        </p>

        <p class="sub">
          <input type="submit" name="sub" id="sub" value="Register Now" >
          
        </p>

        

      </form>
        
    </div>
</body>
</html>