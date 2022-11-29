<?php
	session_start();
	require_once 'connect.php';
	
	$srcode = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<title>Scheduling Calendar</title>
	
	<style>
		<?php include 'newCalendar.css'?>
	</style>
	
</head>
<body>

	<div class="main-wrapper">
		<div class="content-wrapper grey lighten-3">
			<div class="container">

				<div class="calendar-wrapper z-depth-2">

					<div class="header-background">
						<div class="calendar-header">

							<a class="prev-button" id="prev">
								<i class="material-icons">keyboard_arrow_left</i>
							</a>
							<a class="next-button" id="next">
								<i class="material-icons">keyboard_arrow_right</i>
							</a>

							<div class="row header-title">

							  <div class="header-text">
									<h3 id="month-name">February</h3>
									<h5 id="todayDayName">Today is Friday 7 Feb</h5>
							  </div>

							</div>
						</div>
					</div>

					<div class="calendar-content">
						<div id="calendar-table" class="calendar-cells">

							<div id="table-header">
							  <div class="row">
								<div class="col">Mon</div>
								<div class="col">Tue</div>
								<div class="col">Wed</div>
								<div class="col">Thu</div>
								<div class="col">Fri</div>
								<div class="col">Sat</div>
								<div class="col">Sun</div>
							  </div>
							</div>

							<div id="table-body" class="">

							</div>

						</div>
					</div>

					

				</div>

			</div>
		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	
<!--	<script src="newCalendarfunctions.js"></script>	-->

	<script>
		var calendar = document.getElementById("calendar-table");
		var gridTable = document.getElementById("table-body");
		var currentDate = new Date();
		var selectedDate = currentDate;
		var selectedDayBlock = null;
		var globalEventObj = {};

		function createCalendar(date, side) {
		   var currentDate = date;
		   var startDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

		   var monthTitle = document.getElementById("month-name");
		   var monthName = currentDate.toLocaleString("en-US", {
			  month: "long"
		   });
		   var yearNum = currentDate.toLocaleString("en-US", {
			  year: "numeric"
		   });
		   
		   monthTitle.innerHTML = `${monthName} ${yearNum}`;

		   if (side == "left") {
			  gridTable.className = "animated fadeOutRight";
		   } else {
			  gridTable.className = "animated fadeOutLeft";
		   }

		   setTimeout(() => {
			  gridTable.innerHTML = "";

			  var newTr = document.createElement("a");
			  newTr.className = "row";
			  var currentTr = gridTable.appendChild(newTr);

			  for (let i = 1; i < (startDate.getDay() || 7); i++) {
				 let emptyDivCol = document.createElement("a");
				 emptyDivCol.className = "col empty-day";
				 currentTr.appendChild(emptyDivCol);			 
			  }

			  var lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
			  lastDay = lastDay.getDate();

			  for (let i = 1; i <= lastDay; i++) {
				 if (currentTr.children.length >= 7) {
					currentTr = gridTable.appendChild(addNewRow());
					
				 }
				 let currentDay = document.createElement("a");
				 currentDay.className = "col";
				 if (selectedDayBlock == null && i == currentDate.getDate() || selectedDate.toDateString() == new Date(currentDate.getFullYear(), currentDate.getMonth(), i).toDateString()) {
					selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), i);

					selectedDayBlock = currentDay;
					setTimeout(() => {
					   currentDay.classList.add("blue");
					   currentDay.classList.add("lighten-3");
					}, 900);
				 }
				 currentDay.innerHTML = i;
				 currentTr.appendChild(currentDay);
	
			  }

			  for (let i = currentTr.getElementsByTagName("a").length; i < 7; i++) {
				 let emptyDivCol = document.createElement("a");
				 emptyDivCol.className = "col empty-day";
				 currentTr.appendChild(emptyDivCol);
			  }

			  if (side == "left") {
				 gridTable.className = "animated fadeInLeft";
			  } else {
				 gridTable.className = "animated fadeInRight";
			  }

			  function addNewRow() {
				
				let objWithDate = globalEventObj[selectedDate.toDateString()];
			/*	var chosenDate = selectedDate.toLocaleString("en-US", {
					  month: "long",
					  day: "numeric",
					  year: "numeric"
				   });
			*/	
				
				var link = "schedulingform.php?date="+objWithDate+"&id=<?=$srcode?>";
				
				let node = document.createElement("a");
				node.className = "row";
				node.setAttribute("href",`${link}`);
				document.body.appendChild(node);
				return node;
			  }

		   }, !side ? 0 : 270);
		
		}
	/*	gridTable.onclick = function (e) {

		   if (!e.target.classList.contains("col") || e.target.classList.contains("empty-day")) {
			  return;
		   }

		   selectedDayBlock = e.target;
		   selectedDayBlock.classList.add("blue");
		   selectedDayBlock.classList.add("lighten-3");

		   selectedDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), parseInt(e.target.innerHTML));

		   var chosenDate = selectedDate.toLocaleString("en-US", {
			  month: "long",
			  day: "numeric",
			  year: "numeric"
		   });
		   
		   return e;
	
		}
	*/
		createCalendar(currentDate);

		var todayDayName = document.getElementById("todayDayName");
		todayDayName.innerHTML = "Today is " + currentDate.toLocaleString("en-US", {
		   weekday: "long",
		   day: "numeric",
		   month: "short"
		});

		var prevButton = document.getElementById("prev");
		var nextButton = document.getElementById("next");

		prevButton.onclick = function changeMonthPrev() {
		   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1);
		   createCalendar(currentDate, "left");
		}
		nextButton.onclick = function changeMonthNext() {
		   currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1);
		   createCalendar(currentDate, "right");
		}
		
		
	</script>


</body>
</html>