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
	//require_once("LogonDetais-clearDB.php");
	//require_once("LogonDetais.php");
	include_once("LogonDetails.php");
	//$link = new mysqli($host, $user, $password, $current_db);
	$link = mysqli_connect($host, $user, $password, $current_db);
?>
<div class="wrapper">
	<form id ="sub_info" method="POST" action="">
		<label>Name:</label><input type="text" name="fullname" placeholder="Your fullname" required><br>
		<label>Date Of Birth:</label> <input type="text" name="dateofbirth" id="dob_edit" placeholder="DD-MM-YYY" required><br>
		<input type="submit" name ="submit" value="submit" onclick="document.getElementById"/>
	</form>
	<a href="result.php" class="button_a"> show all info </a>
<?php
	if($link)
		{
			$try = "SELECT user_id FROM usertb";
			$result = mysqli_query($link, $try);
			echo "<p>connected</p>";
			if(empty($result))
			{
				echo "<p>empty</p>";
					$mysql_usertb = "CREATE TABLE IF NOT EXISTS usertb(
						user_id INT(100) NOT NULL AUTO_INCREMENT,
						fullname VARCHAR(30) NOT NULL,
						dob VARCHAR(30) NOT NULL,
						submit VARCHAR(50) NOT NULL,
						lifetime INT NOT NULL,
						PRIMARY KEY (user_id)
					);";
				$createtab = mysqli_query($link, $mysql_usertb) or die(mysql_error());
			}
				
			if (!empty($_POST))
			{
				$fullname = $_POST['fullname'];
				$dob = $_POST['dateofbirth'];
				$date1 = DateTime($dob);
				$date2 = date("d-m-Y");
				$submittime = (string) $date2;
				$date2 = new DateTime($date2);
		
				$dateGap = $date2->diff($date1);
				$dayGap = $dateGap -> d;
				$monthGap = $dateGap -> m;
				$yearGap = $dateGap -> y;
				
				$lifetime = $dayGap + $monthGap*30 + $yearGap*12*30 ;
					
				$sqli="INSERT INTO testdb(fullname, dob, submit, lifetime) VALUES
					('$fullname','$dob','$submittime','$lifetime');";	
				if(mysqli_query($link, $sqli)){
					echo "Record added";
				}
				else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
				}
			}		
		}	
	else{
		echo "<p>not connected</p>";
	}
	mysqli_close($link);
 ?>
</div>

</body>
</html>