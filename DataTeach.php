<!doctype html>
<html>
	<head>
		<script src='jquery.js'></script>
		<title> SRDB-Teacher </title>
		<style></style>
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
				<p>Actions: <br><p>
	          
				<select name='add options'>
					<option value=''>Choose option</option>
					<option value='Add referral'>Add referral</option>
					<option value='Add disipl'>Add Dislinary Note</option>
					<option value='Add Accomadation'>Add Accomadation</option>
				</select>
				<input type="submit" value="submit" name="Submit">
	        </p>
	        <p>
				<div>
					<input type="submit" value="End The Year" name="EndofYear">
				</div>
			</p>
		</div>
		<div class='right'>
			<p>
		
			</p>
		</div>
		<div class='footer'>
			<p>
			
			</p>
		</div>
		<div class='content'>
		<p>
			<div id='wrapper' class='wrapper'>
      			<h1>Class Enrollment</h1>
      			<form name='myForm' action='' id='myForm'>
        
      			</form>
      		</div>
		</p>
		<?php
			$query = "call retrieveStudentInfo()";
			
			function run_query($q) {
				$c = get_connection();
				return mysqli_query($c, $q);
			}
			
			$result = run_query($query);
			/* $sql = "SELECT st.student_id AS 'Student ID', st.student_name AS 'Student Name', st.date_of_birth AS 'DOB', st.parent AS 'Parent/Guardian', ce.grade AS 'Grade', sf.name AS 'Teacher' FROM student AS st INNER JOIN classenroll AS ce ON st.student_id=ce.student_id INNER JOIN class AS cl ON ce.class_id=cl.class_id INNER JOIN staff AS sf ON cl.teacher_id=sf.staff_id WHERE sf.name='Melisandra Labbati';

			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			        echo "id: ". $row["student_id"] . " - Name: " . $row["student_name"] . "DOB" . $row["date_of_birth"] . "Parent" . $row["parent"] . "<br>";
			    }
			} else {
			    echo "0 results";
			} */

		?>
  </body>
</html>