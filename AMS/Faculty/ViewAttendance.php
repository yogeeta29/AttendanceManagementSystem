<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>
  
		<title>Update attendance</title>

		<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		 
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

				xmlhttp.open('GET', 'ViewAttendance_ajax.php', true);
				xmlhttp.send();
			}


			//insert into database
			function submit_form(){
				var user_form = document.getElementById('user_form');
            
				var sub_id = document.getElementById('sub_id').value;
					
            
					//Ajax processing from here
				xmlhttp.onreadystatechange = function () {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
					}
				}

					xmlhttp.open('GET', 'ViewAttendance_ajax.php?submit_form=yes&sub_id='+sub_id, true);
					xmlhttp.send();
					//Ajax Ending

					$('#add_new_person').modal('hide');

					user_form.reset();

				return false;
			}

			// Delete from database

			function del_stud(del_id,sub_id){

				xmlhttp.onreadystatechange = function () {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('ret_data').innerHTML = xmlhttp.responseText;
					}
				}				

				var ans = confirm ("Are you sure you want to delete from the database?");
				if (ans){
					xmlhttp.open('GET','ViewAttendance_ajax.php?del_id='+del_id+'&sub_id='+sub_id, true);
					xmlhttp.send();
				}

			}

			function update_form(update_id){
       
				var update_form = document.getElementById('update_form'+update_id);

				var attd_date = document.getElementById('attd_date'+update_id).value,
					Last_Date = document.getElementById('Last_Date'+update_id).value,
					stud_id = document.getElementById('stud_id'+update_id).value,
					sub_id = document.getElementById('sub_id'+update_id).value,
					Present_Count = document.getElementById('Present_Count'+update_id).value,
					Total_Classes = document.getElementById('Total_Classes'+update_id).value;
					
					
				xmlhttp.open('GET', 'ViewAttendance_ajax.php?update_form=yes&attd_date='+attd_date+'&Last_Date='+Last_Date+'&stud_id='+stud_id+'&sub_id='+sub_id+'&Present_Count='+Present_Count+'&Total_Classes='+Total_Classes, true);

				xmlhttp.send();

				$('#edit_student'+update_id).modal('hide');

				update_form.reset();

				return false;
			}


		</script>


	</head>
  
  <style>
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
th{

	background-color: #000033;
	color:white;
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
 
	<body onload="ajax_func();">
		
		<div class="container">

			<br/><br/> 
			<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#add_new_person" data-backdrop="static" style="margin-right: 5px;">Choose Your Subject</button>
			<br/><br/>

			

			<div class="modal fade" id="add_new_person" tabindex="-1" role="dialog" aria-labelledby="CollegeRegistration" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>Enter Details</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form onsubmit=" return submit_form();" id="user_form">
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
										<select id="sub_id" name="sub_id" onchange="findvalue()" class="form-control" required>
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
			<script>
			function findvalue(){
			var x = document.getElementById("sub_id").value;
			document.getElementById("demo").innerHTML = "Subject Code: " + x;
			}					

			</script>										
								
								</div>
							
								<div class="form-group">
									<button class="btn btn-info btn-block btn-lg">Submit</button>
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

			
			<table class="table table-bordered text-center">
				<thead>
					<tr>
					<p id="demo"></p>
						<th>From</th>
						<th>To</th>					
						<th>Roll No</th>						
						<th>Attended Classes</th>
						<th>Total Hours</th>
						<th>Attendance Percentage</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody id="ret_data">
				


					
				</tbody>
		</table>


	</body>


</html>