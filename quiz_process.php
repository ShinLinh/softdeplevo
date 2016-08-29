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

$score = 0;
$q1_ans = $_POST["Q1"];
$q2_ans = $_POST["Q2"];
if (isset($_POST["Q31"]))
{	$q31_ans = $_POST["Q31"]; }
else {$q31_ans = "";};
if (isset($_POST["Q32"]))
{	$q32_ans = $_POST["Q32"]; }
else {$q32_ans = "";};
if (isset($_POST["Q33"]))
{	$q33_ans = $_POST["Q33"]; }
else {$q33_ans = "";};
if (isset($_POST["Q34"]))
{	$q34_ans = $_POST["Q34"]; }
else {$q34_ans = "";};
$q4_ans = $_POST["Q4"];
$errMsg = "";
$isvalid = true;

if ($q1_ans == NULL)
{
	echo "<p>You have not entered an answer for question 1. <p>";
	$isvalid = false;
} 
if ($q1_ans == "Web2")
{
	$score ++;
}

if ($q2_ans == "none")
{
	echo "<p>You have not entered an answer for question 1. <p>";
	$isvalid = false;
} 
if ($q2_ans == "2006")
{
	$score ++;
}

if ($q31_ans != "a_ans" && $q32_ans != "b_ans" && $q33_ans != "c_ans" && $q34_ans != "d_ans")
{
	echo "<p>You need to choose at least one answer for question 3.<p>";
	$isvalid = false;
} else
{
	if ($q31_ans == "a_ans")
	{
		$score --;
	}
	if ($q32_ans == "b_ans")
	{
		$score ++;
	}
	if ($q33_ans == "c_ans")
	{
		$score ++;
	}
	if ($q34_ans == "d_ans")
	{
		$score --;
	}
}

if ($q4_ans == NULL)
{
	echo "<p>You have not entered an answer for question 4. <p>";
	$isvalid = false;
}
if ($q4_ans == "John Markoff")
{
	$score ++;
}

if (!$isvalid)
{
	echo '<script language="javascript">';
	echo "alert(\"You have not answered all the questions before clicking the submit button.\")";
	echo '</script>';
	echo "<p>Click <a href=\"quiz_form.php\">here</a> to return to the previous page</p>";
	die();
}

//echo $score;
$_SESSION["score"] = $score;
//echo $_SESSION["score"];
$sql_table = "QuizAttempts";

//check availability of table and create a new table if none exists
if(!mysqli_query($conn,"SELECT * FROM $sql_table"))
{
	$query = " CREATE TABLE QuizAttempts (
		attempt_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		user_email VARCHAR(30) NOT NULL,
		score INT NOT NULL,
		time VARCHAR(50));";
	$result = mysqli_query($conn, $query);
	if (!result)
	{
		echo "Failed to create table. \n";
	}
}

 $email = $_SESSION["email"];
 $time = date("m/d/Y, h:i:s A");
 $query = "insert into $sql_table (user_email, score, time) values ('$email', '$score', '$time')"; 

 $result = mysqli_query($conn, $query);
 if (!$result)
 {
	echo "System failed \n";
 }
mysqli_close($conn);
//echo "Success";
};
//echo "Success";
header("location:quiz_results.php"); //go to the current attempt result page
?>