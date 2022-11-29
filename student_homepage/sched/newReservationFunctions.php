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
			$sched_date = validate($_POST['pickupschedule-date']);
			$sched_time = validate($_POST['pickupschedule-time']);
			$email = validate($_POST['email']);

//don't edit any spaces inside the body	of email		
			function autoEmail() {
				$url = "https://script.google.com/macros/s/AKfycbxw0uPee-FARAxDA4awQb2wcW2Q3Zx8i09WD9CfUJlbokluWDsgB2C1KEW01XRIlJO7/exec";
				
				$ch = curl_init($url);
				
				curl_setopt_array($ch, [
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_POSTFIELDS => http_build_query([
					  "recipient" => $_POST['email'],
					  "subject"   => "CONFIRMATION OF UNIFORM RESERVATION",
					  "body"      => "Hi " . $_POST['fname'] . " " . $_POST['lname']."! 
					  
Your reservation through BatStateU TNEU OURS has been placed to our system. Please be informed that your pick-up schedule is on " . $_POST['pickupschedule-date'] . " at " . $_POST['pickupschedule-time'] .". 

Proceed to the RGO office(Alangilan Campus) to claim your reserved item/s.
			  
Thank you."
					])
				]);
				$email_result = curl_exec($ch);
			}
			
			
			for ($i=0; $i < sizeof($productid); $i++){
				
				$insert_toreservation = "INSERT INTO reservation_table (Srcode, FirstName, LastName, ProductID, ProductName, Price, Quantity, TotalPrice, PickupSchedule, Time, EmailAddress)VALUES ('$srcode', '$fname', '$lname', '$productid[$i]', '$productname[$i]', '$price[$i]', '$productqty[$i]', '$totalpriceeach[$i]', '$sched_date', '$sched_time', '$email')";
					
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
			
			autoEmail();
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