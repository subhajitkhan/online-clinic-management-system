<?php
session_start();

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['patmail'];
  $docid=$_SESSION['docid'];
  $doctor_name=$_SESSION['selected_doctor'];

  $doc_dept=$_SESSION['doc_dept'];

  $sql_patid="SELECT pat_id FROM pat_registration WHERE pat_mail='$sos' ";
  $result_patid=mysql_query($sql_patid);
  $obj_patid=mysql_fetch_object($result_patid);      
  $patid=$obj_patid->pat_id;



  $sql_day="SELECT day1,day2,day3,timeslot1,timeslot2,timeslot3,doc_fee FROM doc_registration WHERE doc_id='$docid'  ";
  $result_day=mysql_query($sql_day);
  $obj_day=mysql_fetch_object($result_day);      
  $day1=$obj_day->day1;


  $day2=$obj_day->day2;
  $day3=$obj_day->day3;

 	$timeslot1=$obj_day->timeslot1;
  $timeslot2=$obj_day->timeslot2;
  $timeslot3=$obj_day->timeslot3;


  $fee=$obj_day->doc_fee;


  $sql_name="SELECT pat_name FROM pat_registration where pat_mail='$sos' ";
  $result_name=mysql_query($sql_name);
  $obj=mysql_fetch_object($result_name);      
  $patname= $obj->pat_name;






if(isset($_POST) & !empty($_POST))
{
    $appday= $_POST['day'];
    $apptime= $_POST['time'];
    $appdate= $_POST['appdate'];


    $date = DateTime::createFromFormat("Y-m-d", $appdate);
    $calday= $date->format("l");

   
    if($appday==$calday)
    {
          $sql_date="SELECT * FROM appointment WHERE pat_id='$patid' AND app_date='$appdate' AND doc_id='$docid' " ;
          $result_date=mysql_query($sql_date);
          $row_date=mysql_num_rows($result_date);


          if($row_date > 0)
          {
            echo '<script language="javascript">';
             echo 'alert("You have already taken an appointment to the same Doctor on this date .")';
             echo '</script>';
          }



          else{
            
                $sql_count="SELECT COUNT(appid) AS dd
                              FROM appointment 
                              WHERE doc_id='$docid' AND app_date='$appdate' ";
                $result_count= mysql_query($sql_count);
                $obj_count=mysql_fetch_object($result_count);      
                $countdd= $obj_count->dd;
                       


                        if ($countdd < 6)
                         {
                          $sql_app="INSERT INTO appointment(doc_id,doc_name,dept,pat_id,pat_name,day,app_date,app_time) VALUES ('$docid','$doctor_name','$doc_dept','$patid','$patname','$appday','$appdate','$apptime') " ;
                          $result_app=mysql_query($sql_app);

                           ?>
                                <script type="text/javascript">
                                alert("Appointment time is fixed.Proceed to pay.");
                                window.location.href = "patpay.php";
                                </script>  
                          <?php 
                            
                         }

                        else {
                           ?>
                                <script type="text/javascript">
                                alert("Please choose another date.This date is filled up.");
                                window.location.href = "patappointtime.php";
                                </script>  
                          <?php
                         } 
                }
    }
    else
      {
        echo '<script language="javascript">';
        echo 'alert("You have chosen wrong Date.Please choose correct Date according to your selected Day.")';
        echo '</script>';
      }  

} // first IF.  (if(isset($_POST) & !empty($_POST)))
   
?>






<!DOCTYPE html>
<html>
<head>
  <title><?php 

   $sql_name="SELECT pat_name FROM pat_registration where pat_mail='$sos' ";
   $result_name=mysql_query($sql_name);
    $obj=mysql_fetch_object($result_name);      
  echo $obj->pat_name; 
  ?>
    
  </title>
  <link rel="stylesheet" type="text/css" href="patienthomestyle.css">


</head>
<body>

<div class="containertop">
  <div class="wrapper"> 
    <div id="topright">
      <h4>Contact Us:</h4> onecaremedicalclinic@gmail.com<br>
     033-244268/235263/345654<br>
    <form>
      <input id="topsearch" type="text" name="toptext">
      <input id="topbtn" type="button" name="topbutton" value="Search">
    </form>

    <!--<br> <a id="makeapp" href="patientregistration.php"><strong>Get Appointment</strong></a>-->

    </div>



    <div id="topleft">
    <img src="OneCareLogo.jpg">
      
    </div>
  </div> 
</div>


<div class="menubar"> 
   <div class="wrapper">
    <ul>
      <li><a href="patienthome.php">Home</a></li>
      <li><a href="patdetails.php">My Details</a></li>
      <li><a href="patapp.php">Make Appoinment</a></li>
      <li><a href="patappview.php">View Booking</a></li>
      <li><a href="patappcancel.php">Cancel Booking</a></li>
      
      <li><a href="patlogout.php">Logout</a></li>
    </ul>
  </div>
</div> 

<br></br>

<div style="color: #09AD3D ;">
  <h2 id="head" style="font-size: 30px; ">Select date and time <?php echo $obj->pat_name; ?> </h2>
</div>



<br>

<form method="POST">
<div style="width: 1200px;height: 700px;background-color: #ecf0f1;margin: auto;  "><br></br>
  <div <div style="width: 1000px;height: 400px; margin-left: 80px; font-size: 21px;color: #050559; ">

      <div style="height: 170px;width: 600px;float: left; ">
	    <label style="color: #0316FC;"> Patient Name :- &nbsp &nbsp</label><?php echo  $obj->pat_name . str_repeat('&nbsp;', 20);?>
      <br></br>
      <label style="color: #0316FC;"> Doctor Name :-  &nbsp &nbsp </label> <?php echo $doctor_name . str_repeat('&nbsp;', 20); ?>
      <br></br>
      <label style="color: #0316FC;">Selected Department :- &nbsp &nbsp  </label><?php echo $doc_dept; ?> 
      </div>


      <div style="height: 170px;width: 400px;float: right; ">
      <label style="color: #0316FC;">Patient ID :- &nbsp &nbsp  </label>  <?php echo $patid ; ?>  <br> </br>  
      <label style="color: #0316FC;">Doctor ID :-  &nbsp &nbsp  </label>  <?php echo $docid ; ?> <br> </br>
      <label style="color: #0316FC;">Doctor Fees :-  &nbsp &nbsp  </label>  <?php echo $fee; ?>  
      </div>
    
  
     <marquee behavior= "alternate"><label style="font-size: 25px;color: red; " >Available Day and Time for <?php echo $doctor_name; ?> </label></marquee><br></br>


    <div style="height: 100px;width: 325px;float: left;background-color: #FFD104;border-radius: 10px;margin: 2px; ">
    		<input style="height:15px;width: 15px;margin-left: 20px;margin-top: 15px; " type="radio" name="day" value="<?php echo $day1; ?>" /><label style="color: red;">First Day :-&nbsp</label>    <?php echo $day1  ; ?><br></br>
        <input style="height:15px;width: 15px;margin-left: 20px; " type="radio" name="time" value="<?php echo  $timeslot1; ?>" /><lable style="color: red;">Timeslot :-&nbsp</lable>    <?php echo  $timeslot1; ?>  
    </div>

    <div style="height: 100px;width: 325px;float: left;background-color: #FFD104;border-radius: 10px;margin: 2px; ">
        <input style="height:15px;width: 15px;margin-left: 20px;margin-top: 15px; " type="radio" name="day"  value="<?php echo  $day2; ?>" /><label style="color: red;">Second Day :-&nbsp </label>   <?php echo  $day2 ;?><br></br>
        <input style="height:15px;width: 15px;margin-left: 20px; " type="radio" name="time" value="<?php echo  $timeslot2; ?>" /><lable style="color: red;">Timeslot :-&nbsp </lable>    <?php echo  $timeslot2; ?>  
    </div>

    <div style="height: 100px;width: 325px;float: left;background-color: #FFD104;border-radius: 10px;margin: 2px; ">
        <input style="height:15px;width: 15px;margin-left: 20px;margin-top: 15px; " type="radio" name="day" required value="<?php echo  $day3; ?>" /><label style="color: red;">Third Day :-&nbsp</label>   <?php echo  $day3 ;?> <br></br>
    		<input style="height:15px;width: 15px;margin-left: 20px; " type="radio" name="time" required value="<?php echo  $timeslot3; ?>" /><lable style="color: red;">Timeslot :-&nbsp</lable>    <?php echo  $timeslot3; ?>  
    </div>




  </div>

  
     <label style="font-size: 25px;color: #C70039;margin-left: 300px; ">Choose Your Preferable Date: &nbsp</label>
     <input style="font-size: 25px; " type="date" min="<?php echo date("Y-m-d"); ?>"  max="<?php echo date('Y-m-d', strtotime("+30 days")); ?>" name="appdate"> 

     <br><br>
     <label style="font-size: 17px;color:#0724F9 ;margin-left: 400px; ">Please choose date according to your selected day.</label>

<br></br><br></br>
      <p class="sub">
      <input style="margin-left:480px;  " type="submit" name="sub" id="sub" value="Check for Availability" >         
       </p>


</div>
</form>







<footer style="height: 300px;width: 100%;background-color: #35342F;margin-top: 100px; ">
  <div style="height: 240px;width: 100%; " ><br>
    <div style="height: 200px;width: 1200px;margin-left: 60px;  ">
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 20px;color: #F1BF04; ">Quick Navigation</p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="aboutus.html">About Us</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="patientregistration.php">Make Appointment</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="help.html">Contact Us</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="feedback.php">Feedback</a> </p>

      </div>
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 20px;color: #F1BF04; ">Related Links</p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="https://www.aiimsexams.org/">AIIMS</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="http://www.cmch-vellore.edu/">CMC Vellore</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="http://www.allindiadrug.in/">All India Drug Supply Co.</a> </p>
      </div>
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 21px;color: #F1BF04; ">One Care Medical Clinic</p><br>
        <p style="color: #fff;font-size: 15px;font-family: arial, helvetica; ">8B Gangadhar Benerjee lane,<br>25 Pally,Diamond Harbour Road,<br>Kolkata-700023<br>West Bengal. <br><br>onecaremedicalclinic@gmail.com<br>033-244268 / 235263 / 345654</p>

        
      </div>
      <div style="height: 200px;width: 300px;float: left; ">
        <p style="font-size: 20px;color: #F1BF04; ">Other Links</p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="###">Privacy Policy</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="####">FAQ</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="####">Site Map</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="developers.html">Developers</a> </p>
        
      </div>

    </div>

  </div>

  <div style="height: 60px;width: 100%;background-color: #0F0D03; " >
      <div style="margin-left: 20px; " >
      <p style="color: #fff;font-size: 13px;font-family: arial, helvetica; "> Copyright &copy; 2017 One Care Medical Clinic. &nbsp &nbsp All Rights Reserved</p>
      </div>

    <div style="margin-left: 950px; ">
      <a href="https://www.facebook.com/subhajit.khan.56"><img src="fb.png" width="30" height="30" title="facebook"></a>&nbsp &nbsp
      <a href="https://in.pinterest.com/subhajitkhan888/"><img src="pin.png" width="30" height="30" title="pinterest" ></a>&nbsp &nbsp
      <a href="https://www.twitter.com"><img src="tw.png" width="30" height="30" title="twitter"></a>&nbsp&nbsp
      <a href="https://www.youtube.com/channel/UCtvqyS3QCllWovcDYqRdnFw"><img src="ytb.png" width="30" height="30" title="youtube"></a>&nbsp&nbsp
      <a href="https://www.linkedin.com/in/subhajit-khan-b0838a119/"><img src="lnk.png" width="30" height="30" title="linkedin"></a>&nbsp&nbsp
      <a href="https://www.instagram.com"><img src="ins.jpg" width="30" height="30" title="instagram"></a>
    </div>
  </div>
</footer>



</body>
</html>
