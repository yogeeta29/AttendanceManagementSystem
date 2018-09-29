<!doctype html>
<?php
include('session.php');
?>
<html lang="en">
  <head>

  <style>
.DataImage {
    position: relative;
    text-align: center;
    color: black;
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
          <h4>
			<?php
			$login=$login_session;

			$fact="select fact_id,dept_name from facultylogin where username='$login'";
			$s=mysqli_query($connection,$fact);
			$row3 = mysqli_fetch_assoc($s);
			$fact_id=$row3['fact_id'];
			$dept_name=$row3['dept_name'];

			$que="select faculty_name,Last_Name from faculty where fact_id='$fact_id' and dept_name='$dept_name'";
			$res=mysqli_query($connection,$que);
			$row=mysqli_fetch_assoc($res);
			$faculty_name=$row['faculty_name'];
			$Last_Name=$row['Last_Name'];

			?>
			<b id="welcome">Welcome: <i><?php echo "$row[faculty_name] $row[Last_Name]" ?></i></b>
			</h4><br><br>
          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/6.jpg" alt="attendance" style="width:60px;">

			  <?php $login=$login_session;

				$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
			
			  $total="select distinct(Sub_id) from attendance where fact_id=$fact_id and dept_name='$dept_name'";
			  $que=mysqli_query($connection,$total);
			  $num=mysqli_num_rows($que);
			  
			    $i=0;
				while($row=mysqli_fetch_assoc($que)){
					$i=$i+1;
					$pos[$i]=$row['Sub_id'];
				}
				if($num>=1){
				for($i=1;$i<=1;$i++){
				    $sub=$pos[$i];
					echo "<br>";
					echo $sub;
				}			 
			
			  $total="select sum(Total_Classes) as Total_Classes from attendance where fact_id=$fact_id and dept_name='$dept_name' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);
			  $Total_Classes=$row4['Total_Classes'];
			  echo "<br>Total Hours<br>";			  
			  echo $Total_Classes;
				}
				else{
					echo "<br>Total Hours<br>";
					echo "0";
				}
			  ?>
			  
            </div>
			</div>

            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/1.png" alt="attendance" style="width:70px;">

				<?php $login=$login_session;

				$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
			
			  $total="select distinct(Sub_id) from attendance where fact_id=$fact_id and dept_name='$dept_name'";
			  $que=mysqli_query($connection,$total);
			  $num=mysqli_num_rows($que);
				
			  //$row4 = mysqli_fetch_assoc($que);
			  //$Sub_id=$row4['Sub_id'];
			  $i=0;
				while($row=mysqli_fetch_assoc($que)){
					$i=$i+1;
					$pos[$i]=$row['Sub_id'];
				}
				if($num>=2){
				for($i=2;$i<=2;$i++){
				    $sub=$pos[$i];
					echo "<br>";
					echo $sub;
				}			 
			
			  $total="select sum(Total_Classes) as Total_Classes from attendance where fact_id=$fact_id and dept_name='$dept_name' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);
			  $Total_Classes=$row4['Total_Classes'];
			  echo "<br>Total Hours<br>";			  
			  echo $Total_Classes;
				}
				else{
					echo "<br>Total Hours<br>";
					echo "0";
				}
			  ?>
			</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/3.jpg" alt="attendance" style="width:90px;">

				<?php 
				$login=$login_session;

				$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
			
			  $total="select distinct(Sub_id) from attendance where fact_id=$fact_id and dept_name='$dept_name'";
			  $que=mysqli_query($connection,$total);
			  $num=mysqli_num_rows($que);
							  

				$i=0;
				while($row=mysqli_fetch_assoc($que)){
					$i=$i+1;
					$pos[$i]=$row['Sub_id'];
				}
				if($num>=3){
				for($i=3;$i<=3;$i++){
				    $sub=$pos[$i];
					echo "<br>";
					echo $sub;
					
				
				}			 
			
			  $total="select sum(Total_Classes) as Total_Classes from attendance where fact_id=$fact_id and dept_name='$dept_name' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);
			  $Total_Classes=$row4['Total_Classes'];
			  echo "<br>Total Hours<br>";			  
			  echo $Total_Classes;
				}
				else{
					echo "<br>Total Hours<br>";
					echo "0";
				}
			  ?>
				
			</div>
			</div>
			
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/4.png" alt="attendance" style="width:100px;">

				<?php $login=$login_session;

				$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
			
			  $total="select distinct(Sub_id) from attendance where fact_id=$fact_id and dept_name='$dept_name'";
			  $que=mysqli_query($connection,$total);
			  $num=mysqli_num_rows($que);
				
			  //$row4 = mysqli_fetch_assoc($que);
			  //$Sub_id=$row4['Sub_id'];
		
				$i=0;
				while($row=mysqli_fetch_assoc($que)){
					$i=$i+1;
					$pos[$i]=$row['Sub_id'];
				}
				if($num>=4){
				for($i=4;$i==4;$i++){
				    $sub=$pos[$i];
					echo "<br>";
					echo $sub;
					
				
				}			 
			
			  $total="select sum(Total_Classes) as Total_Classes from attendance where fact_id=$fact_id and dept_name='$dept_name' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);
			  $Total_Classes=$row4['Total_Classes'];
			  echo "<br><h4>Total Hours</h4><br>";			  
			  echo $Total_Classes;
				}
				else{
					echo "<br>Total Hours<br>";
					echo "0";
				}
			  ?>
            </div>
			</div>
			<?php
				
		  ?>
          </section>
		  
		  
<br>
          <h2>Classes Taken</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr align="center">
				<th>Subject Code</th>
                  <th>Subject Name</th>
				  <th>Total Hours Taken</th>
				</tr>
              </thead>
              <tbody align="center">
                <?php
				$login=$login_session;
				$fact="select fact_id,dept_name from facultylogin where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$fact_id=$row3['fact_id'];
				$dept_name=$row3['dept_name'];
				
				$query="select distinct(c.sub_id),sum(a.Total_Classes) as Total_Classes,sum(a.Present_Count) as Present_Count,c.sub_name from attendance a,subjects c where a.fact_id='$fact_id' and a.dept_name='$dept_name' and a.sub_id=c.sub_id group by sub_id";
			  
				$result=mysqli_query($connection,$query);

				while($row=mysqli_fetch_assoc($result)){
					echo "
						<tr>
						<td>$row[sub_id]</td>
						<td>$row[sub_name]</td>
						<td>$row[Total_Classes]</td>
						</tr>";

				}
				?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>

      <!-- Include Footer.html here -->
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>