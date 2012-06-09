<?php
	include_once '../assets/includes/_header.php';

	//creating small names for variables
	$post = $_POST['content'];
	$title = $_POST['title'];
	$category = $_POST['category'];

	if (!empty($post) && !empty($title) && !empty($category)) {
			if (isset($_GET['edit'])) {
				$id = $_GET['edit'];
				$query = mysql_query("UPDATE `blog_posts` SET `title`='$title', `post`='$post',`category`='$category', `date_posted`=now() WHERE id='$id'") or die(error_message(mysql_error()));
			}
			else {
				$query = mysql_query("INSERT INTO `blog_posts` (title, post, category,  date_posted) VALUES ('$title', '$post', '$category', now())") or die(mysql_error());
			}
	}
	else die(error_message("You have not entered complete data."));



	$id = mysql_insert_id($connection); 	//this function gives last autoincremented value
	header("location: ../show_blogpost.php?ID=$id");  //This function redirects to the given location

	include_once 'assets/includes/_footer.php';
 ?>