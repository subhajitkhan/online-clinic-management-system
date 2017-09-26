<?php 
   session_start();
  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['adminmail'];
  $sql_admin="SELECT * FROM admin_registration where mail_id= '$sos' ";
  $result_admin=mysql_query($sql_admin);
  $edit_row=mysql_fetch_array($result_admin);


   $sql_id="SELECT admin_id FROM admin_registration where mail_id='$sos' ";
   $result_pointer=mysql_query($sql_id);
   $result_obj=mysql_fetch_object($result_pointer);
   $result_id=$result_obj->admin_id;


  if(isset($_POST) & !empty($_POST))
  {
    $admin_name= $_POST['admin_name'];
    $address=$_POST['address'];
    $dob=$_POST['dob'];
    $contact_no=$_POST['contact_no'];
    $mail_id=$_POST['mail_id'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    $gender=$_POST['gender'];

    /* $count_sql="SELECT COUNT(pat_id) FROM pat_registration";
        $id_result = mysqli_query($connection,$count_sql);
        ++$id_result;
        $pat_id='p00' . $id_result;*/


          


        if($pat_pswd==$pat_repswd)
        {
            $update_sql="UPDATE  admin_registration SET  admin_name='$admin_name',address='$address',dob='$dob',contact_no='$contact_no',mail_id='$mail_id', password='$password',gender='$gender' WHERE admin_id='$result_id' " ;         
              $result = mysql_query($update_sql);
              if($result)
                {
                  session_start();
                  $_SESSION['adminmail'] = $mail_id;
                  header("Location:adminhome.php");
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
        
  

?>





<!DOCTYPE html>
<html>
<head>
    <title>admin edit</title>
    <link rel="stylesheet" type="text/css" href="patientregistrationstyle.css">
</head>
<body>
    <div class="pat_wrapper">
      <h2 id="head">Edit your details</h2>

      <form class="pat_form" method="POST">
        <p class="field">
          <input type="text" name="admin_name" id="name" value="<?php echo $edit_row['admin_name']?>" placeholder="Enter your  name" required>
          <label for fname>Admin Name</label>
        </p>

        <p class="field">
          <input type="text" name="address" id="address" value="<?php echo $edit_row['address']?>" placeholder="Enter your address" required>
          <label for lname>Address</label>
        </p>

        <p class="field">
          <input type="date" name="dob" id="dob" required value="<?php echo $edit_row['dob']?>">
          <label for dob>Date of Birth</label>
        </p>

        

        <p class="field">
          <input type="text" name="contact_no" id="phn" value="<?php echo $edit_row['contact_no']?>" placeholder="+91">
          <label for phn>Contact No</label>
        </p>

        <p class="field">
          <input type="text" name="mail_id" id="mail" value="<?php echo $edit_row['mail_id']?>" placeholder="@gmail.com" required>
          <label for mail>Mail Id</label>
        </p>

        <p class="field">
          <input type="password" name="password" id="pswd" placeholder="***********" required>
          <label for pswd>Password</label>
        </p>

        <p class="field">
          <input type="password" name="repassword" id="repswd" placeholder="***********" required>
          <label for pswd>Re-enter Password</label>
        </p>

        <p class="gender">
          <input type="radio" name="gender" id="gender" value="Male" required>Male
          <input type="radio" name="gender" id="gender" value="Female" required>Female
        </p>

        <p class="sub">
          <input type="submit" name="sub" id="sub" value="Save" >
          
        </p>

      </form>
        
    </div>
</body>
</html>