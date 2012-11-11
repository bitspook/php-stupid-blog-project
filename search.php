<?php 
	ob_start();  //a workaround to make redirects work. It starts output buffering, sending all data including location header in same chunk, so no headers-already-sent error
	include_once 'assets/includes/_header.php';
	if (isset($_REQUEST['search']) and trim($_REQUEST['search'] != '')) {
		$search =  sanitize($_REQUEST['search']);
		
		$query = mysql_query("SELECT id, title, category 
					FROM  `blog_posts` 
					WHERE  `title` LIKE  '%$search%'") 
					or die(error_message(mysql_error(),1));
		
		$num_rows = mysql_num_rows($query);
		if( $num_rows == 0) {
			echo "<h2>No Results found</h2>";
		}

		while($row = mysql_fetch_assoc($query)){
			echo "<h4><a href=\"show_blogpost.php?ID=".$row['id']."\">".$row['title']."</a></h4>";
			echo "<p class='muted'>".$row['category']."</p>";
		}
	}
	else{
		header("Location: index.php");
	}
	include_once 'assets/includes/_footer.php';
	ob_end_flush();
 ?>