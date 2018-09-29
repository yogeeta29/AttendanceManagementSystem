<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
  <style type="text/css">
        body
        {
            font-family: arial;
        }

        th,td
        {
            margin: 0;
            text-align: center;
            border-collapse: collapse;
            outline: 1px solid #e3e3e3;
        }

        td
        {
            padding: 5px 10px;
        }

        th
        {
            background-color:#000033;
            color: white;
            padding: 5px 10px;
        }

        td:hover
        {
            cursor: pointer;
            background: #619;
            color: white;
        }
        </style>
  
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
	<link href="Assests/AddCourses.css" rel="stylesheet">
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
		<br>
		<h5 align="center">Create New Timetable</h5>
		<hr>
				<br>

        <form action="timetable_process.php" method="post">
			<?php
			  $query2="select * from courses";
			  $result = mysqli_query($connection, $query2);
			?>

			<label for="course">Course</label>
            <label for="select"></label>
            <select id="select" style="width:200px;" name="course" >	
			<option value="0">Course Details</option>
			<?php
			  while($query3=mysqli_fetch_assoc($result))
			{
			  ?>
			<option value=<?php echo $query3['course_id']; ?>><?php echo $query3['course_id']." ";  
			$course_name=$query3['course_name'];
			echo "- ";
			echo $course_name;
			?></option>
			<?php
			}
			?>
			</select>

            <label for="semester">Semester</label>
            <label for="select"></label>

            <select id="select" style="width:200px;" name="semester" >
                <option value="">Semester Details</option>
                <option value="1">Sem I</option>
                <option value="2">Sem II</option>
                <option value="3">Sem III</option>
                <option value="4">Sem IV</option>
                <option value="5">Sem V</option>
            </select>

            <br/>
            <br/>

            <table width="80%" align="center">
            <div id="head_nav">
            <tr align="center">
                <th>Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
            </div>  

            <tr>
                <th><input style="width:100%;" type="time" name="time1"><input style="width:100%;" type="time" name="time2"></th>
                    <td><input type="text" name="mon1"></td>
                    <td><input type="text" name="tue1"></td>
                    <td><input type="text" name="wed1"></td>
                    <td><input type="text" name="thu1"></td>
                    <td><input type="text" name="fri1"></td>
               
            </tr>

            <tr>
                 <th><input style="width:100%;" type="time" name="time3"><input style="width:100%;" type="time" name="time4"></th>

                    <td><input type="text" name="mon2"></td>
                    <td><input type="text" name="tue2"></td>
                    <td><input type="text" name="wed2"></td>
                    <td><input type="text" name="thu2"></td>
                    <td><input type="text" name="fri2"></td>

                
            </tr>

            <tr>
                <th><input style="width:100%;" type="time" name="btime"><input style="width:100%;" type="time" name="btime2"></td>

                <td>------------------------</td>           
                <td>BREAK</td>
                <td>------------------------</td>
                <td>TIME</td>
                <td>------------------------</td>

            </tr>

            <tr>
                 <th><input style="width:100%;" type="time" name="time5"><input style="width:100%;" type="time" name="time6"></th>
                
                    <td><input type="text" name="mon3"></td>
                    <td><input type="text" name="tue3"></td>
                    <td><input type="text" name="wed3"></td>
                    <td><input type="text" name="thu3"></td>
                    <td><input type="text" name="fri3"></td>

            </tr>

            <tr>
                 <th><input style="width:100%;" type="time" name="time7"><input style="width:100%;" type="time" name="time8"></th>
                
                    <td><input type="text" name="mon4"></td>
                    <td><input type="text" name="tue4"></td>
                    <td><input type="text" name="wed4"></td>
                    <td><input type="text" name="thu4"></td>
                    <td><input type="text" name="fri4"></td>

            </tr>
			<tr>
                 <th><input style="width:100%;" type="time" name="time9"><input style="width:100%;" type="time" name="time10"></th>
                
                    <td><input type="text" name="mon5"></td>
                    <td><input type="text" name="tue5"></td>
                    <td><input type="text" name="wed5"></td>
                    <td><input type="text" name="thu5"></td>
                    <td><input type="text" name="fri5"></td>

            </tr>
            </table>

            <br/>
            <br/>

            <button align="center" id="myBtn" type="submit" name="submit" value="submit">Create Timetable</button>

        </form>

		</main>
		</div>
		</div>
    </body>

</html>
