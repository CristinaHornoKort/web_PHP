<?php
	//verify if any POST data was sent to the page
	if (isset ($_POST['submit_button'])){
		//reading the data from the html form
		$name = $_POST['name']; 
		$surname = $_POST['surname'];
		$gender = $_POST['gender'];
		$department = $_POST['department'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		
		//validate input fields
		$one_or_more_fields_empty_or_incorrect_data = false;
		
		$error_msgs = '';
		
		if ($name == ""){ //if name is empty
			$one_or_more_fields_empty_or_incorrect_data = true;
			$error_msgs = "<h5><br/>Please enter your name<br/><br/></h5>";
		}
		
		if ($surname == ""){ //if surname is empty
			$one_or_more_fields_empty_or_incorrect_data = true;
			$error_msgs .= "<h5>Please enter your surname<br/><br/></h5>";
		}
		
		if ($email == ""){ //if email is empty
			$one_or_more_fields_empty_or_incorrect_data = true;
			$error_msgs .= "<h5>Please enter your email<br/><br/></h5>";
		}
		
		if (!filter_var ($email)){ //if email is incorrect
			$one_or_more_fields_empty_or_incorrect_data = true;
			$error_msgs .= "<h5>Please enter a correct email<br/><br/></h5>";
		}
		
		if ($message == ""){ //if message is empty
			$one_or_more_fields_empty_or_incorrect_data = true;
			$error_msgs .= "<h5>Please enter your message<br/><br/></h5>";
		}
		
		//if all the fields are filled in
		if ($one_or_more_fields_empty_or_incorrect_data == false){
			//the message
			$mail_msg = $_POST['message'];
			
			// use wordwrap() if lines are longer than 70 characters
			$mail_msg = wordwrap($mail_msg,70);
			
			//send email
			mail("cristina.horno@gmail.com", "Subject", $mail_msg);
			
			$answer_msg = "<br/><h4><b>Your email has been correctly sent!</b></h4><br/><br/>";
		}
		
		//if $error_msgs is not empty
		if ($error_msgs != "") {
			//send the messages to the contact page
			header("Location: index.php?page=contact&errors=$error_msgs");	
		}
		
		//if $answer_msg is not empty
		else if ($answer_msg != "") {
			//send the answer to the contact page
			header("Location: index.php?page=contact&answer=$answer_msg");
		}
	}
?>