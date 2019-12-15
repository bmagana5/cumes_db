<!DOCTYPE html>
<html>
<head>
	<title>Connect</title>
</head>
<body>

<?php 
	include "mysql.php";
	// create a session if none exists
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
		header('Location: DatabaseLogon.html');
	}

	if (isset($_POST['Login'])) {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $_POST['password'];
	}

	if (session_status() == PHP_SESSION_ACTIVE) {
		echo "Connected successfully";
		if ($_SESSION['username'] == "brian") {
	        header("Location: DataTeach.php");
	    }
	    else if	($_SESSION['username'] == "admin") {
			header("Location: DataAdmin.php");
		}
		else {
			header("Location: DatabaseLogon.html");
		}
	}
 ?>

</body>
</html>