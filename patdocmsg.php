<?php
session_start();

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['patmail'];
  //$sql_pat="SELECT * FROM pat_registration where pat_mail= '$sos' ";
  //$result_pat=mysql_query($sql_pat);

  $sql_patid="SELECT pat_id,pat_name FROM pat_registration where pat_mail='$sos' ";
  $result_patid=mysql_query($sql_patid);
  $obj_patid=mysql_fetch_object($result_patid);      
  $patid= $obj_patid->pat_id;
  $patname= $obj_patid->pat_name;


  $sql_patmsg="SELECT doc_name,doc_id,advice,senddate FROM chat WHERE pat_id='$patid' AND advice <>''  ";
  $result_patmsg=mysql_query($sql_patmsg);


  if(isset($_POST) & !empty($_POST))
  {
    $docid = $_POST['docid'];
    $query = $_POST['query'];

    $sql_docname="SELECT doc_name FROM doc_registration WHERE doc_id='$docid' ";
    $result_docname=mysql_query($sql_docname);
    $obj_docname=mysql_fetch_object($result_docname);      
    $docname=$obj_docname->doc_name;


    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d H:i:s');


    $sql_query="INSERT INTO  chat (doc_id,doc_name,pat_id,pat_name,question,senddate)  VALUES('$docid','$docname','$patid','$patname','$query','$date') " ;
    $result_query = mysql_query($sql_query);

  }


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



<br>


<div style="color: #09AD3D ;  ">
  <h2 id="head">Here some advice from your doctors, <?php echo $obj->pat_name; ?> </h2>
</div>



<br></br>
<table style="margin-left: 80px;font-size: 20px;" width="1200"  border="1" cellpadding="1" cellspacing="1">
<tr style="background-color: #FFD104  ;color: red; ">
 
  <th>Doctor Name</th>
  <th>Doctor Id</th>
  <th>Advice from your doctorts</th>
  <th>Send date</th>

</tr>
  
  <?php 
  while ($show_data=mysql_fetch_assoc($result_patmsg)) {
    echo "<tr>";

    //echo "<td>".$show_data['appid']."</td>"; 
    echo "<td>".$show_data['doc_name']."</td>";
    echo "<td>".$show_data['doc_id']."</td>";
   // echo "<td>".$show_data['dept']."</td>";
    echo "<td>".$show_data['advice']."</td>";
    echo "<td>".$show_data['senddate']."</td>";

    echo "</tr>";


  }
   ?>


</table>

<br></br>

<div style="color: #09AD3D ;">
  <h2 id="head">Do you want to chat with your doctors ? <?php echo $obj->pat_name; ?> </h2>
</div>

<br></br>

<form method="POST">
  <div style="height: 300px;width: 700px;background-color: #bdc3c7;margin: auto; "><br>
    <label style="font-size: 20px;margin-left: 130px;color: red; ">Enter the doctor Id to whom you want to ask your Query</label>
    <br></br><br>
    <label style="font-size: 22px;margin-left: 100px;color: #050559 ;"> Doctor Id :</label> <input style="font-size: 20px; " type="text" name="docid" required/><br><br>

    <label style="font-size: 22px;margin-left: 100px;color: #050559 ;">Area to jot down your Query </label> <textarea name="query"></textarea><br>

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