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
	//require_once("LogonDetais-clearDB.php");
	include_once("LogonDetais.php");
	//$link = new mysqli($host, $user, $password, $current_db);
	$link = mysqli_connect($host, $user, $password, $current_db);
	//$hello = true;
?>


<div class="wrapper">
<?php
	 if($link){
		echo "<p>connected</p>";
		$result = mysqli_query($link, "SELECT * FROM testdb");
				
		echo "<table border='1'>
			<tr>
				<th>User name</th>
				<th>Date of Birth</th>
				<th>submit time</th>
				<th>user lifetime</th>
			</tr>";
				
		 if ($result->num_rows > 0) {
			//output data of each row
			while($row = mysqli_fetch_array($result))
			{
				// echo "<tr>";
				// echo "<td>" . $row['fullname'] . "</td>";
				// echo "<td>" . $row['dob'] . "</td>";
				// echo "<td>" . $row['submittime'] . "</td>";
				// echo "<td>" . $row['lifetime'] . "</td>";
				// echo "</tr>";
				echo"<p>lol</p>";
			}
		}
		else {
			echo "<p>0 results</p>";
		}
	}
	else{
		echo"<p>not connected</p>";
	}
?>
</div>
</body>
</html>