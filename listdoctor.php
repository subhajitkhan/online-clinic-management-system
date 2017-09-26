<?php

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
	

	if(isset($_POST['search']) )
  {
    $ami=$_POST['searchtext'];
    $sqlval="SELECT * FROM doc_registration where doc_name='$ami' or  doc_dept='$ami' or doc_qualification='$ami' ";
    $result_doc=mysql_query($sqlval);


  }
  else
  {
  	$sql_doc="SELECT * FROM doc_registration";
	$result_doc=mysql_query($sql_doc);
  }




?>


<!DOCTYPE html>
<html>
<head>
	<title>doctor list</title>
	<link rel="stylesheet" type="text/css" href="homestyle.css">
	<link rel="stylesheet" type="text/css" href="subha.css">
	<link rel="stylesheet" type="text/css" href="patienthomestyle.css">
	<script type='text/javascript'>
	function search(){
		
		btn=document.getElementById('topsearch');
		
		stext=btn.value;
		nurl="https://www.google.co.in/#q="+stext+"&*";
		window.location=nurl;
	}
	</script>
</head>
<body>

<div class="containertop">
 	<div class="wrapper"> 
		<div id="topright">
	    <h4>Contact Us:</h4> onecaremedicalclinic@gmail.com<br>
		 033-244268/235263/345654<br>
		<form>
			<input id="topsearch" type="text" name="toptext" >
			<input id="topbtn" type="button" name="topbutton" value="Search" onclick='search();'>
		</form>

		<br> <a id="makeapp" href="patientregistration.php"><strong>Get Appointment</strong></a>

		</div>



		<div id="topleft">
		<img src="OneCareLogo.jpg">
			
		</div>
	</div> 
</div>

<div class="menubar"> 
	 <div class="wrapper">
		<ul>
			<li><a href="home.html">Home</a></li>
			<li><a href="aboutus.html">About Us</a></li>
			<li><a>Members<span><img src="arrow-down.jpg"></a>
				<ul>
					<li><a>Doctors </a>
					 <ul>
						<li><a href="doctorregistration.php">Sign Up</a></li>
						<li><a href="doctorlogin.php">Sign In</a></li>
					 </ul>	
					</li>

					 

					<li><a>Admin</a>
					  <ul>
						<li><a href="adminregistration.php">Sign Up</a></li>
						<li><a href="adminlogin.php">Sign In</a></li>
					  </ul>
					</li>

				</ul>

			</li>
			<li><a>Specialities <span><img src="arrow-down.jpg"></span></a>
				<ul>
					<li><a href="generalmedicine.html">General Physician</a></li>
					<li><a href="cardialogy.html">Cardiology</a></li>
					<li><a href="dentistry.html">Dentistry</a></li>
					<li><a href="dermatology.html">Dermatology</a></li>
					<li><a href="ent.html">ENT</a></li>
					<li><a href="endocrinology.html">Endocrinology</a></li>
					<li><a href="nephrology.html">Nephrology</a></li>
					
					<li><a href="neurology.html">Neurology</a></li>
					<li><a href="gasentrology.html">Gastroenterology</a></li>
					<li><a href="opthalmology.html">Opthalmology</a></li>
					<li><a href="gynaecology.html">Gynaecology</a></li>
					<li><a href="paediatrics.html">Paediatrics</a></li>
					
				</ul>
			</li>	
			<li><a>Services <span><img src="arrow-down.jpg"></span></a>
			    <ul>
					<li><a href="clinical.html">Clinical Services</a></li>
					<li><a href="bloodbank.html">Blood bank</a></li>
					<li><a href="pharma.html">Pharmacy</a></li>
					<li><a href="emergency.html">Emergency Services</a></li>
					<li><a href="labservices.html">Laboratory Services</a></li>
					<li><a href="support.html">Support Services</a></li>
					
				</ul>
			</li>
			<li><a href="help.html">Help</a></li>
			
		</ul>
	</div>
	
</div> 






<br></br>


<form method="POST">
  <div style="height: 200px;width: 700px;background-color: #bdc3c7;margin: auto; "><br>
    <label style="font-size: 20px;margin-left: 210px;color: red; ">Enter doctor name OR department </label>
    <br></br><br>
    <label style="font-size: 22px;margin-left: 140px;color: #050559 "> Enter here :</label> <input style="font-size: 20px; " type="text" name="searchtext" required/><br>
    <br></br>

    <p class="sub">
      <input style="margin-left:250px;  " type="submit" name="search" id="sub" value="Search" >         
       </p>
  
  </div>
</form>




<br>

<div style="height: 30px;width: 250px;font-size: 30px; margin: auto; " >
	List of Doctors.
</div>


<br>

 <table style="margin: auto;font-size: 20px; " width="1000" border="1" cellpadding="1" cellspacing="1">
 <tr style="background-color: #FFD104  ;color: red; ">

	<th>Doctor Name</th>
	<th>Department</th>
	<th>Specialization</th>
	<th>Email Id</th>

	 
</tr>
	
	<?php 
	while ($show_data=mysql_fetch_assoc($result_doc)) {
		echo "<tr>";

		
		echo "<td>".$show_data['doc_name']."</td>";
		echo "<td>".$show_data['doc_dept']."</td>";
		echo "<td>".$show_data['doc_qualification']."</td>";
		echo "<td>".$show_data['doc_mail']."</td>";
		

		echo "</tr>";


	}
	 ?>


</table>

<br></br>






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