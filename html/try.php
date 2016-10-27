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
<<<<<<< HEAD
	//require_once("LogonDetais-clearDB.php");
	//require_once("LogonDetais.php");
	include_once("LogonDetails.php");
	//$link = new mysqli($host, $user, $password, $current_db);
	$link = mysqli_connect($host, $user, $password, $current_db);
=======
	include("LogonDetais-clearDB.php");
	$link = new mysqli($host, $user, $password, $current_db);
>>>>>>> 661d81b0e728464448914ee6862c8ff9ed5de2a9
?>
<div class="wrapper">
	<form id ="sub_info" method="POST" action="form_process.php">
		<label>Name:</label><input type="text" name="fullname" placeholder="Your fullname" required><br>
		<label>Date Of Birth:</label> <input type="date" name="dateofbirth" placeholder="YYYY/MM/DD" required><br>
		<input type="submit" name ="submit" value="submit" onclick="document.getElementById"/>
		
	</form>
 <a link="result.php" class="button_a"> show all info </a>
 <?php
	if($link)
	{
		$try = "SELECT user_id FROM usertb";
		$result = mysqli_query($link, $try);
		echo "<p>connected</p>";
<<<<<<< HEAD
		 if(empty($result)){
			 echo "<p>empty</p>";
			$mysql_usertb = "CREATE TABLE IF NOT EXISTS usertb(
				user_id INT(10) NOT NULL AUTO_INCREMENT,
				fullname VARCHAR(10) NOT NULL,
				dob DATE NOT NULL,
				submit TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
				lifetime DATE NOT NULL,
				PRIMARY KEY (user_id)
			);";
			mysqli_query($link, $mysql_usertb) or die(mysql_error());
		 }	
		 $link->close();
=======
		$mysql_usertb = "CREATE TABLE IF NOT EXISTS usertb(
			user_id INT(10) NOT NULL AUTO_INCREMENT,
			fullname VARCHAR(10) NOT NULL,
			dob DATE NOT NULL,
			submit TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
			lifetime DATE NOT NULL,
			PRIMARY KEY (user_id)
			)"
		mysqli_query($link,$mysql_usertb) or die(mysql_error());
			
		$link->close();
>>>>>>> 661d81b0e728464448914ee6862c8ff9ed5de2a9
	}
	else{
		echo "<p>not connected</p>";
	}
	 if (!empty($_POST)){
		 $sqli="INSERT INTO usertb(fullname) VALUES
		 ('$_POST[fullname]');	
			 INSERT INTO usertb(dob) VALUES
		 ('$_POST[dateofbirth]')";
		if(mysqli_query($link, $sqli)){
			echo "Record added";
		}
		else{
			echo "ERROR: Could not execute $sql. " . mysqli_error($link);
		}
	}
	mysqli_close($link);
 ?>
</div>

</body>
</html>