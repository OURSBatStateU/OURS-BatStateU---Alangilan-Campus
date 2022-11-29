<?php
	require_once 'connect.php';

	if ($conn) {
		$reservid = $_GET['claimid'];
		$sql = "SELECT * FROM reservation_table WHERE reservationid='$reservid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$srcode = $row['Srcode'];
		$fname = $row['FirstName'];
		$lname = $row['LastName'];
		$productID = $row["ProductID"];
		$productname = $row["ProductName"];
		$prodprice = $row["Price"];
		$prodqty = $row["Quantity"];
		$totalprice = $row["TotalPrice"];
		$pickupsched_date = $row["PickupSchedule"];
		$pickupsched_time = $row["Time"];
		$email = $row["EmailAddress"];
	}
	else {
		die($conn);
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>BatStateU Online Uniform Reservation System</title>
	<link rel="icon" type="image/gif/png" href="img/logo.png">
	
	<style>
		<?php include "cancelReservationform.css" ?>
		<?php include "confirmbox.css" ?>
		
		#confCancelReserv {
			display: none;
		}
	</style>
	
	<script>
		function confCancel(){
			document.getElementById("confCancelReserv").style.display = "block";
		}
		
		function Cancelcncl(){
			document.getElementById("confCancelReserv").style.display = "none";
		}
	</script>
	
<head>
<body>
	<div id='updform-container'>
		<div class='updform-box'>
			
			<div class="formtitle">
				<h1>Completed the Transaction</h1>
			</div>
										
			<form action='completetransaction.php' method='POST' class='updateform'>
				<label class='updLabel'>Reservation ID</label><br>
				<input type='text' name='reservid' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $reservid;?>'>
				<br><br>
				
				<label class='updLabel'>Srcode</label><br>
				<input type='text' name='srcode' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $srcode;?>'>
				<br><br>
				
				<label class='updLabel'>First Name</label><br>
				<input type='text' name='fname' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $fname;?>'>
				<br><br>
				
				<label class='updLabel'>Last Name</label><br>
				<input type='text' name='lname' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $lname;?>'>
				<br><br>
				
				<label class='updLabel'>Product ID</label><br>
				<input type='text' name='productid' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $productID;?>'>
				<br><br>
											
				<label class='updLabel'>Product Name</label><br>
				<input type='text' name='productname' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $productname;?>'>
				<br><br>
											
				<label class='updLabel'>Price(&#8369)</label><br>
				<input type='text' name='productprice' class='inputbox short' required autocomplete='off' readOnly value='<?php echo $prodprice;?>'>
				<br><br>
											
				<label class='updLabel'>Quantity</label><br>
				<input type='text' name='productqty' class='inputbox short' required autocomplete='off' readOnly value='<?php echo $prodqty;?>'>
				<br><br>
				
				<label class='updLabel'>Total Price(&#8369)</label><br>
				<input type='text' name='totalprice' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $totalprice;?>'>
				<br><br>
				
				<label class='updLabel'>Pick up Schedule Date</label><br>
				<input type='text' name='pickupsched_date' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $pickupsched_date;?>'>
				<br><br>
				
				<label class='updLabel'>Pick up Schedule Time</label><br>
				<input type='text' name='pickupsched_time' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $pickupsched_time;?>'>
				<br><br>
				
				<div class="emailsection">
					<h1>Email for Completed Transaction</h1>
				
					<label>Email To :</label><br>
					<input class="inputbox email-input" type="text" name="emailrecipient" value='<?php echo $email;?>'>
					<br><br>
					
					<label>Subject :</label><br>
					<input class="inputbox email-input"  type="text" name="emailsubject"  class="emailsubject" contenteditable="true" value="PURCHASE CONFIRMATION MESSAGE">
					<br><br>

<!--Don't edit any spaces inside the textarea element-->					
					<label>Content :</label><br>
					<textarea name="emailcontent" class="emailcontent" contenteditable="true">Good day <?php echo $fname ." ". $lname;?>!

We’d like to inform you that we have verified your purchased of <?php echo $prodqty ." ". $productname;?> from RGO (Alangilan Campus). Your payment has been confirmed.

Thank you.</textarea>
					<br><br>
				
				</div>
											
				<button class='upd-btn cncl'><a href='adminhomepage-Reservation.php' class='cancelbtn'>Cancel</a></button>
				
				<input type='button' class="upd-btn upd" onclick="confCancel()" value='Complete Transaction'>
			
				<div class="confbox-container" id='confCancelReserv'>
					<div class="confirmbox">
					
						<h1>Are you sure?</h1>
						<p>Confirmed completed transaction for <span style="color: red;"><?php echo $srcode;?></span>.</p>
						
						<input type="button" class='cancel c-btn' onclick="Cancelcncl()" value='Cancel'>
						
						<input type='submit' class='confirm c-btn' name='claimreserv' value='Yes'>
					</div> 					
				</div>
			
			</form>
			
		</div>
	</div>
	
</body>
</html>