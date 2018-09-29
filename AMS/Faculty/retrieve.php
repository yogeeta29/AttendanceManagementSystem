<?php

	include('session.php');

	if(isset($_REQUEST['ajax_func'])){

		$sql = "SELECT * FROM timetable";
		$run = mysqli_query($connection,$sql);

		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				$originalDate = $rows['StartTime'];
				$startTime = date("h:i a", strtotime($originalDate));
				
				$originalDate = $rows['EndTime'];
				$endTime = date("h:i a", strtotime($originalDate));
				echo "
					<tr>
						<td>$startTime - $endTime</td>
						<td>$rows[mon]</td>
						<td>$rows[tues]</td>
						<td>$rows[wed]</td>
						<td>$rows[thurs]</td>
						<td>$rows[fri]</td>
					</tr>

					";
			}
		}
		else{
			echo "No Records Found";
		}
	}
	else if(isset($_REQUEST['filter_func'])){
		
		$login=$login_session;
		$fact="select * from facultylogin where username='$login'";
		$s=mysqli_query($connection,$fact);
		$row3 = mysqli_fetch_assoc($s);
		$fact_id=$row3['fact_id'];
		$dept_name=$row3['dept_name'];
		
		$get_cou="select course_id from courses where dept_name='$dept_name'";
		$res_cou=mysqli_query($connection,$get_cou);
		$row_cou = mysqli_fetch_assoc($res_cou);
		$course_id=$row_cou['course_id'];
		
		$filterS = $_REQUEST['sfilter'];
		 
	 	$sql = "SELECT * FROM timetable WHERE course_id='$course_id' AND sem_no LIKE '$filterS'";
		$run = mysqli_query($connection,$sql);

		if((mysqli_num_rows($run)) > 0){
			while ($rows = mysqli_fetch_assoc($run)) {
				$originalDate = $rows['StartTime'];
				$startTime = date("h:i a", strtotime($originalDate));
				
				$originalDate = $rows['EndTime'];
				$endTime = date("h:i a", strtotime($originalDate));
				echo "
					<tr>
						<td>$startTime - $endTime</td>
						<td>$rows[mon]</td>
						<td>$rows[tues]</td>
						<td>$rows[wed]</td>
						<td>$rows[thurs]</td>
						<td>$rows[fri]</td>
					</tr>

					";
			}
		}
		else{
			echo "<h5 align='center'><font color='red'>No Records Found!!!</font></h5>";
		}
	}



?>