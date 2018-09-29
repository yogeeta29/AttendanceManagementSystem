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
			$login=$login_session;
			$stud="select stud_id,course_id from logindetails where username='$login'";
			$s=mysqli_query($connection,$stud);
			$row3 = mysqli_fetch_assoc($s);
			$stud_id=$row3['stud_id'];
			$course_id=$row3['course_id'];

			$que="select stud_name from student where stud_id='$stud_id' and course_id='$course_id'";
			$res=mysqli_query($connection,$que);
			$row=mysqli_fetch_assoc($res);
			$name=$row['stud_name'];

			?>
			<h5><b id="welcome">Welcome: <i><?php echo $name ?></i></b></h5>

          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/images/2.png" alt="attendance" style="width:80px;">

				<?php $login=$login_session;

				$fact="select stud_id,course_id from logindetails where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$stud_id=$row3['stud_id'];
				$course_id=$row3['course_id'];
			
			  $total="select Sub_id from attendance where stud_id=$stud_id and course_id='$course_id'";
			  $que=mysqli_query($connection,$total);
			  $num=mysqli_num_rows($que);
				
			  //$row4 = mysqli_fetch_assoc($que);
			  //$Sub_id=$row4['Sub_id'];
		
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
				
			
			  $total="select Total_Classes,Present_Count  from attendance where stud_id=$stud_id and course_id='$course_id' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);

			  $total=$row4['Total_Classes'];
			  $present=$row4['Present_Count'];
			  echo"<br>Attendance Percentage<br>";
			  $per=(($present/$total)*100);
			  echo number_format("$per",2)."%<br>";
			  }
				else{
					 echo"<br>Attendance Percentage<br>";
					 echo "0";
				}

			  ?>
              <!--<div class="text-muted">Something else</div>-->
            </div>
			</div>
			
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/images/5.png" alt="attendance" style="width:80px;">

				<?php $login=$login_session;

				$fact="select stud_id,course_id from logindetails where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$stud_id=$row3['stud_id'];
				$course_id=$row3['course_id'];
			
			  $total="select Sub_id from attendance where stud_id=$stud_id and course_id='$course_id'";
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
				
			
			  $total="select Total_Classes,Present_Count  from attendance where stud_id=$stud_id and course_id='$course_id' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);

			  $total=$row4['Total_Classes'];
			  $present=$row4['Present_Count'];
			  echo"<br>Attendance Percentage<br>";
			  $per=(($present/$total)*100);
			  echo number_format("$per",2)."%<br>";
			  }
				else{
					 echo"<br>Attendance Percentage<br>";
					 echo "0";
				}

			  ?>
              <!--<div class="text-muted">Something else</div>-->
            </div>
			</div>
			
			
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/images/6.jpg" alt="attendance" style="width:120px;">

				<?php $login=$login_session;

				$fact="select stud_id,course_id from logindetails where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$stud_id=$row3['stud_id'];
				$course_id=$row3['course_id'];
			
			  $total="select Sub_id from attendance where stud_id=$stud_id and course_id='$course_id'";
			  $que=mysqli_query($connection,$total);
			  $num=mysqli_num_rows($que);
				
			  //$row4 = mysqli_fetch_assoc($que);
			  //$Sub_id=$row4['Sub_id'];
		
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
				
			
			  $total="select Total_Classes,Present_Count  from attendance where stud_id=$stud_id and course_id='$course_id' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);

			  $total=$row4['Total_Classes'];
			  $present=$row4['Present_Count'];
			  echo"<br>Attendance Percentage<br>";
			  $per=(($present/$total)*100);
			  echo number_format("$per",2)."%<br>";
			  }
				else{
					 echo"<br>Attendance Percentage<br>";
					 echo "0";
				}

			  ?>
              <!--<div class="text-muted">Something else</div>-->
            </div>
			</div>
			
            <div class="col-6 col-sm-3 placeholder">
			<div class="DataImage">
				<img src="Assests/images/7.png" alt="attendance" style="width:80px;">

			  <?php $login=$login_session;

				$fact="select stud_id,course_id from logindetails where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$stud_id=$row3['stud_id'];
				$course_id=$row3['course_id'];
			
			  $total="select Sub_id from attendance where stud_id=$stud_id and course_id='$course_id'";
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
				for($i=4;$i<=4;$i++){
				    $sub=$pos[$i];	
					echo "<br>";
					echo $sub;
					
				
				}	
				
			
			  $total="select Total_Classes,Present_Count  from attendance where stud_id=$stud_id and course_id='$course_id' and sub_id='$sub'";
			  $que=mysqli_query($connection,$total);
			  $row4 = mysqli_fetch_assoc($que);

			  $total=$row4['Total_Classes'];
			  $present=$row4['Present_Count'];
			  echo"<br>Attendance Percentage<br>";
			  $per=(($present/$total)*100);
			  echo number_format("$per",2)."%<br>";
			  }
				else{
					 echo"<br>Attendance Percentage<br>";
					 echo "0";
				}
			  ?>
              <!--<div class="text-muted">Something else</div>-->
            </div>
			</div>
          </section>
		  
          <h3>Total Classes Taken</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr align="center">
                  <th>Subject Code</th>
                  <th>Subject Name</th>				  
				  <th>Total Hours:</th>
				</tr>
              </thead>
              <tbody align="center">
                <?php
				$login=$login_session;
				$fact="select stud_id,course_id from logindetails where username='$login'";
				$s=mysqli_query($connection,$fact);
				$row3 = mysqli_fetch_assoc($s);
				$stud_id=$row3['stud_id'];
				$course_id=$row3['course_id'];
				
				//$query="select distinct(a.sub_id),sum(a.Total_Classes) as Total_Classes from attendance a where a.course_id='$course_id'";
			  	$query="select distinct(e.sub_id),sum(a.Total_Classes) as Total_Classes,s.sub_name  from attendance a,enroll e,subjects s where s.sub_id=e.sub_id and e.course_id='$course_id' and e.stud_id='$stud_id' and a.sub_id=e.sub_id group by e.sub_id";

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