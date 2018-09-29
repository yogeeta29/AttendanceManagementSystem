<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
   <style>
  
div#wide{
    border: 1px ridge gray;
	margin:auto;
}
#narrow {
	border: 1px ridge gray;
	background-color:white;
	margin-left:550px;
	height:335px;
	width:510px;
}
#wide {
	width:500px;
  float: left;
  /* Grow to rest of container */
  /* Just so it's visible */
}
div.container{
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link rel="stylesheet" href="Assests/AddCourses.css">
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/menu.css" rel="stylesheet">



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
  
		<br><br>
		<div id="parent">

	 <div id="wide">
		<div class="container"><br>
		<h5><b>Change password</b></h5><hr><br>
		<form method="POST" action="">
		<label>Current password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</label>
		<input type="password" name="OldPassword" required>
		</p>
		<p>
		<label>New password:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="password" name="NewPassword" required>
		</p>
		<p>
		<label>Confirm password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="password" name="NewPassword2" required>
		</p><hr>
	    <input style="margin-left:170px;" id="myBtn" type="submit" name="submit" value="SUBMIT">
		</form><hr>
		</div>
	</div>
		
	<div id="narrow">
		<div style="margin-left:30px;"><br>
		<h5><b>Change Username</b></h5><hr><br>
		<form method="POST" action="">
		<label>Old Username:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="old" required>
		</p>
		<p>
		<label>New Username:&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="new" required>
		</p>
		<hr>
		<input style="margin-left:170px;"id="myBtn" type="submit" name="user" value="SUBMIT">
		</form>
		</div>
	</div>
	</div>

		<?php
		if(isset($_POST['submit']))
		{
			$login=$login_session;
			$OldPassword=$_POST['OldPassword'];
			$NewPassword=$_POST['NewPassword'];
			$NewPassword2=$_POST['NewPassword2'];


			$old_pass="select password from facultylogin where username='$login'";
			$result=mysqli_query($connection,$old_pass);
			$row=mysqli_fetch_assoc($result);
			$password=$row['password'];
			if($password==$OldPassword)
			{
				if($NewPassword==$NewPassword2){

				$query="update facultylogin set Password='$NewPassword' where username='$login'";
				mysqli_query($connection,$query);
				echo '<script>alert("Password Changed Successfully")</script>';
				}
				else
					echo '<script>alert("Password is incorrect")</script>';
			}
			else
			{
				echo '<script>alert("Current Password is incorrect")</script>';
			}
		}
		
		if(isset($_POST['user']))
		{
			$login=$login_session;
			$old=$_POST['old'];
			$new=$_POST['new'];

			$old_pass="select * from facultylogin where username='$login'";
			$result=mysqli_query($connection,$old_pass);
			$row=mysqli_fetch_assoc($result);
			$username=$row['username'];
			if($old==$username)
			{
				$query="update facultylogin set username='$new' where username='$login'";
				mysqli_query($connection,$query);
				echo '<script>alert("Username Changed Successfully")</script>';
				session_destroy(); // Destroying All Sessions
				echo "<script>
				window.location.reload();

				</script>";
			}
				else
					echo '<script>alert("Username is incorrect")</script>';
		}

		?>
		
	</main>
    </div>
    </div>
</body>
</html>