<?php
session_start();

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['docmail'];


  $sql_docid="SELECT doc_id ,doc_name FROM doc_registration WHERE doc_mail='$sos' ";
  $result_docid=mysql_query($sql_docid);
  $obj_docid=mysql_fetch_object($result_docid);      
  $docid=$obj_docid->doc_id;
  $docname=$obj_docid->doc_name;




  $sql_patmsg="SELECT pat_name,pat_id,question,senddate FROM chat WHERE doc_id='$docid' AND question <>''  ";
  $result_patmsg=mysql_query($sql_patmsg);


  if(isset($_POST) & !empty($_POST))
  {
		$patid = $_POST['patid'];
		$advice = $_POST['advice'];
		


    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');


    $sql_patname="SELECT pat_name FROM pat_registration WHERE pat_id='$patid' ";
    $result_patname=mysql_query($sql_patname);
    $obj_patname=mysql_fetch_object($result_patname);      
    $patname=$obj_patname->pat_name;


		$sql_advice="INSERT INTO  chat (doc_id,doc_name,pat_id,pat_name,advice,senddate)  VALUES('$docid','$docname','$patid','$patname','$advice','$date') " ;
		$result_advice = mysql_query($sql_advice);


  }




	
?>





<!DOCTYPE html>
<html>
<head>
	<title><?php 

   $sql_name="SELECT doc_name FROM doc_registration where doc_mail='$sos' ";
   $result_name=mysql_query($sql_name);
   	$obj=mysql_fetch_object($result_name);
	echo $obj->doc_name; 
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
			<li><a href="doctorhome.php">Home</a></li>
            <li><a href="docdetails.php">My Details</a></li>
			<li><a href="docappointment.php">My Appoinments</a></li>
			<li><a href="docpat_details.php">Patient Details</a></li>
			<li><a href="docadvice.php">Add Description</a></li>
			<li><a href="patlogout.php">Logout</a></li>
		</ul>
	</div>
</div>	



<br>

<div style="color: #09AD3D ;">
  <h2 id="head">Here some Queries from your patients <?php echo $obj->doc_name; ?> </h2>
</div>


<br></br>
<table style="margin-left: 80px;font-size: 20px;" width="1200"  border="1" cellpadding="1" cellspacing="1">
<tr style="background-color: #FFD104  ;color: red; ">
 
  <th>Patient Name</th>
  <th>Patient Id</th>
  <th>Queries from your Patients</th>
  <th>Send date</th>

</tr>
  
  <?php 
  while ($show_data=mysql_fetch_assoc($result_patmsg)) {
    echo "<tr>";

    //echo "<td>".$show_data['appid']."</td>"; 
    echo "<td>".$show_data['pat_name']."</td>";
    echo "<td>".$show_data['pat_id']."</td>";
   // echo "<td>".$show_data['dept']."</td>";
    echo "<td>".$show_data['question']."</td>";
    echo "<td>".$show_data['senddate']."</td>";
    
    echo "</tr>";


  }
   ?>


</table>



<br></br>


<div style="color: #09AD3D ;">
  <h2 id="head">Add some advice to your patient <?php echo $obj->doc_name; ?> </h2>
</div>
<br>
<form method="POST">
	<div style="height: 300px;width: 700px;background-color: #bdc3c7;margin: auto; "><br>
		<label style="font-size: 20px;margin-left: 170px;color: red; ">Enter the Patient  Id to send advice</label>
		<br></br><br>
		<label style="font-size: 22px;margin-left: 100px;color: #050559 ;"> Patient Id :</label> <input style="font-size: 20px; " type="text" name="patid" required/><br><br>

		<label style="font-size: 22px;margin-left: 100px;color: #050559 ;">Area to jot down your advice</label> <textarea name="advice"></textarea><br>

		<br></br><br>
		<p class="sub">
      <input style="margin-left:250px;  " type="submit" name="sub" id="sub" value="Send" >         
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