<?php  

include('db_connection.php');

if ( isset($_POST['emp_id']) && isset($_POST['emp_id']) != "" ) {

	$emp_id = $_POST['emp_id'];

	$query = "SELECT * FROM emp_details WHERE emp_id = '$emp_id' ";
	if ( !$result = mysqli_query($con, $query) ) {
		exit(mysqli_error($con));
	}

	$response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}

?>