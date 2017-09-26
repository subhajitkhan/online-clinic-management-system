<?php
session_start();

  mysql_connect('localhost', 'root', '');
  mysql_select_db('project');
  $sos=$_SESSION['patmail'];
  $docid=$_SESSION['docid'];


  $sql_pay="SELECT doc_fee FROM doc_registration WHERE doc_id='$docid' ";
  $result_pay=mysql_query($sql_pay);
  $obj_pay=mysql_fetch_object($result_pay);
  $fee=$obj_pay->doc_fee;

 if(isset($_POST['pay']))
  {

  	?>
                    <script type="text/javascript">
                    alert("Appointment process is completed.");
                    window.location.href = "patappview.php";
                    </script>  
   <?php 

  }


?>




<!DOCTYPE html>
<html>
<head>
	<title>payment</title>
</head>
<body>


<form method="POST">

<div style="width: 1000px;height: 600px;background-color:#ecf0f1;margin: auto; "><br></br>
	<label style="margin-left: 200px;font-size: 20px;color: #C70039; ">Choose a Payment method:</label><br><br>
	<label style="margin-left: 250px;color: #1310D3;font-size: 17px; ">Credit Card : </label><input type="radio" name="card" required>  <label style="margin-left: 100px;color: #1310D3;font-size: 17px; ">Debit Card : </label>  <input type="radio" name="card" required>
	<br></br>

	<div style="width: 800px;height: 400px;border-radius: 5px;border: 2px solid #10CAD3;margin: auto;background-color: #fff; ">
			
			
			<br>
			<label style="margin-left: 225px; ">Card Type :</label> <input style="margin-left: 30px;" type="radio" name="visa"> <slabel>VISA</label>  <input style="margin-left: 80px; " type="radio" name="visa" required> <label>MasterCard</label> <br></br><br>

			<label style="margin-left: 155px;font-size: 18px; ">Card No :</label>
			<input style="margin-left: 27px;font-size: 18px;border-radius: 5px;border:1px solid silver; " type="text" name="cardno" required><br><br>

			<label style="margin-left: 155px;font-size: 18px; ">CVV No :</label>
			<input style="margin-left: 23px;font-size: 18px;border-radius: 5px;border:1px solid silver; " type="text" name="ccv" required><br><br>

			<label style="margin-left: 92px;font-size: 18px; ">Name on the card :</label>
			<input style="margin-left: 23px;font-size: 18px;border-radius: 5px;border:1px solid silver; " type="text" name="cardno" required><br><br>

			<label style="margin-left: 50px;font-size: 18px; ">Expiration MM/YYYY :</label>
			<input style="margin-left: 23px; font-size: 18px;border-radius: 5px;border:1px solid silver; " type="text" name="exp" required><br><br>

			<div style="font-size: 22px;">
			<label style="margin-left: 115px;margin-right: 100px; ">Fees to pay :</label> <?php echo "Rs. " . " &nbsp". $fee; ?>
		   <!-- <?php echo $fee; ?>-->
			</div>


			<br></br>
		
		<!--<p>
	          <a style="display: block;height: 50px;width: 200px;background-color: #2ecc71;text-decoration: none;font-size: 25px;text-align: center;margin-left: 330px; color:black;border-radius: 10px; "  href="patappview.php">Make Payment</a>
	    </p>-->
		     <p class="sub">
		      <input style="margin-left:340px;font-size: 20px;  " type="submit" name="pay" id="sub" value="Pay Now" >         
		     </p>


	</form>


	</div>
</div>

</body>
</html>