<?php

include 'session.php';


	if(isset($_REQUEST['update_form'])){

		$updt_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_roll']));
		$updt_course = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_course']));
		$updt_name = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_studname']));
		$updt_email = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_email']));
		$updt_sem = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_semno']));
		$updt_dob = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_dob']));
		$updt_addr = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_addr']));
		$update_phone = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_phone']));


		$update_sql = "UPDATE student SET stud_id = '$updt_id',Phone_no='$update_phone', course_id = '$updt_course', stud_name = '$updt_name', email_id = '$updt_email', sem_no = '$updt_sem', dob = '$updt_dob', address = '$updt_addr' WHERE stud_id = $updt_id";
		
		mysqli_query($connection, $update_sql);

	}
	
				$login=$login_session;

				$fact="select stud_id,course_id from logindetails where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$stud_id=$row3['stud_id'];
				$course_id=$row3['course_id'];


	$sql = "SELECT * FROM student where course_id='$course_id' and stud_id='$stud_id'";
		$run = mysqli_query($connection,$sql);

		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>Roll No:</td> <td>$rows[stud_id]</td></tr>
						<tr><td>Name:</td> <td>$rows[stud_name]</td></tr>
						<tr><td>Email ID:</td> <td>$rows[email_id]</td></tr>
						<tr><td>Address:</td> <td> $rows[address]</td></tr>
						<tr><td>Date of Birth:</td> <td>$rows[dob]</td></tr>
						<tr><td>Mobile Number:</td> <td>$rows[Phone_no]</td></tr>						
						<tr><td>Course Id:</td> <td>$rows[course_id]</td></tr>
						<tr><td>Semester:</td> <td>$rows[sem_no]</td></tr><br>
						<tr>
						<td>
							<button style='margin-left:100px;' class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[stud_id]' data-backdrop='static'>Update</button> 
							<div class='modal fade' id='edit_student$rows[stud_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Your Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[stud_id]'>
												<div class='form-group'>
													<label>Course ID: $rows[course_id] </label>
													<input type='hidden' value='$rows[course_id]' placeholder='Course No/ID' id='update_courseid$rows[stud_id]' class='form-control' required><br>
									
													<label>Roll No: $rows[stud_id]</label><br/>
													<input type='hidden' value='$rows[stud_id]' placeholder='Your Mobile Num' id='update_roll$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>First Name</label>
													<input type='text' value='$rows[stud_name]' placeholder='First Name' id='update_studname$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>E-mail</label>
													<input type='text' value='$rows[email_id]' placeholder='Email' id='update_email$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Semester</label>
													<input type='text' value='$rows[sem_no]' placeholder='Semester No.' id='update_semno$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Date of Birth</label>
													<input type='text' value='$rows[dob]' id='update_dob$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Address</label><br/>
													<textarea rows='3' cols='50' value='$rows[address]' placeholder='Please Mention your Permanent Address' id='update_addr$rows[stud_id]' required>$rows[address]</textarea>
												</div>
												<div class='form-group'>
													<label>Mobile Number</label><br/>
													<input type='text' value='$rows[Phone_no]' placeholder='Your Mobile Num' id='update_phone$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<button class='btn btn-info btn-block btn-lg' onclick='return update_form($rows[stud_id]);'>Update</button>
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