<?php

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');

if(isset($_POST) & !empty($_POST))
  {
    $name= $_POST['name'];
    $phn=$_POST['phn'];
    $address=$_POST['address'];
    $msg=$_POST['message'];
    $env=$_POST['env'];
    $ward=$_POST['ward'];
    $doc=$_POST['doc'];
    $bil=$_POST['bil'];
    $enq=$_POST['enq'];
    $online=$_POST['online'];
    $overall=$_POST['overall'];

    $sql_feedback="INSERT INTO pat_feedback(name,phn,address,msg,env,ward,doc,bill,enq,online,overall) values('$name','$phn','$address','$msg','$env','$ward','$doc','$bil','$enq','$online','$overall')";
    $result=mysql_query($sql_feedback);


    echo '<script language="javascript">';
    echo 'alert("Thanks for your valuable feedback. ")';
    echo '</script>';

}
?>




<!DOCTYPE html>
<html>
<head>
	<title>feedback</title>
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
<!--<div style="height: 10px;width: 100%;background-color: #e9edf2; "></div>-->
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
						<!--<li><a href="adminregistration.php">Sign Up</a></li>-->
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





<div style="background-color: #7f8c8d;height: 1200px "><br></br>
	<div style="background-color: #FFFFFF;width: 1200px;height: 1100px;margin: auto; "><br></br>
		<div style="width: 1000px;height: 1000px;margin: auto;">
			<div style="color:blue;width: 800px;margin-left: 50px; ">
			<label style="margin-left: 250px;font-size: 30px; ">ONE CARE MEDICAL CLINIC</label><br>
			<label style="margin-left: 270px;">Daimond Harbour Road, Khiddirpur,Kolkata- 700023.</label><br>
			<label style="margin-left: 310px;"> Email-onecaremedicalclinic@gmail.com</label><br>
			<label style="margin-left: 330px;">Ph- 033-244268/235263/345654.</label>
			</div><br></br>

			<p>
			Dear Patient / Realtive / Visitor,<br></br>

			 Your continous suggestions & support helps to make our Hospital a better organization. Kindly spare a few moments to complete the following, so that we can strive to fulfill your expectations. 
			 <br></br>

			Warm Regards,<br>
			Director’s Office – One Care Medical Clinic, Kolkata.
			</p><br>


			<h2 style="margin-left: 300px;color: red; ">ONLINE &nbsp FEEDBACK &nbsp FORM</h2><hr><br>


			<form  method="POST">
           		<p style="font-size: 20px; ">
          		<label>Name</label>
          		<input style="width: 200px;margin-left: 20px;height: 25px;border:2px solid silver;border-radius: 5px; " type="text" name="name"  placeholder="Enter your name" required>
          		<label style="margin-left: 50px; " > Enter contact number</label>
          		<input style="width: 200px;margin-left: 10px;height: 25px;border-radius: 5px;border:2px solid silver; " type="text" name="phn"  placeholder="Enter contact no." required>
        		</p>
        		<br>

        		<p style="font-size: 20px; ">
         		<label >Address</label>
          		<input style="width: 500px;margin-left: 10px;height: 25px;border-radius: 5px;border:2px solid silver; " type="text" name="address" id="address" placeholder="Enter your address" required>
          
        		</p>
        		
        		<br><hr><br>

				<p><strong>Message</strong></p>
				<br>
				<textarea name="message" rows="8" cols="100" required></textarea><br />
				<br>
				<hr>
				<br>
				<p style="font-size: 20px; "><strong>My hospital stay at One care medical clinic was because of the following factors :</strong> </p>
				<br>
				
				<p><strong>The clinic environment is:</strong>
					&nbsp Good:<input type="radio" value="Good" name="env" required>
					&nbsp Average:<input type="radio" value="Average" name="env">
					&nbsp Poor:<input type="radio" value="Poor" name="env">
				</p>
				<br>
				<p><strong>The ward facilities are:</strong>
					&nbsp Good:<input type="radio" value="Good" name="ward" required>
					&nbsp Average:<input type="radio" value="Average" name="ward">
					&nbsp Poor:<input type="radio" value="Poor" name="ward">
				</p>
				<br>
				<p><strong>The service of attending doctors is:</strong>
					&nbsp Good:<input type="radio" value="Good" name="doc" required>
					&nbsp Average:<input type="radio" value="Average" name="doc">
					&nbsp Poor:<input type="radio" value="Poor" name="doc">
				</p>
				<br>
				<p><strong>The hospital billing is:</strong>
					&nbsp Good:<input type="radio" value="Good" name="bil" required>
					&nbsp Average:<input type="radio" value="Average" name="bil">
					&nbsp Poor:<input type="radio" value="Poor" name="bil">
				</p>
				<br>
				<p><strong>The reception/enquiry system is:</strong>
					&nbsp Good:<input type="radio" value="Good" name="enq" required>
					&nbsp Average:<input type="radio" value="Average" name="enq">
					&nbsp Poor:<input type="radio" value="Poor" name="enq">
				</p>
				<br>

				<p><strong>The online process is:</strong>
					&nbsp Good:<input type="radio" value="Good" name="online" required>
					&nbsp Average:<input type="radio" value="Average" name="online">
					&nbsp Poor:<input type="radio" value="Poor" name="online">
				</p>


				<br>
				<p><strong>The overall rating you give to us is:</strong>
					&nbsp Good:<input type="radio" value="Good" name="overall" required>
					&nbsp Average:<input type="radio" value="Average" name="overall">
					&nbsp Poor:<input type="radio" value="Poor" name="overall">
				</p>
					<br>
					
      

				<p><strong style="margin-left: 430px; ">THANK YOU</strong></p><br>

				<p class="sub">
      			<input style="margin-left:380px;  " type="submit" name="submit" id="sub" value="Submit" >         
      		    </p>

			</form>
	</div>
</div>

		












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