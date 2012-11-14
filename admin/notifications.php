<?php ob_start(); 
	include_once "../assets/includes/_header.php";

	$query = mysql_query("SELECT * FROM blog_comments WHERE approved=0") or die(error_message(mysql_error()));


	echo "<div class='well'>";

	if (mysql_num_rows($query) < 1) {
		echo "<h3>No more Notifications fella</h3>";
	}


	while ($row = mysql_fetch_assoc($query)) {

		$post_id = $row["post_id"];
		$post_title = mysql_fetch_row(mysql_query("SELECT title FROM `blog_posts` WHERE id='$post_id' ") )[0];

		$notification = '<b>'.$row['name'].'</b> commented on '.'<a href="/show_blogpost.php?ID='.$post_id.'#comments">'.$post_title.'</a>';
		echo $notification.'<br>';

		echo "<a class='btn btn-danger pull-right' href='delete.php?action=delete&comment_id=".$row['comment_id']."' onclick='delete();'>Reject</a>";
		echo "<a class='btn btn-info pull-right' href='delete.php?action=approve&comment_id=".$row['comment_id']."' onclick='delete();'>Approve</a>";

		echo "<p class='comment well'>";
		echo $row['comment'];
		echo "</p>";
	}
	
	echo "</div>";

 	include_once "../assets/includes/_footer.php"; 
	ob_end_flush();
 ?>