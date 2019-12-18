<!DOCTYPE html>
<html>
	<head>
		<title> SRDB-Teacher </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' type='text/css' href='layout.css'>
		<link rel="stylesheet" type="text/css" href="logon.css">
		<!-- <link rel='stylesheet' type='text/css' href='text.css'> -->
		<!-- <link rel='stylesheet' type='text/css' href='bootstrap.css'> -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	</head>
	<body>
		<nav class="navbar" style="background-color: black;">
		  	<div class="container-fluid">
		    	<div class="navbar-header">
			      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>                        
			      	</button>
		      		<!-- <a class="navbar-brand" href="#">Logo</a> -->
		    	</div>
		    	<div class="collapse navbar-collapse" id="myNavbar">
			      	<!-- <ul class="nav navbar-nav">
			        	<li class="active"><a href="#">Home</a></li>
			        	<li><a href="#">About</a></li>
			        	<li><a href="#">Projects</a></li>
			        	<li><a href="#">Contact</a></li>
			      	</ul> -->
			      	<ul class="nav navbar-nav navbar-right">
			        	<li>
			        		<form action="connection.php" method="post" style="color:white; margin: 10px;">
			        			<span class="glyphicon glyphicon-log-out"></span>
			        			<input type="submit" name="Logout" value="Log Out" style="background: black; border-color: black;">
			        		</form>
			        		<!-- <a href="DatabaseLogon.html">
			        			<span class="glyphicon glyphicon-log-out"></span>
			        			 Log Out
		        			</a> -->
		        		</li>
			      	</ul>
		    	</div>
		  	</div>
		</nav>
		<header class="container-fluid text-center">
			<div>
				<img class='image' src='images/SRDBlogo.jpg' alt= 'center' style ="border-radius: 50%;">
			</div>
		</header>
		<div class="row">	
			<div class='col-sm-2 sidenav'>
				<p class="text-center"><em>Actions: </em><br><p>
	          	<div class="text-center">
					<select name='add options'>
						<option value=''>Choose option</option>
						<option value='Add referral'>Add Referral</option>
						<option value='Add disipl'>Add Disciplinary Note</option>
						<option value='Add Accomadation'>Add Accommodation</option>
					</select>
					<input class="btn btn-primary btn-sm" type="submit" value="Submit" name="Submit">
				</div>	
				<div class="text-center">
					<input class="btn btn-danger btn-sm" disabled="disabled" type="submit" value="End Of Year" name="EndofYear">
				</div>
			</div>
			<div class='content col-sm-8'>
				<div id='wrapper' class='wrapper'>
	      			<h1 class="text-center">Class Enrollment</h1>
	      			<!-- <form name='myForm' action='' id='myForm'>
	        
	      			</form> -->
					<!-- class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" -->
					
		            <table class="table table-bordered table-striped table-hover table-responsive" style="border-color: black;">
		            <!-- class="table dataTable my-0" id="dataTable" -->
		                <thead>
		                    <tr>
		                        <td><strong>ID</strong></td>
				                <td><strong>Student Name</strong></td>
				                <td><strong>DOB</strong></td>
				                <td><strong>Parent</strong></td>
				                <td><strong>Grade</strong></td>
				                <td><strong>Street Address</strong></td>
				                <td><strong>City</strong></td>
				                <td><strong>State</strong></td>
				                <td><strong>Zip</strong></td>
				                <td><strong>County</strong></td>
		                    </tr>
		                </thead>
		                <tbody>
		                	 <!-- style="height: 200px;" -->
							<?php
								include "mysql.php";
								$sub = "select cl.class_id as class_id from staff as st inner join class as cl on st.staff_id=cl.teacher_id inner join userinfo as ui on st.staff_id=ui.staff_id where ui.username='" . $_SESSION['username'] . "' and ui.password='" . $_SESSION['password'] . "'";
								$sub_result = run_query($sub);
								
								if (mysqli_num_rows($sub_result) > 0) {
									$parsed_data = mysqli_fetch_assoc($sub_result);
									$query = "call retrieveStudentInfo((" . $parsed_data['class_id'] . "))";
									
									$result = run_query($query);

									if (mysqli_num_rows($result) > 0) {
									    // output data of each row
									    echo "<p>" . mysqli_num_rows($result) . " student(s)<br></p>";
									    while($row = mysqli_fetch_assoc($result)) {
									        echo "<tr>";
									        echo "<td><a href='#'>" . $row["student_id"] . "</a></td>";
									        echo "<td>" . $row["student_name"] . "</td>";
									        echo "<td>" . $row["date_of_birth"] . "</td>";
									        echo "<td>" . $row["parent"] . "</td>";
									        echo "<td>" . $row["grade"] . "</td>";
									        echo "<td>" . $row["street_address"] . "</td>";
									        echo "<td>" . $row["city"] . "</td>";
									        echo "<td>" . $row["state"] . "</td>";
									        echo "<td>" . $row["zip"] . "</td>";
									        echo "<td>" . $row["county"] . "</td>";
									    	echo "</tr>";
									    }
									} else {
									    echo "0 results";
									}
								} else echo "<p>0 results<br></p>";
							?>
						</tbody>
				        <tfoot>
				            <tr>
				                <td><strong>ID</strong></td>
				                <td><strong>Student Name</strong></td>
				                <td><strong>DOB</strong></td>
				                <td><strong>Parent</strong></td>
				                <td><strong>Grade</strong></td>
				                <td><strong>Street Address</strong></td>
				                <td><strong>City</strong></td>
				                <td><strong>State</strong></td>
				                <td><strong>Zip</strong></td>
				                <td><strong>County</strong></td>
				            </tr>
				        </tfoot>
				    </table>
	      		</div>
	      	</div>
	      	<div class="col-sm-2 sidenav"></div>
      	</div>
      	<footer class="container-fluid text-center">
      		<p>Footer Text</p>
      	</footer>
		</div>	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>