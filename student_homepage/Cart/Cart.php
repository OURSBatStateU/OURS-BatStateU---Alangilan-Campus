<?php
	session_start();
	require_once 'connect.php';
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
		<?php include 'cartstyle.css'?>
	</style>
	
</head>
<body>
	
	<?php
		$username = $_GET['id'];
	
		$retrieve_orderdetails = "SELECT * FROM cart WHERE SRCode='$username'";	//and reservationID
		$result_orderdetails = mysqli_query($conn,$retrieve_orderdetails);
	
	?>

	<div class="cart-container">
		<div class="cart">
		
			<h1>My Cart</h1>
			
			<?php
				$totalprice = 0;
				$prices = 0;
				
				if (mysqli_num_rows($result_orderdetails) > 0){
					while($row = mysqli_fetch_assoc($result_orderdetails)){
						$cartID = $row['CartID'];
						$srcode = $row['SRCode'];
						$productID = $row['ProductID'];
						$price = $row['Price'];
						$qty = $row['Quantity'];
						
						$retrieve_prodDetails = "SELECT ProductName FROM inventory WHERE productid='$productID'";
						$results_prodDetails = mysqli_query($conn, $retrieve_prodDetails);
						
						if (mysqli_num_rows($results_prodDetails) > 0){
							while($row = mysqli_fetch_assoc($results_prodDetails)){
								$productName = $row['ProductName'];
								
								echo "
									<div class='items-container'>
										<div class='prodName'>
											<span class='details'>Product:</span>	$productName
										</div>
										
										<div class='price'>
											<span class='details'>Price:</span>	&#8369 $price
										</div>
										
										<div class='qty'>
											<span class='details'>Quantity:</span>	$qty
										</div>
										
										
										<a href='removeitemfromcart.php?itemid=$cartID&id=$username' class='removeitem-btn'>Remove</a>
									</div>
									<br><br>
									
								";
								$prices = $price * $qty;
								$totalprice += $prices;
							}
						}
						
					}
					
					//total amount of the items
					echo "<div class='totalprice'><span class='spantotalprice'>Total Amount :</span>	<span class='pesoSign'>&#8369</span> $totalprice</div>";
					
					
					//go back to products page
					echo "<a href='../products.php?id=$username' class='backbtn'>Back</a>";
					
					//proceed to pick up schedules
					echo "<a href='../sched/newReservationForm.php?id=$username' class='schedbtn'>Proceed</a>";
				}
				//when cart is empty
				else {
					echo "<p class='empCart'>Your cart is empty.</p>";
					
					echo "<a href='../products.php?id=$username' class='backbtn'>Back</a>";
					
					exit();
				}
			?>
		</div>
	</div>
	

</body>
</html>