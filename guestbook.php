<div id="content">

	<form action="index.php?page=guestbook" method="post">  <!-- (index.php?page=guestbook contains header, menu, guestbook content and footer. However guestbook.php page only contains the guestbook content, without header, menu and footer) -->
		<label for="Name">Name:</label>
		<input type="text" name="name" placeholder="Please enter your name" />
		
		<br/>
		<label for="Surname">Surname:</label>
		<input type="text" name="surname" placeholder="Please enter your surname" />
		
		<br/>
		<label for="Age">Age:</label>
		<input type="number" name="age" placeholder="Please enter your age" />
			
		<br/><br/>
		<label for="email">Email:</label>
			<br/>
			<input type="text" id="email" name="email" placeholder="Please enter your email" />
			
		<br/><br/>	
		<label for="message">Message</label>
			<br/>
			<textarea rows="10" cols="30" name="message" placeholder="Please write your comments"></textarea>
		
		<br/><br/>
		<input type="submit" name = "submit_button" value="Submit" /> <!-- when press submit, the program send in post format the data to the same page (index.php?page=guestbook) -->
	</form>
	
	<?php
		//isset function to verify if any POST data was sent to the page
		if (isset ($_POST['submit_button'])){
			//reading the data from the html form
			$name = $_POST['name'];
			$surname = $_POST['surname'];				
			$age = $_POST['age'];
			$email = $_POST['email'];
			$message = $_POST['message'];
			
			//validate input fields
			$one_or_more_fields_empty_or_incorrect_data = false;
			
			if ($name == ""){ //if name is empty
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			if ($surname == ""){ //if surname is empty
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			if ($age == ""){ //if age is empty
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			if (!is_numeric($age)){ //if age is incorrect
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			if ($email == ""){ //if email is empty
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			if (!filter_var ($email)){ //if email is incorrect
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			if ($message == ""){ //if message is empty
				$one_or_more_fields_empty_or_incorrect_data = true;
			}
			
			//show an error message if any of the fields are empty or not correct
			if ($one_or_more_fields_empty_or_incorrect_data == true){
				echo "<h5>Error: One or more fields were left empty or the data is incorrect!</h5>";
			}
			
			//if all the fields are correct
			else{
				//If all the fields are valid save the guestbook entry to a text file 
				$text_file = fopen("input.txt", "a+");
				$data = "Name : ".$_POST['name']." \n Surname : ".$_POST['surname']." -> Age : ".$_POST['age']." -> Email : ".$_POST['email']." -> Message : ".$_POST['message'];
				fwrite($text_file, $data);
				
				//and show a success message.
				fclose($text_file); 
				$message = "Saved to $text_file successfully!";
				
				//show all guestbook entries underneath the form by reading the entries from the text file
				$reading_from_txt = file_get_contents("input.txt", true);
					echo "$reading_from_txt";
				}
				
				//function created (with one argument)
				function calculate_year_of_birth ($age){
					$current_year = date ("Y");
					$year_of_birth = $current_year - $age;
					return $year_of_birth;
				}
				
				$born_in = calculate_year_of_birth($age);
				echo "<br/>You were born in $born_in";
		}
	?>
<div class="clear"></div>