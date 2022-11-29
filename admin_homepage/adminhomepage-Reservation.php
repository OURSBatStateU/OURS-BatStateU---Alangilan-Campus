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
		<?php include "reserv.css" ?>
		<?php include "confirmbox.css" ?>
	</style>
	
</head>
<body>

	<div class="widescreen">
	
		<div class="nav">
			<ul>
				<li><a class="fleft" href="adminhomepage-Reservation.php" style="background-color: #585858;">RESERVATION</a></li>
				<li><a class="fleft" href="admin-inventory.php">INVENTORY</a></li><li><a class="fleft" href="admin-inventory.php">CALENDAR</a></li>
				<li><a class="fright" href="logout.php">LOG OUT</a></li>
			</ul>
		</div>
		
		<h1>Reservation List</h1>
		
		<table class="reservtable">
			<thead>
				<tr>
					<th>Reservation ID</th>
					<th>Srcode</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
					<th>Pick-up Schedule</th>
					<th>Operation</th>
				</tr>
			</thead>
			
			<tbody>
				<?php
				
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

					$sql = "SELECT * FROM reservation_table LIMIT $initial_page, $limit";
					$result = mysqli_query($conn, $sql);
					
					if($result) {
						while ($row =mysqli_fetch_assoc($result)) {
							$row_reservID = $row["ReservationID"];
							$row_srcode = $row["Srcode"];
							$row_fname = $row["FirstName"];
							$row_lname = $row["LastName"];
							$row_productID = $row["ProductID"];
							$row_productname = $row["ProductName"];
							$row_price = $row["Price"];
							$row_qty = $row["Quantity"];
							$row_totalprice = $row["TotalPrice"];
							$row_pickupchedule_date = $row["PickupSchedule"];
							$row_pickupchedule_time = $row["Time"];
							
							echo 
								"<tr>
									<td><strong>$row_reservID</strong></td>
									<td>$row_srcode</td>
									<td>$row_fname</td>
									<td>$row_lname</td>
									<td>$row_productID</td>
									<td>$row_productname</td>
									<td>$row_price</td>
									<td>$row_qty</td>
									<td>$row_totalprice</td>
									<td>
										$row_pickupchedule_date <br>
										$row_pickupchedule_time
									</td>
									<td>
										
										<a href='cancelReservationform.php?cancelid=$row_reservID' class='cancelReserv reservbtn'>Cancel</a>
										
										<br><br>	

										<a href='completetransactionform.php?claimid=$row_reservID' class='claimReserv reservbtn'>Done</a>
										
									</td>					
								</tr>";
						}
						$result->free();
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

					echo "<a href='adminhomepage-Reservation.php?page=".($page_number-1)."'>  Prev </a>";   

				}                          

				for ($i=1; $i<=$total_pages; $i++) {   

					if ($i == $page_number) {   
						$pageURL .= "<a class = 'active' href='adminhomepage-Reservation.php?page=".$i."'>".$i." </a>";   
					}               
					else  {   
						$pageURL .= "<a href='adminhomepage-Reservation.php?page=".$i."'>   
							  ".$i." </a>";     
					}   
				};     

				echo $pageURL;    

				if($page_number<$total_pages){   

					echo "<a href='adminhomepage-Reservation.php?page=".($page_number+1)."'>  Next </a>";   

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

			window.location.href = 'adminhomepage-Reservation.php?page='+page;   
		}
	
	</script>


<!--the system will send an email to the student to inform them that their reservation was canceled-->
<!--the system cancel the reservation in the student page-->

</body>
</html>