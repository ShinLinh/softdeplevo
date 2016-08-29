<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Student Information"/>
<meta name="keywords" content="student"/>
<meta name="author" content="Hoang Linh Bui"/>
<link href= "style/style.css" rel="stylesheet"/>
<title>Student Information</title>
</head>
<body>
<h1>Assignment 1 - Topic: Web 3.0</h1>
<hr />
<?php
	include 'menu.php';
?>
<br />
<main>
<h2 class="title">About the student</h2>
<p id="studentname"><strong>Hoang Linh Bui</strong></p>
<p id="studentid">100017631</p>
<p id="course">Bachelor of Arts(Games &amp; Interactivity)/Bachelor of Science</p>
<figure>
	<img src="images/pass.jpg" alt="photo" width="150" height="193" id="portrait"/>
	<figcaption id="caption">Photo used for iUSEpass</figcaption>
</figure>
<p id="timetable">Swinburne Timetable</p>
<table>
<tr>
	<td class="heading">Subjects</td>
	<td class="heading">Lectures</td>
	<td class="heading">Tutorials/Labs</td>
</tr>
<tr>
	<td>SWE20004 - Technical Software Development</td>
	<td>Wednesday, 15:30 - 17:30</td>
	<td>Thursday, 8:30 - 10:30</td>
</tr>
<tr>
	<td>COS10011 - Creating Web Applications</td>
	<td>Tuesday, 8:30 - 10:30</td>
	<td>Monday, 8:30 - 10:30</td>
</tr>
<tr>
	<td>DIG10004 - Digital Video and Audio</td>
	<td>Monday, 10:30 - 11:30</td>
	<td>Tuesday, 11:30 - 14:30</td>
</tr>
<tr>
	<td>GAM10001 - Interactive Game Structures</td>
	<td>Monday, 14:30 - 15:30</td>
	<td>Wednesday, 13:30 - 15:30</td>
</tr>
</table>
</main>
<footer>
<hr />
<p id="emailto">Email to: <a href="mailto:100017631@gmail.com">100017631@gmail.com</a></p>
</footer>
</body>
</html>