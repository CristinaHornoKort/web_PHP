<div id="content">

	<?php
		//use of query strings to pass messages from process-contact.php page to contact.php page
		if (isset($_GET['answer'])) {
			
			echo $_GET['answer'];	
		}

		if (isset($_GET['errors'])) {
			
			echo $_GET['errors'];
		}
	?>

	<form action="process_contact.php" method="post">
		<label for="Name">Name:</label>
		<input type="text" name="name" placeholder="Please enter your name" />
		<br/>
		<label for="Surname">Surname:</label>
		<input type="text" name="surname" placeholder="Please enter your surname" />
		<br/>
		<label for="gender">Gender:</label>
		<br/>	
		<input type="radio" id="gender" name="gender" value="male" /> 
		<label for="male">Male</label>
		<br/>
		<input type="radio" id="gender" name="gender" value="female" />
		<label for="male">Female</label>
		
		<br/><br/>
		<label for="department">Department:</label>
		<select name="department" id="department" >
				<option value= "marketing">Marketing</option>
				<option value= "sales">Sales</option>
				<option value= "accounting">Accounting</option>
				<option value= "it">IT</option>
				<option value= "design">Design</option>
			</select>
			
		<br/><br/>
		<label for="email">Email:</label>
			<br/>
			<input type="text" id="email" name="email" placeholder="Please enter your email" />
			
		<br/><br/>	
		<label for="message">Message</label>
			<br/>
			<textarea rows="10" cols="30" name="message" placeholder="Please write your comments"></textarea>
		
		<br/><br/>
		<input type="submit" name = "submit_button" value="Send" /> <!-- when press submit, program send in post format the data to the action process_contact.php -->
	</form>

<div class="clear"></div>