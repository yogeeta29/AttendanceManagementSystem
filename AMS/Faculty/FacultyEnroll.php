<?php

	include 'session.php';
	$login=$login_session;

	$fact="select fact_id,dept_name from facultylogin where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$fact_id=$row3['fact_id'];
	$dept_name=$row3['dept_name'];

	if(isset($_REQUEST['update_form'])){
	
	$key = mysqli_real_escape_string($connection, strip_tags($_REQUEST['enroll_key']));
	$sub_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sub']));
	
		$search="select fact_id from subjects where sub_id='$sub_id'";
		$res1=mysqli_query($connection,$search);
		$row1 = mysqli_fetch_assoc($res1);
		$fact_id2=$row1['fact_id'];

		if($fact_id2==0){
		$update_sql = "UPDATE subjects SET fact_id = '$fact_id', Enroll_Key = '$key' WHERE sub_id = '$sub_id'";
		mysqli_query($connection,$update_sql);
		echo "<h5>Successfully Enrolled</h5>";
		}
		else
			echo "<h5><font color='red'>You cannot enroll for this subject!!</font></h5>";
		

	}
	
	$sql="select * from subjects where fact_id!='$fact_id'"; 
	$run=mysqli_query($connection,$sql);
	if(mysqli_num_rows($run)>0){
		echo "<th>Subject code</th>
			<th>Subject Name</th>
			<th>Enrollment Key</th>
			<th>Enroll Yourself</th>";
	while ($rows = mysqli_fetch_assoc($run)) {
		echo "
			<tr>
				<td>$rows[sub_id]</td>
				<td>$rows[sub_name]</td>
				<td>$rows[Enroll_Key]</td>
				<td>
					<button class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[sub_id]' data-backdrop='static'>Enroll</button> 
					
					<div class='modal fade' id='edit_student$rows[sub_id]'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header'>
									<h4>Enter new Enrollment Key</h4>
									<button class='close' data-dismiss='modal'>&times;</button>
								</div>
								<div class='modal-body text-left'>
									<form onsubmit='return update_form($rows[sub_id]);' id='update_form$rows[sub_id]'>
										<div class='form-group'>
											<label>Enrollment Key</label>
											<input type='text' value='$rows[Enroll_Key]' placeholder='Enroll Key' id='update_enrollkey$rows[sub_id]' class='form-control' required>
										</div>
										
										<div class='form-group'>
											<button class='btn btn-info btn-block btn-lg'>Update</button>
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
	else
		echo "<h5>You have enrolled for all the courses</h5>";

?>