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
ini_set("display_errors", TRUE);
	require_once("LogonDetais-clearDB.php");
	$link = new mysqli($host, $user, $password, $current_db);
?>
<div class="wrapper">
	<form id ="sub_info" method="POST" action="form_process.php">
		<label>Name:</label><input type="text" name="fullname" placeholder="Your fullname" required><br>
		<label>Date Of Birth:</label> <input type="date" name="dateofbirth" placeholder="YYYY/MM/DD" required><br>
		<a link="result.php" class="button_a"> show all info </a>
		<input type="submit" name ="submit" value="submit" onclick="document.getElementById"/>
<?php
	if($link){
		/*//echo "<p>connected</p>";
		//if ($link == true){
			//echo "<p>selected</p>";
		//}
		//else{
			//$sql = "CREATE DATABASE SDE_db";
			
			//if ($link->query($sql) === TRUE) {
			//	echo "<p>Database SDE_db created successfully</p>";
			//} else {
			//	echo "<p>Error creating Database: " . $link->error . "</p>";
			//}
		//}
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS 'username'(
						'user_id' INT(10) NOT NULL AUTO_INCREMENT,
						'fullname' VARCHAR(10) NOT NULL,
						PRIMARY KEY ('user_id')
					)
			") or die(mysql_error());
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS 'dob'(
						'dob_id' INT(10) NOT NULL AUTO_INCREMENT,
						'dob' DATE NOT NULL,
						PRIMARY KEY ('dob_id')
					)
			") or die(mysql_error());
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS 'subtime'(
						'subtime_id' INT(10) NOT NULL AUTO_INCREMENT,
						'submit' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
						PRIMARY KEY ('subtime_id')
					)
			") or die(mysql_error());*/
			
			mysqli_query($link,"CREATE TABLE IF NOT EXISTS usertb(
						user_id INT(10) NOT NULL AUTO_INCREMENT,
						fullname VARCHAR(10) NOT NULL,
						dob DATE NOT NULL,
						submit TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
						lifetime DATE NOT NULL,
						PRIMARY KEY (user_id)
					)
			") or die(mysqli_error($link));
			
			//$link->close();
	}
	else{
		echo "<p>not connected</p>";
	}
		if (!empty($_POST)){
			$sqli="INSERT INTO usertb(fullname) VALUES
			('$_POST[fullname]');	
					INSERT INTO usertb(dob) VALUES
			('$_POST[dateofbirth]')";
			//$sqli .="INSERT INTO dob(dob) VALUES
			//('$_POST[dateofbirth')";
			//$sqli="INSERT INTO "
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