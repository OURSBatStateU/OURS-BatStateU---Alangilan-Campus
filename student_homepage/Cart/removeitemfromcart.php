<?php
	
	require_once 'connect.php';
	
	
	if ($conn){
		$cartID = $_GET['itemid'];
		$username = $_GET['id'];
		//encrypt the username id
		
		$cart_sql = "SELECT * FROM cart WHERE CartID='$cartID'";
		$cart_result = mysqli_query($conn,$cart_sql);
		
		if($cart_result) {
			while ($row = mysqli_fetch_assoc($cart_result)) {
				$cart_prodID = $row['ProductID'];
				$cart_prodqty = $row['Quantity'];
				
				$inv_sql = "SELECT * FROM inventory WHERE productid='$cart_prodID'";	//Retrieve data from Inventory table where productid is the productid from cart
		
				$inv_result = mysqli_query($conn,$inv_sql);
			
				if ($inv_result) {
					while ($data = mysqli_fetch_assoc($inv_result)) {
						$inv_prodqty = $data['Quantity'];		//quantity from inventory table
						$newprodqty = $inv_prodqty + $cart_prodqty;	//add the quantity from inventory and from cart
					
						$add_sql = "UPDATE inventory SET quantity='$newprodqty' WHERE productid='$cart_prodID'";
						$add_result = mysqli_query($conn,$add_sql);

					}
					$inv_result->free();
					
					$remov_fromreservlist = "DELETE FROM cart WHERE cartid='$cartID'";
					$remov_result = mysqli_query($conn, $remov_fromreservlist);
				}
				else {
					die($conn);
				}
				
			}
			$cart_result->free();
			header ("Location: Cart.php?id=$username");
		}
		else {
			die($conn);
		}
		
	}
	else {
		die($conn);
	}