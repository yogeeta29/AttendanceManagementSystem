<?php
include 'Lab_Attendance.php';
	
	if(isset($_POST['Submit'])){
	//$checkbox=$_POST['checkbox'];	
	//if(isset($checkbox)){
	//$sub_id = mysqli_real_escape_string($con, strip_tags($_POST['sub_id']));
	//$Duration = mysqli_real_escape_string($con, strip_tags($_POST['Duration']));
	//$att_date = mysqli_real_escape_string($con, strip_tags($_POST['att_date']));

	//$sub_id=$_POST['sub_id'];
	//$Duration=$_POST['Duration'];
	//$att_date=$_POST['att_date'];
	
	
			
	$login=$login_session;
	$fact="select fact_id,dept_name from facultylogin where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$fact_id=$row3['fact_id'];
	$dept_name=$row3['dept_name'];

	$query="select course_id from subjects where fact_id='$fact_id'";
	$res = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($res);
	$course_id=$row['course_id'];	
	
	
	$get_stud="select stud_id from enroll  where (stud_id between '$_SESSION[startbatch]' and '$_SESSION[endbatch]')and  course_id='$course_id' and sub_id=$_SESSION[sub_id]";
		$stud_res = mysqli_query($connection,$get_stud);
		//$num=mysqli_num_rows($run1);
		while ($stud_rows = mysqli_fetch_assoc($stud_res)) {
			$stud_id=$stud_rows['stud_id'];
			
		$get_query="select a.Absent_Count,a.Present_Count,a.Total_Classes from attendance a where a.course_id='$course_id' and a.sub_id=$_SESSION[sub_id] and stud_id='$stud_id'";
		$get_res = mysqli_query($connection,$get_query);
		$get_row=mysqli_fetch_assoc($get_res);
		$x = $get_row['Present_Count'];
		$y = $get_row['Total_Classes'];
			
		$ins_query="insert into attendance(attd_date,Last_Date,stud_id,dept_name,course_id,sub_id,fact_id) values('$_SESSION[att_date]','$_SESSION[att_date]','$stud_id','$dept_name','$course_id',$_SESSION[sub_id],'$fact_id')";
		mysqli_query($connection,$ins_query);

		$update_total="update attendance set Total_Classes= $y + $_SESSION[Duration],Last_Date='$_SESSION[att_date]' where sub_id=$_SESSION[sub_id] and course_id='$course_id' and stud_id='$stud_id'";
		mysqli_query($connection,$update_total);
		
		$upd_fac="update attendance set fact_id= '$fact_id' where sub_id=$_SESSION[sub_id]";
		mysqli_query($connection,$upd_fac);
		}
		echo "<h4 align='center'>Attendance Updated!!!</h4>";

		
	if(!empty($_POST['checkbox'])){
	foreach($_POST['checkbox'] as $check) {
			
			
	
		$query="select a.Absent_Count,a.Present_Count,a.Total_Classes from attendance a where stud_id='$check' and course_id='$course_id' and sub_id=$_SESSION[sub_id]";
		$res = mysqli_query($connection,$query);
		$row2=mysqli_fetch_assoc($res);
		$a = $row2['Absent_Count'];
		$b = $row2['Present_Count'];
		$c = $row2['Total_Classes'];
		
		$absent_sql = "update attendance set Present_Count= $b + $_SESSION[Duration] where stud_id='$check' and course_id='$course_id' and sub_id=$_SESSION[sub_id]";
		mysqli_query($connection,$absent_sql);
		
	}
	
	}
	
	
	/*else
		$checkbox2=$_POST['checkbox2'];
		foreach($_POST['checkbox2'] as $check2) {

			echo $check2;

		$query1="insert into attendance(attd_date,Last_Date,stud_id,dept_name,course_id,sub_id,fact_id) values(2017-11-25,2017-11-29,'$check2',computer science,101,301,1000)";
			mysqli_query($connection,$query1);
	
		$query="select a.Absent_Count,a.Present_Count,a.Total_Classes from attendance a where stud_id='$check2' and course_id=101 and sub_id=301";
		$res = mysqli_query($connection,$query);
		$row2=mysqli_fetch_assoc($res);
		$a = $row2['Absent_Count'];
		$b = $row2['Present_Count'];
		$c = $row2['Total_Classes'];

		$absent_sql = "update attendance set Absent_Count= $a + 1,Total_Classes= $c + 1,Last_Date=2017-11-29 where stud_id='$check2' and course_id=101 and sub_id=301";
		mysqli_query($connection,$absent_sql);
		
	
	}*/
	}
	
	
	
	
?>