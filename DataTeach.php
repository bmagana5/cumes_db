<!DOCTYPE html>
<html>
	<head>
		<script src='jquery.js'></script>
		<title> SRDB-Teacher </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' type='text/css' href='layout.css'>
		<link rel='stylesheet' type='text/css' href='text.css'>
		<!-- <link rel='stylesheet' type='text/css' href='bootstrap.css'> -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	</head>
	<body>
		<nav class="navbar navbar-inverse">
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
			        		<a href="DatabaseLogon.html">
			        			<span class="glyphicon glyphicon-log-out"></span>
			        			 Log Out
		        			</a>
		        		</li>
			      	</ul>
		    	</div>
		  	</div>
		</nav>
		<header class="container-fluid text-center">
			<div>
				<img class='logo' src='images/SRDBlogo.jpg' alt= 'center'>
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
		            <table class="table table-bordered table-striped table-hover table-responsive" style="border-color: black">
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

								$query = "call retrieveStudentInfo(304)";
								
								$result = run_query($query);
								/* $sql = "SELECT st.student_id AS 'Student ID', st.student_name AS 'Student Name', st.date_of_birth AS 'DOB', st.parent AS 'Parent/Guardian', ce.grade AS 'Grade', sf.name AS 'Teacher' FROM student AS st INNER JOIN classenroll AS ce ON st.student_id=ce.student_id INNER JOIN class AS cl ON ce.class_id=cl.class_id INNER JOIN staff AS sf ON cl.teacher_id=sf.staff_id WHERE sf.name='Melisandra Labbati';*/

								//$result = $conn->query($query);
					                                

								if (mysqli_num_rows($result) > 0) {
								    // output data of each row
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