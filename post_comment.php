<?php include_once 'assets/includes/_header.php';

	//THIS FILE SEND COMMENTS TO DATABASE. IT GET INPUT FROM BLOG_COMMENTS.PHP FILE AND SEND THE ENTERED DATA TO DATABASE

	$post_id = sanitize($_REQUEST['ID']);
	$commenter_name = sanitize($_REQUEST['commenter_name']);
	$_SESSION['commenter_name'] = sanitize($commenter_name);
	$comment = sanitize($_REQUEST['comment']);
	
	if (!empty($post_id) && !empty($commenter_name) && !empty($comment)) {
		$query = mysql_query("INSERT INTO blog_comments (name, comment, post_id) VALUES ('$commenter_name', '$comment', '$post_id')") or die(mysql_error());
	}
	else die(error_message("You have not entered complete data.",1));
	
	$cmnt_id = mysql_insert_id($connection);	

	header("location:show_blogpost.php?ID=".$post_id."#".$cmnt_id);

	include_once 'assets/includes/_footer.php';

 ?>