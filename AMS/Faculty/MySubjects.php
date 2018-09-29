<!doctype html>
<?php
include('session.php');

$login=$login_session;
$fact="select fact_id,dept_name from facultylogin where username='$login'";
$s=mysqli_query($connection,$fact);
$row3 = mysqli_fetch_assoc($s);
$fact_id=$row3['fact_id'];
$dept_name=$row3['dept_name'];


$search_sql = "SELECT * FROM subjects WHERE subjects.fact_id='".$fact_id."'";
if(!mysqli_query($connection, $search_sql))
{
	die('error selecting courses record');
}	
$result=mysqli_query($connection,$search_sql);
if (mysqli_num_rows($result) > 0) 
{  	  	echo "<th>Subject Details</th>
						<th>Options</th>";
		while($rows = mysqli_fetch_assoc($result))
		{
			echo "<tr align='left'>
				<td>
				Subject Code :   $rows[sub_id]<br>
				Subject Name :   $rows[sub_name]<br>
				Enrollment Key : $rows[Enroll_Key]</td>
		
				 <td align='center'>
				<button class='btn btn-success' onclick=del_sub('$rows[sub_id]')>UnEnroll</button>
				<a class='btn btn-success' href='Stud_enroll.php?sub_id=$rows[sub_id]'>Enrolled Students</a>
				</td>
			</tr>
		";
		}
}
else
	echo "<h5><font color='red'>You have not enrolled for any subject</font></h5>";

if(isset($_REQUEST['sub_id'])){

		$sql = "update subjects set fact_id=0000 and Enroll_Key=0 where sub_id='$_REQUEST[sub_id]'";
		$run = mysqli_query($connection, $sql);
		echo "<h5>Successfully UnEnrolled</h5>";
	}
?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 