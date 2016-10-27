<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Home page"/>
		<meta name="keywords" content="Assignment 1"/>
		<meta name="author" content="Assign1Team"/>
		<link href= "style.css" rel="stylesheet"/>
		<title>Home Page </title>
	</head> 
<body>

<?php
	include_once("LogonDetails.php");
	$link = mysqli_connect($host, $user, $password, $current_db);
?>
<div class="wrapper">
	<form id ="sub_info" method="POST" action="">
		<label>Name:</label><input type="text" name="fullname" placeholder="Your fullname" required><br>
		<label>Date Of Birth:</label> <input type="text" name="dateofbirth" placeholder="DD-MM-YYY" required><br>
		<input type="submit" name ="submit" value="submit" />
	</form>
	<a link="result.php" class="button_a"> show all info </a>
<?php
	if($link)
		{
			$try = "SELECT user_id FROM testdb";
			$result = mysqli_query($link, $try);
			echo "<p>connected</p>";
			if(empty($result)){
				echo "<p>empty</p>";
					$mysql_testdb = "CREATE TABLE IF NOT EXISTS testdb(
						user_id INT(100) NOT NULL AUTO_INCREMENT,
						fullname VARCHAR(30) NOT NULL,
						dob VARCHAR(30) NOT NULL,
						PRIMARY KEY (user_id)
					);";
				$createtab = mysqli_query($link, $mysql_testdb);
				
				if(!$createtab){
					echo "<p>wrong</p>";
				}
			}
				
			
				
			if(isset($_GET['fullname']) && isset($_GET['dateofbirth']))
					{	
						$name = $_GET['fullname'];
						$dob = $_GET['dateofbirth'];
						
						echo $name;
						//$insertQuery = "INSERT INTO testdb(fullname, dob) VALUES('$name', '$dob');";
						//$resultHello = mysqli_query($link, $insertQuery);
						 // if (mysqli_query($link, $insertQuery)) {
							// echo "New record created successfully";
						// } else {
							// echo "Error: " . $insertQuery . "<br>" . mysqli_error($link);
						// }
					}
					else{
						echo "<p>not workingsaddasds</p>";
					}
						  
					
						 // if (!$resultHello)
							 // {
								 // echo "<p>hello error</p>";
							 // }
		}
	else{
		echo "<p>not connected</p>";
	}
	mysqli_close($link);
 ?>
</div>

</body>
</html>