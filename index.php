<?php include_once 'assets/includes/_header.php'; ?>
	<div id="post_list" >
		<?php 
			
			$post_query = mysql_query("SELECT * FROM `blog_posts` ORDER BY id DESC")  or die(error_message("Cannot Connect fetch data from database."));  //this function make query to database, or print error

			$author = "Admin";
			while ($post = mysql_fetch_assoc($post_query)) {
					echo "<div class='post blue-well'>";
					echo "<h1><a href='show_blogpost.php?ID=".$post['id']."'>".$post['title']."</a></h1>";
					echo "<p>".substr(($post['post']), 0, 450)."<b>...</b></p>";
					echo "<p><a href='show_blogpost.php?ID=".$post['id']."'> Read More</a><br>";
					echo "<span class='footer'>Posted By: ".$author."  &#9618; Last Updated: ".$post['date_posted']."</span><br><br><br>"; //." Tags: ". $post->tags
					echo "</div>";
			}
			echo "</div";
			include_once 'assets/includes/_footer.php';
 		?>
 	</div>