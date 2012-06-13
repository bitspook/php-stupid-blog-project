<?php session_start(); ?>

<!-- THIS IS THE HEADER FILE. IT IS USED TO INCLUDE STYLESHEETS, AND JQUERY ETC TO ALL PAGES. IT IS USED AS A TEMPLATE. IT ALSO STARTS A SESSION, MAKE A DATABASE CONNECTION, AND DEFINE SOME FUNCTIONS USED ELSEWHERE IN PROJECT -->

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Stupid Blog</title>
	<?php
		//These ifs check if in admin dir, in that case it sets correct addresses to link
		if (strstr($_SERVER['SCRIPT_NAME'], 'admin')) {
			echo '<link rel="stylesheet" type="text/css" href="../assets/custom-style.css">';
			echo '<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.min.css">';
			echo '<script src="../assets/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>';
			echo '<script src="../assets/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>';
			// echo '<script src="../assets/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" async defer></script>';
			include_once '../assets/includes/_navbar.php';
		}
		else {
		 echo '<link rel="stylesheet" type="text/css" href="assets/custom-style.css">';
		 echo '<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">';
		 echo '<script src="assets/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>';
		 echo '<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>';
		 echo '<script src="assets/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" async defer></script>';
include_once 'assets/includes/_navbar.php';
		}
	?>
</head>
<body>
	<div class="container">

	<h1 class='page-header'>Stupid Blog</h1>	<!-- page header -->

	<div class="span8">
	<?php function error_message($message, $btn=0){//This function is used to show nice error messages with optional back button. 
		//It take in a message string and an optional variable. If optional variable if given a value anthing other then 0, a back button is displayed with error message.  
		//for example: error_message("I am error") show no button
		// error_message("I am error",1) show a back button at bottom
		echo('<div class="alert alert-block alert-error fade in">');
		echo '<button class="close" data-dismiss="alert" type="button">×</button>';
		echo '<h4 class="alert-heading">Oh snap! You got an error!</h4>';
		echo '<br><p>'.$message.'</p>';
		if ($btn) {
			echo '<p><a class="btn btn-danger" href="'.$_SERVER['HTTP_REFERER'].'">BACK</a>
				</p>';
			}
		echo '</div>';
	}

	function sanitize($data) {
		//This function sanitize data before sending to database. This prevent error and sql injection when some idiot add characters like /'%" etc in input

		// remove whitespaces (not a must though)
		$data = trim($data); 

		// apply stripslashes if magic_quotes_gpc is enabled
		if(get_magic_quotes_gpc()) {
			$data = stripslashes($data);
		}

		$data = mysql_real_escape_string($data);

		return $data;


	}

	//THIS BLOCK PREVENT REGULAR USERS FROM ACCESSING ADMIN PAGES (EDIT_POST, DELETE ETC)
	if (strstr($_SERVER['SCRIPT_NAME'], 'admin') && !strstr($_SERVER['SCRIPT_NAME'], 'login') && !isset($_SESSION['auth'])) {
		die(error_message("Shooo...You are not allowed to visit this page.<br>How did you get here anyway? (o_O)"));
	}

	//THIS BLOCK SETUP DATABASE CONNECTION

	$db_username = "root";
	$db_password = "";
	$db_name = "blog";
		
@	$connection = mysql_connect("localhost", $db_username, $db_password) or die(error_message("Cannot connect with server",0));
@	$db = mysql_select_db($db_name)  or die(error_message("Cannot connect with Database", 0));
	

	
	 ?>


	
