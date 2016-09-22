<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Home page"/>
		<meta name="keywords" content="Assignment 1"/>
		<meta name="author" content="Assign1Team"/>
		<!--<link href= "style/style.css" rel="stylesheet"/>
		<script src="quiz.js"></script>-->
		<title>Home Page </title>
	</head> 
<body>

<?php
	require_once("LogonDetails.php");
	$link = @mysqli_connect($host, $user, $password);
?>

<form method="get">
Name: <input type="text" name="name" value=""><br>
Date Of Birth: <input type="date" name="date"><br>
<input type="submit">
<?php
	if($link == true){
		echo "connected";
		$select_db = mysqli_select_db('SDE_db');
		if ($select_db == true)
		{
			echo "selected";
		}
		else{
			$sql = "CREATE DATABASE SDE_db";
			
			if ($link->query($sql) === TRUE) {
				echo "Table SDE_db created successfully";
			} else {
				echo "Error creating table: " . $link->error;
			}
			$link->close();
		}
	}
	
		/*$query = "SELECT * from fullname";
		$fetch = mysql_query($query) or die ("couldn't find anything");*/
	else
	{
		echo "not connected";
	}
?>

<input type="submit">
</form>

</body>
</html>