<!-- Hindi pa connected ang email add pero may default ng subject and body (editable) -->

<?php
	require_once 'connect.php';

	if ($conn){
		if (isset($_POST['cancelreserv'])) {
			$orderID = $_POST['orderid'];
			$reserv_productID = $_POST['productid'];	//productid from reservation table
			$reserv_productQTY = $_POST['productqty'];	//quantity from reservation table
			$addqtytoinventory = $_POST['quantitybacktoinventory']; 
			$email = $_POST['email']; 

	}
   
?>

<!DOCTYPE html>
<html>

   <head>
      <title>Email Cancellation</title>
      <link rel="stylesheet" href="cnclEmail.css">
      <script>
		function confCancel(){
			document.getElementById("confCancelReserv").style.display = "block";
		}
		
		function Cancelcncl(){
			document.getElementById("confCancelReserv").style.display = "none";
		}
	</script>
   </head>
   <body>
      <div class="emailform-box">
         <form method="post" action="cnclEmail.php">
         <div class="formtitle">
            <h1>Email for Cancelled Reservation</h1>
         </div>
           Email To:
           <br>
            <input class="inputbox input-txt" type="text" name="email"><br>
            Subject :<br>
            <input class="inputbox input-txt"  type="text" name="subject" contenteditable="true" value="CANCELLED RESERVATION"><br>
            Body :<br>
            <textarea name="body" contenteditable="true">Your reservation has been cancelled. Kindly reserve again or contact RGO for more information.</textarea><br>
            <input type="submit" value="SEND" name="submit" class="snd-btn snd">            
         </form>
         <?php
         if(isset($_POST['submit'])){
            $url = "https://script.google.com/macros/s/AKfycbxw0uPee-FARAxDA4awQb2wcW2Q3Zx8i09WD9CfUJlbokluWDsgB2C1KEW01XRIlJO7/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $_POST['email'],
                  "subject"   => $_POST['subject'],
                  "body"      => $_POST['body']
               ])
            ]);
            $result = curl_exec($ch);
            if ($result) {
					header("Location: adminhomepage-Reservation.php");
				}
				else {
					die();
				}
				
         }
         ?>
      </div>
      
   </body>
</html>