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
		$fact="select * from adminlogin where username='$login'";
		$res=mysqli_query($connection,$fact);
		$row1 = mysqli_fetch_assoc($res);
		$course_id=$row1['course_id'];
				
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
			echo "No Records Found";
		}
	}



?>