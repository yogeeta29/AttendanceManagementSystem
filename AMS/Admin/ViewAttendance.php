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
	<link href="Assests/dropdown.css" rel="stylesheet">
		<link href="Assests/menu.css" rel="stylesheet">

	<link rel="stylesheet" href="Assests/table.css">
	<link rel="stylesheet" href="Assests/AddCourses.css">
	
    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
	<style>
	th {
    background-color: 000033;
	color:white;
}
	</style>
  </head>

  <body style="font-family:Verdana;font-size:16px;">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<img src="goa-logo.png" alt="attendance" style="width:40px;height:50px;" align="left">

        <a class="navbar-brand" href=""> GOA UNIVERSITY</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="AdminProfile.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
			  <li class="dropdown">
				<a class="nav-link" href="javascript:void(0)" class="dropbtn">My Profile Settings</a>
				<div class="dropdown-content">
				<a href="profile.html">Edit Profile</a>
				  <a href="changepassword.php">Change Password/Username</a>
				</div>
			  </li>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <!--<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
			 <a class="nav-link" href="logout.php">Log Out</a>

          </form>
        </div>
      </nav>
    </header>

<!--- Include Header.html -->
<div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar" style="margin-top:7px;">
			<ul class="mainmenu nav nav-pills flex-column">
				<li class="nav-item">
					  <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
				 </li>
				<li class="nav-item"><a class="nav-link"href="AddSubjects.php">Subjects</a></li>
				<li class="nav-item"><a class="nav-link"href="studIndex.php">Student Details</a></li>
				<li class="nav-item"><a class="nav-link"href="facIndex.php">Faculty Details</a></li>
				
				<li class="nav-item"><a class="nav-link"href="">Attendance</a>
				  <ul class="submenu">
					<li><a href="ViewAttendance.php">View Attendance</a></li>
					<li><a href="blacklist.php">Attendance Report</a></li>
				  </ul>
				</li>
				<li class="nav-item"><a class="nav-link"href="">Timetable</a>
				  <ul class="submenu">
					<li><a href="timetable.php">Create Timetable</a></li>
					<li><a href="ViewTimetable.html">View Timetable</a></li>
				  </ul>
				</li>
				<li><a href="notify.php">Messages</a></li>

			</ul>          
          
        </nav>
		<!-- Include submenu.html here -->
          <!-- Include submenu.html here -->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <br>
	<h3 align="center">STUDENT ATTENDANCE</h3>
	<hr>
  
	<form name="form1" method="post" action="">
		<?php
		$login=$login_session;
		$fact="select course_id from adminlogin where username='$login'";
		$s=mysqli_query($connection,$fact);
		$row3 = mysqli_fetch_assoc($s);
		$course_id=$row3['course_id'];
					
		$query2="select sub_id,sub_name from subjects where course_id='$course_id'";
		$result = mysqli_query($connection, $query2);
		?>  
	  
	  	<label> Subject Code</label>
		<select name="sub_id" class="form-control" style="width:30%;" required>
		<option selected disabled hidden style='display: none' value=' '></option>
		<?php
		  while($query3=mysqli_fetch_assoc($result))
			{
		?>
			<option value=<?php echo $query3['sub_id']; ?>><?php echo $query3['sub_id']." ";  
			$sub_name=$query3['sub_name'];
			echo "- ";
			echo $sub_name;
			?></option>
			<?php
			}
			?>
		</select>
		<br>
	<button id="myBtn" type="submit" name="submit" style="width:100px;height:50px" value="submit">Submit</button>

	 <?php	
		$login=$login_session;
		$query1="select course_id from adminlogin where username='$login'";
		$res=mysqli_query($connection,$query1);
		$row1=mysqli_fetch_assoc($res);
		$course=$row1['course_id'];
		
	if(isset($_POST['submit']))
	{
		$sub_id=$_POST['sub_id'];

		$query="select * from attendance a,student s where a.course_id='$course' and a.stud_id=s.stud_id and s.course_id='$course' and a.sub_id='$sub_id'";
		$result=mysqli_query($connection,$query);

		if((mysqli_num_rows($result)) > 0){
		echo"<table border='2'>";
		echo"<th>Roll No</th>";
		echo"<th>Subject Code</th>";
		echo "<th>From Date</th>";
		echo "<th>To Date</th>";
		echo "<th>Attended Classes</th>";
		echo "<th>Total Classes</th>";
		echo "<th>Attendance Percentage</th>";

				while($row=mysqli_fetch_assoc($result))
			{

				$originalDate = $row['attd_date'];
				$startdate = date("d-m-Y", strtotime($originalDate));

				$originalDate2 = $row['Last_Date'];
				$lastdate = date("d-m-Y", strtotime($originalDate2));
				
				echo "<tr align='center'>";
				echo "<td>".$row['stud_id']."</td>";
				echo "<td>".$row['sub_id']."</td>";
				echo "<td>".$startdate."</td>";
				echo "<td>".$lastdate."</td>";

				echo "<td>".$row['Present_Count']."</td>";
				echo "<td>".$row['Total_Classes']."</td>";

				$total=$row['Total_Classes'];
				$present=$row['Present_Count'];
				$per=(($present/$total)*100);
				$per=number_format("$per",2);
				echo "<td> $per%</td>";
				echo "</tr>";

				//echo "<td><a href='update.php?empId=".$row['empId']."'>update</a></td>";
				//echo "<td><a href='delete.php?empId=".$row['empId']."'>delete</a></td>";
			}
		}
		else
				echo "<h4 align='center'><font color='red'>No Records Found!!!</font></h4>";

		echo "</table>";
	}
		
	?>
</main>
            <!-- MAIN SECTION: ends -->
        </div>
    </div>
</body>

</html>