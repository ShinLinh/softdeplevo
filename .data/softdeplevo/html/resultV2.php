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
	<a href="testing.php" class="button_a">submit form page</a>
	<a href="result.php" class="button_a_overlap">version 1</a>
<?php
	if($link)
		{
			$try = "SELECT user_id FROM testdbV2";
			$try2= "SELECT user_id FROM testdb";
			$result = mysqli_query($link, $try);
			
		
		if($result){
			
			$mysql_testdb = "CREATE TABLE IF NOT EXISTS testdbV2(
						user_id INT(100) NOT NULL AUTO_INCREMENT,
						firstname VARCHAR(30) NOT NULL,
						lastname VARCHAR(30) NOT NULL,
						dob VARCHAR(30) NOT NULL,
						submittime VARCHAR(50) NOT NULL,
						lifetime INT NOT NULL,
						PRIMARY KEY (user_id)
					);";
			
			echo "<table border='1'>
			<tr>
				<th>User first name</th>
				<th>User last name</th>
				<th>Date of Birth</th>
				<th>Submit time</th>
				<th>User lifetime</th>
			</tr>";
				
			if ($result->num_rows > 0) {
				//output data of each row
				while($row = mysqli_fetch_array($result))
				// while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row["firstname"]. "</td>";
					
					echo "<td>" . $row["dob"]. "</td>";
					echo "<td>" . $row["submittime"]. "</td>";
					echo "<td>" . $row["lifetime"]. "</td>";
					echo "</tr>";
				}
			}
			else {
				echo "<p>0 results</p>";
			}	
		}
		else{
			echo"<p>fail</p>";
		}
	}
	else{
		echo"<p>not connected</p>";
	}
?>
</div>
</body>
</html>