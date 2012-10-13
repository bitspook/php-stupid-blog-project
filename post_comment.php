<?php
	ob_start();  //a workaround to make redirects work. It starts output buffering, sending all data including location header in same chunk, so no headers-already-sent error
	include_once 'assets/includes/_header.php';

	//THIS FILE SEND COMMENTS TO DATABASE. IT GET INPUT FROM BLOG_COMMENTS.PHP FILE AND SEND THE ENTERED DATA TO DATABASE

	$post_id = sanitize($_REQUEST['ID']);		//set variables with sanitized data
	$commenter_name = sanitize($_REQUEST['commenter_name']);
	$_SESSION['commenter_name'] = sanitize($commenter_name);
	$comment = sanitize($_REQUEST['comment']);
	
	if (!empty($post_id) && !empty($commenter_name) && !empty($comment)) { //condition check if all the fields in comment form are filled, if they are not, it displays a message
		$query = mysql_query("INSERT INTO blog_comments (name, comment, post_id) VALUES ('$commenter_name', '$comment', '$post_id')") or die(mysql_error()); //query to put comment data in blog_comments field in database
	}
	else die(error_message("You have not entered complete data.",1));
	
	$cmnt_id = mysql_insert_id($connection);	//set comment_id to last inserted comment_id in database

	header("location:show_blogpost.php?ID=".$post_id."#".$cmnt_id); 

	ob_end_flush();
	?>