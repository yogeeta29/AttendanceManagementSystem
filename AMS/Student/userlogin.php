<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: StudentProfile.php");
}
?>
<html lang="en">

<head>
<style>

.login-logo{
	 vertical-align: middle;
}

header, footer {
    padding: 0.5em;
    color: white;
    background-color: #2c3e50;
    clear: left;
    text-align: center;
    border-radius: 20px 20px 0px 0px;
    	
}
div.container {
    width: 38%;
	height: 70%;
    border: 3px ridge gray;
	background-color:white;
	margin:auto;
	border-radius: 25px;
}
.navbar-brand{
	margin-bottom:40;
	font-size:40;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Assests/images/favicon.ico">
    <link href="Assests/AddCourses.css" rel="stylesheet">

    <title>Login</title>

    <!-- Bootstrap core CSS -->

    <!-- Custom styles for this template -->
    <link href="Assests/css/signin.css" rel="stylesheet">
</head>

<body background="background.jpg" style="font-family: Trebuchet MS;">
<div align="center">

<img src="goa-logo.png" class="login-logo" alt="attendance" style="width:80px;height:110px;">
<a class="navbar-brand">GOA UNIVERSITY</a><br><br>
<div class="container" align="center">
		<header align="center">
            <h2  align="center">STUDENT lOGIN</h2>
		</header>
        <form class="form-signin" method="post" align="center"><br>
		

            <input type="text" style="width:100%;" class="form-control" placeholder="Username" name="username" required autofocus><br><br>
            <input type="password"  style="width:100%;" class="form-control" placeholder="Password" name="password" required><br><br>

            <button id="myBtn" style="width:100%;" class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button><br><br>
			<a href="forgot_pass.php" style="color:black;">Forgot Password</a>

        </form>
</div>
</div>
</body>

</html>