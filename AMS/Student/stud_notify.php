<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
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
  
.DataImage {
    position: relative;
    text-align: center;
    color: black;
	font-weight: bold;
		font-size:20px;		
}
table {
	    border: 1px solid #ddd;

    border-collapse: collapse;
    width: 100%;
	text-align:center;
}
th{
	border-bottom-style: solid;
	border-bottom-width: 0px;
	background-color: grey;
	color: black;
	padding: 5px 7px;	
	height:50px;
}
tr:nth-child(even){background-color: #f2f2f2}
td{
	padding:10px;
}

  </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	<link href="Assests/dropdown.css" rel="stylesheet">


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
		<h3 align="center">Messages</h3>
		<hr>
			<?php
			$login=$login_session;
			$fact="select stud_id,course_id from logindetails where username='$login'";
			$s=mysqli_query($connection,$fact);
			$row3 = mysqli_fetch_assoc($s);
			$stud_id=$row3['stud_id'];
			$course_id=$row3['course_id'];

			$get_sem="select sem_no from student where stud_id='$stud_id'";
			$res_sem=mysqli_query($connection,$get_sem);
			$row_sem = mysqli_fetch_assoc($res_sem);
			$sem_no=$row_sem['sem_no'];

			$get_notify="select * from notification where target='$stud_id' or Target='$course_id' or target='$sem_no'";
			$res_noti=mysqli_query($connection,$get_notify);
			echo "<table>";
			echo "<tr>";
			echo "
				<th>Sender</th>
				<th>Topic</th>
				<th>Date & Time</th>
				<tr>";
				
			while($row_notify = mysqli_fetch_assoc($res_noti)){
				echo "<tr>";
				echo "<td>$row_notify[Sender]</td>";
				$SrNo=$row_notify['SrNo'];
				echo "<td><a href='open_msg.php?SrNo=$SrNo' color='black'>$row_notify[Topic]</a></td>";
				echo "<td>$row_notify[Date] $row_notify[Time]</td><br></tr>";
			}


			?>