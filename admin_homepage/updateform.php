<?php
	require_once 'connect.php';

	if ($conn) {
		$id = $_GET['Updid'];
		$sql = "SELECT * FROM inventory WHERE productid='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$productID = $row["ProductID"];
		$productname = $row["ProductName"];
		$prodprice = $row["Price"];
		$prodqty = $row["Quantity"];
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
		<?php include "update.css" ?>
		<?php include "confirmbox.css" ?>
		
		#confUpd {
			display: none;
		}
	</style>
	
	<script>
		function confUpd(){
			document.getElementById("confUpd").style.display = "block";
		}
		
		function CancelUpd(){
			document.getElementById("confUpd").style.display = "none";
		}
	</script>
	
<head>
<body>
	<div id='updform-container'>
		<div class='updform-box'>
			
			<div class="formtitle">
				<h1>UPDATE Item</h1>
			</div>
										
			<form action='updateinventory.php' method='POST' class='updateform'>
				<label class='updLabel'>Product ID</label><br>
				<input type='text' name='productid' class='inputbox long' readOnly autocomplete='off' value='<?php echo $productID;?>'>
				<br><br>
											
				<label class='updLabel'>Product Name</label><br>
				<input type='text' name='productname' class='inputbox long' required autocomplete='off' value='<?php echo $productname;?>'>
				<br><br>
											
				<label class='updLabel'>Price</label><br>
				<input type='text' name='productprice' class='inputbox short' required autocomplete='off' value='<?php echo $prodprice;?>'>
				<br><br>
											
				<label class='updLabel'>Quantity</label><br>
				<input type='text' name='productqty' class='inputbox short' required autocomplete='off' value='<?php echo $prodqty;?>'>
				<br><br>
											
				<a href="admin-inventory.php" class='cancelbtn upd-btn cncl'>Cancel</a>
				
				<input type='button' class="upd-btn upd" onclick="confUpd()" value='Update'>
			
				<div class="confbox-container" id="confUpd">
					<div class="confirmbox">
					
						<h1>Are you sure?</h1>
						<p>Update data of <span style="color: red;"><?php echo $productname;?></span>.</p>
						
						<input type="button" class='cancel c-btn' onclick="CancelUpd()" value='Cancel'>
						
						<input type='submit' class='confirm c-btn' name='update' value='Yes'>
					</div> 					
				</div> 
			
			</form>
			
		</div>
	</div>
	
</body>
</html>