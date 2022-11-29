<?php
	session_start();
	
	require_once 'connect.php';
	
	if ($conn) {
		
		if (isset($_POST['placereserv'])) {
				
			function validate($data) {
			  $data = trim($data);
			  $data = stripslashes($data);
			  $data = htmlspecialchars($data);
			  
			  return $data;
			}
			
			$srcode = validate($_POST['srcode']);
			$fname = validate($_POST['fname']);
			$lname = validate($_POST['lname']);
			$productid = $_POST['productid'];
			$productname = $_POST['productname'];
			$price = $_POST['productprice'];
			$productqty = $_POST['productqty'];
			$totalpriceeach = $_POST['productpriceseach'];
			$sched = validate($_POST['pickupschedule']);
			$email = validate($_POST['email']);
			
			
			for ($i=0; $i < sizeof($productid); $i++){
				
				$insert_toreservation = "INSERT INTO reservation_table (Srcode, FirstName, LastName, ProductID, ProductName, Price, Quantity, TotalPrice, PickupSchedule, EmailAddress)VALUES ('$srcode', '$fname', '$lname', '$productid[$i]', '$productname[$i]', '$price[$i]', '$productqty[$i]', '$totalpriceeach[$i]', '$sched', '$email')";
					
				$rs_reservation= mysqli_query($conn, $insert_toreservation);
				
				
				$retrieve_cartdetails = "SELECT * FROM cart WHERE SRCode='$srcode'";	//and cartID  //
				$result_cartdetails = mysqli_query($conn,$retrieve_cartdetails);
					
				if (mysqli_num_rows($result_cartdetails) > 0){
					while($row = mysqli_fetch_assoc($result_cartdetails)){
						$cartID = $row['CartID'];
						
						$remov_fromcart = "DELETE FROM cart WHERE cartid='$cartID'";
						$remov_result = mysqli_query($conn, $remov_fromcart);
					}
				}
				
			}
			
			header ("Location: ../products.php?id=$srcode");
		}
		else {
			die($conn);
			
		}
	}
	else {
		die($conn);
	}
	
?>