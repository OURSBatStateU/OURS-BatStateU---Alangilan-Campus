<?php
	
	require_once 'connect.php';
	
	if ($conn){
		if (isset($_POST['cancelreserv'])) {
			$reservID = $_POST['reservid'];
			$reserv_productID = $_POST['productid'];	//productid from reservation table
			$reserv_productQTY = $_POST['productqty'];	//quantity from reservation table
			$addqtytoinventory = $_POST['quantitybacktoinventory'];
			
			function autoEmail() {
				$url = "https://script.google.com/macros/s/AKfycbxw0uPee-FARAxDA4awQb2wcW2Q3Zx8i09WD9CfUJlbokluWDsgB2C1KEW01XRIlJO7/exec";
				
				$ch = curl_init($url);
				
				curl_setopt_array($ch, [
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_FOLLOWLOCATION => true,
					CURLOPT_POSTFIELDS => http_build_query([
					  "recipient" => $_POST['emailrecipient'],
					  "subject"   => $_POST['emailsubject'],
					  "body"      => $_POST['emailcontent']
					])
				]);
				$email_result = curl_exec($ch);
			}
			
			
			function cancelOrder() {
				$reservID = $_POST['reservid'];
				$conn = mysqli_connect("localhost", "root", "", "ours_db");
				
				$del_sql = "DELETE FROM reservation_table WHERE reservationid='$reservID'";
				$del_result = mysqli_query($conn, $del_sql);
				
				if ($del_result) {
					header("Location: adminhomepage-Reservation.php");
				}
				else {
					die(mysqli_error($conn));
				}
				
			}
			
			if ($addqtytoinventory == 'addqty') {
				
				$inv_sql = "SELECT * FROM inventory WHERE productid='$reserv_productID'";	//Retrieve data from Inventory table where productid is the productid from the reservation table
			
				$inv_result = mysqli_query($conn,$inv_sql);
				
				if ($inv_result) {
					while ($data = mysqli_fetch_assoc($inv_result)) {
						$inv_prodqty = $data['Quantity'];		//quantity from inventory table
						$newprodqty = $inv_prodqty + $reserv_productQTY;	//add the quantity from inventory and from the reservation table
						
						$add_sql = "UPDATE inventory SET quantity='$newprodqty' WHERE productid='$reserv_productID'";
						$add_result = mysqli_query($conn,$add_sql);
	
					}
					$inv_result->free();
					autoEmail();
					cancelOrder();
				}	
				
			}
			else {		
				autoEmail();
				cancelOrder();	
			}

		}
		else {
			die(mysqli_error($conn));
		}
	}
	else {
		die(mysqli_error($conn));
	}

//sends automatic email to the student when the reservation is canceled
	
?>