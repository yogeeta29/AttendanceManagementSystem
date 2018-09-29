<!doctype html>
<?php
include 'search.php';

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

/* Centered text */
.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/AddCourses.css" rel="stylesheet">


    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
  </head>

  <body style="font-family: Trebuchet MS;font-size:18px;">
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
				  <a href="search.php">My Courses</a>
				  <a href="changepassword.php">Change Password</a>
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
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="FacultyEnroll.html">Enroll Into Courses</a>
            </li>
			
			<li class="nav-item">
              <a class="nav-link" href="Theory_Attendance.html">Theory Attendance</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="Lab_Attendance.html">Lab Attendance</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="">View Attendance</a>
            </li>
			
       
          </ul>

          <ul class="nav nav-pills flex-column">
		  <li class="nav-item">
              <a class="nav-link" href="SemesterReport.php">Attendance Report</a>
            </li>
		  <li class="nav-item">
              <a class="nav-link" href="ViewTimetable.html">Timetable</a>
            </li>
            
          </ul>

          
        </nav>
          
          <!-- Include submenu.html here -->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        		
<?php
//include 'session.php';


$course_id = mysqli_real_escape_string($connection, strip_tags($_POST['course_id']));
$fact_id = mysqli_real_escape_string($connection, strip_tags($_POST['fact_id']));
 

if(!$course_id || !$fact_id )
{
	echo"Result Not Found,Please Search again!";
	exit;
}
$search_sql = "SELECT * FROM courses WHERE courses.course_id ='" .$course_id. "' and courses.fact_id='".$fact_id."'";
if(!mysqli_query($connection, $search_sql))
{
	die('error selecting courses record');
}	
$result=mysqli_query($connection,$search_sql);
if (mysqli_num_rows($result) > 0) 
{  	  
  	echo "<table align='center'>

    
    <th>Course ID</th>
    <th>Subject ID</th>
    <th>Course Name</th>
    <th>Department</th>
    <th>Subject</th>
    <th>Faculty Id</th>
    <th>Enrollement Key</th>";
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			echo"<td>".$row['course_id']."</td>";
			echo"<td>".$row['sub_id']."</td>";
			echo"<td>".$row['course_name']."</td>";
			echo"<td>".$row['dept_name']."</td>";
			echo"<td>".$row['sub_name']."</td>";
			echo"<td>".$row['fact_id']."</td>";
			echo"<td>".$row['Enroll_Key']."</td>";
			echo "</tr>";

		}
}
?>

</body>
</html>	
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 