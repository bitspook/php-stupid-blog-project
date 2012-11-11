<?php ob_start(); 
	include_once "../assets/includes/_header.php";

	$query = mysql_query("SELECT * FROM notifications") or die(error_message(mysql_error()));


	echo "<div class='well'>";

	if (mysql_num_rows($query) < 1) {
		echo "<h3>No more Notifications fella</h3>";
	}

	while ($row = mysql_fetch_assoc($query)) {
		echo $row['notification'].'<br>';

		echo "<a class='btn btn-danger pull-right' href='delete.php?action=delete&comment_id=".$row['comment_id']."' onclick='delete();'>Reject</a>";
		echo "<a class='btn btn-info pull-right' href='delete.php?action=approve&comment_id=".$row['comment_id']."' onclick='delete();'>Approve</a>";

		echo "<p class='comment well'>";
		echo $row['notification_msg'];
		echo "</p>";
	}
	
	echo "</div>";

 	include_once "../assets/includes/_footer.php"; 
	ob_end_flush();
 ?>