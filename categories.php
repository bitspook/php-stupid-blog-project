<?php include_once 'assets/includes/_header.php'; 

//This script shows the index. It provide links to posts titles with their descriptions.

	$query = mysql_query("SELECT id,title,category FROM blog_posts ORDER BY id DESC");

	//This presents one link per line with description and set $category $_GET variable to be sent to show_blogpost.php file. 
	while($row = mysql_fetch_assoc($query)){
		echo "<a href=\"show_blogpost.php?ID=".$row['id']."\">".$row['title']."</a><br>";
		echo "<p class='muted'>".$row['category']."</p>";
	}


	include_once 'assets/includes/_footer.php';
 ?>	
