<?php

include 'session.php';


	if(isset($_REQUEST['update_form'])){

		//$update_username = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_username']));
		$update_name = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_name']));
		$update_courseId = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_courseId']));
		$update_emailId = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_emailId']));

		$update_sql = "UPDATE adminlogin SET  email_id='$update_emailId', name = '$update_name', course_id = '$update_courseId' WHERE course_id = '$update_courseId'";
		
		mysqli_query($connection, $update_sql);

	}


	$login=$login_session;
	$fact="select * from adminlogin where username='$login'";
	$run=mysqli_query($connection,$fact);
	
	
		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>Name:</td> <td>$rows[name]</td></tr>
						<td>Email Address:</td> <td>$rows[email_id]</td></tr>
						<td>Course Id:</td> <td>$rows[course_id]</td></tr>
						<td>Username:</td> <td>$rows[username]</td></tr>

					<tr>
						<td>
							<button style='margin-left:100px;' class='btn btn-success' data-toggle='modal' data-target='#edit_faculty$rows[course_id]' data-backdrop='static'>Update</button> 
							<div class='modal fade' id='edit_faculty$rows[course_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[course_id]'>
												<div class='form-group'>	
													<label>Course Id:$rows[course_id]</label>
													<input type='hidden' value='$rows[course_id]' placeholder='Course No/ID' id='update_courseId$rows[course_id]' class='form-control' required>
												</div>												
												<div class='form-group'>
													<label>Full  Name</label>
													<input type='text' value='$rows[name]' placeholder='Full Name' id='update_name$rows[course_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Email Address</label>
													<input type='email' value='$rows[email_id]' placeholder='Email Address' id='update_emailId$rows[course_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<button class='btn btn-info btn-block btn-lg' onclick='return update_form($rows[course_id]);'>Update</button>
												</div>
											</form>
										</div>
										<div class='modal-footer'>
											<button class='btn btn-danger' data-dismiss='modal'> Close</button>
										</div>
									</div>
								</div>
							</div>

						</td>
					</tr>
				";
			}
			
		}
		else{
			echo "No Records Found";
		}



?>