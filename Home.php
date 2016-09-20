<!DOCTYPE HTML>
<html>  
<body>

<?php
	/*require_once("LogonDetails.php");
	$link = @mysql_connect($host, $user, $password);*/
?>

<form method="get">
Name: <input type="text" name="name" value=""><br>
Date Of Birth: <input type="date" name="date"><br>
<?php
	/*if($link == true){
		echo "connected";
		$select_db= mysql_select_db('sde_db');
	
		$query = "SELECT * from fullname";
		$fetch = mysql_query($query) or die ("couldn't find anything");
	}
	else
	{
		echo"not connected";
	}*/
?>
<input type="submit">
</form>

</body>
</html>