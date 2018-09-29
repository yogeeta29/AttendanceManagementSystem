<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
 
  
  <style>
.DataImage {
    position: relative;
    text-align: center;
    color: black;
	font-weight: bold;
		font-size:20px;		
}
</style> 
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/menu.css" rel="stylesheet">



    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
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
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
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

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h4>
		  <?php
		  $login=$login_session;
			$fact="select * from adminlogin where username='$login'";
			$res=mysqli_query($connection,$fact);
			$row1 = mysqli_fetch_assoc($res);
			$course_id=$row1['course_id'];
			$name=$row1['name'];
		  ?>
			<b id="welcome">Welcome: <i><?php echo $name; ?></i></b></h4>

          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/images/stud.png" alt="attendance" style="width:40px;">
				<h4 style="color:#0000FF;font-size:23px;">Total Students</h4> 
				<?php
				$login=$login_session;
				$fact="select * from adminlogin where username='$login'";
				$res=mysqli_query($connection,$fact);
				$row1 = mysqli_fetch_assoc($res);
				$course_id=$row1['course_id'];
				
				$query="select count(stud_id) as stud_id from student where course_id='$course_id'";
				$count=mysqli_query($connection,$query);
				$row=mysqli_fetch_assoc($count);
				$stud_id=$row['stud_id'];
				echo $stud_id;
				?>
            </div>
			</div>
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
			<img src="Assests/images/teachers.png" alt="attendance" style="width:60px;">
			  <h4 style="color:#0000FF;font-size:23px;">Teaching Staff</h4> 
				<?php
				
				$get_dept="select dept_name from courses where course_id='$course_id'";
				$res2=mysqli_query($connection,$get_dept);
				$row2 = mysqli_fetch_assoc($res2);
				$dept_name=$row2['dept_name'];


				$query="select count(fact_id) as fact_id from faculty where dept_name='$dept_name'";
				$count=mysqli_query($connection,$query);
				$row=mysqli_fetch_assoc($count);
				$fact_id=$row['fact_id'];
				echo  $fact_id;
				?>
			</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/images/courses.png" alt="attendance" style="width:80px;">
				<h4 style="color:#0000FF;font-size:23px;">Subjects</h4> 
				<?php
				$query="select count(sub_id) as sub_id from subjects where course_id='$course_id'";
				$count=mysqli_query($connection,$query);
				$row3=mysqli_fetch_assoc($count);
				$sub_id=$row3['sub_id'];
				echo  $sub_id;
				?>
			</div>
            </div>
            <!--<div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
			<img src="Assests/images/dept.png" alt="attendance" style="width:40px; heigth:15px">
			  <h4 style="color:#0000FF;font-size:23px;">Departments</h4> 
				<?php
				/*$query="select count(dept_name) as dept_name from department";
				$count=mysqli_query($connection,$query);
				$row=mysqli_fetch_assoc($count);
				$dept_name=$row['dept_name'];
				echo  $dept_name;*/
				?>
            </div>-->
          </section>

          <h3>Attendance Details:</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr align="center">
                  <th>Subject id</th>
                  <th>Subject Name</th>
                  <th>Faculty Name</th>

				  <th>Total classes Taken</th>
				</tr>
              </thead>
              <tbody align="center">
                <?php
				$login=$login_session;
				$fact="select * from adminlogin where username='$login'";
				$res=mysqli_query($connection,$fact);
				$row1 = mysqli_fetch_assoc($res);
				$course_id=$row1['course_id'];
				
				
				$query="select distinct(c.sub_id),sum(a.Total_Classes) as Total_Classes,sum(a.Present_Count) as Present_Count,c.sub_name,f.faculty_name,f.Last_Name from attendance a,subjects c,faculty f where f.fact_id=a.fact_id and a.course_id='$course_id' and a.sub_id=c.sub_id group by sub_id";
			  	//$query="select * from attendance where course_id='$course_id'";

				$result=mysqli_query($connection,$query);
			
				while($row=mysqli_fetch_assoc($result)){
					echo "
						<tr>
						<td>$row[sub_id]</td>
						<td>$row[sub_name]</td>
						<td>$row[faculty_name] $row[Last_Name]</td>

						<td>$row[Total_Classes]</td>
						</tr>";

				}
				?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

      <!-- Include Footer.html here -->
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
