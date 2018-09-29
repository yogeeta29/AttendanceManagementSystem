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
  
  <style>
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
	background-color:grey ;
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
								$fact="select course_id from adminlogin where username='$login'";
								$s=mysqli_query($connection,$fact);
								$row3 = mysqli_fetch_assoc($s);
								$course_id=$row3['course_id'];
							
								  $query2="select Topic from notification where Sender='$login'";
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
								$fact="select course_id from adminlogin where username='$login'";
								$s=mysqli_query($connection,$fact);
								$row3 = mysqli_fetch_assoc($s);
								$course_id=$row3['course_id'];
							
								  $query2="select distinct(Target) as target from notification where Sender='$login'";
								  $result = mysqli_query($connection, $query2);
								?>

								<label>Target</label>
								<select name="target" class="form-control" required>
								<option selected disabled hidden style='display: none' value=' '></option>
								<?php
								  while($query3=mysqli_fetch_assoc($result))
								{
								  ?>
								<option value=<?php echo $query3['target']; ?>><?php echo $query3['target']." ";  
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
		$fact="select * from adminlogin where username='$login'";
		$res=mysqli_query($connection,$fact);
		$row1 = mysqli_fetch_assoc($res);
		$course_id=$row1['course_id'];
		$name=$row1['name'];

		$option=$_POST['option'];
		$msg=$_POST['msg'];
		$topic=$_POST['topic'];
		
		date_default_timezone_set('Asia/Kolkata');
		$time = date('g:i A');
		$curdate=date('d-m-Y');
		
		if($option=='1'){
		$rollno=$_POST['rollno'];
		$ins_msg="insert into notification (Sender,Topic,Target,Message,Date,Time) values('$name','$topic','$rollno','$msg','$curdate','$time')";
		$msg_res=mysqli_query($connection,$ins_msg);
		}
		else if($option=='2'){
		$sem=$_POST['sem'];
		$ins_msg="insert into notification (Sender,Topic,Target,Message,Date,Time) values('$name','$topic','$sem','$msg','$curdate','$time')";
		$msg_res=mysqli_query($connection,$ins_msg);
		}
		else{
		$ins_msg="insert into notification (Sender,Topic,Target,Message,Date,Time) values('$name','$topic','$course_id','$msg','$curdate','$time')";
		$msg_res=mysqli_query($connection,$ins_msg);
		}
		
	}
	
	if(isset($_POST['delete']))
	{
		$login=$login_session;
		$fact="select * from adminlogin where username='$login'";
		$res=mysqli_query($connection,$fact);
		$row1 = mysqli_fetch_assoc($res);
		$course_id=$row1['course_id'];
				
		$Topic=$_POST['Topic'];
		$target=$_POST['target'];

		$del_msg="delete from notification where Topic='$Topic' and Target='$target' and Sender='$login'";
		mysqli_query($connection,$del_msg);
		echo "<script>alert('Message Deleted')</script>";
	}
	
	
	$login=$login_session;
	$fact="select * from adminlogin where username='$login'";
	$res=mysqli_query($connection,$fact);
	$row1 = mysqli_fetch_assoc($res);
	$course_id=$row1['course_id'];
	$name=$row1['name'];

	$all_notify="select * from notification where Sender='$name'";
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