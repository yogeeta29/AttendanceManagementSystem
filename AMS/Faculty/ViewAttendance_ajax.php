<?php

	include 'session.php';

	if(isset($_REQUEST['submit_form'])){
	$sub_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sub_id']));

	$login=$login_session;
	$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
	
	
		$ins_sql="select * from attendance where sub_id='$sub_id'";
		$run_ins = mysqli_query($connection, $ins_sql);
		
		if(mysqli_num_rows($run_ins)>0){
		while ($rows = mysqli_fetch_assoc($run_ins)) {
				$total=$rows['Total_Classes'];
				$present=$rows['Present_Count'];
				$per=(($present/$total)*100);
				$per=number_format($per,2);
				//$ldate=date($rows['attd_date'],'d-m,Y');
				//echo $ldate;
				
				$originalDate = $rows['attd_date'];
				$newDate = date("d-m-Y", strtotime($originalDate));

				$originalDate2 = $rows['Last_Date'];
				$newDate2 = date("d-m-Y", strtotime($originalDate2));
				
				$sub_id=$rows['sub_id'];

		echo "
			<tr>
				<td>$newDate</td>
				<td>$newDate2</td>
				<td>$rows[stud_id]</td>
				
				<td>$rows[Present_Count]</td>
				<td>$rows[Total_Classes]</td>
				<td> $per%</td>
				<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[stud_id]' data-backdrop='static'>Update</button> 
							<button class='btn btn-danger' onclick=del_stud('$rows[stud_id]','$sub_id')>Delete</button>
							
							<div class='modal fade' id='edit_student$rows[stud_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Make Changes</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[stud_id]'>
												<div class='form-group'>
													<label>Roll No:$rows[stud_id]</label>
													<input type='hidden' value='$rows[stud_id]' placeholder='Roll No' id='stud_id$rows[stud_id]' class='form-control' required><br>
						
													<label>Subject Id:$rows[sub_id]</label>
													<input type='hidden' value='$rows[sub_id]' placeholder='Subject Id' id='sub_id$rows[stud_id]' class='form-control' required><br>
												
												</div>
												<div class='form-group'>
													<label>From:</label>
													<input type='date' value='$rows[attd_date]' id='attd_date$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>												
													<label>To:</label>
													<input type='date' value='$rows[Last_Date]' placeholder='To' id='Last_Date$rows[stud_id]' class='form-control' required>
												</div>												
												
												<div class='form-group'>
													<label>Present Count</label>
													<input type='text' value='$rows[Present_Count]' placeholder='Present Count' id='Present_Count$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Total Classes</label>
													<input type='text' value='$rows[Total_Classes]' id='Total_Classes$rows[stud_id]' class='form-control' required>
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
	else
			echo "<h5 align='center'><font color='red'>No Records Found!!!</font></h5>";
	}
	

	if(isset($_REQUEST['del_id'])){
		$sub_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sub_id']));		

		$del_sql = "DELETE FROM attendance WHERE stud_id = '$_REQUEST[del_id]' and sub_id='$sub_id'";
		$run_del = mysqli_query($connection, $del_sql);

		$login=$login_session;
		$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
	
	
		$ins_sql="select * from attendance where fact_id='$fact_id' and sub_id='$sub_id'";
		$run_ins = mysqli_query($connection, $ins_sql);
		
		if(mysqli_num_rows($run_ins)>0){
		while ($rows = mysqli_fetch_assoc($run_ins)) {
				$total=$rows['Total_Classes'];
				$present=$rows['Present_Count'];
				$per=(($present/$total)*100);
				$per=number_format($per,2);
				//$ldate=date($rows['attd_date'],'d-m,Y');
				//echo $ldate;
				
				$originalDate = $rows['attd_date'];
				$newDate = date("d-m-Y", strtotime($originalDate));

				$originalDate2 = $rows['Last_Date'];
				$newDate2 = date("d-m-Y", strtotime($originalDate2));
				
				$sub_id=$rows['sub_id'];

		echo "
			<tr>
				<td>$newDate</td>
				<td>$newDate2</td>
				<td>$rows[stud_id]</td>
				
				<td>$rows[Present_Count]</td>
				<td>$rows[Total_Classes]</td>
				<td> $per%</td>
				<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[stud_id]' data-backdrop='static'>Update</button> 
							<button class='btn btn-danger' onclick=del_stud('$rows[stud_id]','$sub_id')>Delete</button>
							
							<div class='modal fade' id='edit_student$rows[stud_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Make Changes</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[stud_id]'>
												<div class='form-group'>
													<label>Roll No:$rows[stud_id]</label>
													<input type='hidden' value='$rows[stud_id]' placeholder='Roll No' id='stud_id$rows[stud_id]' class='form-control' required><br>
						
													<label>Subject Id:$rows[sub_id]</label>
													<input type='hidden' value='$rows[sub_id]' placeholder='Subject Id' id='sub_id$rows[stud_id]' class='form-control' required><br>
												
												</div>
												<div class='form-group'>
													<label>From:</label>
													<input type='date' value='$rows[attd_date]' id='attd_date$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>												
													<label>To:</label>
													<input type='date' value='$rows[Last_Date]' placeholder='To' id='Last_Date$rows[stud_id]' class='form-control' required>
												</div>												
												
												<div class='form-group'>
													<label>Present Count</label>
													<input type='text' value='$rows[Present_Count]' placeholder='Present Count' id='Present_Count$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Total Classes</label>
													<input type='text' value='$rows[Total_Classes]' id='Total_Classes$rows[stud_id]' class='form-control' required>
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
	else
			echo "<h5 align='center'><font color='red'>No Records Found!!!</font></h5>";
		
	}
	
	if(isset($_REQUEST['update_form'])){

		$attd_date = mysqli_real_escape_string($connection, strip_tags($_REQUEST['attd_date']));
		$Last_Date = mysqli_real_escape_string($connection, strip_tags($_REQUEST['Last_Date']));
		$stud_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['stud_id']));
		$sub_id = mysqli_real_escape_string($connection, strip_tags($_REQUEST['sub_id']));
		$Present_Count = mysqli_real_escape_string($connection, strip_tags($_REQUEST['Present_Count']));
		$Total_Classes = mysqli_real_escape_string($connection, strip_tags($_REQUEST['Total_Classes']));
     
		$update_sql = "UPDATE attendance SET 
                attd_date = '$attd_date', 
				Last_Date = '$Last_Date',
                stud_id = '$stud_id', 
                Present_Count = '$Present_Count', 
                Total_Classes='$Total_Classes'
				WHERE stud_id = '$stud_id' and sub_id='$sub_id'";
		
		mysqli_query($connection, $update_sql);
		
		$login=$login_session;
		$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
	
	
		$ins_sql="select * from attendance where fact_id='$fact_id' and sub_id='$sub_id'";
		$run_ins = mysqli_query($connection, $ins_sql);
		
		if(mysqli_num_rows($run_ins)>0){
		while ($rows = mysqli_fetch_assoc($run_ins)) {
				$total=$rows['Total_Classes'];
				$present=$rows['Present_Count'];
				$per=(($present/$total)*100);
				$per=number_format($per,2);
				//$ldate=date($rows['attd_date'],'d-m,Y');
				//echo $ldate;
				
				$originalDate = $rows['attd_date'];
				$newDate = date("d-m-Y", strtotime($originalDate));

				$originalDate2 = $rows['Last_Date'];
				$newDate2 = date("d-m-Y", strtotime($originalDate2));
				
				$sub_id=$rows['sub_id'];

		echo "
			<tr>
				<td>$newDate</td>
				<td>$newDate2</td>
				<td>$rows[stud_id]</td>
				
				<td>$rows[Present_Count]</td>
				<td>$rows[Total_Classes]</td>
				<td> $per%</td>
				<td>
							<button class='btn btn-success' data-toggle='modal' data-target='#edit_student$rows[stud_id]' data-backdrop='static'>Update</button> 
							<button class='btn btn-danger' onclick=del_stud('$rows[stud_id]','$sub_id')>Delete</button>
							
							<div class='modal fade' id='edit_student$rows[stud_id]'>
								<div class='modal-dialog'>
									<div class='modal-content'>
										<div class='modal-header'>
											<h4>Make Changes</h4>
											<button class='close' data-dismiss='modal'>&times;</button>
										</div>
										<div class='modal-body text-left'>
											<form id='update_form$rows[stud_id]'>
												<div class='form-group'>
													<label>Roll No:$rows[stud_id]</label>
													<input type='hidden' value='$rows[stud_id]' placeholder='Roll No' id='stud_id$rows[stud_id]' class='form-control' required><br>
						
													<label>Subject Id:$rows[sub_id]</label>
													<input type='hidden' value='$rows[sub_id]' placeholder='Subject Id' id='sub_id$rows[stud_id]' class='form-control' required><br>
												
												</div>
												<div class='form-group'>
													<label>From:</label>
													<input type='date' value='$rows[attd_date]' id='attd_date$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>												
													<label>To:</label>
													<input type='date' value='$rows[Last_Date]' placeholder='To' id='Last_Date$rows[stud_id]' class='form-control' required>
												</div>												
												
												<div class='form-group'>
													<label>Present Count</label>
													<input type='text' value='$rows[Present_Count]' placeholder='Present Count' id='Present_Count$rows[stud_id]' class='form-control' required>
												</div>
												<div class='form-group'>
													<label>Total Classes</label>
													<input type='text' value='$rows[Total_Classes]' id='Total_Classes$rows[stud_id]' class='form-control' required>
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
	else
			echo "<h5 align='center'><font color='red'>No Records Found!!!</font></h5>";
		
	}

		



?>