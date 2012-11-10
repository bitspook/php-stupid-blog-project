<?php 
	ob_start();  //a workaround to make redirects work. It starts output buffering, sending all data including location header in same chunk, so no headers-already-sent error
	include_once 'assets/includes/_header.php';


	//function to send notifications when new comment is added
	function send_notification($commenter_name, $comment_id, $post_id){
		$post_title = mysql_fetch_row(mysql_query("SELECT title FROM blog_posts WHERE id='$post_id'"))[0];
		$comment = mysql_fetch_row(mysql_query("SELECT comment FROM blog_comments WHERE comment_id='$comment_id'"))[0];

		$notification = '<b>'.$commenter_name.'</b> commented on '.'<a href="/show_blogpost.php?ID='.$post_id.'#comments">'.$post_title.'</a>';
		$notification_msg = $comment;

		$notification_query = mysql_query("INSERT INTO `notifications` (`notification`, `notification_msg`, `post_id`, `comment_id`) VALUES ('$notification', '$notification_msg', '$post_id', '$comment_id')");
	}
	

	//THIS FILE SEND COMMENTS TO DATABASE. IT GET INPUT FROM BLOG_COMMENTS.PHP FILE AND SEND THE ENTERED DATA TO DATABASE

	$post_id = sanitize($_REQUEST['ID']);		//set variables with sanitized data


	$commenter_name = sanitize(strip_tags($_REQUEST['commenter_name']));
	$_SESSION['commenter_name'] = sanitize($commenter_name);

	//if admin is logged in, commenter name is admin
	if (isset($_SESSION['auth'])) {
			$commenter_name = "Admin";
	}

	$comment = sanitize($_REQUEST['comment']);
	
	if (!empty($post_id) && !empty($commenter_name) && !empty($comment)) { //condition check if all the fields in comment form are filled, if they are not, it displays a message

		//if admin makes a comment
		if (isset($_SESSION['auth'])) {
			$commenter_name = sanitize("<font color='green'>Admin</font>");
			$query = mysql_query("INSERT INTO blog_comments (name, comment, post_id,approved) VALUES ('$commenter_name', '$comment', '$post_id',1)") or die(error_message(mysql_error())); //query to put comment data in blog_comments field in database
			$cmnt_id = mysql_insert_id($connection);	//set comment_id to last inserted comment_id in database
			header("location:show_blogpost.php?moderate_msg=false&ID=".$post_id."#".$cmnt_id); 
			ob_end_flush();
		}
		else {
			$query = mysql_query("INSERT INTO blog_comments (name, comment, post_id) VALUES ('$commenter_name', '$comment', '$post_id')") or die(error_message(mysql_error())); //query to put comment data in blog_comments field in database

			$comment_id = mysql_insert_id($connection);	//set comment_id to last inserted comment_id in database

			send_notification($commenter_name, $comment_id, $post_id);


		}
	}
	else die(error_message("You have not entered complete data.",1));
	

	header("location:show_blogpost.php?moderate_msg=true&ID=".$post_id."#alert"); 

	ob_end_flush();
?>