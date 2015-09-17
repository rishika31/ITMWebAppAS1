<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
</head>
<body>

<?php

	$firstNameErr = "";
	$lastNameErr = "";
	$emailErr = "";
    $firstName = $lastName = $email =  "";
    $comments = "";
    $isValid = true;

    function buildMyForm(){ ?>
		<form name="formRegister" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>>
		<!-- $_SERVER is a super global variable. 
		And $_SERVER["PHP_SELF"] would return the path of the currently executing PHP script which is form.php in current scenario 
		$_SERVER["PHP_SELF"] exploits can be avoided by using the htmlspecialchars() function. 
		-->
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
	 	Select document:
	    <input type="file" name="docUpload" id="docUpload">
	    <input type="submit" value="Upload" name="submit"> <br><br>


	    <input type="submit" name="submit" value="Submit">
	</form>
	
<?php
	}

    function validate_input($data){
	
		$data = trim($data);                   // Trim whitespaces at the beginning or end			 
		$data = htmlspecialchars($data);       // Convert special characters to HTML entities
		return $data;
	}

    if ($_SERVER["REQUEST_METHOD"] == "POST") // This if condition determines if the form has been loaded with POST or not
	{
		$firstName = validate_input($_POST["txtFirstName"]); 

		$lastName = validate_input($_POST["txtLastName"]);

		$email = validate_input($_POST["txtEmail"]);

		$comments = validate_input($_POST["txtComments"]);	

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

			echo 'You have been successfully registered ' . $firstName . ' ' . $lastName;
			// TODO: Build an HTML to display the results	
		}
		else
		{
			buildMyForm();
		}

		
		/*if(isset($_POST["submit"])) {
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["docUpload"]["name"]);
			$target_file = uploads/my_file.txt

			// Check if file already exists
			if (file_exists($target_file)) {
    			echo "Sorry, file already exists.";
			}
			
			if (move_uploaded_file($_FILES["docUpload"]["tmp_name"], $target_file)) {
        		echo "The file ". basename( $_FILES["docUpload"]["name"]). " has been uploaded.";
    		} 
    		else {
       			echo "Sorry, there was an error uploading your file.";
    		}
		}*/

	}
	else { 

		buildMyForm();
	}
?>

</body>
</html>