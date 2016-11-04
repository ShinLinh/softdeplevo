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
	require_once("LogonDetais-clearDB.php");
	$link = new mysqli($host, $user, $password, $current_db);
	// include_once("LogonDetails.php");
	// $link = mysqli_connect($host, $user, $password, $current_db);
?>


<div class="wrapper">
	<p>Version 2</p>
	<a href="index.php" class="button_a">submit form page</a>
	<a href="result.php" class="button_a_overlap">version 1</a>
<?php
	if($link)
		{
			$dropTableQuery = 'DROP TABLE IF EXISTS `testdbV2`' or die(mysql_error());
			$dropTable = mysqli_query ($link, $dropTableQuery);
			if($dropTable){
				echo"<br><br><br>";
				echo"<br>";
			}
			else{
				echo"<p>not deleted</p>";
			}
			
			$selectTable = "SELECT user_id FROM testdbV2";
			$result = mysqli_query($link, $selectTable);
			
		
		if(!$result){
			$mysql_testdb = "CREATE TABLE IF NOT EXISTS testdbV2(
						user_id INT(100) NOT NULL AUTO_INCREMENT,
						firstname VARCHAR(30),
						lastname VARCHAR(30),
						dob VARCHAR(30),
						submittime VARCHAR(50),
						lifetime INT,
						martian INT,
						PRIMARY KEY (user_id)
					);";
					
			$createTable = mysqli_query($link, $mysql_testdb);
			
			
			echo "<table border='1'>
			<tr>
				<th>User first name</th>
				<th>User last name</th>
				<th>Date of Birth</th>
				<th>Submit time</th>
				<th>User lifetime</th>
				<th>Martian time</th>
			</tr>";

			$dobQuery = "SELECT fullname, dob, submittime, lifetime FROM testdb"; //testdb is Table 1
			$dobFetch = mysqli_query($link, $dobQuery);
			//create an array and insert all dob column values from table 1 to array
			$dobArray = array(); 
			$dobIndex = 0;
			$totalCount = mysqli_num_rows($dobFetch);
			
			while($row = mysqli_fetch_assoc($dobFetch)){
				$name = explode(" ", $row['fullname']);

				$dobArray[$dobIndex]['firstname'] = isset($name[0]) ? $name[0] : '';
				$dobArray[$dobIndex]['lastname'] = isset($name[1]) ? $name[1] : '';
				$dobArray[$dobIndex]['dob'] = $row['dob'];
				$dobArray[$dobIndex]['submittime'] = $row['submittime'];
				$dobArray[$dobIndex]['lifetime'] = $row['lifetime'];
				$dobArray[$dobIndex]['martian'] = $row['lifetime'] * 0.025 + $row['lifetime'];

				$dobIndex++;
			}
			
			if($dobFetch)
			{
				$columns = implode(", ",array_keys($dobArray[0]));
			
				for($i = 0; $i < sizeof($dobArray); $i++) {

				foreach ($dobArray[$i] as &$value) {
					$value = addslashes($value);
				}

				$dobValues  = array_values($dobArray[$i]);
				foreach ($dobValues as &$value) {
					$value = "'" . $value . "'";
				}
				$valueSql = implode(",", $dobValues);
				$sql = "INSERT INTO `testdbV2` ($columns) VALUES ($valueSql);"; //testdbV2 is table 2
					
				$dobSql = mysqli_query ($link, $sql);
				}

			}
			else
			{
				echo"<p>dob array did not work</p>";
			}
			
			$selectResult = "SELECT * FROM testdbV2";
			$resultQuery = mysqli_query($link, $selectResult);
			if ($resultQuery->num_rows > 0) {
				//output data of each row
				while($row = mysqli_fetch_array($resultQuery))	
				{
					echo "<tr>";
					echo "<td>" . $row["firstname"]. "</td>";
					echo "<td>" . $row["lastname"]. "</td>"; 
					echo "<td>" . $row["dob"]. "</td>";
					echo "<td>" . $row["submittime"]. "</td>";
					echo "<td>" . $row["lifetime"]. "</td>";
					echo "<td>" . $row["martian"]. "</td>";
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