<!doctype html>
<?php
include('connect.php');
?>
<html lang="en">
  <head>
  <style>
.DataImage {
    position: relative;
    text-align: center;
	font-weight: bold;
	font-size:25px;		

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


    <title>Goa University</title>

    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
  </head>

  <body style="font-family: Trebuchet MS;">
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<img src="goa-logo.png" alt="attendance" style="width:40px;height:50px;" align="left">&nbsp;

        <a class="navbar-brand" href="#" style="font-family: Trebuchet MS;">GOA UNIVERSITY</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div style="font-family: Trebuchet MS;" class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
            </li>
			<li class="dropdown">
				<a class="nav-link" href="javascript:void(0)" class="dropbtn">Login</a>
				<div class="dropdown-content">
				  <a href="../Admin/AdminLogin.php">Admin Login</a>
				  <a href="factlogin.php">Faculty Login</a>
				  <a href="../Student/userlogin.php">Student Login</a>
				</div>
			</li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
          </form>
        </div>
      </nav>
    </header>

<!--- Include Header.html -->

<div class="container-fluid" style="font-family: Trebuchet MS; font-size:20px;">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
            
          </ul>

          
          
        </nav>
          
          <!-- Include submenu.html here -->

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h5 style="font-family: Trebuchet MS;">WELCOME TO GOA UNIVERSITY</h5>

		  <div style="background-color:;">
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/stud.png" alt="attendance" style="width:40px;">
				<h4 style="color:#0000FF;font-size:23px;">Total Students</h4> 
				<?php
				$query="select count(stud_id) as stud_id from student";
				$count=mysqli_query($con,$query);
				$row=mysqli_fetch_assoc($count);
				$stud_id=$row['stud_id'];
				echo $stud_id;
				?>
			</div>
			</div>
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/teachers.png" alt="attendance" style="width:60px;">
			  <h4 style="color:#0000FF;font-size:23px;">Teaching Staff</h4> 
				<?php
				$query="select count(fact_id) as fact_id from faculty";
				$count=mysqli_query($con,$query);
				$row=mysqli_fetch_assoc($count);
				$fact_id=$row['fact_id'];
				echo  $fact_id;
				?>
			</div>
			</div>
            <div class="col-6 col-sm-3 placeholder">
              <div class="DataImage">
				<img src="Assests/courses.png" alt="attendance" style="width:80px;">
			  <h4 style="color:#0000FF;font-size:23px;">Courses</h4> 
				<?php
				$query="select count(course_id) as course_id from courses";
				$count=mysqli_query($con,$query);
				$row=mysqli_fetch_assoc($count);
				$course_id=$row['course_id'];
				echo  $course_id;
				?>
			</div>
			</div>
            <div class="col-6 col-sm-3 placeholder">
              <div class="DataImage">
			  <img src="Assests/dept.png" alt="attendance" style="width:40px; heigth:15px">
			  <h4 style="color:#0000FF;font-size:23px;">Departments</h4> 
				<?php
				$query="select count(dept_name) as dept_name from department";
				$count=mysqli_query($con,$query);
				$row=mysqli_fetch_assoc($count);
				$dept_name=$row['dept_name'];
				echo  $dept_name;
				?>
			</div>
            </div>
          </section>
		  </div>

          <h2>Courses</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr align="center">
                  <th>Course Name</th>
				  <th>Total Students</th>
				</tr>
              </thead>
              <tbody align="center">
                <?php
				//$query="select distinct(e.course_id),c.course_name,count(e.stud_id) as count from enroll e,courses c where e.course_id=c.course_id group by e.sub_id";
				$query="select count(s.course_id) as count,c.course_name from student s, courses c where s.course_id=c.course_id group by s.course_id";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_assoc($result)){
					echo "
						<tr>
						<td>$row[course_name]</td>
						<td>$row[count]</td>

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
