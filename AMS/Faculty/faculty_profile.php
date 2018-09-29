<?php

include 'session.php';


	if(isset($_REQUEST['update_form'])){

		$updt_fid = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_facid']));
		$updt_fname = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_facname']));
		$updt_lname = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_faclname']));
		$updt_dept = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_deptname']));
		$update_emailId = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_emailId']));

		$update_sql = "UPDATE faculty SET fact_id = '$updt_fid', email_id='$update_emailId', faculty_name = '$updt_fname', Last_Name = '$updt_lname', dept_name = '$updt_dept' WHERE fact_id = '$updt_fid'";
		
		mysqli_query($connection, $update_sql);

	}


	$login=$login_session;
	$fact="select fact_id,dept_name from facultylogin where username='$login'";
			$s=mysqli_query($connection,$fact);
			$row3 = mysqli_fetch_assoc($s);
			$fact_id=$row3['fact_id'];
			$dept_name=$row3['dept_name'];

	$sql = "SELECT * FROM faculty where fact_id='$fact_id' and dept_name='$dept_name'";
	$run = mysqli_query($connection,$sql);
	
		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>Faculty ID:</td> <td>$rows[fact_id]</td></tr>
						<td>Name:</td> <td>$rows[faculty_name] $rows[Last_Name]</td></tr>
						<td>Email Address:</td> <td>$rows[email_id]</td></tr>
						<td>Department Name:</td> <td>$rows[dept_name]</td></tr>

					<tr>
						<td>
							<button style='margin-left:100px;' class='btn btn-success' data-toggle='modal' data-target='#edit_faculty$rows[fact_id]' data-backdrop='static'>Update</button> 
							<div class='modal fade' id='edit_faculty$rows[fact_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[fact_id]'>
												<div class='form-group'>										
													<label>Faculty ID: $rows[fact_id]</label>
													<input type='hidden' value='$rows[fact_id]' placeholder='Course No/ID' id='update_factId$rows[fact_id]' class='form-control' required>				
												</div>
												<div class='form-group'>	
													<label>Department Name</label>
													<input type='text' value='$rows[dept_name]' placeholder='Course No/ID' id='update_deptname$rows[fact_id]' class='form-control' required>
												</div>												
												<div class='form-group'>
													<label>First Name</label>
													<input type='text' value='$rows[faculty_name]' placeholder='First Name' id='update_facname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Last Name</label>
													<input type='text' value='$rows[Last_Name]' placeholder='Last Name' id='update_faclname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Email Address</label>
													<input type='email' value='$rows[email_id]' placeholder='Email Address' id='update_emailId$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<button class='btn btn-info btn-block btn-lg' onclick='return update_form($rows[fact_id]);'>Update</button>
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