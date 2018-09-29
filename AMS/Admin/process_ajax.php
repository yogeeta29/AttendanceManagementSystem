<?php

	include 'session.php';

	if(isset($_REQUEST['submit_form'])){

		$s_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sid']));
		$c_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['courseid']));
		$s_name = mysqli_real_escape_string($connection, strip_tags($_REQUEST['name']));
		$email = mysqli_real_escape_string($connection, strip_tags($_REQUEST['email']));
		$s_sem = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sem']));
		$s_dob = mysqli_real_escape_string($connection, strip_tags($_REQUEST['date']));
		$s_addr = mysqli_real_escape_string($connection, strip_tags($_REQUEST['address']));
		$phone = mysqli_real_escape_string($connection, strip_tags($_REQUEST['phone']));

		$ins_sql = "INSERT INTO student (stud_id, course_id, stud_name, email_id, sem_no, dob, address,Phone_no) VALUES ('$s_id', '$c_id', '$s_name','$email', '$s_sem', '$s_dob', '$s_addr','$phone')";

		$run_ins = mysqli_query($connection, $ins_sql);
		
		$user="insert into logindetails values('$s_id','$c_id','$s_id','$s_id')";
		$res = mysqli_query($connection, $user);

	}


	if(isset($_REQUEST['del_id'])){

		$del_sql = "DELETE FROM student WHERE stud_id = '$_REQUEST[del_id]'";
		$run_del = mysqli_query($connection, $del_sql);

	}

	if(isset($_REQUEST['update_form'])){

		$updt_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_studid']));
		$updt_course = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_course']));
		$updt_name = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_studname']));
		$updt_email = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_email']));
		$updt_sem = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_semno']));
		$updt_dob = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_dob']));
		$updt_addr = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_addr']));
		$update_phone = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_phone']));


		$update_sql = "UPDATE student SET Phone_no='$update_phone', stud_id = '$updt_id', course_id = '$updt_course', stud_name = '$updt_name', email_id = '$updt_email', sem_no = '$updt_sem', dob = '$updt_dob', address = '$updt_addr' WHERE stud_id = $updt_id";
		
		mysqli_query($connection, $update_sql);

	}




	if(isset($_REQUEST['ajax_func'])){
		$login=$login_session;
		$fact="select * from adminlogin where username='$login'";
		$res=mysqli_query($connection,$fact);
		$row1 = mysqli_fetch_assoc($res);
		$course_id=$row1['course_id'];

		$sql = "SELECT * FROM student where course_id='$course_id'";
		$run = mysqli_query($connection,$sql);
		
		if((mysqli_num_rows($run)) > 0){
			$stud_count="select count(stud_id) as count from student where course_id='$course_id'";
			$run_count = mysqli_query($connection,$stud_count);
			$rows_count = mysqli_fetch_assoc($run_count);
			echo "<tr>
			<td></td>		
			<td><b>Total Students</td>
			<td><b>$rows_count[count]</b></td></tr>";
				
				echo "<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>E-mail</th>
						<th>Date of Birth</th>
						<th>Phone No.</th>
						<th>Address</th>
						<th>Semester</th>
						<th>Edit Options</th>";		
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>$rows[stud_id]</td>
						<td>$rows[stud_name]</td>
						<td>$rows[email_id]</td>
						<td>$rows[dob]</td>
						<td>$rows[Phone_no]</td>
						<td>$rows[address]</td>
						<td>$rows[sem_no]</td>
						<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[stud_id]' data-backdrop='static'>Update</button> 
							<button class='btn btn-danger' onclick=del_stud('$rows[stud_id]')>Delete</button>
							<div class='modal fade' id='edit_student$rows[stud_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Student Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[stud_id]'>
												<div class='form-group'>
													<label>Course ID</label>
													<input type='text' value='$rows[course_id]' placeholder='Course No/ID' id='update_courseid$rows[stud_id]' class='form-control' required>
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
													<label>Phone Num</label>
													<input type='text' value='$rows[Phone_no]' placeholder='Phone No.' id='update_phone$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Semester</label>
													<input type='text' value='$rows[sem_no]' placeholder='Semester No.' id='update_semno$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Date of Birth</label>
													<input type='date' value='$rows[dob]' id='update_dob$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Address</label><br/>
													<textarea rows='3' cols='50' value='$rows[address]' placeholder='Please Mention your Permanent Address' id='update_addr$rows[stud_id]' required>$rows[address]</textarea>
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
				echo "<h4 align='center'><font color='red'>No Records Found!!!</font></h4>";
		}
	}
	else if(isset($_REQUEST['filter_func'])){
		$login=$login_session;
		$fact="select * from adminlogin where username='$login'";
		$res=mysqli_query($connection,$fact);
		$row1 = mysqli_fetch_assoc($res);
		$course_id=$row1['course_id'];
		 
		$filterS = $_REQUEST['sfilter'];
		 
	 	$sql = "SELECT * FROM student  WHERE course_id='$course_id' AND sem_no LIKE '$filterS'";
		$run = mysqli_query($connection,$sql);

		if((mysqli_num_rows($run)) > 0){
			$stud_count="select count(stud_id) as count from student where course_id='$course_id' and sem_no='$filterS'";
			$run_count = mysqli_query($connection,$stud_count);
			$rows_count = mysqli_fetch_assoc($run_count);
			echo "<tr>
			<td></td>		
			<td><b>Total Students</td>
			<td><b>$rows_count[count]</b></td></tr>";
			
			
			echo "
						<th>ID</th>
						<th>First Name</th>
						<th>E-mail</th>
						<th>Date of Birth</th>
						<th>Phone No.</th>
						<th>Address</th>
						<th>Semester</th>
						<th>Edit Options</th>";
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>$rows[stud_id]</td>
						<td>$rows[stud_name]</td>
						<td>$rows[email_id]</td>
						<td>$rows[dob]</td>
						<td>$rows[Phone_no]</td>
						<td>$rows[address]</td>
						<td>$rows[sem_no]</td>
						<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[stud_id]' data-backdrop='static'>Update</button>
							<button class='btn btn-danger' onclick=del_stud('$rows[stud_id]')>Delete</button>
							<div class='modal fade' id='edit_student$rows[stud_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Student Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[stud_id]'>
												<div class='form-group'>
													<label>Course ID</label>
													<input type='text' value='$rows[course_id]' placeholder='Course No/ID' id='update_courseid$rows[stud_id]' class='form-control' required>
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
													<label>Phone Num</label>
													<input type='text' value='$rows[Phone_no]' placeholder='Phone No.' id='update_phone$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Semester</label>
													<input type='text' value='$rows[sem_no]' placeholder='Semester No.' id='update_semno$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Date of Birth</label>
													<input type='date' value='$rows[dob]' id='update_dob$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Address</label><br/>
													<textarea rows='3' cols='50' value='$rows[address]' placeholder='Please Mention your Permanent Address' id='update_addr$rows[stud_id]' required>$rows[address]</textarea>
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
				echo "<h4 align='center'><font color='red'>No Records Found!!!</font></h4>";
		}
	}



?>