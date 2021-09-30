<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("conection.php");

if(isset($_POST['Submit'])) {	
	$firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
	$identification = mysqli_real_escape_string($mysqli, $_POST['identification']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		
	// checking empty fields
	if(empty($firstname) || empty($lastname) || empty($identification) || empty($email)) {
				
		if(empty($firstname)) {
			echo "<font color='red'>firstname field is empty.</font><br/>";
		}
		
		if(empty($lastname)) {
			echo "<font color='red'>lastname field is empty.</font><br/>";
		}
		
		if(empty($identification)) {
			echo "<font color='red'>identification field is empty.</font><br/>";
		}

		if(empty($email)) {
			echo "<font color='red'>email field is empty.</font><br/>";
		}
		
		//link to the previous plastname
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO users(first_name,last_name,identification,email) VALUES('$firstname','$lastname','$identification', '$email')");
		
		//display success messlastname
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>