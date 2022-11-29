<?php
	
	require_once 'connect.php';
	
	if ($conn){
		if (isset($_POST['claimreserv'])) {
			$reservID = $_POST['reservid'];
			
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
			
			autoEmail();
			cancelOrder();

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