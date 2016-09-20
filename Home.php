<!DOCTYPE HTML>
<html>  
<body>

<?php
	$link = mysql_connect('localhost', 'root', 'root');
?>

<form method="get">
Name: <input type="text" name="name" value=""><br>
Date Of Birth: <input type="date" name="date"><br>
<?php
	if($link == true){
		echo "connected";
	}
	else
	{
		echo"not connected";
	}
	$select_db= mysql_select_db('sde_db');
	
	$query = "SELECT * from fullname";
	$fetch = mysql_query($query) or die ("couldn't find anything");
	
?>
<input type="submit">
</form>

</body>
</html>