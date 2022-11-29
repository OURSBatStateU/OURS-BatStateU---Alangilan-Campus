<?php

session_start();

$servername= "localhost";

$db_username= "root";

$db_password = "";

$db_name = "ours_db";

$conn = mysqli_connect($servername, $db_username, $db_password, $db_name);


if (!$conn) {
	echo "Connection failed!";
}
else{
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//validate the data
		function authenticate($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  
		  return $data;
		}
		
		$uname = authenticate($_POST['username']);
		$pass = authenticate($_POST['password']);
		
		
		$adminuname = "admin";
		$adminpass = "admin123";
	
		$sql = "SELECT srcode, password FROM student WHERE srcode='$uname' AND password='$pass'";
		$result = mysqli_query($conn, $sql);
		
		
		if ((empty($uname)) || (empty($pass))){
			header ("Location: newlandpage.html");
			exit();
		}
		else if ((empty($uname)) && (empty($pass))){
			header ("Location: newlandpage.html");
			exit();
		}
		else if ((isset($uname)) && (isset($pass))) {
			if ($uname == $adminuname) {		
			
				if ($pass == $adminpass){
					header ("Location: admin_homepage\adminhomepage-Reservation.php");
					exit();
				}
				else{
					header ("Location: ErrorAlert.html?error='You entered an incorrect username or password.'");
					exit();
				}
			}
			else if ($uname != $adminuname){
				
				if (mysqli_num_rows($result) > 0){
					
					while($row = mysqli_fetch_assoc($result)){
						
						if (($uname == $row['srcode']) && ($pass == $row['password'])){
							header ("Location: student_homepage\homepage.php?id=$uname");
							exit();
						}
						else if (($uname != $row['srcode']) || ($pass != $row['password'])){
							header ("Location: ErrorAlert.html?error='You entered an incorrect username or password.'");
							exit();
						}
						
					}
				}
				else {
					header ("Location: ErrorAlert.html?error='You entered an incorrect username or password.'");
					exit();
				}

			}
			else {
				header ("Location: ErrorAlert.html?error='You entered an incorrect username or password.'");
				exit();
			}
			
		}//else if
	}//if
	else {
		header ("Location: ErrorAlert.html?error='You entered an incorrect username or password.'");
		exit();
	}

}//else
?>
