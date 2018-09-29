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
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/menu.css" rel="stylesheet">

<style>
th {
     background-color:#000033;
    color: white;
}
</style>
    <title>Dashboard</title>

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

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
		<br>
		<h4 align="center">Average Attendance</h4>
		<hr>
		<?php	

			//$course=$_POST['course'];
			//$RollNo=$_POST['RollNo'];
			$login=$login_session;
			$stud="select stud_id,course_id from logindetails where username='$login'";
			$s=mysqli_query($connection,$stud);
			$row3 = mysqli_fetch_assoc($s);
			$stud_id=$row3['stud_id'];
			$course_id=$row3['course_id'];
				
			/*$query1="select course_id from enroll where stud_id='$stud_id'";
			$res=mysqli_query($connection,$query1);
			$row1=mysqli_fetch_assoc($res);
			$course=$row1['course_id'];*/

			$query="select * from attendance where course_id='$course_id' and stud_id='$stud_id'";
			$result=mysqli_query($connection,$query);
			$i=0;
			if((mysqli_num_rows($result)) > 0){
			echo"<table border='2'width='110%'>";
			echo "<th>SL.No</th>";
			echo"<th>Subject Code</th>";
			echo"<th>Subject Name</th>";
			echo "<th>From Date</th>";
			echo "<th>To Date</th>";
			echo "<th>Attended Classes</th>";
			echo "<th>Total Hours</th>";
			echo "<th>Attendance Percentage</th>";
				$i=0;

				while($row=mysqli_fetch_assoc($result))
				{
					$originalDate = $row['attd_date'];
					$start = date("d-m-Y", strtotime($originalDate));

					$originalDate2 = $row['Last_Date'];
					$end = date("d-m-Y", strtotime($originalDate2));
				
					$var=$i=$i+1;
					echo "<tr align='center'>";
					echo "<td>$var</td>";
					echo "<td>".$row['sub_id']."</td>";
					$sub_id=$row['sub_id'];
					
					$sub_name="select sub_name from subjects where sub_id='$sub_id'";
					$res=mysqli_query($connection,$sub_name);
					$row2=mysqli_fetch_assoc($res);
					echo "<td>".$row2['sub_name']."</td>";

					echo "<td>".$start."</td>";
					echo "<td>".$end."</td>";
					echo "<td>".$row['Present_Count']."</td>";
					echo "<td>".$row['Total_Classes']."</td>";
					
					$total=$row['Total_Classes'];
					$present=$row['Present_Count'];
					$per=(($present/$total)*100);
					$per=number_format("$per",2);
					echo "<td> $per%</td>";
					echo "</tr>";
					
					/*echo"<br>Roll No:";
					echo $row['stud_id'];
					echo"<br>Subject Code:";
					echo $row['sub_id'];
					echo"<br>From Date:";
					echo $row['attd_date'];
					echo"<br>To Date:";
					echo $row['Last_Date'];
					echo"<br>Total Classes:";
					echo $row['Total_Classes'];
					echo"<br>Present Count:";
					echo $row['Present_Count'];
					echo"<br>Absent Count:";
					echo $row['Absent_Count'];
					$total=$row['Total_Classes'];
					$present=$row['Present_Count'];
					$per=(($present/$total)*100);
					echo"<br>Percentage:";
					echo $per;*/

					//echo "<td><a href='update.php?empId=".$row['empId']."'>update</a></td>";
					//echo "<td><a href='delete.php?empId=".$row['empId']."'>delete</a></td>";
				}
			}
			else
					echo "<h4 align='center'><font color='red'>No Records Found!!</font></h4>";
			
			echo "</table>";
		?>
		</main>
      </div>
    </div>
	
	</body>
</html>