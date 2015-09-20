<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

<?php
	
	/*Define a constant, a set value that is assigned globally, making it available to
	functions and classes without passing them directly as an argument.*/
	define('HELLO', 'Hello World!'); 
	
	/*Functions can be placed anywhere in a page and will be available even if
	called above the actual function being created. The exception to this rule is if
	the function is only defined as part of a conditional statement, and is not
	available to be called until that conditional statement has been evaluated.*/
	function TrimAndClean($data)
    {	
		$data = trim($data);                   // Trim whitespaces at the beginning or end			 
		$data = htmlspecialchars($data);       // Convert special characters to HTML entities
		return $data;
	}

	// Stops the current script and outputs the optional $string.
	// die([$string])

	// Evaluates a string as if it was code. 
	// eval($string)

	// Pauses PHP for $integer amount of seconds
	// sleep($integer)

	/* Changes the formatting of $string from the URL compatible (such as a GET
	   query) format to human readable format*/
	// urldecode($string)

	// This function displays structured information about one or more expressions that includes its type and value.
	// NOTE: Surrounding the var_dump() with the HTML tags <pre> </pre> will present the output of multiple expressions in a more human readable format.
	// var_dump(expression)

	// is_null() – Check whether a variable is NULL
	// isset() – Check whether a variable has been set/created/declared

	// empty($variable). Determine whether the $variable is empty. Returns TRUE if the $variable is:
	/* '' – Empty $string
	   0 – For an $integer
	   '0' – For a $string
	   array() – For an $array
	   NULL
	   FALSE
	   An undeclared variable*/

	// Accepts multiple $variables separated by commas, but will only return TRUE if all variables are set
	// isset($variable [, ...$variable...])

	// Returns a string containing the current directory.
	// var_dump( getcwd() );

	// Checks whether a file or directory with name/path of $string exists, returning TRUE if it does exist
	// file_exists($string)

	// Checks whether $string is a file, returning TRUE if it exists and is a file.
	// is_file($string)

	// Copies a file with name source to name destination, overwriting the destination file it if already exists. The original source file is unchanged.   
	// copy(source, destination)

	$firstNameErr = "";
	$lastNameErr = "";
	$emailErr = "";
	$firstName = $lastName = $email =  "";
	$comments = "";
	$isValid = true;
	$firstName = $lastName = $email = $comments = "";
	$result = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") // This if condition determines if the form has been loaded with POST or not
	{
		$firstName = TrimAndClean($_POST["txtFirstName"]);
		$lastName = TrimAndClean($_POST["txtLastName"]);
		$email = TrimAndClean($_POST["txtEmail"]);
		$comments = TrimAndClean($_POST["txtComments"]);
		if(empty($firstName))
		{
			$firstNameErr = "* First Name is required";
			$isValid = false;
		}
		if (empty($lastName)) {
			$lastNameErr = "* Last Name is required";
			$isValid = false;
		}
		if (empty($email)) {
			$emailErr = "* Email is required";
			$isValid = false;
		}
		
		if($isValid)
		{
			$result = 'You have been successfully registered:<br> First Name: ' . $firstName . ' <br>Last Name: ' . $lastName . ' <br>Email Address: ' . $email;
			buildMyResults($result);
			die();
		}

		buildMyForm($firstNameErr, $lastNameErr, $emailErr);
	}
	else 
	{ 
		buildMyForm($firstNameErr, $lastNameErr, $emailErr);
	}
	

    function buildMyForm($firstNameErr, $lastNameErr, $emailErr)
    { 


    	?>
	<form name="formRegister" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> enctype="multipart/form-data">
		<!-- $_SERVER is a super global variable. 
		And $_SERVER["PHP_SELF"] would return the path of the currently executing PHP script which is form.php in current scenario 
		$_SERVER["PHP_SELF"] exploits can be avoided by using the htmlspecialchars() function. 
		-->
		<!-- The form also needs the following attribute: enctype="multipart/form-data". 
		It specifies which content-type to use when submitting the form. Without this file upload will not work -->

		First Name: <input type="text" name="txtFirstName" value="<?php echo isset($_POST['txtFirstName']) ? $_POST['txtFirstName'] : '' ?>">
		<span style="color:red"><?php echo ' ' . $firstNameErr;?></span><br><br>
		Last Name: <input type="text" name="txtLastName" value="<?php echo isset($_POST['txtFirstName']) ? $_POST['txtLastName'] : '' ?>">
		<span style="color:red"><?php echo ' ' . $lastNameErr;?></span><br><br>
		Email Address: <input type="text" name="txtEmail" value="<?php echo isset($_POST['txtEmail']) ? $_POST['txtEmail'] : '' ?>">
		<span style="color:red"><?php echo ' ' . $emailErr;?></span><br><br>
		<!-- isset($_POST['txtFirstName']) ? $_POST['txtFirstName'] : '' ternary operation checks to see if the value of the firstName textbox was already entered
			or not. If yes, it will retain the value on the POST else it will clear the value
		 -->

		Gender:
		<input type="radio" name="rdoGender" value="f">Female
		<input type="radio" name="rdoGender" value="m">Male

		<br><br>Course:
		<select name="selCourse">
			<option value="ITM">ITM</option>
			<option value="CS">CS</option>
		</select>

	    <br><br>Comments: <textarea name="txtComments"><?php echo isset($_POST['txtComments']) ? $_POST['txtComments'] : '' ?></textarea><br><br>
	    <input type="checkbox" name="cbxTerms" value="ok">I accept the Terms & Conditions <br><br>
	 	Select document: <input type="file" name="docUpload" id="docUpload"><br><br>
	    <input type="submit" name="submit" value="Submit">
	</form>	
	
<?php
	}
	function buildMyResults($result)
	{ 
    	if(isset($_POST["submit"])) {
			$target_dir = "uploads/";
			//$target_file = $target_dir . basename($_FILES['docUpload']['name']);
			//$target_file = uploads/my_file.txt;

			echo basename($_FILES["docUpload"]["name"]);
			echo '$target_file:' . $target_file;
			echo '$target_dir:' . $target_dir;

			// Check if file already exists
			if (file_exists($target_file)) {
    			echo "Sorry, file already exists.";
    			die();
			}
			
			if (move_uploaded_file($_FILES['docUpload']['tmp_name'], $target_file)) {
        		echo "The file ". basename( $_FILES["docUpload"]["name"]). " has been uploaded.";
    		} 
    		else {
       			echo "Sorry, there was an error uploading your file.";
    		}
		}

		?>		
	  	<label><?php echo isset($result) ? $result : '' ?></label>
	<?php }    
?>

</body>
</html>