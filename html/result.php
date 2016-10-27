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
	<div class="wrapper">
		<?php
			//require_once("LogonDetais-clearDB.php");
			include_once("LogonDetais.php");
			$link = new mysqli($host, $user, $password, $current_db);
			if($link){
				echo "<p>connected</p>";
				$result = mysqli_query($link, "SELECT * FROM usertb")
				
				echo "<table border='1'>
					<tr>
						<th>User name</th>
						<th>Date of Birth</th>
						<th>submit time</th>
						<th>user lifetime</th>
					</tr>";
				
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = mysqli_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>" . $row['fullname'] . "</td>";
						echo "<td>" . $row['dob'] . "</td>";
						echo "<td>" . $row['submit'] . "</td>";
						echo "<td>" . $row['lifetime'] . "</td>";
						//echo "<td>" $date= date_diff(. $row['dob'] .,. $row['submit'] .) "</td>";
						echo "</tr>";
					}
				else {
					echo "0 results";
				}
			}
			else{
				echo"<p>not connected</p>"
			}
		?>
</div>
</body>
</html>