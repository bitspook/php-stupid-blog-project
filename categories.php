<?php include_once 'assets/includes/_header.php'; 

	$query = mysql_query("SELECT category FROM blog_posts");

	while($category = mysql_fetch_assoc($query)){
		echo "<a href=\"show_blogpost.php?category=".$category['category']."\">".$category['category']."</a><br>";
	}


	include_once 'assets/includes/_footer.php';
 ?>	
