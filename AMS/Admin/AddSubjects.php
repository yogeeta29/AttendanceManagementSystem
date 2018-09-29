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
	
	<title>Add Subjects</title>
	
	<link rel="stylesheet" href="Assests/bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css"/>
	<script src="Assests/jquery/jquery-3.2.1.js"></script>
	<script src="Assests/bootstrap-4.0.0-beta.2-dist/js/bootstrap.bundle.js"></script>
		
	
    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">
	<style>
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

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
         
		 <br/><br/> 
			<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_new_person" data-backdrop="static" style="margin-right: 5px;">Add New Subjects</button>
			<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_new" data-backdrop="static" style="margin-right: 5px;">Delete Subject</button>

			<div class="modal fade" id="add_new_person" tabindex="-1" role="dialog" aria-labelledby="StudentRegistration" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>Enter Details</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form id="user_form" method="post">	
								<div class="form-group">
									<label>Subject Code</label>
									<input type="text" placeholder="Subject Code" name="sub_code" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Subject Name</label><br>
									<input type="text" placeholder="Subject Name" name="sub_name" class="form-control" required>
								</div>
						
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg"  name="Add">Submit</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<div class="text-right">
								<button class="btn btn-danger" data-dismiss="modal"> Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	<br/><br/>
	
	<div class="modal fade" id="add_new" tabindex="-1" role="dialog" aria-labelledby="StudentRegistration" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>Enter Details</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form id="user_form" method="post">
								<div class="form-group">
								<?php
								$login=$login_session;
								$fact="select course_id from adminlogin where username='$login'";
								$s=mysqli_query($connection,$fact);
								$row3 = mysqli_fetch_assoc($s);
								$course_id=$row3['course_id'];
							
								  $query2="select sub_id,sub_name from subjects where course_id='$course_id'";
								  $result = mysqli_query($connection, $query2);
								?>

								<label>Subject Code</label>
								<select name="sub_code" class="form-control" onclick="DisplaySubject()" required>
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
								</div>
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg"  name="delete">Submit</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<div class="text-right">
								<button class="btn btn-danger" data-dismiss="modal"> Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
	
	
	<?php	
		$login=$login_session;
		$query1="select course_id from adminlogin where username='$login'";
		$res=mysqli_query($connection,$query1);
		$row=mysqli_fetch_assoc($res);
		$course=$row['course_id'];
		
		if(isset($_POST['Add']))
		{
			$sub_name=$_POST['sub_name'];
			$sub_code=$_POST['sub_code'];
			
			$search_sub="select sub_name,sub_id from subjects where sub_id='$sub_code' or sub_name='$sub_name'";
			$res3=mysqli_query($connection,$search_sub);
			if((mysqli_num_rows($res3)) > 0)
				echo '<script>alert("Subject Already Exist")</script>';
			else
			{
				$query="insert into subjects(course_id,sub_id,sub_name,fact_id,Enroll_Key)values('$course','$sub_code','$sub_name','0000','0')";
				mysqli_query($connection,$query);
				if(!$query)
				{
					echo '<script>alert("Error")</script>';
				}
				else
				{
					echo '<script>alert("Subject Added")</script>';
				}
			}
		}
		
		if(isset($_POST['delete']))
		{
			$sub_code=$_POST['sub_code'];
			//$sub_name=$_POST['sub_name'];
			
			$query="delete from subjects where sub_id='$sub_code'";
			mysqli_query($connection,$query);
			echo '<script>alert("Subject Deleted")</script>';

		}

		$query="select * from subjects where course_id='$course'";
		$result=mysqli_query($connection,$query);
		

		if((mysqli_num_rows($result)) > 0){
		echo "<h4 align='center'>SUBJECT DETAILS</h4>";
		echo "<table border='2' width='100%'>";
		echo "<th height='50px'>Subject Code</th>";
		echo "<th>Subject Name</th>";
		echo "<th>Faculty ID</th>";
		echo "<th>Enrollment Key</th>";
				while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr>";
				echo "<td>".$row['sub_id']."</td>";
				echo "<td>".$row['sub_name']."</td>";
				echo "<td>".$row['fact_id']."</td>";
				echo "<td>".$row['Enroll_Key']."</td>";
				echo "</tr>";

			}
		echo "</table>";
	}
	else
		echo '<script>alert("No record Found")</script>';

		
	?>
	
	</main>
            <!-- MAIN SECTION: ends -->
      </div>
    </div>
</body>

</html>
