<!DOCTYPE html>
<html>


	<head>

		<title>Vertical Dropdown Example</title>

		<style type="text/css">

			/*margin and padding between the list elements removed*/			
			#divMenu, ul, li, li li {
			    margin: 0;
			    padding: 0;
			}
			
			/*width and height for the div*/
			#divMenu {
			    width: 150px;
			    height: 27px;
			}

			/*formatting for main ul*/
			#divMenu ul
			{
			    line-height: 25px;
			}

			/*formatting for main li under main ul*/
			#divMenu li {
		        list-style: none;
		        position: relative;
		        background: #641b1b;
		   	}

		   	/*formatting for li under ul of the main li, i.e. the links that u want to show only when hovered */
		   	#divMenu li li {
	            list-style: none;
	            position: relative;
	            background: #641b1b;
	            left: 148px;
	            top: -27px;
	        }

	        /*formatting for text of all the ul,li,a*/
	        #divMenu ul li a {
		        width: 148px;
		        height: 25px;
		        display: block;
		        text-decoration: none;
		        text-align: center;
		        font-family: Georgia,'Times New Roman',serif;
		        color:#ffffff;
		        border:1px solid #eee;
		    }

		    /*formatting for ul under main li, so that the links to be hovered are hidden*/
		    #divMenu ul ul {
		        position: absolute;
		        visibility: hidden;
		        top: 27px;
		    }

		    /*whatever is there under main li of main ul will be visible only when hovered*/
		    #divMenu ul li:hover ul {
		        visibility: visible;
		    }

		    /*bckgrnd color when hovered*/
		    #divMenu li:hover {
		        background-color: #945c7d;
		    }

		    /*bckgrnd color when hovered*/
		    #divMenu ul li:hover ul li a:hover {
		        background-color: #945c7d;
		    }

		    /*makes whatever you are pointing to as bold when hovered*/
		    #divMenu a:hover {
		        font-weight: bold;
		    }

		</style>

	</head>


	<body>

		<div id="divMenu">
			<ul>

				<li><a href="#">Courses</a>
					<ul>
						<li><a href="#">Course Enrollment</a></li>
						<li><a href="#">View Course Details</a></li>
					</ul>
				</li>

				<li><a href="#">Attendance</a>
					<ul>
						<li><a href="#">Attendance Entry</a></li>
						<li><a href="#">Generate Report</a></li>
					</ul>
				</li>

			</ul>
			
		</div>

	</body>


</html>