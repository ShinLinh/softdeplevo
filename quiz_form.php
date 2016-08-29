<?php
session_start(); //start session
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Quiz page"/>
<meta name="keywords" content="Assignment, 2"/>
<meta name="author" content="Hoang Linh Bui"/>
<link href= "style/style.css" rel="stylesheet"/>
<script src="quiz.js"></script>
<title>Quiz Page </title>
</head>
<body>
<h1>Assignment 2 - Topic: Web 3.0</h1>
<hr />
<?php
	include 'menu.php';
?>
<br />
<h2 class="title">Quiz about Web 3.0</h2>
<form id="quiz" method="post" action="quiz_process.php" novalidate="novalidate">
<label>1. Which version of the internet are we currently using?</label>
<br />
<input type="radio" name="Q1" id="Web10" value="Web1"/>
<label for="Web10">a) Web 1.0</label>
<br />
<input type="radio" name="Q1" id="Web20" value="Web2"/>
<label for="Web20">a) Web 2.0</label>
<br />
<input type="radio" name="Q1" id="Web30" value="Web3"/>
<label for="Web30">a) Web 3.0</label>
<br />
<p><label class="Qu2">2. When was the term Web 3.0 coined? </label>
<select class="Qu2" id="Q2" name="Q2">
		<option value="none">Choose an answer:</option>
		<option value="1999">1999</option>
		<option value="2004">2004</option>
		<option value="2006">2006</option>
</select>
</p>
<p><label class="Qu3">3. Which of these are true about Web 3.0? </label>
<br />
<input type="checkbox" name="Q31" class="Qu3" id="a_ans" value="a_ans" />
<label for="a_ans"  class="Qu3" >a) Web 3.0 is read-only. The users can only search and read information on the Internet.</label>
<br />
<input type="checkbox" name="Q32" id="b_ans" class="Qu3" value="b_ans" />
<label for="b_ans"  class="Qu3" > b) Web 3.0 is &quot;intelligent&quot;</label>
<br />
<input type="checkbox" name="Q33" id="c_ans" class="Qu3" value="c_ans" />
<label for="c_ans"  class="Qu3" >c) Universal connectivity between all types of Internet devices at any time, any place"</label>
<br />
<input type="checkbox" name="Q34" id="d_ans" class="Qu3" value="d_ans" />
<label for="d_ans"  class="Qu3" >d) Semantic Web is Web 3.0</label>
</p>
<p><label class="Qu4">4.Who coined the term "Web 3.0"?</label>
<br />
<input type="text" id="Q4" name="Q4" class="Qu4" /> </p> 
<input type="submit" id="checkAns" value ="Check Result"/>
</form>

<button type="button" id="submitAns" >Submit answer</button>
</body>
</html>
