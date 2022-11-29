<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Calendar 301</title>
	
	<style>
		<?php include 'c-style.css'?>
	</style>
	
</head>
<body>
	<?php
		
		$srcode = $_GET['id'];
		
		$mydate=getdate(date("U"));
		$numdays = date("t");		
		
		$firstdayofMonth = strftime("%B %d %Y, %X %Z", mktime(0,0,0,$mydate['mon'],1,$mydate['year']));
		
		$lastdayofPrevMonth = strftime("%B %d %Y, %X %Z", mktime(0,0,0,$mydate['mon'],0,$mydate['year']));
		
		$numdaysofWeek = 7;
		
		echo $firstdayofMonth;
		echo "<br><br>";
		echo $lastdayofPrevMonth;
		echo "<br><br>";
		echo $numdaysofWeek;
		
	?>
		
		
			<div class='container'>
				
				
			<!--	<a href="../Cart/Cart.php?id=<?php $srcode?>"><i class="fa fa-arrow-circle-left"></i></a>
			-->	
				<div class='calendar'>
					<div class='month'>
						<h2> < </h2>
						<div class='date'>
							<h1 class='currentMonth'><?php echo "$mydate[month]";?></h1>
							<p class='currentDate'><?php echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";?></p>
						</div>
						<h2> > </h2>
					</div>
					
			
					<div class='weekdays'>
						<div>Sun</div>
						<div>Mon</div>
						<div>Tue</div>
						<div>Wed</div>
						<div>Thur</div>
						<div>Fri</div>
						<div>Sat</div>
					</div>
					
					<div class='days'>	
						<?php 
							for ($i = 1; $i <= $numdays; $i++){
								
								echo  
								"<div title='Pick this date'><a class='datebtn' href='schedulingform.php?date=$mydate[month] $i $mydate[year]&id=$srcode'>$i</a></div>";
							};
						?>
					</div>
					
				</div>
			</div>
		
</body>
</html>

<?php	
	/*	$mydate=getdate(date("U"));
		$numdays = date("t");
		
		const firstDayIndex = date.getDay();

		const lastDayIndex = new Date(date.getFullYear(), date.getMonth() + 1,0).getDay();

		const nextDays = 7 - lastDayIndex - 1;
		
		$newDate = date('Y-m-d', strtotime('-1 month')); echo $newDate;
		
	*/	
	?>