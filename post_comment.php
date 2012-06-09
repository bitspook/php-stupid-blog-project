<?php include_once 'assets/includes/_header.php';

	$post_id = $_REQUEST['ID'];
	$commenter_name = $_REQUEST['commenter_name'];
	$_SESSION['commenter_name'] = $commenter_name;
	$comment = $_REQUEST['comment'];
	
	if (!empty($post_id) && !empty($commenter_name) && !empty($comment)) {
		$query = mysql_query("INSERT INTO blog_comments (name, comment, post_id) VALUES ('$commenter_name', '$comment', '$post_id')") or die(mysql_error());
	}
	else die("<div style='margin:10em;' class='container alert-error alert'>You have not entered complete data.<br><br> <a class='btn btn-danger' href=".$_SERVER['HTTP_REFERER'].">Back</a></div>");
	
	$cmnt_id = mysql_insert_id($connection);	

	header("location:show_blogpost.php?ID=".$post_id."#".$cmnt_id);

	include_once 'assets/includes/_footer.php';

 ?>