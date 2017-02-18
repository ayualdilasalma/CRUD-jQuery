<?php
	if(isset($_POST['name']) && isset($_POST['gender']) && isset($_POST['email']) && isset($_POST['address']))
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];

		$query = "INSERT INTO emp_details(emp_name, emp_email, emp_gender, emp_address) VALUES('$name', '$email', '$gender', '$address')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error());
	    }
	    echo "1 Record Added!";
	}
?>