<?php
include 'session.php';

	if(isset($_POST["submit"]))
	{
		$login=$login_session;
		$fact="select * from adminlogin where username='$login'";
		$res=mysqli_query($connection,$fact);
		$row1 = mysqli_fetch_assoc($res);
		$course_id=$row1['course_id'];
		
		$semno = 2;

		$file = $_FILES['file']['tmp_name'];
		
		if($_FILES["file"]["size"] > 0)
		{
			
		$handle = fopen($file, "r");
		$c = 0;

		while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
		{
			$c = $c + 1;

			if($c>1){

				$rollno = $filesop[10];
				$name = $filesop[1];
				$dob = $filesop[5];
				$phone = $filesop[4];
				$addr = $filesop[2];
				$email = $filesop[12];

				$sql = "INSERT INTO student (stud_id, course_id, stud_name, email_id, sem_no, dob, Phone_no, address) VALUES ('$rollno', '$course_id', '$name', '$email', '$semno', '$dob', '$phone', '$addr')";
				$result = mysqli_query( $connection,$sql);
				//mysqli_stmt_execute($stmt);
				
				//$myvalue = 'Test me more';
				$arr = explode(' ',trim($name));
				//echo $arr[0]; 
				
				$ins_login="insert into logindetails(stud_id,course_id,username,password) values ('$rollno','$course_id','$rollno','$rollno')";
				$result_login = mysqli_query( $connection,$ins_login);

			}
			if($result==true)
			{
				echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"studIndex.php\"
					</script>";
			
			}
	}
		
	}
		//header("refresh:5;url=studIndex.html");

	}

?>