<?php
	require_once 'connect.php';

	if ($conn) {
		$srcode = $_GET['id'];		//srcode
		
		$rtrv_studentdetails = "SELECT * FROM student WHERE Srcode='$srcode'";		//retrieve data from student table
		$reseult_studentdetails = mysqli_query($conn, $rtrv_studentdetails);
		$row = mysqli_fetch_assoc($reseult_studentdetails);
		$student_fname = $row['FirstName'];		//firstname from student table
		$student_lname = $row['LastName'];	 //lastname from student table
		
	}
	else {
		die($conn);
	}
//add schedule
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
		<?php include "newreservationformstyle.css" ?>
		<?php include "confirmbox.css" ?>
		
		#confCancelReserv {
			display: none;
		}
	</style>
	
	<script>
		function confreserv(){
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
				<h1>Reservation Form</h1>
			</div>
										
			<form action='newReservationFunctions.php' method='POST' class='updateform'>
				
				<label class='updLabel'>Srcode</label><br>
				<input type='text' name='srcode' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $srcode;?>'>
				<br><br>
				
				<label class='updLabel'>First Name</label><br>
				<input type='text' name='fname' class='inputbox long' required readOnly value='<?php echo $student_fname?>' autocomplete='off'>
				<br><br>
				
				<label class='updLabel'>Last Name</label><br>
				<input type='text' name='lname' class='inputbox long' required readOnly autocomplete='off' readOnly value='<?php echo $student_lname;?>'>
				<br><br>
				
				<?php
				
					echo "<label class='updLabel'>Product/s</label><br>";
				
					$totalprice = 0;
					$prices = 0;
				
					$retrieve_orderdetails = "SELECT * FROM cart WHERE SRCode='$srcode'";	//and reservationID  //
					$result_orderdetails = mysqli_query($conn,$retrieve_orderdetails);
					
					
					if (mysqli_num_rows($result_orderdetails) > 0){
						while($row = mysqli_fetch_assoc($result_orderdetails)){
							$cartID = $row['CartID'];
							$srcode = $row['SRCode'];	//srcode from cart
							$productID = $row['ProductID'];	//productid from cart
							$price = $row['Price'];		//price from cart
							$qty = $row['Quantity'];	//quantity from cart
							
							
							//retrieve data from inventory
							$retrieve_prodDetails = "SELECT ProductName FROM inventory WHERE productid='$productID'";
							$results_prodDetails = mysqli_query($conn, $retrieve_prodDetails);
							
							if (mysqli_num_rows($results_prodDetails) > 0){
								while($row = mysqli_fetch_assoc($results_prodDetails)){
									$productName = $row['ProductName'];	//product name from inventory
									
								echo "
									
									<div class='products-container'>
								
									<input type='hidden' name='productid[]' class='inputbox long' required autocomplete='off' readOnly value='$productID'>
											
									<label class='prod-list'>Item Description</label><br>
									<input type='text' name='productname[]' class='inputbox long' required autocomplete='off' readOnly value='$productName'>
									<br><br>
									
									<label class='prod-list'>Price (&#8369)</label><br>
									<input type='text' name='productprice[]' class='inputbox short' required autocomplete='off' readOnly value='$price'>
									<br><br>
																
									<label class='prod-list'>Quantity</label><br>
									<input type='text' name='productqty[]' class='inputbox short' required autocomplete='off' readOnly value='$qty'>
									<br><br>
									
									
									</div>
									<hr id='hr'>
								";
								
									$prices = $price * $qty;
									$totalprice += $prices;
									
									echo"	<input type='hidden' name='productpriceseach[]' class='inputbox short' required autocomplete='off' readOnly value='$prices'>";
								}
							}
						}
					}
	
				?>
				
				<label class='updLabel'>Pick up Schedule</label><br>
				<input type='date' min='2022-11-26' name='pickupschedule-date' class='inputbox short' required>
				<input type='time' min="08:00:00" max="15:30:00" name='pickupschedule-time' class='inputbox short' required>
				
				<p class="note">Note: Office hours are 8am to 4pm.</p>
				<br>
											
				<label class='updLabel'>Total Price (&#8369)</label><br>
				<input type='text' name='totalprice' class='inputbox long' required autocomplete='off' readOnly value='<?php echo $totalprice;?>'>
				<br><br>
				
				<label class='updLabel'>Email Address:</label><br>
				<input type='text' name='email' placeholder='Enter email' class='inputbox long' required autocomplete='off'>
				<p class="note">Note: Please make sure your email is correct.
				<br><br>
				
				<!--Add id to the url-->
				<button class='upd-btn cncl'><a href='../Cart/Cart.php?id=<?php echo $srcode;?>' class='cancelbtn'>Cancel</a></button>
				
				<input type='button' class="upd-btn upd" onclick="confreserv()" value='Place Reservation'>
			
				<div class="confbox-container" id='confCancelReserv'>
					<div class="confirmbox">
					
						<h1>Are you sure?</h1>
						<p>Place reservation now.</p>
						
						<input type="button" class='cancel c-btn' onclick="Cancelcncl()" value='Cancel'>
						
						<input type='submit' class='confirm c-btn' name='placereserv' value='Yes'>
					</div> 					
				</div>
			
			</form>
			
		</div>
	</div>
	
</body>
</html>