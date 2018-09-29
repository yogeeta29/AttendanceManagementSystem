<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
  
  

		<title>Student Details</title>


		<link rel="stylesheet" href="Assests/bootstrap-4.0.0-beta.2-dist/css/bootstrap.min.css"/>

		<script src="Assests/jquery/jquery-3.2.1.js"></script>

		<script src="Assests/bootstrap-4.0.0-beta.2-dist/js/bootstrap.bundle.js"></script>
		
		<script>

			//ajax method used on whole data of process_ajax.php
			function ajax_func() {

				xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange = function () {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
					}
				}

				xmlhttp.open('GET', 'process_ajax.php?ajax_func=yes', true);
				xmlhttp.send();
			}


			//Alternate ajax method used on whole data of process_ajax.php after filtering 
			// made this function to use the filters sending the values through here 
			function filter_func() {
				
				var sfilter = document.getElementById('semfilter').value;

				// use this code to display the result for other filters 
					xmlhttp.onreadystatechange = function () {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
					}
				}

				
				xmlhttp.open('GET', 'process_ajax.php?filter_func=yes&sfilter='+sfilter, true);
				xmlhttp.send();

			}


			//insert into database
			function submit_form(){
				var user_form = document.getElementById('user_form');

				var studid = document.getElementById('studid').value,
					courseid = document.getElementById('courseid').value,
					studname = document.getElementById('studname').value,
					email = document.getElementById('email').value,
					semno = document.getElementById('semno').value,
					dob = document.getElementById('dob').value,
					phone = document.getElementById('phone').value,
					addr = document.getElementById('addr').value;

					//Ajax processing from here
				xmlhttp.onreadystatechange = function () {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
					}
				}

					xmlhttp.open('GET', 'process_ajax.php?submit_form=yes&sid='+studid+'&courseid='+courseid+'&name='+studname+'&email='+email+'&sem='+semno+'&date='+dob+'&phone='+phone+'&address='+addr, true);
					xmlhttp.send();
					//Ajax Ending

					$('#add_new_person').modal('hide');

					user_form.reset();

				return false;
			}

			// Delete from database
			function del_stud(del_id){

				xmlhttp.onreadystatechange = function () {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
					}
				}				

				var ans = confirm ("Are you sure you want to delete details of this Student?");
				if (ans){
					xmlhttp.open('GET','process_ajax.php?del_id='+del_id, true);
					xmlhttp.send();
				}

			}

			// Update to Database

			function update_form(update_id){

				var update_form = document.getElementById('update_form'+update_id);

				var update_course = document.getElementById('update_courseid'+update_id).value,
					update_studname = document.getElementById('update_studname'+update_id).value,
					update_email = document.getElementById('update_email'+update_id).value,
					update_semno = document.getElementById('update_semno'+update_id).value,
					update_dob = document.getElementById('update_dob'+update_id).value,
					update_phone = document.getElementById('update_phone'+update_id).value,
					update_addr = document.getElementById('update_addr'+update_id).value;

				xmlhttp.open('GET', 'process_ajax.php?update_form=yes&update_studid='+update_id+'&update_course='+update_course+'&update_studname='+update_studname+'&update_email='+update_email+'&update_semno='+update_semno+'&update_dob='+update_dob+'&update_phone='+update_phone+'&update_addr='+update_addr, true);
				xmlhttp.send();

				$('#edit_student'+update_id).modal('hide');

				update_form.reset();

				return false;
			}

		

		</script>

		<style type="text/css">
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
            background-color: #000033;
            color: white;
            padding: 5px 7px;
        }

        td:hover
        {
            cursor: pointer;
            background: #778;
            color: black;
        }
        </style>


	</head>

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

	<body onload="ajax_func();">

		<div class="text-center">
			<form">
				<div>

			        <label for="semfilter">Filter Semester</label>
			   		<label for="select"></label>
						<select name="semfilter" id="semfilter">
			                <option value="0">Semester Options</option>
			                <option value="1">Sem I</option>
			                <option value="2">Sem II</option>
			                <option value="3">Sem III</option>
			                <option value="4">Sem IV</option>
			                <option value="5">Sem V</option>
			            </select>

					<!-- use onclick for button instead of onsubmit as submit reloads the page -->
			   		<button class="btn btn-danger btn-sm" data-target="#coursefilter" style="margin-right: 5px;" onclick="filter_func();">Search</button>
			   	</div>			
			</form>
		</div>
		
		<div class="container">

			<form style="float:left;" class="form-horizontal well" action="uploadExcel.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<div class="control-group">
							<div class="control-label">
								<label>Upload CSV file:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
						
						<div class="control-group">
							<div class="controls"><br>
							<button type="submit" id="submit" name="submit" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button><br><br>
							</div>
						</div>
					</fieldset>
			</form>
		<div>
			<div style="text-align:right;">
			<button class="btn btn-info" data-toggle="modal" data-target="#add_new_person" data-backdrop="static" style="float:right;">Add new Student</button>
			</div>
			<br/>


			<div class="modal fade" id="add_new_person" tabindex="-1" role="dialog" aria-labelledby="StudentRegistration" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>Add New Student</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form id="user_form">
								<div class="form-group">
									<label>Student ID</label>
									<input type="text" placeholder="Roll No/ID" id="studid" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Course ID</label>
									<input type="text" placeholder="Course No/ID" id="courseid" class="form-control" required>
								</div>
								<div class="form-group">
									<label>First Name</label>
									<input type="text" placeholder="First Name" id="studname" class="form-control" required>
								</div>
								<div class="form-group">
									<label>E-mail</label>
									<input type="text" placeholder="E-mail" id="email" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Semester</label>
									<input type="text" placeholder="Semester No." id="semno" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Date of Birth</label>
									<input type="date" id="dob" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Phone No.</label>
									<input type="text" placeholder="Phone No." id="phone" class="form-control" required>
								</div>
								<div class="form-group">
									<label>Address</label><br/>
									<textarea rows="3" cols="50" placeholder="Please Mention your Permanent Address" id="addr" required></textarea>
								</div>
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg"  onclick=" return submit_form();">Submit</button>
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


			<table class="table table-bordered text-center"style="width:200%;">
				<thead>
					<tr style="width:200%;">
						
					</tr>
				</thead>
				<tbody id="ret_data">
				


					
				</tbody>
		</table>


	</body>


</html>