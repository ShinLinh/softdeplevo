<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Home page"/>
		<meta name="keywords" content="Assignment 1"/>
		<meta name="author" content="Assign1Team"/>
		<link href= "style.css" rel="stylesheet"/>
		<!--<script src=".js"></script>-->
		<title>Result </title>
	</head> 
<body>
<?php
	require_once("LogonDetais-clearDB.php");
	$link = new mysqli($host, $user, $password, $current_db);
	// include_once("LogonDetails.php");
	// $link = mysqli_connect($host, $user, $password, $current_db);
?>


<div class="wrapper">
	<p>Version 1</p>
	<a href="index.php" class="button_a">submit form page</a>
	<a href="resultV2.php" class="button_a_overlap">version 2</a>
<?php
	if($link)
		{
			
			$try = "SELECT * FROM testdb";
			$result = mysqli_query($link, $try);
			
		
		if($result){
			
			echo "<table border='1'>
			<tr>
				<th>User name</th>
				<th>Date of Birth</th>
				<th>Submit time</th>
				<th>User lifetime/day</th>
			</tr>";
				
			if ($result->num_rows > 0) {
				//output data of each row
				while($row = mysqli_fetch_array($result))
				// while($row = mysqli_fetch_array($result))
				{
					echo "<tr>";
					echo "<td>" . $row["fullname"]. "</td>";
					echo "<td>" . $row["dob"]. "</td>";
					echo "<td>" . $row["submittime"]. "</td>";
					echo "<td>" . $row["lifetime"]. " day(s)</td>";
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