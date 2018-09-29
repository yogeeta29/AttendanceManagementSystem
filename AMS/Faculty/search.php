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
        
		<link rel="stylesheet" type="text/css" href="./css/fact.css">
		<head> <h3> <center> My Courses </center> </h3> </head><br>

		<body bgcolor="	#D0D0D0">
			<form method="POST" action="facultyCourseSearch.php">
			<input type="hidden" name="submitted" value="true">


		<div>
		<label> Faculty ID </label>

		<?php
		  $query2="select course_id, fact_id from courses order by fact_id";
		  $result = mysqli_query($connection, $query2);
		  ?>

		<select id="select" style="width:100px;" name="fact_id">
		<option selected disabled hidden style='display: none' value=' '></option>
		<?php
		  while($query3=mysqli_fetch_assoc($result))
		{
		  ?>
		<option value=<?php echo $query3['fact_id']; ?>><?php echo $query3['fact_id']." ";  ?></option>
		<?php
		}

		?>
		</select>

		<label> Course ID </label>

		<?php
		  $query2="select course_id, fact_id from courses order by course_id";
		  $result = mysqli_query($connection, $query2);
		  ?>

		<select id="select" style="width:100px;" name="course_id">
		<option selected disabled hidden style='display: none' value=' '></option>
		<?php
		  while($query3=mysqli_fetch_assoc($result))
		{
		  ?>
		<option value=<?php echo $query3['course_id']; ?>><?php echo $query3['course_id']." "; ?></option>
		<?php
		}

		?>
		</select>
		  


		<input id="myBtn" style="width:100px;" type="Submit" value="Submit" id="btn" value="search">  
		<input id="myBtn" style="width:100px;" type="Reset" value="Cancel" id="btn1">
		</div>
		</p>
		</p>
		</div>
		</form>
		
		</main>
		</div>
		</body>
		</html>