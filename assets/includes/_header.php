<?php session_start(); ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	
	<title></title>
</head>
<body>
	<?php
		if (strstr($_SERVER['SCRIPT_NAME'], 'admin')) {
			echo '<link rel="stylesheet" type="text/css" href="../assets/custom-style.css">';
			echo '<link rel="stylesheet" type="text/css" href="../assets/bootstrap.css">';
			include_once '../assets/includes/_navbar.php';
		}
		else {
		 echo '<link rel="stylesheet" type="text/css" href="assets/custom-style.css">';
		 echo '<link rel="stylesheet" type="text/css" href="assets/bootstrap.css">';
		 include_once 'assets/includes/_navbar.php';
		}
	?>
	<div class="container">
	<h1 class='page-header'>Stupid Blog</h1>
	<div class="span8">
	<?php 

	function error_message($message, $btn=0){
		echo "<div style='margin:6em 0 0 14em; width:400px;' class='container alert-error alert'>";
		echo $message;
		if ($btn) {
			echo "<br><br> <a class='btn btn-danger' href=".$_SERVER['HTTP_REFERER'].">Back</a>";
		}
		echo "</div>";

	}

	$db_username = "root";
	$db_password = "root";
	$db_name = "blog";
		
@	$connection = mysql_connect("localhost", $db_username, $db_password) or die(error_message("Cannot connect with server",0));
@	$db = mysql_select_db($db_name)  or die(error_message("Cannot connect with Database", 0));
	
	 ?>


	