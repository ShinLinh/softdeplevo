<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<meta name="description" content="Interest registration page"/>
<meta name="keywords" content="Assignment, 1"/>
<meta name="author" content="Hoang Linh Bui"/>
<link href= "style/style.css" rel="stylesheet"/>
<script src="quiz.js"></script>
<title>Interest Registration </title>
</head>
<body>
<h1>Assignment 1 - Topic: Web 3.0</h1>
<hr />
<?php
	include 'menu.php';
?>
<br />
<h2 class="title">Interest Registration</h2>
<form id="registration" method="post" action="register_process.php" novalidate="novalidate">
<br />
<fieldset >
<legend>Required information: </legend>
<p><label>Topic Name: </label>
<input type="text" name="topic" value="Web? 3.0?" readonly="readonly" required="required" /> </p>
<p><label>First Name: </label>
<input type="text" name="firstname" id="firstname" maxlength="12"  pattern="[A-Za-z\s]+" required="required"/>
</p>
<p><label>Last Name: </label>
<input type="text" name="lastname" id="lastname" maxlength="20"  pattern="[A-Za-z\s]+" required="required"/>
</p>
<p><label>Date of birth: </label>
<input type="text" name="dob" required="required" pattern="\d{2}/\d{2}/\d{4}"/> </p>
<fieldset class="index">
<legend>Gender: </legend>
<input type="radio" name="gender" id="male" value="Male" required="required"/>
<label for="male"> Male</label>
<input type="radio" name="gender" id="female" value="Female" required="required"/>
<label for="female"> Female</label>
</fieldset>
<p><label>Address:</label></p>
<ul>
	<li>
	<p><label>Street Address:</label>
	<input type="text" name="street_address" maxlength="40" required="required"/></p>
	</li>
	<li>
	<p><label>Suburb/Town:</label>
	<input type="text" name="suburb" maxlength="20" required="required"/></p>
	</li>
	<li>
	<p><label>State</label>
	<select name="state" required="required">
		<option value="">Please select one</option>
		<option value="NSW">NSW</option>
		<option value="VIC">VIC</option>
		<option value="QLD">QLD</option>
		<option value="TAS">TAS</option>
		<option value="WA">WA</option>
		<option value="SA">SA</option>
		<option value="NT">NT</option>
		<option value="ACT">ACT</option>
	</select>
	</p>
	</li>
	<li>
	<p><label>Postal Code:</label>
	<input type="text" name="postal" required="required" pattern="\d{4}"/></p>
	</li>
</ul>

<p><label>Email address: </label>
<input type="email" name="email" placeholder="name@domain.com" pattern="[a-zA-Z0-9_\.]+@[a-zA-Z]+\.[a-zA-Z]+" required="required" />
</p>
<p><label>Phone number: </label>
<input type="tel" name="telephone" pattern="\d{10}" required="required"/>
</p>
</fieldset>
<p><label>Sub-topic of Interests</label></p>
<p><input type="checkbox" name="interest" value="Web 2.0" /> Web 2.0</p>
<p><input type="checkbox" name="interest" value="Semantic Web"/> Semantic Web</p>
<p><label>Comments: </label></p>
<p><textarea rows='5' cols='70'></textarea></p>
<br />
<input type="submit" value="Submit"/>
<input type="reset" value="Reset"/>
</form>
<button id="entry">Surprise!</button>
</body>
</html>