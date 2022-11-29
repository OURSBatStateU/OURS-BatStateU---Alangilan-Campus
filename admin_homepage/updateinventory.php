<?php
	//validate if the updateid is equal to the product id, if not return query error message

?>

<?php
	session_start();

	require_once 'connect.php';
	

	if (isset($_POST['update'])) {
		
		function validate($data){

			$data = trim($data);

			$data = stripslashes($data);

			$data = htmlspecialchars($data);

			return $data;
		}
		
		$productID = validate($_POST['productid']);
		$newproductname = validate($_POST['productname']);
		$newprice = validate($_POST['productprice']);
		$newqty = validate($_POST['productqty']);
			
		$upd_sql = "UPDATE inventory SET productid='$productID', productname='$newproductname', price='$newprice', quantity='$newqty' WHERE productid='$productID'";
		$result = mysqli_query($conn,$upd_sql);
		
		if ($result) {
			header("Location: admin-inventory.php");
		}
		else {
			die(mysqli_error($conn));
		}
	}
	else {
		die(mysqli_error($conn));
	}


			
?>