<!DOCTYPE html>

<html>
<head> 
<title>Assignment 1</title>
</head>

<body>
	<!-- This is an HTML comment -->
	<?php
		// This is a comment in PHP
		/* This is also a comment */

		// In PHP all keywords, functions, class names are NON - case sensitive
		// In PHP all variables are case sensitive

		if(!empty($_GET["name"]))
		{
			// $userLogged is a variable which holds the value of parameter passed in the URL
			$userLogged = htmlspecialchars($_GET["name"]) ; // htmlspecialchars prevents script injection
		}
		else
		{
			$userLogged = 'Guest';
		}
		echo '<h1>Welcome ' . $userLogged . '!</h1>'; // This is how we print the value of the variable.
		echo '<h2>Class Number: ITMD 562, Assignment 1</h2>';
		echo '<h3>Rishika Upadhyay</h3>';
		echo date('l F j\, Y \- h:i:s A \| ');
		$epochTime = time();
		echo $epochTime;
		echo '<p><a href="form.php">Registration</a></p>';
	
	?>
</body>
</html>