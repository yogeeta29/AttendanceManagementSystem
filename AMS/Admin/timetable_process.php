<?php

	include('session.php');

	if(isset($_POST['submit']))
	{


		$course=$_POST["course"];
		$semester=$_POST["semester"];

		$aryMon = array($_POST["mon1"],$_POST["mon2"],"---",$_POST["mon3"],$_POST["mon4"],$_POST["mon5"]);
		$aryTue = array($_POST["tue1"],$_POST["tue2"],"Break",$_POST["tue3"],$_POST["tue4"],$_POST["tue5"]);
		$aryWed = array($_POST["wed1"],$_POST["wed2"],"---",$_POST["wed3"],$_POST["wed4"],$_POST["wed5"]);
		$aryThu = array($_POST["thu1"],$_POST["thu2"],"Time",$_POST["thu3"],$_POST["thu4"],$_POST["thu5"]);
		$aryFri = array($_POST["fri1"],$_POST["fri2"],"---",$_POST["fri3"],$_POST["fri4"],$_POST["fri5"]);
		$aryTime = array($_POST["time1"],$_POST["time3"],$_POST["btime"],$_POST["time5"],$_POST["time7"],$_POST["time9"]);
		$aryTime2 = array($_POST["time2"],$_POST["time4"],$_POST["btime2"],$_POST["time6"],$_POST["time8"],$_POST["time10"]);
		$a=1;
		for ($i=0; $i <sizeof($aryMon); $i++) { 
			
		//$sql="INSERT INTO timetable VALUES( '$course', '$semester' ,'$a', '$aryTime[$i]', '$aryMon[$i]' , '$aryTue[$i]' , '$aryWed[$i]' , '$aryThu[$i]' ,  '$aryFri[$i]' )";
		$sql="INSERT INTO timetable(course_id,sem_no,lect_slot,StartTime,EndTime,mon,tues,wed,thurs,fri)VALUES( '$course', '$semester' ,'$a', '$aryTime[$i]','$aryTime2[$i]', '$aryMon[$i]' , '$aryTue[$i]' , '$aryWed[$i]' , '$aryThu[$i]' ,  '$aryFri[$i]' )";

			
			$result = mysqli_query($connection,$sql);
			
			$a++;

			if( !$result )
		{
			mysqli_error($connection);
		}
		else
		{
			echo ".<br/>";
		}

		}

		echo "Working On It...<br/>";
		
		header("refresh:3;url=timetable.php");
	}
?>