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
			$stud="select stud_id,course_id from logindetails where username='$login'";
			$s=mysqli_query($connection,$stud);
			$row3 = mysqli_fetch_assoc($s);
			$stud_id=$row3['stud_id'];
			$course_id=$row3['course_id'];
		 
		//$filterC = $_REQUEST['cfilter'];
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
			echo "<font color='red'><h4>No Records Found!!!</h4></font>";
		}
	}



?>