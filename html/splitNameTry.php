<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Home page"/>
		<meta name="keywords" content="Assignment 1"/>
		<meta name="author" content="Assign1Team"/>
		<link href= "style.css" rel="stylesheet"/>
		<title>Result </title>
	</head> 
<body>
<?php
	//require_once("LogonDetais-clearDB.php");
	//$link = new mysqli($host, $user, $password, $current_db);
	include_once("LogonDetails.php");
	$link = mysqli_connect($host, $user, $password, $current_db);
?>


<div class="wrapper">
	<p>Version 2</p>
	<form id ="sub_info" method="POST" action="">
		<label>Name:</label><input type="text" name="fullname" placeholder="Your fullname" required><br>
		<label>Date Of Birth:</label> <input type="text" name="dateofbirth" class="dob_edit" placeholder="DD-MM-YYYY" required><br>
		<input type="submit" name ="submit" value="submit" />
	</form>
	<a href="testing.php" class="button_a">submit form page</a>
	<a href="result.php" class="button_a_overlap">version 1</a>
<?php
	if($link)
		{
			echo "<p>connected</p>";
			$try = "SELECT user_id FROM testdbV2";
			$try2= "SELECT user_id FROM testdb";
			$result = mysqli_query($link, $try);
			
		
		if(!$result){
			echo"<p>empty</p>";
			$mysql_testdb = "CREATE TABLE IF NOT EXISTS testdbV2(
						user_id INT(100) NOT NULL AUTO_INCREMENT,
						firstname VARCHAR(30) NOT NULL,
						lastname VARCHAR(30) NOT NULL,
						dob VARCHAR(30) NOT NULL,
						submittime VARCHAR(50) NOT NULL,
						lifetime INT NOT NULL,
						PRIMARY KEY (user_id)
					);";
			
			$createtab = mysqli_query($link, $mysql_testdb);
				
				if(!$createtab){
					echo "<p>wrong</p>";
				}
		}
		else{
			echo"<p>table exist</p>";
		}
		
			if (!empty($_POST)){
				$fullname = $_POST['fullname'];
				$parts = explode(" ", $fullname);
				$lastname = array_pop($parts);
				$firstname = implode(" ", $parts);
				$dob = $_POST['dateofbirth'];
				$date1 = new DateTime($dob);
				$date2 = date("d-m-Y");
				$submittime = (string) $date2;
				$date2 = new DateTime($date2);
		
				$dateGap = $date2->diff($date1);
				$dayGap = $dateGap -> d;
				$monthGap = $dateGap -> m;
				$yearGap = $dateGap -> y;
				
				$lifetime = $dayGap + $monthGap*30 + $yearGap*12*30 ;
					
				$sqli="INSERT INTO testdbv2(firstname, lastname, dob, submittime, lifetime) VALUES
					('$firstname','$lastname','$dob','$submittime','$lifetime');";
					
				if(mysqli_query($link, $sqli)){
					echo "Record added";
					echo "$firstname $lastname";
				}
				else{
					echo "ERROR: Could not able to execute $sqli. " . mysqli_error($link);
				}
			}		
	}
	else{
		echo"<p>not connected</p>";
	}
?>
</div>
</body>
</html>