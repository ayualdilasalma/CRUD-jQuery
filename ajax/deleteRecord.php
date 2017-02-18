<?php  

if ( isset($_POST['emp_id']) && isset($_POST['emp_id']) != "" ) {
	include('db_connection.php');

	$emp_id = $_POST['emp_id'];

	$query = "DELETE FROM emp_details WHERE emp_id = '$emp_id'";
	if ( !$result = mysqli_query($con, $query) ) {
		exit(mysqli_error($con));
	}

}

?>