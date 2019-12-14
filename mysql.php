<!DOCTYPE html>
<html>
<head></head>
<title></title>
<body>
	<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	if (isset($_POST['Logout'])) {
		$c = get_connection();
		if ($c) {
			$c->close();
		}
		session_unset();
		session_destroy();
		unset($_POST['Logout']);
		header('Location: mysql.php?a=logout');
	}

	if (isset($_POST['Login'])) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
	}


	function get_connection() {
		static $connection;
		$servername = "localhost";
		$database = "schoolrecords";
		if (!isset($connection)) {
			$connection = mysqli_connect($servername, $_SESSION['username'],
							$_SESSION['password'], $database);
		}
		if ($connection === false){
			echo "unable to connect to MySQL database<br>";
			echo mysqli_connect_error();
		}
	}

	function run_query($q) {
		$c = get_connection();
		return mysqli_query($c, $q);
	}



	// Create connection
	//$conn = new mysqli($servername, $username, $password, $database);

	// Check connection

	echo "Connected successfully";
	// Change page
	if (isset($_SESSION['username'])) {
	    echo "we made it this far<br>";
		if ($_SESSION['username'] == "brian") {
	        header("Location: DataTeach.php");
	    }
	    else if	($_SESSION['username'] == "admin") {
			header("Location: DataAdmin.php");
		}
	}
	?>
</body>
</html>