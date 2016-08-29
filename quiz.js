/*
Author: Hoang Linh Bui
Date Created: May 3, 2015
Last modified: May 24, 2015
*/

window.onload = init;

//showing more questions as the user progresses
function advance()
{	
	result = true;
	var i;
	var button1 = document.getElementById("checkAns");
	var button2 = document.getElementById("submitAns");
	
	var q2Arr = document.getElementsByClassName("Qu2");
	var q3Arr = document.getElementsByClassName("Qu3");
	var q4Arr = document.getElementsByClassName("Qu4");
	
	var a1 = document.getElementById("Web10").checked;
	var b1 = document.getElementById("Web20").checked;
	var c1 = document.getElementById("Web30").checked;
	
	var q2 = document.getElementById("Q2");
	var q4 = document.getElementById("Q4");
	
	var a3 = document.getElementById("a_ans");
	var b3 = document.getElementById("b_ans").checked;
	var c3 = document.getElementById("c_ans").checked;
	var d3 = document.getElementById("d_ans").checked;
	
	if ( !a1 && !b1 && !c1) //checking input
	{
		alert("You have not chosen an answer for question 1 \n");
		result = false;
	} else 
	{
		for (i = 0; i < q2Arr.length; i++)
		{
			q2Arr[i].style.visibility = "visible"; //changing questions and answers elements  of the next question to visible to the user
		}
	}
	
	if (q2.value == "none" && q2.style.visibility == "visible") //checking input
	{
		alert("Please choose an answer for question 2"); 
		result = false;
	}
	else
	{
			for (i = 0; i < q3Arr.length; i++)
			{
				q3Arr[i].style.visibility = "visible";
			}
	}
	
	if (a3.style.visibility == "visible" && !a3.checked && !b3 && !c3 && !d3) // check input
	{
		alert("Please choose at least one answer for question 3");
		result = false;
	}
	else if (a3.checked || b3 || c3 || d3)
	{
		{
			for (i = 0; i < q4Arr.length; i++)
				{
					q4Arr[i].style.visibility = "visible";
				}
		}
	}
	
	if (result == true ) // changing the submit buttons' visibility
	{
		button1.style.visibility = "visible";
		button2.style.visibility = "hidden";
	}
	
	return result;
}

function validate()
{
	var errMsg = "";
	var result = true;
	var score = 0;
	
	var a1 = document.getElementById("Web10").checked;
	var b1 = document.getElementById("Web20").checked;
	var c1 = document.getElementById("Web30").checked;
	
	var q2 = document.getElementById("Q2").value;
	var q4 = document.getElementById("Q4").value;
	
	var q3s = 0;
	var a3 = document.getElementById("a_ans").checked;
	var b3 = document.getElementById("b_ans").checked;
	var c3 = document.getElementById("c_ans").checked;
	var d3 = document.getElementById("d_ans").checked;
	
	if ( !a1 && !b1 && !c1)
	{
		errMsg += "You have not chosen an answer for question 1 \n";
		result = false;
	}
	
	if (q2 == "none")
	{
		errMsg += "Please choose an answer for question 2 \n"; 
		result = false;
	}
	
	if (!a3 && !b3 && !c3 && !d3)
	{
		errMsg += "Please choose at least one answer for question 3 \n";
		result = false;
	}
	
	//adding 1 point to the score if the answer is b
	if (b1)
	{
		score += 1;
	}
	
	//adding 1 point to the scrore if the answer is "2006"
	if (q2 == "2006")
	{
		score += 1;
	}
	
	//adding 1 point and deducting 1 point depending on which answer is checked
	if (b3)
	{	
		q3s += 1;
	}
	if (c3)
	{	
		q3s += 1;
	}
	if (a3)
	{	
		q3s -= 1;
	}
	if (d3)
	{	
		q3s -= 1;
	}	
	//to avoid minus points
	if (q3s < 0)
	{
		q3s = 0;
	}
	//add Question 3 score to the total score
	if (q3s > 0)
	{
		score += q3s;
	}
	
	
	//check string in question 4
	if (q4 == "John Markoff")
	{
		score += 1;
	} else if (q4 == "") // check if input is present or not
	{
		errMsg += "Please enter an answer for question 4 \n";
		result = false;
	}
	
	
	if (result == true)
	{
		
		localStorage.score = score; // storing the score to local storage
		//alert(localStorage.score); -> for debugging
		window.location="quiz_results.php" // move to the results page
		
		//--> for debugging
	}
	
	if (result == false)
	{
		alert(errMsg);
	}
	return result;
}
	
function datStore() //storing username data to local storage
{	
	var firstName = document.getElementById("firstname").value;
	var lastName = document.getElementById("lastname").value;
	localStorage.firstname = firstName;
	localStorage.lastname = lastName;
	//alert(localStorage.firstname + " " + localStorage.lastname);
}

function quizEnter() // move to the quiz page
{
	window.location = "quiz_form.php";
}

function init()
{
	var button1 = document.getElementById("checkAns");
	var button2 = document.getElementById("submitAns");
	var regSub = document.getElementById("registration");
	if (regSub != null) {regSub.onsubmit = datStore};
	var quizEntry = document.getElementById("entry");
	var quizScore = document.getElementById("quizScore");
	var participantName = document.getElementById("participantName");
	
	if (participantName != null) 
	{
		if (localStorage.firstname != null && localStorage.lastname != null)
		{
			participantName.innerHTML = "Thank you for taking your time to answer the quiz, " + localStorage.firstname + " " + localStorage.lastname;
		}
		else
		{
			alert("You have not registered yet!");
		}
	}
	
	if ((quizEntry != null) && (localStorage.firstname != "") && (localStorage.lastname.value != ""))
	{
		quizEntry.style.visibility = "visible";
		quizEntry.onclick = quizEnter;
	}
	
	if (button2 != null) {button2.onclick = advance};
	//if (button1!= null) {button1.onclick = validate};
}


