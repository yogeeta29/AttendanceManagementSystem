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
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/table.css" rel="stylesheet">
	<link href="Assests/menu.css" rel="stylesheet">

  <style type="text/css">
				
/* define a fixed width for the entire menu */
.navigation {
  width: 300px;
}

/* reset our lists to remove bullet points and padding */
.mainmenu, .submenu {
list-style-type: circle;
  padding: 0;
  margin: 0;
}

/* make ALL links (main and submenu) have padding and background color */
.mainmenu a {
  display: block;
  background-color: #2c3e50;
  text-decoration: none;
  padding: 10px;
  color: white;
  border-bottom: double;}

/* add hover behaviour */
.mainmenu a:hover {
    background-color: #C5C5C5;
}


/* when hovering over a .mainmenu item,
  display the submenu inside it.
  we're changing the submenu's max-height from 0 to 200px;
*/

.mainmenu li:hover .submenu {
  display: block;
  max-height: 200px;
}

/*
  we now overwrite the background-color for .submenu links only.
  CSS reads down the page, so code at the bottom will overwrite the code at the top.
*/

.submenu a {
  background-color: #999;
  color:black;
}

/* hover behaviour for links inside .submenu */
.submenu a:hover {
  background-color: #666;
  color:white;
}

/* this is the initial state of all submenus.
  we set it to max-height: 0, and hide the overflowed content.
*/
.submenu {
  overflow: hidden;
  max-height: 0;
  -webkit-transition: all 0.5s ease-out;
}

		</style>
  <style>
th{
	background-color: #000033;
	color: white;
	padding: 5px 7px;	
	height:50px;
}
td{
	text-align:center;
}
  
.DataImage {
    position: relative;
    text-align: center;
    color: black;
	font-weight: bold;
		font-size:20px;		
}

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>  

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
  </head>

  <body style="font-family: Verdana;font-size:16px;">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<img src="goa-logo.png" alt="attendance" style="width:40px;height:50px;" align="left">
       
	   <a class="navbar-brand" href="#">GOA UNIVERSITY</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Facultyprofile.php">Home <span class="sr-only">(current)</span></a>
            </li>
            
            <li class="nav-item">
			  <li class="dropdown">
				<a class="nav-link" href="javascript:void(0)" class="dropbtn">My Profile Settings</a>
				<div class="dropdown-content">
				  <a href="faculty_profile.html">Edit Profile</a>
				  <a href="MySubjects.html">My Subjects</a>
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
				<li class="nav-item"><a class="nav-link"href="FacultyEnroll.html">Subjects</a></li>
				
				<li class="nav-item"><a class="nav-link"href="">Attendance</a>
				  <ul class="submenu">
					<li><a href="theory.php">Theory Attendance</a></li>
					<li><a href="Lab_Attendance.php">Lab Attendance</a></li>
					<li><a href="ViewAttendance.php">View Attendance</a></li>
					
				  </ul>
				</li>
				<li><a href="ViewTimetable.html">Timetable</a></li>
				<li><a href="SemesterReport.php">Attendance Report</a></li>
				<li><a href="fact_msg.php">Messages</a></li>

			</ul>          
          
        </nav>                    
          <!-- Include submenu.html here -->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
<?php

	$login=$login_session;
	$fact="select * from facultylogin where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$fact_id=$row3['fact_id'];
	$dept_name=$row3['dept_name'];		
	
	$sub_id=$_GET['sub_id'];
		
	$que2="select * from courses where dept_name='$dept_name'";
	$res2=mysqli_query($connection,$que2);
	$row_dept=mysqli_fetch_assoc($res2);
	$course_id=$row_dept['course_id'];
	$sql2="SELECT count(e.stud_id) as count,s.stud_name,e.sub_id FROM enroll e,student s where e.course_id='$course_id' and e.sub_id='$sub_id' and e.stud_id=s.stud_id";
	$records2=mysqli_query($connection,$sql2);
	$enroll_count=mysqli_fetch_assoc($records2);

		$sql="SELECT e.stud_id,s.stud_name,e.sub_id FROM enroll e,student s where e.course_id='$course_id' and e.sub_id='$sub_id' and e.stud_id=s.stud_id";

		$records=mysqli_query($connection,$sql);
			echo "<h5><font size='5'>Subject Id:$sub_id</font></h5>";
			echo "Total Students enrolled: $enroll_count[count]";
			echo "<hr>";
			echo "<table border='2' style='text-align:center;'>";
			echo "<th>Roll No.</th>";
			echo "<th>Name</th>";

			while ($enroll=mysqli_fetch_assoc($records)){ //$enrll is a variable 
				
				echo "<tr>";
				echo "<td>".$enroll['stud_id']."</td>";	
				echo "<td>".$enroll['stud_name']."</td>";
				echo "</tr>";
				
				echo"</tr>";


			}//end while 


?>
