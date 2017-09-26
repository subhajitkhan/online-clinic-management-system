<?php
  session_start();

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['patmail'];
  
  $sql_patid="SELECT pat_id FROM pat_registration WHERE pat_mail='$sos' ";
  $result_patid=mysql_query($sql_patid);
  $obj_patid=mysql_fetch_object($result_patid);      
  $patid=$obj_patid->pat_id;


  $sql="SELECT * FROM appointment where pat_id='$patid' ";
  $result=mysql_query($sql);

 $today=date("Y/m/d");



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
  <h2 id="head" style="font-size: 30px; ">View your appointment details  <?php echo $obj->pat_name; ?> </h2>
</div>

<br></br>





<table style="margin-left: 80px;font-size: 20px;" width="1200"  border="1" cellpadding="1" cellspacing="1">
<tr style="background-color: #FFD104  ;color: red; ">
	<th>Appointment Id</th>
	<th>Doctor Name</th>
	<th>Doctor Id</th>
	<th>Department</th>
	<th>Visit Date</th>
	<th>Day</th>
	<th>Visit Time</th> 
  <th>Status</th>

</tr>
	
	<?php 
	while ($show_data=mysql_fetch_assoc($result)) {
  ?>

		<tr>

    		<td><?php echo $show_data['appid']?></td> 
         
        <td><?php echo $show_data['doc_name']?></td> 
        <td><?php echo $show_data['doc_id']?></td> 
        <td><?php echo $show_data['dept']?></td> 
        <td><?php echo $show_data['app_date']?></td> 
        <td><?php echo $show_data['day']?></td> 
        <td><?php echo $show_data['app_time']?></td> 

      <?php
        if(strtotime($show_data['app_date']) < strtotime($today))
          {
      ?>

            <td><button style="background-color:red;color: white;" >Visited</button></td>
      <?php
          }
      else{
      ?>  
            <td> <a href="patapp.php"> <button style="background-color:green;color: white; ">Not Visited</button></a></td> 
      <?php       
         }

      ?>




		</tr>

  <?php
	 }
  ?>


</table>

  <!-- <br><br>
<label style="margin-left: 420px;color: red;font-size: 18px; ">Note: You can not Edit the appointment that you have already visited</label>-->




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
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="cpyryts.html">Privacy Policy</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="faq.html">FAQ</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="sitemap.html">Site Map</a> </p><br>
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