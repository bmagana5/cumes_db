<!DOCTYPE html>
<html>
	<head>
	<script src='jquery.js'></script>
		<title> SRDB-Admin </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' type='text/css' href='layout.css'>
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
			      	<ul class="nav navbar-nav navbar-right">
			        	<li>
			        		<form action="connection.php" method="post" style="color:white; margin: 10px;">
			        			<span class="glyphicon glyphicon-log-out"></span>
			        			<input type="submit" name="Logout" value="Log Out" style="background: black; border-color: black;">
			        		</form>
		        		</li>
			      	</ul>
		    	</div>
		  	</div>
		</nav>
		<header class="container-fluid text-center">
			<div>
				<img class='logo' src='images/SRDBlogo.jpg' alt= 'center' style="border-radius: 50%;">	
			</div>
		</header>
		<div class="row">	
			<div class='col-sm-2 sidenav'>
				<p class="text-center"><em>Actions: </em><br><p>
	          	<div class="text-center">
					<select name='add options'>
						<option value=''>Choose option</option>
						<option value='Add Student'>Add Student</option>
						<option value='Add Administrator'>Add Administrator</option>
						<option value='Add Class'>Add Class</option>
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
		                        <td><strong>Class ID</strong></td>
				                <td><strong>Teacher ID</strong></td>
				                <td><strong>Teacher Name</strong></td>
		                    </tr>
		                </thead>
		                <tbody>
		                	 <!-- style="height: 200px;" -->
							<?php
								include "mysql.php";
								$sub = "select sch.school_id from staff as st inner join school as sch on st.staff_id=sch.principal_id inner join userinfo as ui on st.staff_id=ui.staff_id where ui.username='" . $_SESSION['username'] . "' and ui.password='" . $_SESSION['password'] . "'";
								$sub_result = run_query($sub);
								$parsed_data = mysqli_fetch_assoc($sub_result);
								$query = "call retrieveClassInfo((" . $parsed_data['school_id'] . "))";
								
								$result = run_query($query);

								if (mysqli_num_rows($result) > 0) {
								    // output data of each row
								    while($row = mysqli_fetch_assoc($result)) {
								        echo "<tr>";
								        echo "<td><a href='#'>" . $row["class_id"] . "</a></td>";
								        echo "<td>" . $row["teacher_id"] . "</td>";
								        echo "<td>" . $row["name"] . "</td>";
								    	echo "</tr>";
								    }

								} else {
								    echo "0 results";
								}

							?>
						</tbody>
				        <tfoot>
				            <tr>
								<td><strong>Class ID</strong></td>
				                <td><strong>Teacher ID</strong></td>
				                <td><strong>Teacher Name</strong></td>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>