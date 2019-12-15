<!DOCTYPE html>
<html>
	<head>
	<script src='jquery.js'></script>
		<title> SRDB-Admin </title>
		<link rel='stylesheet' type='text/css' href='layout.css'>
		<link rel='stylesheet' type='text/css' href='text.css'>
		<link rel='stylesheet' type='text/css' href='bootstrap.css'>
	</head>
	<body>
		<div class= 'header'>
			<img class='logo' src='images/SRDBlogo.jpg' alt= 'center'>
		</div>
		<div class='left'>
			<p>
	          Add Actions: <br/>
	          	<select name='Option'>
	            	<option value=''>Choose option</option>
	            	<option value='Add Student'>Add Student</option>
	            	<option value='Add disipl'>Add Admin</option>
	            	<option value='Add Accomadation'>Add Accomadation</option> 
					<option value='Add Class'>Add Class</option>
	          	</select><input type="submit" value="submit" name="Submit">
	        </p>
		</div>
		<div class='right'>
			<p>
			Edit Actions: <br/>
	          <select name='Option'>
	            <option value=''>Choose option</option>
	            <option value='Edit Student'>Edit Student</option>
	            <option value='Edit disipl'>Edit Admin</option>
	            <option value='Edit Accomadation'>Add Accomadation</option> 
				<option value='Edit Class'>Edit Class</option>
	          </select><input type="submit" value="submit" name="Submit">
			</p>
		</div>
		<div class='footer'>
			<p>	</p>
		</div>
		<div class='content'>
			<p>
			<br>
			<h3></h3>
    		<div id='wrapper' class='wrapper'>
      			<h1>Class Lists</h1>
      			<?php
					$sql = " teacher FROM admin WHERE School is  ";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo "<br> Teachers: ". $row["teacher"]. "<br>";
					    }
					} else {
					    echo "0 results";
					}

				?>
			</div>
        	</p>
        </div>
    </body>
</html>