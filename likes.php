<?php // include_once 'assets/includes/_header.php'; ?>

<?php 
	
	$db_username = "root";
	$db_password = "root";
	$db_name = "blog";
		
@	$connection = mysql_connect("localhost", $db_username, $db_password) or die(error_message("Cannot connect with server",0));
@	$db = mysql_select_db($db_name)  or die(error_message("Cannot connect with Database", 0));

	$action = $_GET['action'];
	$post_id = intval($_GET['post']);

	$likes = mysql_fetch_row(mysql_query("SELECT likes FROM blog_posts WHERE id = '$post_id'"))[0];

	
	if ( $action == 'increase') {
		$likes++;
	} 
	else if ($action == 'decrease') {
		$likes = $likes - 1;
	}

	$exec_query = mysql_query("UPDATE blog_posts SET likes='$likes' WHERE id='$post_id'");

	echo $likes;
 ?>