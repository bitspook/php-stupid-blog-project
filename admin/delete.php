<?php include_once "../assets/includes/_header.php";
	
//This script handle delete operation. When user click delete button (delete button on navbar or delete comment button), it sends a post_id (for deleting post) or comment_id(for deleting comment)). This script check the id, and delete the item with that id.

	//This block is executed only when deleting a post
	if(isset($_GET['post_id'])) { //This condition check if a post_id is sent in $_GET variable
		$post_id = sanitize($_GET['post_id']);  //This set $post_id variable, with sanitized data (see sanitize() function in _header)

		$query = mysql_query("DELETE FROM `blog_posts` WHERE `id`='$post_id'") or die(error_message("Can't Delete Post. Query Failed",1));  //This line makes a delete query to database
		header("location:../index.php");  //this function redirects to the given location
	}

	//This block is executed only when a comment is deleted
	elseif (isset($_GET['comment_id'])) { //Condition to check if comment_id is sent in $_GET
		$comment_id = $_GET['comment_id']; //This set $post_id variable, with sanitized data (see sanitize() function in _header)

		$query = mysql_query("DELETE FROM `blog_comments` WHERE `comment_id`='$comment_id'") or die(error_message("Can't Delete Comment. Query Failed",1));
		header("location:".$_SERVER['HTTP_REFERER']); //this function redirects to the given location
	}
 ?>

 <?php include_once "../assets/includes/_footer.php"; ?>