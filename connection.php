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
			header('Location: DatabaseLogon.php');
		}

		if (isset($_POST['Login'])) {
			if (isset($_POST['username']))
				$_SESSION['username'] = $_POST['username'];
			else
				die("invalid username input<br>");
			if (isset($_POST['password']))
				$_SESSION['password'] = $_POST['password'];
			else 
				die("invalid password input<br>");
		}

		if (isset($_POST['Signup'])) {
			if (isset($_POST['fullname']))
				$_SESSION['fullname'] = $_POST['fullname'];
			else
				die("invalid fullname input<br>"); 
			if (isset($_POST['username']))
				$_SESSION['username'] = $_POST['username'];
			else
				die("invalid username input<br>");
			if (isset($_POST['password']))
				$_SESSION['password'] = $_POST['password'];
			else
				die("invalid password input<br>");
			if (isset($_POST['confirm']))
				$_SESSION['confirm'] = $_POST['confirm'];
			else
				die("invalid confirmed password input<br>");
		}

		if (session_status() == PHP_SESSION_ACTIVE && !isset($_POST['Logout'])) {
			// echo "Connected successfully";
			if (isset($_POST['Login']) && !isset($_POST['Signup'])) {
				$query = "select st.staff_id, st.name, st.position, st.address_id from staff as st inner join userinfo as ui on st.staff_id=ui.staff_id where ui.username='" . $_SESSION['username'] . "' and ui.password='" . $_SESSION['password'] . "'";
				$result = run_query($query);
				if (mysqli_num_rows($result) == 0) {
					$_SESSION['Error'] = "No account information for credentials provided.";
					header("Location: DatabaseLogon.php");
				}
				$parsed_data = mysqli_fetch_assoc($result);
				$_SESSION['position'] = $parsed_data['position'];

				if ($_SESSION['position'] == "Teacher") {
			        header("Location: DataTeach.php");
			    }
			    else if	($_SESSION['position'] == "Principal" || $_SESSION['position'] == "Vice Principal") {
					header("Location: DataAdmin.php");
				}
				else {
					$_SESSION['Error'] = "You have invalid input in one or more fields.";
					if (isset($_SESSION['']))
					header("Location: DatabaseLogon.php");
				}	
			} else if (isset($_POST['Signup']) && !isset($_POST['Login'])) {
				// echo "<br>made it here!<br>	";
				$query = "select username from userinfo where username='" . $_SESSION['username'] . "'";
				$result = run_query($query);
				$error = 0;
				if (mysqli_num_rows($result) > 0) {
					$_SESSION['error_username'] = "The username provided is already in use.";
					$error = 1;
					// echo "this username is already in use<br>";
				}
				if (strcmp($_SESSION['password'], $_SESSION['confirm'])) {
					$_SESSION['error_password_nomatch'] = "The password does not match the confirmed password.";
					$error = 1;
					// echo "they are NOT equal, bad!<br>";
				}
				// if (isset($_SESSION['error_username']))
				// 	echo "error_username is set<br>";
				// if (isset($_SESSION['error_password_nomatch']))
				// 	echo "error_password_nomatch is set<br>";
				if ($error == 1) {
					header("location: DatabaseSignUp.php");
				} else {
					$subquery = "select staff_id from staff where name='" . $_SESSION['fullname'] . "'";
					$sub_result = run_query($subquery);
					if (mysqli_num_rows($sub_result) == 0) {
						$_SESSION['error_badname'] = "No staff member with such name found. Double-check Full Name field.";
						header("location: DatabaseSignUp.php");
					}
					$sub_arr = mysqli_fetch_assoc($sub_result);

					$insert_query = "insert into userinfo (staff_id, username, password) values ({$sub_arr['staff_id']}, '{$_SESSION['username']}', '{$_SESSION['password']}')";

					run_query($insert_query);
					header('location: DataTeach.php');
					// echo $sub_arr['staff_id'] . "<br>";
					// echo $_SESSION['username'] . "<br>";
					// echo $_SESSION['password'] . "<br>";
				}
			}
		}
	 ?>

</body>
</html>