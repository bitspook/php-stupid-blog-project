<?php 	include_once '../assets/includes/_header.php'; ?>
<?php
	$un = "admin";
	$pw = "password";

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (!empty($username) && !empty($password)) {
			if ($username == $un && $password == $pw) {
			$_SESSION['auth'] = 1;
			$_SESSION['name'] = "Admin";
			header("location:../index.php");
			}
			else {
				header("location:login_form.php?atmpt=1");
			}
		}
		else 	header("location:login_form.php?atmpt=0");
	}
	elseif (isset($_REQUEST['logout'])) {
		$_SESSION = array(); //unset all session variables
		session_destroy();
		header("location:../index.php");
	}



	include_once '../assets/includes/_footer.php';
 ?>