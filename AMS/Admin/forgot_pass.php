<html>
<head>
    <link href="Assests/AddCourses.css" rel="stylesheet">

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
div.container {
    width: 38%;
	height: 70%;
    border: 1px ridge grey;
	background-color:white;
	margin:auto;
}
form{
margin-left:15px;
font-size:16;
font-family:verdana;
}
</style>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
	 <link href="Assests/dropdown.css" rel="stylesheet">


    <title>Reset Password</title>

    <!-- Bootstrap core CSS -->
    <link href="Assests/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assests/css/dashboard.css" rel="stylesheet">

</head>

<body style="background-color:#e6e6ff;">
<header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  	<img src="goa-logo.png" alt="attendance" style="width:40px;height:50px;" align="left">&nbsp;

        <a class="navbar-brand" href="#" style="font-family: Trebuchet MS;">GOA UNIVERSITY</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div style="font-family: Trebuchet MS;" class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="Index.php">Home <span class="sr-only">(current)</span></a>
            </li>
			<li class="dropdown">
				<a class="nav-link" href="javascript:void(0)" class="dropbtn">Login</a>
				<div class="dropdown-content">
				  <a href="AdminLogin.php">Admin Login</a>
				  <a href="../Faculty/factlogin.php">Faculty Login</a>
				  <a href="../Student/userlogin.php">Student Login</a>
				</div>
			</li>
          </ul>
          <form class="form-inline mt-2 mt-md-0">
          </form>
        </div>
      </nav>
    </header>
<br>
<div class="container"><br>
<h2 style="margin-left:15px;">Reset Password</h2>
<hr>
<form name="forgot" method="post" action="<?php $_SERVER['PHP_SELF'];?>"> 
Please enter your Username or Email Address.<br><br>
<p>
<label for="username">Username:</label> 
<input style="margin-left:30px;height:10%;width:50%;" name="username" type="text" value="" /> 
</p> 
<h4 style="margin-left:220px;"><b>OR</b></h4>
<p>
<label for="email">Email Address:</label> 
<input style="height:10%;width:50%;" name="email" type="email" value="" /> 
</p> <hr>
<input id="myBtn" style="margin-left:150px;width:40%;" type="submit" name="submit" value="submit"/> 

</form> 
</div>
<?php 
include 'connect.php';
if(!empty($_POST['username'])){
if(isset($_POST['submit'])) 
{ 
$username = $_POST['username']; 

$stud="select * from adminlogin where username='$username'";
$s=mysqli_query($con,$stud);

if(mysqli_num_rows($s)>0){
$row3 = mysqli_fetch_assoc($s);
$course_id=$row3['course_id'];
$name=$row3['name'];

$randNum = rand(10000,99999); //generates a random code
$tempPass = "$randNum";
//$hashTempPass = md5($tempPass);
$sql = "UPDATE adminlogin SET password='$tempPass' WHERE username='$username'";
$query = mysqli_query($con, $sql);

if(!$query) 
{ 
die(mysqli_error()); 
} 
echo "<br>";
echo "<div style='border: 1px ridge green;margin:auto; width:40%;height:25%;background-color:#b3ffb3;font-size:18;'>";
echo "<br>";
echo "<div style='margin-left:10px;'>";
echo "<b>Dear $name</b><br>";
echo "Your password has been reset at your request.<br>";
echo "Your Username is: $username<br>";
echo "Your Password is: $tempPass<br>";
echo "</div>";
echo "</div>";
/*if(mysqli_num_rows($query) != 0) 
{ ini_set('SMTP','myserver');
ini_set('smtp_port',25);
$row=mysqli_fetch_assoc($query); 
$password=$row["password"]; 
$email=$row["username"]; 

$subject="your company - your password"; 
$header="From: yogeetashirodker@gmail.com"; 
$content="Your password is: ".$password; 
mail($email, $subject, $content, $header);
print "We sent you an email with your password."; 
} 
else 
{ 
echo("no such login in the system. please try again."); 
} 
} */
}
else
	echo "<br>
		<div style='border: 1px ridge red;margin:auto; width:40%;height:20%;background-color:#ffcccc;font-size:18;'><br>
		<div style='margin-left:10px;'>
		<b>No search results</b><br>
		Your search did not return any results. Please try again with correct username or email address.</font>
		</div>
		</div>";
}
}
?>

<?php
if(!empty($_POST['email'])){
if(isset($_POST['submit'])) 
{ 
include 'connect.php';
$email = $_POST['email']; 

$get_email="select * from adminlogin where email_id='$email'";
$query_email=mysqli_query($con,$get_email);

if(mysqli_num_rows($query_email)>0){
	$row_email = mysqli_fetch_assoc($query_email);
	
	$course_id=$row_email['course_id'];
	$username=$row_email['username'];
	$name=$row_email['name'];

	
	$randNum = rand(10000,99999); //generates a random code
	$tempPass = "$randNum";
	$sql2 = "UPDATE adminlogin SET password='$tempPass' WHERE username='$username'";
	$query2 = mysqli_query($con, $sql2);

	if(!$query2) 
	{ 
	die(mysqli_error()); 
	} 
	echo "<br>";
	echo "<div style='border: 1px ridge green;margin:auto; width:40%;height:25%;background-color:#b3ffb3;font-size:18;'>";
	echo "<br>";
	echo "<div style='margin-left:10px;'>";
	echo "<b>Dear $name</b><br>";
	echo "Your password has been reset at your request.<br>";
	echo "Your Username is: $username<br>";
	echo "Your Password is: $tempPass<br>";
	echo "</div>";
	echo "</div>";
	}
	echo "<br>
		<div style='border: 1px ridge red;margin:auto; width:40%;height:20%;background-color:#ffcccc;font-size:18;'><br>
		<div style='margin-left:10px;'>
		<b>No search results</b><br>
		Your search did not return any results. Please try again with correct username or email address.</font>
		</div>
		</div>";
	}
	}
?>


</body>
</html>