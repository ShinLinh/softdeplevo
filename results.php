<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Information Page"/>
<meta name="keywords" content="Information, article"/>
<meta name="author" content="Hoang Linh Bui"/>
<link href= "style/style.css" rel="stylesheet"/>
<title>User quiz attempts?</title>
</head>
<body>
<h1>Assignment 3 - Topic: Web 3.0</h1>
<hr />
<?php
	include 'menu.php';
?>
<br />
<h1 class="title">User quiz attempts</h1>


<?php
//set up connection settings
require_once ("settings.php");
$email = NULL;
$score = NULL;
//check user data availability for the section
if (!empty($_SESSION["email"]))
{
	$email = $_SESSION["email"];
}
if (!empty($_SESSION["score"]))
{
	$score = $_SESSION["score"];
}


if ($score != NULL && $email != NULL)
{
echo "<p>Showing attempts of user with email: ", $email, "</p>"; 
echo "<p>Most recent score:", $score, "</p>";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
echo "<p>Database connection failure</p>";
} else {

$sql_table = "QuizAttempts";

$query = "select user_email,score,time from $sql_table where user_email=\"$email\"" ; 

$result = mysqli_query($conn, $query);
if (!$result)
{
	echo "<p>Connection failed. </p>";
} else
{
	//create a table on html
	echo "<table border=\"1\">";
	echo "<tr>"
	. "<th scope=\"col\">Email</th>"
	. "<th scope=\"col\">Attempt Score</th>"
	. "<th scope=\"col\">Attempt Time</th>"
	. "</tr>";
	
	while ($row = mysqli_fetch_assoc($result))
	{
		echo "<tr>";
		echo "<td>",$row["user_email"],"</td>";
		echo "<td>",$row["score"],"</td>";
		echo "<td>",$row["time"],"</td>";
		echo "</tr>";
	}
	echo "</table>";
}
}

// close the database connection
mysqli_close($conn);
} else 
{
	echo "<p>You have not registered</p>";
	}
?>
</body>
</html>