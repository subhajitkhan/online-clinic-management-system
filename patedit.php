<?php 
   session_start();
  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['patmail'];
  $sql_doc="SELECT * FROM pat_registration where pat_mail= '$sos' ";
  $result_pat=mysql_query($sql_doc);
  $edit_row=mysql_fetch_array($result_pat);


   $sql_id="SELECT pat_id FROM pat_registration where pat_mail='$sos' ";
   $result_pointer=mysql_query($sql_id);
   $result_obj=mysql_fetch_object($result_pointer);
   $result_id=$result_obj->pat_id;


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

    /* $count_sql="SELECT COUNT(pat_id) FROM pat_registration";
        $id_result = mysqli_query($connection,$count_sql);
        ++$id_result;
        $pat_id='p00' . $id_result;*/


          


        if($pat_pswd==$pat_repswd)
        {
            $update_sql="UPDATE  pat_registration SET  pat_name='$pat_name',pat_address='$pat_address',pat_dob='$pat_dob',pat_phn='$pat_phn',pat_mail='$pat_mail', pat_pswd='$pat_pswd',pat_gender='$pat_gender' WHERE pat_id='$result_id' " ;         
              $result = mysql_query($update_sql);
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
        
  

?>





<!DOCTYPE html>
<html>
<head>
    <title>patient registraion</title>
    <link rel="stylesheet" type="text/css" href="patientregistrationstyle.css">
</head>
<body>
    <div class="pat_wrapper">
      <h2 id="head">Edit your details</h2>

      <form class="pat_form" method="POST">
        <p class="field">
          <input type="text" name="pat_name" id="name" value="<?php echo $edit_row['pat_name']?>" placeholder="Enter your  name" required>
          <label for fname>Patient Name</label>
        </p>

        <p class="field">
          <input type="text" name="pat_address" id="address" value="<?php echo $edit_row['pat_address']?>" placeholder="Enter your address" required>
          <label for lname>Address</label>
        </p>

        <p class="field">
          <input type="date" name="pat_dob" id="dob" required value="<?php echo $edit_row['pat_dob']?>">
          <label for dob>Date of Birth</label>
        </p>

        

        <p class="field">
          <input type="text" name="pat_phn" id="phn" value="<?php echo $edit_row['pat_phn']?>" placeholder="+91">
          <label for phn>Contact No</label>
        </p>

        <p class="field">
          <input type="text" name="pat_mail" id="mail" value="<?php echo $edit_row['pat_mail']?>" placeholder="@gmail.com" required>
          <label for mail>Mail Id</label>
        </p>

        <p class="field">
          <input type="password" name="pat_pswd" id="pswd" placeholder="***********" required>
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
          <input type="submit" name="sub" id="sub" value="Save" >
          
        </p>

      </form>
        
    </div>
</body>
</html>