<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
  <script>
  function DisableBox(){
		var x = document.getElementById("selectOption").value;

	  if(x=="1"){
		  document.getElementById("rollno2").disabled=false;
		 document.getElementById("sem2").disabled=true;
	  }
	  else if(x=='2') {
		 document.getElementById("sem2").disabled=false;
		 document.getElementById("rollno2").disabled=true;
	  }
	  else if(x=='3') {
		 document.getElementById("rollno2").disabled=true;
		 document.getElementById("sem2").disabled=true;
	  }
  }
  
  </script>
  <link rel="stylesheet" href="Assests/bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css"/>
	<script src="Assests/jquery/jquery-3.2.1.js"></script>
	<script src="Assests/bootstrap-4.0.0-beta.2-dist/js/bootstrap.bundle.js"></script>
	
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
.DataImage {
    position: relative;
    text-align: center;
    color: black;
	font-weight: bold;
		font-size:20px;		
}
table{
	text-align:center;
}
th{
	border-bottom-style: solid;
	border-bottom-width: 0px;
	background-color:grey ;
	color: black;
	padding: 5px 7px;	
	height:50px;
}
tr:nth-child(even){background-color: #f2f2f2}

td{
	height:40px;
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
		<h3 align="center">Messages</h3>
		<hr><br>
				
		<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_new_person" data-backdrop="static" style="margin-right: 5px;">Send Message</button>
		<button class="btn btn-info btn-lg" data-toggle="modal" data-target="#add_new" data-backdrop="static" style="margin-right: 5px;">Delete Message</button>

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
								<label>Category</label>
								<select id="selectOption" name="option" class="form-control" onChange="DisableBox();" required>
								<option value=""></option>
								<option value="1">Roll No</option>
								<option value="2">Semester</option>
								<option value="3">All students</option>
								</select>
							</div>
							<div class="form-group">
								<label>Topic</label>
								<input type="text" placeholder="Topic" name="topic" id="topic2" class="form-control" required >								
							</div>

							<div class="form-group">
								<label>Roll No</label>
								<input disabled type="text" placeholder="" name="rollno" id="rollno2" class="form-control" required>							
							</div>
							<h6 style="text-align: center;"><b>OR</b></h6>

							<div class="form-group">
								<label>Semester</label>
								<input disabled type="text" placeholder="" name="sem" id="sem2" class="form-control" required>								
							</div>

							<div class="form-group">
								<label>Message</label>
								<input type="text" placeholder="" name="msg" class="form-control" required>
							</div>
					
							<div class="form-group">
								<button class="btn btn-info btn-block btn-lg"  name="submit">Submit</button>
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
								$fact="select * from facultylogin where username='$login'";
								$s=mysqli_query($connection,$fact);
								$row3 = mysqli_fetch_assoc($s);
								$fact_id=$row3['fact_id'];
								
								$que="select faculty_name,Last_Name from faculty where fact_id='$fact_id'";
								$res=mysqli_query($connection,$que);
								$row=mysqli_fetch_assoc($res);
								$faculty_name=$row['faculty_name'];
								$Last_Name=$row['Last_Name'];
							
								  $query2="select Topic from notification where Sender='$faculty_name $Last_Name'";
								  $result = mysqli_query($connection, $query2);
								?>

								<label>Topic</label>
								<select name="Topic" class="form-control" required>
								<option selected disabled hidden style='display: none' value=' '></option>
								<?php
								  while($query3=mysqli_fetch_assoc($result))
								{
								  ?>
								<option value=<?php echo $query3['Topic']; ?>><?php echo $query3['Topic']." ";  
								?></option>
								<?php
								}
								?>
								</select>	
							</div>
							<div class="form-group">
								<?php
								$login=$login_session;
								$fact="select * from facultylogin where username='$login'";
								$s=mysqli_query($connection,$fact);
								$row3 = mysqli_fetch_assoc($s);
								$fact_id=$row3['fact_id'];
								
								$que="select faculty_name,Last_Name from faculty where fact_id='$fact_id'";
								$res=mysqli_query($connection,$que);
								$row=mysqli_fetch_assoc($res);
								$faculty_name=$row['faculty_name'];
								$Last_Name=$row['Last_Name'];
							
								  $query1="select distinct(Target) as Target from notification where Sender='$faculty_name $Last_Name'";
								  $result2 = mysqli_query($connection, $query1);
								?>

								<label>Target</label>
								<select name="Target" class="form-control" required>								
								<option selected disabled hidden style='display: none' value=' '></option>
								<?php
								  while($query1=mysqli_fetch_assoc($result2))
								{
								  ?>
								<option value=<?php echo $query1['Target']; ?>><?php echo $query1['Target']." ";  
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
			
	<br/><br/>
	
<?php
if(isset($_POST['submit']))
	{
		$login=$login_session;
		$fact="select * from facultylogin where username='$login'";
		$s=mysqli_query($connection,$fact);
		$row3 = mysqli_fetch_assoc($s);
		$fact_id=$row3['fact_id'];
		
		$que="select * from faculty where fact_id='$fact_id'";
		$res=mysqli_query($connection,$que);
		$row=mysqli_fetch_assoc($res);
		$faculty_name=$row['faculty_name'];
		$Last_Name=$row['Last_Name'];
		$dept_name=$row['dept_name'];

		
		$que2="select * from courses where dept_name='$dept_name'";
		$res2=mysqli_query($connection,$que2);
		$row_dept=mysqli_fetch_assoc($res2);
		$course_id=$row_dept['course_id'];
		
		$option=$_POST['option'];
		$msg=$_POST['msg'];
		$topic=$_POST['topic'];
		
		date_default_timezone_set('Asia/Kolkata');
		$time = date('g:i A');
		$curdate=date('d-m-Y');
		
		if($option=='1'){
		$rollno=$_POST['rollno'];
		$ins_msg="insert into notification (Sender,Topic,Target,Message,Date,Time) values('$faculty_name $Last_Name','$topic','$rollno','$msg','$curdate','$time')";
		$msg_res=mysqli_query($connection,$ins_msg);
		}
		else if($option=='2'){
		$sem=$_POST['sem'];
		$ins_msg="insert into notification (Sender,Topic,Target,Message,Date,Time) values('$faculty_name $Last_Name','$topic','$sem','$msg','$curdate','$time')";
		$msg_res=mysqli_query($connection,$ins_msg);
		}
		else{
		$ins_msg="insert into notification (Sender,Topic,Target,Message,Date,Time) values('$faculty_name $Last_Name','$topic','$course_id','$msg','$curdate','$time')";
		$msg_res=mysqli_query($connection,$ins_msg);
		}
		
	}
	
	if(isset($_POST['delete']))
	{
		$login=$login_session;
	$fact="select * from facultylogin where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$fact_id=$row3['fact_id'];
	
	$que="select faculty_name,Last_Name from faculty where fact_id='$fact_id'";
	$res=mysqli_query($connection,$que);
	$row=mysqli_fetch_assoc($res);
	$faculty_name=$row['faculty_name'];
	$Last_Name=$row['Last_Name'];
				
		$Topic=$_POST['Topic'];
		$target=$_POST['Target'];

		$del_msg="delete from notification where Topic='$Topic' and Target='$target' and Sender='$faculty_name $Last_Name'";
		mysqli_query($connection,$del_msg);
		if(!$del_msg){
			mysqli_error("abc");
		}
		else{
			echo "<script>alert('Message Deleted')</script>";
		}
	}
	
	
	$login=$login_session;
	$fact="select * from facultylogin where username='$login'";
	$s=mysqli_query($connection,$fact);
	$row3 = mysqli_fetch_assoc($s);
	$fact_id=$row3['fact_id'];
	
	$que="select faculty_name,Last_Name from faculty where fact_id='$fact_id'";
	$res=mysqli_query($connection,$que);
	$row=mysqli_fetch_assoc($res);
	$faculty_name=$row['faculty_name'];
	$Last_Name=$row['Last_Name'];
	
	$all_notify="select * from notification where Sender='$faculty_name $Last_Name'";
	$res_notify=mysqli_query($connection,$all_notify);
	
	if (mysqli_num_rows($res_notify) > 0){
	echo "<table  width='100%'>";
	echo "<tr>";
	echo "
		<th>Topic</th>
		<th>Target:RollNo/Sem/MCA Students</th>
		<th>Date Time</th></tr>";
	while($row_not = mysqli_fetch_assoc($res_notify)){
		$SrNo=$row_not['SrNo'];

	echo "<tr>
		<td><a href='open_msg.php?SrNo=$SrNo' color='black'>$row_not[Topic]</a></td>
		<td>$row_not[Target]</td>
		<td>$row_not[Date],$row_not[Time]</td>
		</tr>";

	}
	}
	else
		echo "<h4 align='center'><font color='red'>No Records Found!!!</font></h4>";
		
?>