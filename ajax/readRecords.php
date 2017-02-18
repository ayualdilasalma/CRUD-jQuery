<?php
	// include Database connection file 
	include("db_connection.php");

	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No.</th>
							<th>Full Name</th>
							<th>Email Address</th>
							<th>Gender</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>';

	$query = "SELECT * FROM emp_details";

	if (!$result = mysqli_query($con, $query)) {
        exit(mysqli_error());
    }

    // if query results contains rows then featch those rows 
    if(mysqli_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysqli_fetch_assoc($result))
    	{
    		$data .= '<tr>
				<td>'.$number.'</td>
				<td>'.$row['emp_name'].'</td>
				<td>'.$row['emp_email'].'</td>
				<td>'.$row['emp_gender'].'</td>
				<td>
					<button onclick="GetEmpDetails('.$row['emp_id'].')" class="btn btn-warning">Update</button>
				</td>
				<td>
					<button onclick="DeleteRecord('.$row['emp_id'].')" class="btn btn-danger">Delete</button>
				</td>
    		</tr>';
    		$number++;
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="6">Records not found!</td></tr>';
    }

    $data .= '</table>';

    echo $data;
?>