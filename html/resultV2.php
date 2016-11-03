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
			$dropTableQuery = 'DROP TABLE IF EXISTS `testdbV2`' or die(mysql_error());
			$dropTable = mysqli_query ($link, $dropTableQuery);
			if($dropTable){
				echo"<p>deleted table</p>";
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

			$dobQuery = "SELECT dob FROM testdb"; //testdb is Table 1
			$dobFetch = mysqli_query($link, $tryQuery);
			//create an array and insert all dob column values from table 1 to array
			$dobArray = array(); 
			$dobIndex = 0;
			while($row = mysqli_fetch_assoc($dobFetch)){
				 $dobArray[$dobIndex] = $row;
				 $dobIndex++;
			}
			
			
			
			if($dobFetch){
				echo"<p>dob selected from table 1</p>";
				print_r(count($dobArray)); //works fine
				print_r(array_values( $dobArray )); //works fine
				// $tryQuery = "INSERT INTO testdbV2 (dob)
				 // VALUES ('$tryArray')";
			// $testdob = mysqli_query ($link, $tryQuery);
			
			//It says that mysql cannot accept array from php. so i need to convert it 
			//sql statement
			$columns = implode(", ",array_keys($tryQuery));
			$escaped_values = array_map(array($mysqliClass, 'real_escape_string'), array_values($tryArray));
			$tryValues  = implode("', '", $escaped_values);
			
			
			print_r(array_values( $tryValues ));
			$sql = "INSERT INTO `testdbV2`($columns) VALUES ($tryValues)";
			$test2 = mysqli_query ($link, $sql);
			}
			
			
			else{
				echo"<p>no</p>";
			}
			
			
			// $tryQuery = "INSERT INTO testdbV2 (dob, submittime, lifetime)
				// SELECT dob, submmittime, lifetime
				// FROM testdb;";
			$test = mysqli_query ($link, $tryQuery);
			
			if($test){
				echo"<p>yes</p>";
			}
			else{
				echo"<p>no</p>";
			}
			
			$fullnameQuery = "SELECT fullname FROM testdb";
			$fullnameFetch = mysqli_query($link, $fullnameQuery); 
			
			if($fullnameFetch){
				echo"<p>yes</p>";
			}
			else{
				echo"<p>no</p>";
			}
			

			$fullnameArray = array(); 
			$fullnameIndex = 0;
			while($row = mysqli_fetch_assoc($fullnameFetch)){
				 $fullnameArray[$fullnameIndex] = $row;
				 $fullnameIndex++;
			}
			
			$firstnameArray = array();
			$lastnameArray = array();
			//$parts = array();
			$fAndLNameIndex = 0;
			$fAndLNamerow = count($fullnameArray);
			while($fAndLNameIndex <= $fAndLNamerow){
				$parts[$fAndLNameIndex] = explode(" ", $fullnameArray[$fAndLNameIndex]);
				$lastnameArray[$fAndLNameIndex] = array_pop($parts[$fAndLNameIndex]);
				$firstnameArray[$fAndLNameIndex] = implode(" ", $parts[$fAndLNameIndex]);
				
				if isset array 0 
				
				//list($firstnameArray[$fAndLNameIndex], $lastnameArray[$fAndLNameIndex]) = explode(' ', $fullnameArray[$fAndLNameIndex]);
				print_r($fullnameArray[$fAndLNameIndex]);
				print_r($firstnameArray[$fAndLNameIndex]);
				$fAndLNameIndex++;
			}
			
			
			//print_r(array_values( $fullnameArray ));
			
			print_r ( array_values( $firstnameArray ));
			
			print_r ( array_values( $lastnameArray ));
			
			// $columns = implode(", ",array_keys($fullnameArray));
			// $escaped_values = array_map('real_escape_string', array_values($fullnameArray));
			// $values  = implode(", ", $escaped_values);
			// $sql = "INSERT INTO `testdbV2`($columns) VALUES ($values)";
			// $test2 = mysqli_query ($link, $sql);
			
			// if ($result->num_rows > 0) {
				//output data of each row
				// while($row = mysqli_fetch_array($result))	
				// {
					// echo "<tr>";
					// echo "<td>" . $row["firstname"]. "</td>";
					// echo "<td> </td>"; 
					// echo "<td>" . $row["dob"]. "</td>";
					// echo "<td>" . $row["submittime"]. "</td>";
					// echo "<td>" . $row["lifetime"]. "</td>";
					// echo "<td> </td>";
					// echo "</tr>";
				// }
			// }
			// else {
				// echo "<p>0 results</p>";
			// }	
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