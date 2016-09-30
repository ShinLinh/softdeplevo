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
	require_once("LogonDetails.php");
	$link = @mysqli_connect($host, $user, $password, $current_db);
?>
<div id="submission">
	<form id ="sub_info" method="POST">
		<label>Name:</label> <input type="text" name="fullname"><br>
		<label>Date Of Birth:</label> <input type="date" name="date"><br>
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
				echo "<p>Table SDE_db created successfully</p>";
			} else {
				echo "<p>Error creating table: " . $link->error . "</p>";
			}
			$link->close();
		}
	}
	else{
		echo "<p>not connected</p>";
	}
		if (!empty($_POST)){
			$sqli="INSERT INTO username(fullname, ) VALUES
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