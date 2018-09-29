<?php

	include 'session.php';
	$login=$login_session;

	$fact="select stud_id,course_id from logindetails where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$stud_id=$row3['stud_id'];
	$course_id=$row3['course_id'];

	if(isset($_REQUEST['update_form'])){
	
	$key = mysqli_real_escape_string($connection, strip_tags($_REQUEST['enroll_key']));
	$sub_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sub']));
	
			$check="select * from enroll where stud_id='$stud_id' and sub_id='$sub_id'";
			$result=mysqli_query($connection,$check);
			$row1 = mysqli_fetch_assoc($result);
			if((mysqli_num_rows($result)) == 0){
			
			$sql="select Enroll_Key,fact_id from subjects where sub_id='$sub_id'";
			$res=mysqli_query($connection,$sql);
			$rows = mysqli_fetch_assoc($res);
			$enroll=$rows['Enroll_Key'];
			$fact_id=$rows['fact_id'];

			if($key==$enroll && $fact_id!=0){
				$query="insert into enroll values($stud_id,$course_id,$sub_id)";
				$result=mysqli_query($connection,$query);
				echo "<h5>You are successfully enrolled for subject $sub_id</h5>";
			}
			else
				echo "<h5><font color='red'>Wrong Enrollment Key</font></h5>";
			}
			else
				echo "<h5>You are already enrolled for subject $sub_id</h5>";
		

	}
	
	$sql="select dept_name from courses where course_id='$course_id'";
	//$sql="select e.sub_id,c.sub_name,f.faculty_name from courses c,enroll e,faculty f where e.course_id='$course_id' and e.course_id=c.course_id"; 
	//$sql="select f.faculty_name,c.sub_id,c.sub_name from enroll e,courses c,faculty f where c.course_id='$course_id' and e.sub_id=c.sub_id and f.fact_id=c.fact_id and f.dept_name=c.dept_name"; 
	//$sql="select * from courses ";
	
	$sql="select f.faculty_name,f.Last_Name,c.sub_id,c.sub_name from subjects c,faculty f where c.course_id='$course_id' and f.fact_id=c.fact_id"; 
	
	$run=mysqli_query($connection,$sql);
		echo "<th>Subject code</th>
			<th>Subject Name</th>
			<th>Faculty Name</th>
			<th>Enroll Yourself</th>";

	while ($rows = mysqli_fetch_assoc($run)) {
		echo "
			<tr>
				<td>$rows[sub_id]</td>
				<td>$rows[sub_name]</td>
				<td>$rows[faculty_name] $rows[Last_Name]</td>

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
											<input type='text' value='' placeholder='Enroll Key' id='update_enrollkey$rows[sub_id]' class='form-control' required>
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



?>