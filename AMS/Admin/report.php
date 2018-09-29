<html>
<head>
<style>
table {
	    border: 1px solid #ddd;

    border-collapse: collapse;
    width: 150%;
	text-align:center;
}
th{
	border-bottom-style: solid;
	border-bottom-width: 1px;
	background-color: ;
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
	<link href="Assests/AddCourses.css" rel="stylesheet">



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
<br><br>

<button id="myBtn" onclick="myFunction()">Print</button>

<script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>

 <?php	
 include 'session.php';
		if(isset($_POST['submit']))
		{
			$login=$login_session;
			$query1="select course_id from adminlogin where username='$login'";
			$res=mysqli_query($connection,$query1);
			$row1=mysqli_fetch_assoc($res);
			$course=$row1['course_id'];	
				
			$sem=$_POST['sem'];
			$query="select * from attendance a,student s where a.course_id='$course' and s.sem_no='$sem' and s.course_id='$course' and a.stud_id = s.stud_id group by a.stud_id";
			$result=mysqli_query($connection,$query);
			$result2=mysqli_query($connection,$query);
			
			$get_num=mysqli_fetch_assoc($result2);
			$stud_id=$get_num['stud_id'];

			$query4="select distinct(stud_id),sub_id,Present_Count,Total_Classes from attendance where stud_id='$stud_id' and course_id='$course'";
			$res4=mysqli_query($connection,$query4);
			
			$date="select min(a.attd_date) as min,max(a.Last_Date) as max from attendance a, student s where s.sem_no='$sem' and a.stud_id=s.stud_id";
			$result3=mysqli_query($connection,$date);
			
			$get_date=mysqli_fetch_assoc($result3);	
			
			$originalDate = $get_date['min'];
			$start = date("d-m-Y", strtotime($originalDate));

			$originalDate2 = $get_date['max'];
			$end = date("d-m-Y", strtotime($originalDate2));
			
			if(mysqli_num_rows($result)>0){
			
			echo "<h4 align='center'>From: ";
			echo $start;
			echo "&nbsp;&nbsp;&nbsp; To: ";
			echo $end;
				
			echo"<table border='2' style='font-size:18px;'>";
			echo"<th>Roll No</th>";
			
			$n=mysqli_num_rows($res4);
			for($i=0;$i<$n;$i++){
			echo "<th>Subject Code</th>";
			echo "<th>Subject Name</th>";			
			echo "<th>Present Count</th>";
			echo "<th>Total Hours</th>";
			echo "<th>Percentage</th>";
			}
			echo "<th>Aggregate Attendance</th>";
			while($row=mysqli_fetch_assoc($result))
			{
				echo "<tr align='center'>";
				echo "<td>".$row['stud_id']."</td>";
				//echo "<td>".$row['sub_id']."</td>";

				$stud_id=$row['stud_id'];
				$query2="select distinct(a.stud_id),a.sub_id,s.sub_name,a.Present_Count,a.Total_Classes from attendance a,subjects s where a.stud_id='$stud_id' and a.course_id='$course' and s.sub_id=a.sub_id";
				$res=mysqli_query($connection,$query2);
				$overall_total=0;$overall_present=0;
				
				while($row2=mysqli_fetch_assoc($res)){
					
					echo "<td>".$row2['sub_id']."</td>";
					echo "<td>".$row2['sub_name']."</td>";
					echo "<td>".$row2['Present_Count']."</td>";
					$sub_id=$row2['sub_id'];
					
					$get_date2="select attd_date,Last_Date from attendance where sub_id='$sub_id'";
					$get_res=mysqli_query($connection,$get_date2);
					$row_date2=mysqli_fetch_assoc($get_res);
					
					$originalDate = $row_date2['attd_date'];
					$start = date("d-m-Y", strtotime($originalDate));

					$originalDate2 = $row_date2['Last_Date'];
					$end = date("d-m-Y", strtotime($originalDate2));
							

					echo "<td>$row2[Total_Classes]<br>($start To $end)</td>";
					
					$total=$row2['Total_Classes'];
					$present=$row2['Present_Count'];
					$per=(($present/$total)*100);
					$per=number_format("$per",2);
					echo "<td> $per% </td>";
					
					$overall_total= ($overall_total + $total);
					$overall_present= ($overall_present + $present);
					
					
				}	
				
						$overall_per=(($overall_present/$overall_total)*100);
						if($overall_per<75){
							$overall=number_format("$overall_per",2);
							echo "<td style='color:red;'> $overall% </td>";
						}
						else{
							$overall=number_format("$overall_per",2);
							echo "<td> $overall% </td>";
						}
				
				
				echo "</tr>";
				
			}
			
			echo "</table>";
			}
			else
				echo "<h4 align='center'><font color='red'>No Records Found!!!</font></h4>";
		}
		?>