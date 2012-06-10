<?php
	include_once '../assets/includes/_header.php';

//This file takes data from edit_blog_form.php file and update database with suitable queries, create a new post or update existing post.

	$post = sanitize($_POST['content']);  //these lines set variables with sanitized data to be sent to the database for editing or creating a post (see sanitize() in _header file)
	$title = sanitize($_POST['title']);
	$category = sanitize($_POST['category']);


	if (!empty($post) && !empty($title) && !empty($category)) { //condition to check if all the fields are filled with data. If not, an error message is displayed (see the else statement in end)
		//This block check whether to create new post or edit an existing post
			if (isset($_GET['edit'])) {		//this condition check if $_GET has an 'edit' attribute. If true, this will edit post with id = $_GET['edit'] (it is set in _navbar.php)
				$id = sanitize($_GET['edit']);	//set the id of post to edit
				$query = mysql_query("UPDATE `blog_posts` SET `title`='$title', `post`='$post',`category`='$category', `date_posted`=now() WHERE id='$id'") or die(error_message(mysql_error())); //mysql query to update post with id = $id, and other data sent from edit_blog_form.php file
			}
			elseif (isset($_GET['new'])) {	//condtion to check if $_GET has new attribute. This creates a new post.
				$query = mysql_query("INSERT INTO `blog_posts` (title, post, category,  date_posted) VALUES ('$title', '$post', '$category', now())") or die(mysql_error()); //This query create new post with data sent from edit_blog_form.php script.

				//Here $id is set to new value if new post is created. Function below returns the last auto-incremented value. If old post is edited, it don't
				
				$id = mysql_insert_id($connection); 	//this function gives last autoincremented value
			}
	}
	else die(error_message("You have not entered complete data.",1)); //If all the fields in form in edit_blog_form.php are not filled, this error message is displayed.


	
	
	header("location: ../show_blogpost.php?ID=$id");  //This function redirects to the given location

	include_once 'assets/includes/_footer.php';
 ?>