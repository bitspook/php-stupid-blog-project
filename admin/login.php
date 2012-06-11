<?php 	include_once '../assets/includes/_header.php'; 

//This is script logs the admin in or out. Since we are having only one user, username and password are saved in this file only, not in database.


	$un = "admin";
	$pw = "password";

	//If loging in, this block is executed. 
	if (isset($_POST['login'])) {
		$username = sanitize($_POST['username']);	
		$password = sanitize($_POST['password']);

		if (!empty($username) && !empty($password)) {	//condition to check whether both username and password field are filled in login_form.php file
			if ($username == $un && $password == $pw) {		//condition to check if entered username and password are correct.
			$_SESSION['auth'] = 1;		//if username and password are correct, a session variable is set to identify admin.This is used in other files to show admin specific components like edit, new post and delete buttons on navbar etc.
			$_SESSION['name'] = "Admin";	//this session variable is of no use, it is not used anywhere
			header("location:../index.php");//redirects to home page after logging in successfully
			}
			else {
				header("location:login_form.php?atmpt=1"); //if usename and password are incorrect, it set atmpt variable in $_GET to 1 and redirect to login_form page
			}
		}
		else 	header("location:login_form.php?atmpt=0");	//if both usename and password are not filled, it set atmpt variable in $_GET to 0 and redirect to login_form page
	}
	//if loging out, this block is executed.
	elseif (isset($_REQUEST['logout'])) {
		$_SESSION = array(); //unset all session variables. This logs out the admin.
		session_destroy();	//session is destroyed
		header("location:../index.php");//redirects to home page
	}
	include_once '../assets/includes/_footer.php';
 ?>