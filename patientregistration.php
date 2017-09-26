<?php 
  require_once('connect.php');
  if(isset($_POST) & !empty($_POST))
  {
    $pat_name= $_POST['pat_name'];
    $pat_address=$_POST['pat_address'];
    $pat_dob=$_POST['pat_dob'];
    $pat_phn=$_POST['pat_phn'];
    $pat_mail=$_POST['pat_mail'];
    $pat_pswd=$_POST['pat_pswd'];
    $pat_repswd=$_POST['pat_repswd'];
    $pat_gender=$_POST['pat_gender'];


    $check_mail="SELECT * from pat_registration where pat_mail='$pat_mail' " ;
    $result_mail=mysqli_query($connection,$check_mail);
    $num_row=mysqli_num_rows($result_mail);

   if ($num_row) 
   {
    echo '<script language="javascript">';
    echo 'alert("Email id already registered.Put unique Email id.")';
    echo '</script>';
   }


  else{    
        if($pat_pswd==$pat_repswd)
        {

            $insert_sql="INSERT INTO pat_registration (pat_name,pat_address,pat_dob,pat_phn,pat_mail,pat_pswd,pat_gender) VALUES ('$pat_name','$pat_address','$pat_dob','$pat_phn','$pat_mail', '$pat_pswd','$pat_gender')" ;
              $result = mysqli_query($connection,$insert_sql);
              if($result)
                {
                  session_start();
                  $_SESSION['patmail'] = $pat_mail;
                  header("Location:patienthome.php");
                }
              else{
                echo '<script language="javascript">';
                echo 'alert("THERE IS SOME ERROR IN DATABASE CONNECTION")';
                echo '</script>';
                  }
        }
        else{
          echo '<script language="javascript">';
          echo 'alert("PASSWORDS DO NOT MATCH")';
          echo '</script>';
            }        

    }



  }  
 

?>





<!DOCTYPE html>
<html>
<head>
    <title>patient registraion</title>
    <link rel="stylesheet" type="text/css" href="patientregistrationstyle.css">
</head>
<body style="background-image: url(ff.jpg); background-size: cover;margin-right: 400px; ">
    <div class="pat_wrapper">
      <h2 id="head">Patient Registration</h2>

      <form class="pat_form" method="POST">
        <p class="field">
          <input type="text" name="pat_name" id="name" placeholder="Enter your  name" required>
          <label for fname>Patient Name</label>
        </p>

        <p class="field">
          <input type="text" name="pat_address" id="address" placeholder="Enter your address" required>
          <label for lname>Address</label>
        </p>

        <p class="field">
          <input type="date" name="pat_dob" id="dob"  max="<?php echo date("Y-m-d"); ?>" min="1950-01-01" required>
          <label for dob>Date of Birth</label>
        </p>

        

        <p class="field">
          <input type="number" name="pat_phn" id="phn" max="9999999999" min="1000000000"  placeholder="+91">
          <label for phn>Contact No</label>
        </p>

        <p class="field">
          <input type="email" name="pat_mail" id="mail" placeholder="@gmail.com" required>
          <label for mail>Mail Id</label>
        </p>

        <p class="field">
          <input type="password" name="pat_pswd" id="pswd" minlength="4" placeholder="***********" required>
          <label for pswd>Password</label>
        </p>

        <p class="field">
          <input type="password" name="pat_repswd" id="repswd" placeholder="***********" required>
          <label for pswd>Re-enter Password</label>
        </p>

        <p class="gender">
          <input type="radio" name="pat_gender" id="gender" value="Male" required>Male
          <input type="radio" name="pat_gender" id="gender" value="Female" required>Female
        </p>

        <p class="sub">
          <input type="submit" name="sub" id="sub" value="Register Now" >
          
        </p>

        <p class="loginbtn">
          <a id="login" href="patientlogin.php"> Already registered</a>
        </p>

      </form>
        

        <br>
      <p style="color: blue; ">By signing up, you agree to our Basic Rules, Terms of Service, and Privacy Policy.</p>
      <br>
    </div>


    <br></br>



    
</body>
</html>