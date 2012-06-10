<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<?php
		if (strstr($_SERVER['SCRIPT_NAME'], 'admin')) {
			echo '<link rel="stylesheet" type="text/css" href="../assets/custom-style.css">';
			echo '<link rel="stylesheet" type="text/css" href="../assets/bootstrap/css/bootstrap.css">';
			echo '<script src="../assets/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>';
			echo '<script src="../assets/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>';
			include_once '../assets/includes/_navbar.php';
		}
		else {
		 echo '<link rel="stylesheet" type="text/css" href="assets/custom-style.css">';
		 echo '<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">';
		 echo '<script src="assets/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>';
		 echo '<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>';
		 include_once 'assets/includes/_navbar.php';
		}
	?>
</head>
<body>
	<div class="container">
	<h1 class='page-header'>Stupid Blog</h1>
	<div class="span8">
	<?php 

	function error_message($message, $btn=0){
		echo('<div class="alert alert-block alert-error fade in">');
		echo '<button class="close" data-dismiss="alert" type="button">×</button>';
		echo '<h4 class="alert-heading">Oh snap! You got an error!</h4>';
		echo '<br><p>'.$message.'</p>';
		if ($btn) {
			echo '<p><a class="btn btn-danger" href="'.$_SERVER['HTTP_REFERER'].'">Take this action</a>
				</p>';
				// <a class="btn" href="#">Or do this</a>
			}
		echo '</div>';
	}

	//THIS BLOCK PREVENT REGULAR USERS FROM ACCESSING ADMIN PAGES (EDIT_POST, DELETE ETC)
	if (strstr($_SERVER['SCRIPT_NAME'], 'admin') && !strstr($_SERVER['SCRIPT_NAME'], 'login') && !isset($_SESSION['auth'])) {
		die(error_message("Shooo...You are not allowed to visit this page.<br>How did you get here anyway? (o_O)"));
	}

	//THIS BLOCK SETUP DATABASE CONNECTION

	$db_username = "root";
	$db_password = "root";
	$db_name = "blog";
		
@	$connection = mysql_connect("localhost", $db_username, $db_password) or die(error_message("Cannot connect with server",0));
@	$db = mysql_select_db($db_name)  or die(error_message("Cannot connect with Database", 0));
	

	
	 ?>


	