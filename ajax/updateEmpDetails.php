<?php  

if( isset($_POST['emp_name']) && isset($_POST['emp_gender']) && isset($_POST['emp_email']) && isset($_POST['emp_address']) && isset($_POST['emp_id']) )
	{
		// include Database connection file 
		include("db_connection.php");

		// get values 
		$id = $_POST['emp_id'];
		$name = $_POST['emp_name'];
		$email = $_POST['emp_email'];
		$gender = $_POST['emp_gender'];
		$address = $_POST['emp_address'];

		$query = "UPDATE emp_details SET emp_name = '$name',
					 emp_email = '$email',
					 emp_gender = '$gender',
					 emp_address = '$address'
					WHERE emp_id = '$id' ";

		if ( !$result = mysqli_query($con, $query) ) {
			exit(mysqli_error($con));
		}

}

?>