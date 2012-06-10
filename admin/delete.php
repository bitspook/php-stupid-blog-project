<?php include_once "../assets/includes/_header.php";
	
	if(isset($_GET['post_id'])) {
		$post_id = $_GET['post_id'];

		$query = mysql_query("DELETE FROM `blog_posts` WHERE `id`='$post_id'") or die(error_message("Can't Delete Post. Query Failed",1));
		header("location:../index.php");
	}
	elseif (isset($_GET['comment_id'])) {
		$comment_id = $_GET['comment_id'];

		$query = mysql_query("DELETE FROM `blog_comments` WHERE `comment_id`='$comment_id'") or die(error_message("Can't Delete Comment. Query Failed",1));
		header("location:".$_SERVER['HTTP_REFERER']);
	}
 ?>

 <?php include_once "../assets/includes/_footer.php"; ?>