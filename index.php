<!DOCTYPE html>
<html>
	<head>
		<title>Geology of The Maltese Islands</title>
		<link rel="stylesheet" href="styles.css" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<img src="images/Blue grotto.jpg" alt="Blue grotto" width="210" />
				</div>
				<div id="logo_text">
					<h1>Geology of The Maltese Islands</h1>
					<h3>(Malta, Gozo & Comino)</h3>
				</div>
			</div>
			<div class="clear"></div>
			
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?page=about">About</a></li>
					<li><a href="index.php?page=guestbook">Guestbook</a></li>
					<li><a href="index.php?page=contact">Contact</a></li>
				</ul>
			</div>
			<div class="clear"></div>
			
			<?php
				if (isset($_GET['page'])) {
					//store value of page into $page
					$page = $_GET['page'];
					
					//read a GET request from the URL (using $_GET)
					if (file_exists($page.".php")) {	
						include($page.".php");	
					}
					//otherwise, include notfound.php
					else {
						include('notfound.php');
					}
				}
				else {
					include("home.php");
				}
			?>
			
			<div id="footer">
				<div class="left">
				<?php
					echo date("l dS F Y H:i");
				?>
				</div>
				<div class="right">
					Copyright &copy; 2015. All Rights Reserved.
				</div>
			</div>
		</div>		
	</body>
</html>