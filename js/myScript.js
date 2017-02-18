function readRecords() {
	$.get("ajax/readRecords.php", {}, function (data, status) {
		$(".records_content").html(data);
	})
}

function addRecord() {
	var name = $('#name').val();
	var email = $('#email').val();
	var gender = $('input[name=gender]:checked').val();
	var address = $('#address').val();

	// add records
	$.post("ajax/addRecords.php", {
		name: name,
		email: email,
		gender: gender,
		address: address
	}, function (data, status) {
		$("#add_new_record_modal").modal("hide");

		// read records again
		readRecords();

		// clear fields from the popup
		$("#name").val("");
		$('#email').val("");
		$('#gender').val("");
		$('#address').val("");
	});
}

function DeleteRecord(emp_id) {
	var conf = confirm("Are you sure to delete this data?");
	if ( conf == true ) {
		$.post("ajax/deleteRecord.php", {
			emp_id: emp_id
		},
		function (data, status) {
			readRecords();
		});
	};
}

function GetEmpDetails(emp_id) {
	// Add User ID to the hidden field for furture usage
	$('#hidden_emp_id').val(emp_id);
	$.post('ajax/readEmpDetails.php', {
		emp_id: emp_id
	}, function (data, status) {
		// PARSE json data
		var user = JSON.parse(data);

		// Assing existing values to the modal popup fields
		$('#update_name').val(user.emp_name);
		$('#update_email').val(user.emp_email);
		var jenis_kelamin = user.emp_gender;
		$('input[name=jenis_kelamin][value='+ jenis_kelamin +']').attr('checked', true);
		$('#update_address').val(user.emp_address);

	});

	// open modal
	$('#update_emp_modal').modal("show");
}

function UpdateRecordDetails() {
	var name = $('#update_name').val();
	var email = $('#update_email').val();
	var gender = $('input[name=jenis_kelamin]:checked').val();
	var address = $('#update_address').val();
	var id = $('#hidden_emp_id').val();

	$.post("ajax/updateEmpDetails.php", {
		emp_id: id,
		emp_name: name,
		emp_email: email,
		emp_address: address,
		emp_gender: gender
	}, function(data, status) {

		// confirm(name);
		$("#update_emp_modal").modal("hide");

		readRecords();
	});
}

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
});