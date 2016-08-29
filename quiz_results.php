<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Results"/>
<meta name="keywords" content="Assignment, 1, Results"/>
<meta name="author" content="Hoang Linh Bui"/>
<link href= "style/style.css" rel="stylesheet"/>
<script src="quiz.js"></script>
<title>Results Page</title>
</head>
<body>
<h1>Assignment 2 - Topic: Web 3.0</h1>
<hr />
<?php
	include 'menu.php';
?>
<br />
<h2 class="title">Result</h2>

<p id="participantName"></p>

<?php
	if ($_SESSION["score"] != NULL)
	{
		echo "<p>Your score was: ", $_SESSION["score"], "<p>";
	}
?>

</body>
</html>