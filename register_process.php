/*
Author: Hoang Linh Bui
Created: May 22, 2015
Last Modified: May 24, 2015
*/

<?php
session_start();
//setting up connection
require_once ("settings.php"); 
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {

echo "<p>Database connection failure</p>";
} else {
$isvalid = true;
$sql_table = "users";

//check availability of table and create a new table if none exists
if(!mysqli_query($conn,"SELECT * FROM $sql_table"))
{
	$query = " CREATE TABLE users (
		email VARCHAR(50) PRIMARY KEY, 
		name VARCHAR(32) NOT NULL,
		dob VARCHAR(10) NOT NULL,
		gender VARCHAR(6) NOT NULL,
		st_addr VARCHAR(60),
		pcode INT NOT NULL,
		state VARCHAR(5) NOT NULL,
		phone INT NOT NULL);";
	$result = mysqli_query($conn, $query);
	if (!$result)
	{
		echo "<p>Failed to create table.</p>";
	}
}

//validate input data
if (isset($_POST['firstname']) && !empty($_POST['firstname']))
{
	if (preg_match('/[A-Za-z\s]/', $_POST['firstname']) && strlen($_POST['firstname']) <= 12)
	{
		$firstname = strip_tags(trim($_POST['firstname']));
	} else
	{
		echo "<p>Invalid input for \"First name\" field. <p>";
		$isvalid = false;
	}
	
	if (isset($_POST['lastname']) && !empty($_POST['lastname']))
	{
		if (preg_match('/[A-Za-z\s]/', $_POST['lastname']) && strlen($_POST['lastname']) <= 20)
		{
			$lastname= strip_tags(trim($_POST['lastname']));
			$name = $firstname . " " . $lastname;
		} else
		{
			echo "<p>Invalid input for \"Last name\" field.</p>";
			$isvalid = false;
		}
	}
	else 
	{
		echo "<p>You have not entered a value for the \"Last name\" field. </p>";
		$isvalid = false;
	}
} else
{
	echo "<p>You have not entered a value for the \"First name\" field.</p>";
	$isvalid = false;
}	

if (isset($_POST['dob']) && !empty($_POST['dob']))
{
	if (preg_match('/\d{2}-\d{2}-\d{4}/', $_POST['dob']) && strlen($_POST['dob']) < 11)
	{
		$dob = trim($_POST['dob']);
	} else
	{
		echo "<p>Invalid input for \"Date of birth\" field. </p>";
		$isvalid = false;
	}
} else
{
	echo "<p>You have not entered a value for the \"Date of birth\" field.</p>";
	$isvalid = false;
}

if (isset($_POST['gender']) && !empty($_POST['gender']))
{
	$gender = $_POST['gender'];
} else
{
	echo "<p>You have not chosen your gender.</p>";
		$isvalid = false;
}

if (isset($_POST['street_address']) && !empty($_POST['street_address']))
{
	if (strlen($_POST['street_address']) <= 40)
	{
		$streetaddress = htmlentities(trim($_POST['street_address']));
	} else
	{
		echo "<p> Invalid input for \"Street address\" field. </p>";
		$isvalid = false;
	}	
	if (isset($_POST['suburb']) && !empty($_POST['suburb']))
	{
		if (strlen($_POST['suburb']) <= 20)
		{ 
			$suburb = htmlentities(trim($_POST['suburb']));
			$address = $streetaddress . ", " . $suburb;
		} else 
		{ 
			echo "<p>Invalid input for \"suburb\" field. </p>";
			$isvalid = false;
		}
	} else
	{
		echo "<p>You have not entered a value for the \"Suburb\" field.</p>";
		$isvalid = false;
	}
} else 
{
	echo "<p>You have not entered a value for the \"Street address\" field.</p>";
	$isvalid = false;
}

if (isset($_POST['postal']) && !empty($_POST['postal']))
{
	if (preg_match('/\d{4}/', $_POST['postal']) && strlen($_POST['postal']) < 5)
	{
		$pcode = trim($_POST['postal']);
	}
	else
	{
		echo "<p>Invalid input for \"Postal code\" field. </p>";
		$isvalid = false;
	}	
}else
{
	echo "<p>You have not entered a value for the \"Postal code\" field.</p>";
	$isvalid = false;
}

if ($_POST['state'] != "")
{
	$state = $_POST['state'];
} else
{
	echo "<p>You have not chosen a state.</p>";
	$isvalid = false;
}

if (isset($_POST['email']) && !empty($_POST['email']))
{
	if (preg_match('/[a-zA-Z0-9_\.]+@[a-zA-Z]+\.[a-zA-Z]+/', $_POST['email']))
	{
		$email = trim($_POST['email']);
		$_SESSION["email"] = $email;
	}
	else
	{
		echo "<p>Invalid input for \"Email address\" field. </p>";
		$isvalid = false;
	}
	
	//search for emails in the table that matches the entered email
	$query = "SELECT email FROM $sql_table";
	$result = mysqli_query($conn, $query);
	while ($compare = mysqli_fetch_assoc($result))
	{
		//echo "<p>", $compare["email"], "</p>";
		if ($email == $compare["email"]) 
		{
			echo "<p>Duplicate email</p>";
			$isvalid = false;
		}
	}
	
	
	mysqli_free_result($result);
} else
{
	echo "<p>You have not entered a value for the \"Email address\" field.</p>";
	$isvalid = false;
}

if (isset($_POST['telephone']) && !empty($_POST['telephone']))
{
	if (preg_match('/\d{10}/', $_POST['telephone']))
	{
		$phone = $_POST['telephone'];
	} else
	{
		echo "<p>Invalid input for \"Phone number\" field. </p>";
		$isvalid = false;
	}
} else
{
	echo "<p>You have not entered a value for the \"Phone number\" field.</p>";
	$isvalid = false;
}

//check a result to create a link to get back to registration page
if (!$isvalid)
{
	echo "<p>Click <a href=\"register_form.php\">here</a> to get back to the registration page.</p>";
	die ();
}

// add input to the table
$query = "insert into $sql_table (email, name, dob, gender, st_addr, pcode, state, phone) values 
		('$email', '$name', '$dob', '$gender', '$address', '$pcode', '$state', '$phone');";
$result = mysqli_query($conn, $query);
if (!$result)
{
	echo "<p>Operation failed.</p>";
}

}
// close the database connection
mysqli_close($conn);
header("location:register_form.php");
?>