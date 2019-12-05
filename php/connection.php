<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	$servername = "localhost";
	$username = $_POST['UserName'];
	$password = $_POST['Password'];

	// Create connection object
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die('Connection failed: ' . $conn->connect_error);
	}
	echo "Connected successfully";
?>

<div>
	Welcome <?php echo $_POST['UserName']; ?><br>
	<!-- Your password is <?php echo $_POST['Password'] ?><br> -->
</div>

</body>
</html>
