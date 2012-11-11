<?php ob_start(); 
include_once "../assets/includes/_header.php";
	
//This script handle delete operation. When user click delete button (delete button on navbar or delete comment button), it sends a post_id (for deleting post) or comment_id(for deleting comment)). This script check the id, and delete the item with that id.

	//This block is executed only when deleting a post
	if(isset($_GET['post_id'])) { //This condition check if a post_id is sent in $_GET variable
		$post_id = sanitize($_GET['post_id']);  //This set $post_id variable, with sanitized data (see sanitize() function in _header)

		$delete_post = mysql_query("DELETE FROM `blog_posts` WHERE `id`='$post_id'") or die(error_message("Can't Delete Post. Query Failed",1));
		$delete_comments = mysql_query("DELETE FROM blog_comments WHERE post_id='$post_id'") or die(error_message(mysql_error()));
		$delete_notifications = mysql_query("DELETE FROM notifications WHERE post_id='$post_id'") or die(error_message(mysql_error()));

		header("location:../index.php");  //this function redirects to the given location
	}

	//This block is executed only when a comment is deleted
	elseif (isset($_GET['comment_id']) && $_GET['action'] == 'delete' ) { //Condition to check if comment_id is sent in $_GET
		$comment_id = $_GET['comment_id']; //This set $post_id variable, with sanitized data (see sanitize() function in _header)

		$query = mysql_query("DELETE FROM `blog_comments` WHERE `comment_id`='$comment_id'") or die(error_message("Can't Delete Comment. Query Failed",1));

		//clear notifications too
		if (mysql_numrows(mysql_query("SELECT comment_id FROM notifications WHERE comment_id='$comment_id'"))) {
			$query = mysql_query("DELETE FROM notifications WHERE comment_id='$comment_id'");
		}
		header("location:".$_SERVER['HTTP_REFERER']."#comments"); //this function redirects to the given location
	}
	//This block is executed only when a comment is to be approved
	elseif (isset($_GET['comment_id']) && $_GET['action'] == 'approve') { //Condition to check if comment_id is sent in $_GET
		$comment_id = sanitize($_GET['comment_id']); //This set $post_id variable, with sanitized data (see sanitize() function in _header)

		$query = mysql_query("UPDATE `blog_comments`  SET `approved`=1 WHERE `comment_id`='$comment_id'") or die(error_message("Can't Approve Comment. Query Failed<br>".mysql_error(),1));

		//clear notifications too
		if (mysql_numrows(mysql_query("SELECT comment_id FROM notifications WHERE comment_id='$comment_id'"))) {
			$query = mysql_query("DELETE FROM notifications WHERE comment_id='$comment_id'");
		}

		header("location:".$_SERVER['HTTP_REFERER']."#".$comment_id); //this function redirects to the given location
	}
 ?>

 <?php include_once "../assets/includes/_footer.php"; 
 	ob_end_flush();
 ?>
