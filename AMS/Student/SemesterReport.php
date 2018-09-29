<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
    <link href="Assests/table.css" rel="stylesheet">
	<link rel="stylesheet" href="Assests/AddCourses.css">
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/menu.css" rel="stylesheet">

<style>
th, td{
	text-align:center;
	padding:10;
}
th{
	height:50px;
     background-color:#000033;
    color: white;
}


</style>
    <title>Attendance Report</title>

        <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
  </head>

  <body style="font-family:Verdana;font-size:16px;">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<img src="goa-logo.png" alt="attendance" style="width:40px;height:50px;" align="left">&nbsp;

        <a class="navbar-brand" href="">GOA UNIVERSITY</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault" style="font-size:10;">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="StudentProfile.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
			  <li class="dropdown">
				<a class="nav-link" href="javascript:void(0)" class="dropbtn">My Profile Settings</a>
				<div class="dropdown-content">
				  <a href="stud_profile.html">Edit Profile</a>
				  <a href="MySubjects.html">My Subjects</a>
				  <a href="changepassword.php">Change Password/Username</a>
				  </font>
				</div>
			  </li>
            </li>
            
          </ul>
          <form class="form-inline mt-2 mt-md-0">
             <a class="nav-link" href="logout.php">Log Out</a>

          </form>
        </div>
      </nav>
    </header>

<!--- Include Header.html -->

<div class="container-fluid">
      <div class="row">
		  <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
				<ul class="mainmenu nav nav-pills flex-column">
					<li class="nav-item">
						  <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
					 </li>
					<li class="nav-item"><a class="nav-link"href="Stud_AttendanceView.php">My Attendance</a></li>
					<li class="nav-item"><a class="nav-link"href="ViewTimetable.html">Timetable</a></li>
					<li class="nav-item"><a class="nav-link"href="Enroll.html">Subjects</a></li>
					<li><a href="SemesterReport.php">Attendance Report</a></li>
					<li><a href="stud_notify.php">Messages</a></li>

				</ul>          
			  
			</nav>
          
          <!-- Include submenu.html here -->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3"><br>
			 <h4 align="center">Semester Report</h4>
			 <hr>
		
		 <?php	
		 //$month = date("m");
		 //if($month==10 || $month==3){


			$login=$login_session;
			$query1="select course_id,stud_id from logindetails where username='$login'";
			$res=mysqli_query($connection,$query1);
			$row1=mysqli_fetch_assoc($res);
			$course=$row1['course_id'];
			$stud_id=$row1['stud_id'];

			$get_sem="select sem_no from student where stud_id='$stud_id'";
			$res_sem=mysqli_query($connection,$get_sem);
			$row_sem=mysqli_fetch_assoc($res_sem);				
			$sem=$row_sem['sem_no'];
			
			$query="select * from attendance a,student s where a.course_id='$course' and s.sem_no='$sem' and s.course_id='$course' and a.stud_id = s.stud_id group by a.stud_id";
			$result=mysqli_query($connection,$query);
			$result2=mysqli_query($connection,$query);
			
			$get_num=mysqli_fetch_assoc($result2);
			$stud_id=$get_num['stud_id'];

			$query4="select distinct(stud_id),sub_id,Present_Count,Total_Classes from attendance where stud_id='$stud_id' and course_id='$course'";
			$res4=mysqli_query($connection,$query4);
			
			
			$date="select min(a.attd_date) as min,max(a.Last_Date) as max from attendance a, student s where s.sem_no='$sem' and a.stud_id=s.stud_id";
			$result3=mysqli_query($connection,$date);
			$get_date=mysqli_fetch_assoc($result3);
			
			$originalDate = $get_date['min'];
			$start = date("d-m-Y", strtotime($originalDate));

			$originalDate2 = $get_date['max'];
			$end = date("d-m-Y", strtotime($originalDate2));
			
			if(mysqli_num_rows($result)>0){
			echo "<h5 align='center'>From: ";
			echo $start;
			echo "&nbsp;&nbsp;&nbsp; To: ";
			echo $end;
				
			echo"<table border='2' style='font-size:18px;'>";
			echo"<th>Roll No</th>";
			
			$n=mysqli_num_rows($res4);
			for($i=0;$i<$n;$i++){
			echo "<th>Subject Code</th>";
			echo "<th>Present Count</th>";
			echo "<th>Total_Classes</th>";
			echo "<th>Percentage</th>";
			}
			echo "<th>Aggregate Attendance</th>";
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr align='center'>";
				echo "<td>".$row['stud_id']."</td>";
				//echo "<td>".$row['sub_id']."</td>";

				$stud_id=$row['stud_id'];
				$query2="select distinct(stud_id),sub_id,Present_Count,Total_Classes from attendance where stud_id='$stud_id' and course_id='$course'";
				$res=mysqli_query($connection,$query2);
				$overall_total=0;$overall_present=0;
				while($row2=mysqli_fetch_assoc($res)){
					
					echo "<td>".$row2['sub_id']."</td>";
					echo "<td>".$row2['Present_Count']."</td>";
					echo "<td>".$row2['Total_Classes']."</td>";
					
					$total=$row2['Total_Classes'];
					$present=$row2['Present_Count'];
					$per=(($present/$total)*100);
					$per=number_format("$per",2);
					echo "<td> $per% </td>";
					$overall_total= ($overall_total + $total);
					$overall_present= ($overall_present + $present);	
					
					
				}	
				
						$overall_per=(($overall_present/$overall_total)*100);
						if($overall_per<75){
							$overall=number_format("$overall_per",2);
							echo "<td style='color:red;'> $overall% </td>";
						}
						else{
							$overall=number_format("$overall_per",2);
							echo "<td> $overall% </td>";
						}													
			}
			echo "</table>";
			}
			else
				echo "<h4 align='center'><font color='red'>No Records Found!!!</font></h4>";
		/*}
		else
			echo "<br>Report Can be generated only at the End of Semester!!";
		*/
		?>
	</main>
</div>
</div>
