<?php
$servername= "localhost";

$db_username= "root";

$db_password = "";

$db_name = "ours_db";

$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);

if ($conn){
    // database connection code
	if (isset($_POST['addtocart'])) {
		
		if(isset($_POST['val1']))
		{

			// $sr = $_GET['txtEmail'];
			$srcode = $_POST['srcode'];
			//encrypt the username id
			$pid = $_POST['val1'];
			$price = $_POST['val2'];
			$qty = $_POST['qty'];
			
			
			$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);


			// database insert SQL code
			try {			
							   
				$inv_sql = "SELECT * FROM inventory WHERE productid='$pid'";	//Retrieve data from Inventory table where productid is the productid from the products form
			
			    $inv_result = mysqli_query($conn,$inv_sql);
				
				if ($inv_result) {
					while ($data = mysqli_fetch_assoc($inv_result)) {
						$inv_prodqty = $data['Quantity'];		//quantity from inventory table
						$newprodqty = $inv_prodqty - $qty;	//add the quantity from inventory and from the reservation table
						
						$del_sql = "UPDATE inventory SET quantity='$newprodqty' WHERE productid='$pid'";
						$del_result = mysqli_query($conn,$del_sql);
					}
					$inv_result->free();
					
					$sql= "INSERT INTO cart (SRCode, ProductID, Price, Quantity)VALUES ('$srcode', '$pid', '$price', '$qty')";
					$rs = mysqli_query($conn, $sql);
				}
			   
			} 
			catch (mysqli_sql_exception $e) { 
			   var_dump($e);
			   exit; 
			} 
			
			if($rs)
			{
				header("Location: products.php?id=$srcode");	
				exit();
				// echo "Added to Cart";
			}        
			else {
				die(mysqli_error($conn));
			}
		}
		else{
			echo htmlspecialchars($_POST['val1']);
			die(mysqli_error($conn));
		}
	}
	else {
		die(mysqli_error($conn));
	}
	
}
?>