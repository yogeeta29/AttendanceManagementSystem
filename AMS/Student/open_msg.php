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
	<link href="Assests/menu.css" rel="stylesheet">


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

<?php
$SrNo = $_GET['SrNo'];

$get_msg="select * from notification where SrNo='$SrNo'";
$res_msg=mysqli_query($connection,$get_msg);
$row_msg = mysqli_fetch_assoc($res_msg);
$Message=$row_msg['Message'];
$Topic=$row_msg['Topic'];
$Date=$row_msg['Date'];
$Time=$row_msg['Time'];
$Sender=$row_msg['Sender'];

echo "<div style=''>";
echo "<div style=''>";
echo "<h3 style='margin-left:10px;'><b>$Topic</b></h3>";
echo "<h6 style='margin-left:10px;'>By: $Sender</h6>";
echo "<h6 style='margin-left:10px;'>Date and Time:$Date $Time</h6>";
echo "<hr>";

echo "</div>";
echo "<h4 style='margin-left:10px;'>Message:</h4>";
echo "<h5 style='margin-left:10px;'>$Message</h5>";
echo "<br><br><br>";
echo "</div>";
/*date_default_timezone_set('Asia/Kolkata');
$date = date('g:i:a');
echo $date;*/
?>