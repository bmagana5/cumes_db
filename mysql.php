<!DOCTYPE html>
<html>
<head></head>
<title></title>
<body>
	<?php
		session_start();
		function get_connection() {
			static $connection;
			$servername = "localhost";
			$database = "schoolrecords";
			
			if (!isset($connection)) {
				$connection = mysqli_connect($servername, $_SESSION['username'],
								$_SESSION['password'], $database) or die(mysqli_connect_error());
			}
			if ($connection === false){
				echo "unable to connect to MySQL database<br>";
				echo mysqli_connect_error();
			}
			return $connection;
		}

		function run_query($q) {
			$c = get_connection();
			return mysqli_query($c, $q);
		}
	?>
</body>
</html>