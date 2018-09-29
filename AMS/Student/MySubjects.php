<!doctype html>
<?php
include('session.php');

		//To get already enrolled courses.
			$login=$login_session;
			$stud="select stud_id,course_id from logindetails where username='$login'";
			$s=mysqli_query($connection,$stud);
			$row3 = mysqli_fetch_assoc($s);
			$stud_id=$row3['stud_id'];
			$course=$row3['course_id'];

			
			//Query to get the sub_id for which the student has already registered.
			$query="select * from enroll where stud_id='$stud_id' and course_id='$course'"; 
			$result=mysqli_query($connection,$query);

			if((mysqli_num_rows($result)) > 0){
				while($row=mysqli_fetch_assoc($result))
				{
					$sub_id=$row['sub_id'];
					
					echo "<tr align='center'>";
					//echo "<td>".$row['stud_id']."</td>";
			
					
					//Query only to get the sub name and faculty name
					$name="select c.sub_name,f.faculty_name,f.Last_Name from subjects c,faculty f where c.sub_id='$sub_id' and c.fact_id=f.fact_id";
					$res_name=mysqli_query($connection,$name);
					while($rows=mysqli_fetch_assoc($res_name)){
						
						echo "<tr align='left'>
								<td>
								Subject Code :   $row[sub_id]<br>
								Subject Name :   $rows[sub_name]<br>
								Faculty Name :   $rows[faculty_name] $rows[Last_Name]</td>
								<td align='center'>
								<button class='btn btn-success' onclick=del_sub('$row[sub_id]')>UnEnroll</button>

							</td>
						</tr>
					";
					}

				}
			}
			else
					echo "<h5><font color='red'>You are not enrolled for any subject</font></h5>";
			
			echo "</table>";
			
		if(isset($_REQUEST['sub_id'])){
			
			$login=$login_session;
			$stud="select stud_id,course_id from logindetails where username='$login'";
			$s=mysqli_query($connection,$stud);
			$row3 = mysqli_fetch_assoc($s);
			$stud_id=$row3['stud_id'];
			$course=$row3['course_id'];
			
			$query="delete from enroll where course_id='$course' and sub_id='$_REQUEST[sub_id]' and stud_id='$stud_id'";
			$result=mysqli_query($connection,$query);
			if(!$query)
			{
				mysqli_error();
			}
			else
			{
				echo "<h5>You are successfully Unenrolled from subject $_REQUEST[sub_id]</h5>";
			}	
		}	
		?>