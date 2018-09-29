<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>

  <style>
 table {
    border-collapse: collapse;
    width: 100%;
	text-align:center;
}

th, td {
    text-align: left;
    padding: 8px;
	text-align:center;

}
th {
    background-color: #000033;
    color: white;
}

input[type=checkbox] {
    transform: scale(2);
    -ms-transform: scale(2);
    -webkit-transform: scale(2);
    padding: 10px;
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

<link rel="stylesheet" href="Assests/bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css"/>

		<script src="Assests/jquery/jquery-3.2.1.js"></script>

		<script src="Assests/bootstrap-4.0.0-beta.2-dist/js/bootstrap.bundle.js"></script>
		

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	<link href="Assests/dropdown.css" rel="stylesheet">
	<link href="Assests/menu.css" rel="stylesheet">


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
 			<h3 align="center">Lab Attendance</h5>
			<hr>
	<body onload="ajax_func();">
		
		<div class="container">

			<br/><br/> 
			<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add_new_person" data-backdrop="static" style="margin-right: 5px;">Choose Your Subject</button>
			<br/><br/>

			

			<div class="modal fade" id="add_new_person" tabindex="-1" role="dialog" aria-labelledby="CollegeRegistration" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>Choose Your Subject</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form method="post" action="Lab_Ajax.php" id="user_form">
								<div class="form-group">
									<?php
								$login=$login_session;
								$fact="select fact_id,dept_name from facultylogin where username='$login'";
								$s=mysqli_query($connection,$fact);
								$row3 = mysqli_fetch_assoc($s);
								$fact_id=$row3['fact_id'];
								$dept_name=$row3['dept_name'];
							
								  $query2="select sub_id from subjects where fact_id='$fact_id'";
								  $result = mysqli_query($connection, $query2);
							?>

								<label>Subject Code</label>
								<select name="sub_id" class="form-control" required>
								<option selected disabled hidden style='display: none' value=' '></option>
								<?php
								  while($query3=mysqli_fetch_assoc($result))
								{
								  ?>
								<option value=<?php echo $query3['sub_id']; ?>><?php echo $query3['sub_id']." ";  
								$sub=$query3['sub_id'];
								$query4="select sub_name from subjects where sub_id='$sub'";
								$result2=mysqli_query($connection, $query4);
								$row4 = mysqli_fetch_assoc($result2);
								$sub_name=$row4['sub_name'];
								echo "- ";
								echo $sub_name;
								?></option>
								<?php
								}
								?>
								</select>
								</div>
								<div class="form-group">
									<label>Batch Range</label>
									<input style="width: 60px;" type="text" name="startbatch" required>&nbsp;<input style="width: 60px;" type="text"  name="endbatch"  required>

								</div>
								
								<div class="form-group">
									<label>Lab Duration</label>
									<input type="text" placeholder="" value="3" class="form-control" name="duration" required>

								</div>
								
								<div class="form-group">
									<label>Date</label>
									<input type="date" name="att_date" value="<?php echo date("Y-m-d"); ?>" class="form-control">
								</div>
								
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg" name="check1">Submit</button>
								</div>
							</form>
						</div>
						<div class="modal-header">
							<div class="text-right">
								<button class="btn btn-danger" data-dismiss="modal"> Close</button>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php

	if(isset($_POST['check1'])){
		$sub_id=$_POST['sub_id'];
		
		$Duration=$_POST['duration'];
		$att_date=$_POST['att_date'];
		$startbatch=$_POST['startbatch'];
		$endbatch=$_POST['endbatch'];

		$_SESSION['sub_id']=$sub_id;
		$_SESSION['Duration']=$Duration;
		$_SESSION['att_date']=$att_date;
		$_SESSION['startbatch']=$startbatch;
		$_SESSION['endbatch']=$endbatch;
		
		
		$login=$login_session;
	$fact="select fact_id,dept_name from facultylogin where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$fact_id=$row3['fact_id'];
	$dept_name=$row3['dept_name'];

	$query="select course_id from subjects where fact_id='$fact_id'";
	$res = mysqli_query($connection,$query);
	$row = mysqli_fetch_assoc($res);
	$course_id=$row['course_id'];
	
	$a=0;$i=0;
	$sql="select e.stud_id,s.stud_name from enroll e,student s where(e.stud_id between '$startbatch' and '$endbatch') and e.course_id='$course_id' and e.sub_id='$sub_id' and s.course_id = '$course_id' and s.stud_id=e.stud_id";
	$run = mysqli_query($connection,$sql);
	$num=mysqli_num_rows($run);
			$_SESSION['num']=$num;

	if(mysqli_num_rows($run)>0){
	$originalDate = $att_date;
	$newDate = date("d-m-Y", strtotime($originalDate));	
	
	echo "<tr><td>Subject Id:</td>&nbsp;&nbsp;&nbsp;&nbsp;<td>$sub_id</td></tr><br>";
	echo "<tr><td>Duration:</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>$Duration</td></tr><br>";
	echo "Batch:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; $startbatch To $endbatch<br>";
	echo "<tr><td>Date:</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>$newDate</td></tr><br>";
	echo "</table>";
	
		
	echo "<form id='thisForm' name='myform' method='POST' action='Lab_Ajax.php'>";
	echo "<table border='2' width='100%' align='center'>
		<th>Roll No</th>
		<th>Student Name</th>
		<th>Option</th>";

	while ($rows = mysqli_fetch_assoc($run)) {
		//echo $i=$i+1;

		echo "
			<tr>";
				echo "<td>$rows[stud_id]</td>";
				echo "<td>$rows[stud_name]</td>";
				echo "<td>";
				echo "<input type='hidden' id='checkbox2[]' name='checkbox2[]' value='$rows[stud_id]'>";
				
				echo "<input type='checkbox' id='checkbox[]' name='checkbox[]' value='$rows[stud_id]' checked>";
				
				echo "</td>";
			echo "</tr>";
		

	}

	//echo "<input type='button' name='submit' value='Submit' onclick=loopForm(thisForm,'$subject','$att_date','$Duration')> ";
echo "<button class='btn btn-danger btn-sm' type='submit' name='Submit' value='Submit'>Submit</button><br><br>";

echo "</form>";
	}
	else
		echo "<h4 align='center'><font color='red'>Nobody has enrolled for Subject $sub_id</font></h4>";
	}
?>


