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
		<?php include "inventory.css" ?>
	</style>
	
</head>
<body>
	
	<div class="widescreen">
	
		<div class="nav">
			<ul>
				<li><a class="fleft" href="adminhomepage-Reservation.php">RESERVATION</a></li>
				<li><a class="fleft" href="admin-inventory.php" style="background-color: #585858;">INVENTORY</a></li>
				</a></li><li><a class="fleft" href="admin-inventory.php">CALENDAR</a></li>
				<li><a class="fright" href="logout.php">LOG OUT</a></li>
			</ul>
		</div>
		
		<h1>RGO Inventory</h1>
		
		<table class="reservtable">
			<thead>
				<tr>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Update Item</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
					
					if ($conn) {
						// variable to store number of rows per page
						$limit = 15;    
						// update the active page number
						if (isset($_GET["page"])) {    
							$page_number  = $_GET["page"];    
						}    
						else {    
						  $page_number=1;    
						}       
						// get the initial page number
						$initial_page = ($page_number-1) * $limit;       

						// get data of selected rows per page 
						$sql = "SELECT * FROM inventory LIMIT $initial_page, $limit";
						$result = mysqli_query($conn, $sql);
						
						if ($result) {
							while ($row = mysqli_fetch_assoc($result)) {
								$row_productID = $row["ProductID"];
								$row_productname = $row["ProductName"];
								$row_price = $row["Price"];
								$row_qty = $row["Quantity"];
								
								echo "<tr>
									<td>$row_productID</td>
									<td>$row_productname</td>
									<td>$row_price</td>
									<td>$row_qty</td>
									<td>
										<a class='add btn' href='updateform.php?Updid=$row_productID'>Update</a>
									</td>
								</tr>";
							
							}
							$result->free();
						}
					}
					else {
						die("Connection failed: " . $conn->connect_error);
					}
				?>
				
			</tbody>
		</table>
		
		<div class="pages">
		
			<div class="pagination">    
			  <?php  
				$getQuery = "SELECT COUNT(*) FROM inventory";     
				$result = mysqli_query($conn, $getQuery);     
				$row = mysqli_fetch_row($result);     
				$total_rows = $row[0];              

				echo "</br>";            

				// get the required number of pages

				$total_pages = ceil($total_rows / $limit);     

				$pageURL = "";             

				if($page_number>=2){   

					echo "<a href='admin-inventory.php?page=".($page_number-1)."'>  Prev </a>";   

				}                          

				for ($i=1; $i<=$total_pages; $i++) {   

					if ($i == $page_number) {   
						$pageURL .= "<a class = 'active' href='admin-inventory.php?page=".$i."'>".$i." </a>";   
					}               
					else  {   
						$pageURL .= "<a href='admin-inventory.php?page=".$i."'>   
							  ".$i." </a>";     
					}   
				};     

				echo $pageURL;    

				if($page_number<$total_pages){   

					echo "<a href='admin-inventory.php?page=".($page_number+1)."'>  Next </a>";   

				}     

			  ?>    

			</div>
			
			<div class="inline">   

				<input id="pagenum" type="number" min="1" max="<?php echo $total_pages?>" placeholder="<?php echo $page_number."/".$total_pages; ?>" required>   

				<button class="go2pagebtn" onClick="go2Page();">Go</button>   

			</div> 
		</div> 
	
	</div>
	
	<div class="smallscreenError">
		<h1>Error occured!</h1>
		<p><i>This site is restricted from mobile phones and other small screen devices.</i></p>
	<div>
	
	<script>
		
		function go2Page() {   

			var page = document.getElementById("pagenum").value;   

			page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   

			window.location.href = 'admin-inventory.php?page='+page;   
		}
	
	</script>
		
<!-- the displayed products in the student page will automatically disabled when the stocks=0 -->

</body>
</html>