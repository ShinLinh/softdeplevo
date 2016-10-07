<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Home page"/>
		<meta name="keywords" content="Assignment 1"/>
		<meta name="author" content="Assign1Team"/>
		<link href= "style.css" rel="stylesheet"/>
		<!--<script src=".js"></script>-->
		<title>Home Page </title>
	</head> 
<body>

<?php
	require_once("LogonDetais-clearDB.php");
	/*require_once("LogonDetais.php");*/
	$link = new mysqli($host, $user, $password, $current_db);
?>
<div id="submission">
	<form id ="sub_info" method="POST">
		<label>Name:</label> <input type="text" name="fullname" placeholder="Your fullname"><br>
		<label>Date Of Birth:</label> <input type="date" name="date" placeholder="YYYY/MM/DD"><br>
		<input type="submit" name ="submit" value="submit"/>
<?php
	if($link){
		echo "<p>connected</p>";
		$select_db = mysqli_select_db($link,'SDE_db');
		if ($select_db == true){
			echo "<p>selected</p>";
		}
		else{
			$sql = "CREATE DATABASE SDE_db";
			
			if ($link->query($sql) === TRUE) {
				echo "<p>Database SDE_db created successfully</p>";
			} else {
				echo "<p>Error creating Database: " . $link->error . "</p>";
			}
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS 'username'(
						'user_id' INT(10) NOT NULL AUTO_INCREMENT,
						'fullname' VARCHAR(10) NOT NULL,
						PRIMARY KEY ('user_id')
					)
			") or die(mysql_error);
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS 'dob'(
						'dob_id' INT(10) NOT NULL AUTO_INCREMENT,
						'dob' DATE NOT NULL,
						PRIMARY KEY ('dob_id')
					)
			") or die(mysql_error);
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS 'subtime'(
						'subtime_id' INT(10) NOT NULL AUTO_INCREMENT,
						'submit' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
						PRIMARY KEY ('subtime_id')
					)
			") or die(mysql_error);
			
			$link->close();
		}
	}
	else{
		echo "<p>not connected</p>";
	}
		if (!empty($_POST)){
			$sqli="INSERT INTO username(fullname) VALUES
			('$_POST[fullname]')";	
			if(mysqli_query($link, $sqli)){
				echo "Record added";
			}
			else{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
		}
		mysqli_close($link);
?>
	</form>
</div>
</body>
</html>