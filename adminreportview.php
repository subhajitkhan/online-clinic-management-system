<?php
session_start();

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['adminmail'];
 

  $result_doc=0;
  $result_dept=0;

     if(isset($_POST['docsub']) )
   {
      
      $fdate=$_POST['fdate'];
      $ldate=$_POST['ldate'];

      $sql_doc = "SELECT doc_registration.doc_id,doc_registration.doc_name,doc_registration.doc_dept, COUNT(appointment.appid) AS dd\n"
    . "FROM doc_registration LEFT JOIN appointment \n"
    . "ON doc_registration.doc_id=appointment.doc_id\n"
    . "WHERE (appointment.app_date BETWEEN '$fdate' AND '$ldate')\n"
    . "GROUP BY doc_registration.doc_name\n"
    . "ORDER BY dd DESC";
          $result_doc=mysql_query($sql_doc);

    }
    
  
   elseif (isset($_POST['depsub'])) 
   {
        $deptf=$_POST['deptf'];
        $deptl=$_POST['deptl'];

        $sql_dept="SELECT  dept, COUNT(appid) as dd 
                   FROM appointment
                   WHERE (app_date BETWEEN '$deptf' AND '$deptl')
                   GROUP BY dept
                   ORDER BY COUNT(appid) DESC";
        $result_dept=mysql_query($sql_dept);
   }


    else
    {
          $sql_dept="SELECT  dept, COUNT(appid) as dd 
                 FROM appointment
                 GROUP BY dept
                 ORDER BY COUNT(appid) DESC";
          $result_dept=mysql_query($sql_dept);



          $sql_doc = "SELECT doc_registration.doc_id,doc_registration.doc_name,doc_registration.doc_dept, COUNT(appointment.appid) AS dd\n"
    . "FROM doc_registration LEFT JOIN appointment \n"
    . "ON doc_registration.doc_id=appointment.doc_id\n"
    . "GROUP BY doc_registration.doc_name\n"
    . "ORDER BY dd DESC";
      $result_doc=mysql_query($sql_doc);


    }

?>


<!DOCTYPE html>
<html>
<head>
  <title><?php 

   $sql_name="SELECT admin_name FROM admin_registration where mail_id='$sos' ";
   $result_name=mysql_query($sql_name);
    $obj=mysql_fetch_object($result_name);      
  echo $obj->admin_name; 
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
     <!-- <li><a href="adminhome.php">Home</a></li>-->
            <li><a href="admindetails.php">My Details</a></li>
      <li><a href="admindocview.php">View Doctor</a></li>
      <li><a href="adminappview.php">View Appointments</a></li>
      <li><a href="adminfeedbackview.php">View Feedback</a></li>
      <li><a href="adminreportview.php">View Reports</a></li>
      <li><a href="patlogout.php">Logout</a></li>
    </ul>
  </div>
</div>  


<br>

<div style="color: #09AD3D ;">
  <h2 id="head">Have a look on various reports <?php echo $obj->admin_name; ?> </h2>
</div>



<form method="POST">

<br></br>
<div  style="height: 200px;width: 700px;background-color: #bdc3c7;margin: auto; "><br>
<label style="margin-left: 100px;font-size: 25px;color: #1545DC; ">Doctors according to number of appointments</label> <br><br>
<input style="font-size: 15px;margin-left: 160px; " type="date" name="fdate"> To 
<input style="font-size: 15px; " type="date" name="ldate">&nbsp<br><br><br>
<input style="margin-left: 250px;background-color: #11A278;height: 40px;width: 150px;font-size: 25px;border-radius: 10px; " type="submit" name="docsub">
</div>
 
<table style="margin-left: 270px;font-size: 20px;" width="800"  border="1" cellpadding="1" cellspacing="1">
<tr style="background-color: #FFD104  ;color: red; ">
  
  <th>Doctor Id</th>
  <th>Doctor Name</th>
  <th>Department</th>
  <th>No. of Appointments</th>
  

</tr>

   <?php 
   if ($result_doc) {
    
  
  while ($show_data=mysql_fetch_assoc($result_doc)) {
    echo "<tr>";

    echo "<td>".$show_data['doc_id']."</td>";
    echo "<td>".$show_data['doc_name']."</td>";
    echo "<td>".$show_data['doc_dept']."</td>";
    echo "<td align=center>".$show_data['dd']."</td>";

    echo "</tr>";

}
  }
   ?>

</table>


<br></br><br></br>

<div  style="height: 200px;width: 700px;background-color: #bdc3c7;margin: auto; "><br>
  <label style="margin-left: 100px;font-size: 25px;color: #1545DC; ">Departments according to the number of appointment</label>
  <br> <br>
  <input style="font-size: 15px;margin-left: 160px; " type="date" name="deptf"> To 
  <input style="font-size: 15px; " type="date" name="deptl">&nbsp<br><br><br>
  <input style="margin-left: 250px;background-color: #11A278;height: 40px;width: 150px;font-size: 25px;border-radius: 10px; " type="submit" name="depsub">
  <br><br>
</div>


<table style="margin-left: 370px;font-size: 20px;" width="600"  border="1" cellpadding="1" cellspacing="1">
<tr style="background-color: #FFD104  ;color: red; ">
  
  
  <th>Department</th>
  <th>No. of Appointments</th>
  

</tr>

   <?php 
   if ($result_dept)
    {
     

  while ($show_data=mysql_fetch_assoc($result_dept)) {
    echo "<tr>";

    //echo "<td>".$show_data['doc_id']."</td>";
    //echo "<td>".$show_data['doc_name']."</td>";
    echo "<td>".$show_data['dept']."</td>";
    echo "<td align=center>".$show_data['dd']."</td>";

    echo "</tr>";


  }

}
   ?>

</table>









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
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="faqs.html">FAQ</a> </p><br>
        <p><a style="color: #fff;text-decoration: none;font-family: arial, helvetica;font-size: 15px; " href="https://www.google.co.in/maps/place/St.+Thomas'+College+of+Engineering+and+Technology/@22.5387879,88.3267527,17z/data=!3m1!4b1!4m5!3m4!1s0x3a02775de26c3dfd:0xd7255ce261457bec!8m2!3d22.5387879!4d88.3289414">Map's & Direction's</a> </p><br>
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