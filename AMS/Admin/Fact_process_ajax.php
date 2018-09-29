<?php

	include 'session.php';

	if(isset($_REQUEST['submit_form'])){

		$f_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['facid']));
		$f_name = mysqli_real_escape_string($connection, strip_tags($_REQUEST['facname']));
		$f_lname = mysqli_real_escape_string($connection, strip_tags($_REQUEST['faclname']));
		$f_dept = mysqli_real_escape_string($connection, strip_tags($_REQUEST['deptname']));
		$email_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['email_id']));

		$ins_sql = "INSERT INTO faculty (fact_id, faculty_name, Last_Name, dept_name,email_id) VALUES ('$f_id', '$f_name', '$f_lname', '$f_dept','$email_id')";

		$run_ins = mysqli_query($connection, $ins_sql);
		
		$user="insert into facultylogin values('$f_id','$f_id$f_name','$f_name','$f_dept')";
		$res = mysqli_query($connection, $user);
	}


	if(isset($_REQUEST['del_id'])){
		
		$update_fact="update subjects set fact_id=0 where fact_id='$_REQUEST[del_id]'";
		$run_upd = mysqli_query($connection, $update_fact);
		
		$update_fact2="update attendance set fact_id=0 where fact_id='$_REQUEST[del_id]'";
		$run_upd2 = mysqli_query($connection, $update_fact2);


		$del_sql = "DELETE FROM faculty WHERE fact_id = '$_REQUEST[del_id]'";
		$run_del = mysqli_query($connection, $del_sql);
		

	}

	if(isset($_REQUEST['update_form'])){

		$updt_fid = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_facid']));
		$updt_fname = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_facname']));
		$updt_lname = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_faclname']));
		$updt_dept = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_deptname']));
		$update_emailId = mysqli_real_escape_string($connection, strip_tags($_REQUEST['update_emailId']));

		$update_sql = "UPDATE faculty SET fact_id = '$updt_fid', faculty_name = '$updt_fname', Last_Name = '$updt_lname', dept_name = '$updt_dept',email_id='$update_emailId' WHERE fact_id = '$updt_fid'";
		
		mysqli_query($connection, $update_sql);

	}


	 //conditons for the default onload function .. displays all the data
	 if(isset($_REQUEST['ajax_func'])){
		 
		 $sql = "SELECT * FROM faculty";
		$run = mysqli_query($connection,$sql);

		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>$rows[fact_id]</td>
						<td>$rows[faculty_name]</td>
						<td>$rows[Last_Name]</td>
						<td>$rows[email_id]</td>						
						<td>$rows[dept_name]</td>
						<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_faculty$rows[fact_id]' data-backdrop='static'>Update</button> 
							<button class='btn btn-danger' onclick=del_fac('$rows[fact_id]')>Delete</button>
							<div class='modal fade' id='edit_faculty$rows[fact_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Faculty Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[fact_id]'>
												<div class='form-group'>
													<label>First Name</label>
													<input type='text' value='$rows[faculty_name]' id='update_facname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Last Name</label>
													<input type='text' value='$rows[Last_Name]' id='update_faclname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Email Address</label>
													<input type='email' value='$rows[email_id]' id='update_emailId$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Department</label>
													<input type='text' value='$rows[dept_name]' id='update_deptname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
												<button class='btn btn-info btn-block btn-lg' onclick='update_form($rows[fact_id]);'>Update</button>
												</div>
											</form>
										</div>
										<div class='modal-footer'>
											<div class='text-right'>
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
			echo "<h4><font color='red'>No Records Found</font></h4>";
		}
		 
	 }
	 //only works when you click filter button using the filter function
	 else if(isset($_REQUEST['filter_func'])){
		 
		 $filterV = $_REQUEST['depFilter'];
		 
	 $sql = "SELECT * FROM faculty  WHERE dept_name LIKE '%$filterV%'";
		$run = mysqli_query($connection,$sql);

		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				echo "
					<tr>
						<td>$rows[fact_id]</td>
						<td>$rows[faculty_name]</td>						
						<td>$rows[Last_Name]</td>
						<td>$rows[email_id]</td>
						<td>$rows[dept_name]</td>
						<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_faculty$rows[fact_id]' data-backdrop='static'>Update</button> 
							<button class='btn btn-danger' onclick=del_fac('$rows[fact_id]')>Delete</button>
							<div class='modal fade' id='edit_faculty$rows[fact_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Update Faculty Details</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[fact_id]'>
												<div class='form-group'>
													<label>First Name</label>
													<input type='text' value='$rows[faculty_name]' id='update_facname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Last Name</label>
													<input type='text' value='$rows[Last_Name]' id='update_faclname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Email Address</label>
													<input type='email' value='$rows[email_id]' id='update_emailId$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Department</label>
													<input type='text' value='$rows[dept_name]' id='update_deptname$rows[fact_id]' class='form-control' required>
												</div>
												<div class='form-group'>
												<button class='btn btn-info btn-block btn-lg' onclick='update_form($rows[fact_id]);'>Update</button>
												</div>
											</form>
										</div>
										<div class='modal-footer'>
											<div class='text-right'>
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
			echo "<h5><font color='red'>No Records Found!!!</font></h5>";
		}
			 
	}

?>