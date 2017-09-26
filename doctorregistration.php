<?php 
  require_once('connect.php');
  if(isset($_POST) & !empty($_POST))
  {
    $doc_name= $_POST['doc_name'];
    $doc_address=$_POST['doc_address'];
    $doc_dob=$_POST['doc_dob'];
    $doc_qualification=$_POST['doc_qualification'];
    $doc_dept=$_POST['doc_dept'];
    $doc_phn=$_POST['doc_phn'];
    $doc_mail=$_POST['doc_mail'];
    $doc_pswd=$_POST['doc_pswd'];
    $doc_repswd=$_POST['doc_repswd'];
    $doc_gender=$_POST['doc_gender'];

    $doc_day1=$_POST['day1'];
    $doc_timeslot1=$_POST['timeslot1'];
    $doc_day2=$_POST['day2'];
    $doc_timeslot2=$_POST['timeslot2'];
    $doc_day3=$_POST['day3'];
    $doc_timeslot3=$_POST['timeslot3'];


    $check_mail="SELECT * from doc_registration where doc_mail='$doc_mail' " ;
    $result_mail=mysqli_query($connection,$check_mail);
    $num_row=mysqli_num_rows($result_mail);


     if ($num_row) 
   {
    echo '<script language="javascript">';
    echo 'alert("Email id already registered.Put unique Email id.")';
    echo '</script>';
   }


   else{

          if($doc_pswd==$doc_repswd)
          {
              $sql="INSERT INTO doc_registration (doc_name,doc_address,doc_dob,doc_qualification,doc_dept,doc_phn,doc_mail,doc_pswd,doc_gender,day1,timeslot1,day2,timeslot2,day3,timeslot3) VALUES ('$doc_name','$doc_address','$doc_dob','$doc_qualification','$doc_dept','$doc_phn','$doc_mail', '$doc_pswd','$doc_gender','$doc_day1','$doc_timeslot1','$doc_day2','$doc_timeslot2','$doc_day3','$doc_timeslot3')" ;
                $result = mysqli_query($connection,$sql);
                  if($result)
                    {
                        session_start();
                        $_SESSION['docmail'] = $doc_mail;
                        header("Location:doctorhome.php");
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
    <title>doctor registraion</title>
    <link rel="stylesheet" type="text/css" href="doctorregistrationstyle.css">
</head>
<body style="background-image: url(kk.jpg)  ;
  background-size: cover;">
    <div style="width: 850px; margin-left: 450px; " class="doctor_wrapper">
      <h2 id="head">Doctor Registration</h2>

      <form class="doctor_form" method="POST">
        <p class="field">
          <label style="margin-left: 20px; " for name>Name</label>
          <input style="width: 600px;margin-left: 50px; " type="text" name="doc_name" id="name" placeholder="Enter your name" required>
        </p>

        <p class="field">
          <label style="margin-left: 20px; " for address>Address</label>
          <input style="width: 600px; " type="text" name="doc_address" id="address" placeholder="Enter your address" required>
          
        </p>

        <p class="field">
          <label style="margin-left: 20px; " for dob>Date of Birth</label>
          <input type="date" name="doc_dob" id="dob" required >
          

          <input style="width: 30px; " type="radio" name="doc_gender" id="gender" value="Male" required>Male
          <input style="width: 30px; "  type="radio" name="doc_gender" id="gender" value="Female">Female
      

        </p>

        <p class="field">
          <label style="margin-left: 20px; " for qualification>Qualification</label>
          <input style="width: 200px; " type="text" name="doc_qualification" id="qualification" placeholder="Enter your highest qualification" required>
          
        

        <label style="margin-left: 20px; " for docdept>Department</label>
          <select  style="height: 30px ; width: 200px; " name="doc_dept" id="doc_dept" required>
            <option selected="selected">select a department</option>
            <option value='General Physician'>General Physician</option>
            <option value='Cardiology'>Cardiology</option>
            <option value='Dentistry'>Dentistry</option>
            <option value='Dermatology'>Dermatology</option>
            <option value='ENT'>ENT</option>
            <option value='Endocrinology'>Endocrinology</option>
            <option value='Nephrology'>Nephrology</option>
            <option value='Neurology'>Neurology</option>
            <option value='Gastroenterology'>Gastroenterology</option>
            <option value='Opthalmology'>Opthalmology</option>
            <option value='Gynaecology'>Gynaecology</option>
            <option value='Paediatrics'>Paediatrics</option>
          </select>
          
        </p>

        <p class="field">
          <label style="margin-left: 20px; " for phn>Contact No</label>
          <input style="width: 200px; " type="text" name="doc_phn" id="phn" placeholder="+91" required>
          
        
          <label style="margin-left: 20px; " for mail>Mail Id</label>
          <input type="email" name="doc_mail" id="mail" placeholder="abc@gmail.com" required>
          
        </p>

        <p style="margin-left: 280px;color: #FF5733; ">Enter Your Visit Details:</p>

        <p class ="field">
          <label style="margin-left: 20px; " for day1>Day 1</label>
          <select  style="height: 30px ; width: 150px; " name="day1">
            <option selected="selected">first day of visit</option>
            <option value='Monday'>Monday</option>
            <option value='Tuesday'>Tuesday</option>
            <option value='Wednesday'>Wednesday</option>
            <option value='Thursday'>Thrusday</option>
            <option value='Friday'>Friday</option>
            <option value='Saturday'>Saturday</option>
            
          </select>
        


          <label style="margin-left: 20px; " for day1>Day 2</label>
          <select  style="height: 30px ; width: 150px; " name="day2" >
            <option selected="selected">second day of visit</option>
            <option value='Monday'>Monday</option>
            <option value='Tuesday'>Tuesday</option>
            <option value='Wednesday'>Wednesday</option>
            <option value='Thursday'>Thrusday</option>
            <option value='Friday'>Friday</option>
            <option value='Saturday'>Saturday</option>
            
          </select>
        
      
          <label style="margin-left: 20px; " for day1>Day 3</label>
          <select  style="height: 30px ; width: 150px; " name="day3" >
            <option selected="selected">third day of visit</option>
            <option value='Monday'>Monday</option>
            <option value='Tuesday'>Tuesday</option>
            <option value='Wednesday'>Wednesday</option>
            <option value='Thursday'>Thrusday</option>
            <option value='Friday'>Friday</option>
            <option value='Saturday'>Saturday</option>
            
          </select>
        </p>

        <p class ="field">
          <label style="margin-left: 20px; " for day1>TIME</label>
          <select  style="height: 30px ; width: 150px; " name="timeslot1" >
            <option selected="selected">Time of visit</option>
            <option value='10:30-13:30'>10:30-13:30</option>
            <option value='13:30-16:30'>13:30-16:30</option>
            <option value='16:30-19:30'>16:30-19:30</option>
            
            
          </select>

          <label style="margin-left: 20px; " for day2>TIME</label>
          <select  style="height: 30px ; width: 150px; " name="timeslot2" >
            <option selected="selected">Time of visit</option>
            <option value='10:30-13:30'>10:30-13:30</option>
            <option value='13:30-16:30'>13:30-16:30</option>
            <option value='16:30-19:30'>16:30-19:30</option>
            
          </select>

          <label style="margin-left: 20px; " for day3>TIME</label>
          <select  style="height: 30px ; width: 150px; " name="timeslot3" >
            <option selected="selected">Time of visit</option>
            <option value='10:30-13:30'>10:30-13:30</option>
            <option value='13:30-16:30'>13:30-16:30</option>
            <option value='16:30-19:30'>16:30-19:30</option>
            
            
          </select>

       </p>







        <p class="field">
          <label style="margin-left: 20px; " for pswd>Enter Password</label>
          <input style="width: 170px; " type="password" name="doc_pswd" id="pswd" placeholder="***********">


          <label style="margin-left: 20px; " for repswd>Re-enter Password</label>
          <input style="width: 170px; " type="password" name="doc_repswd" id="repswd" placeholder="***********">
          
        </p>

       
        <br>

        <p style="margin-left: 180px; " class="sub">
          <input  type="submit" name="sub" id="sub" value="Register Now" >
          
        </p>

      </form>
        

    </div>

    <br></br>
</body>
</html>