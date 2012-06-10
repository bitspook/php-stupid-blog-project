<?php include 'assets/includes/_header.php';

//THIS PAGE SHOW A SINGLE BLOGPOST BY ID
/* 	-----------------------------------------------------------------------------------------------------*/		//this block check if the data sent in $_GET variable is correct and proper. It is important to check $_GET data, since it can be easily changed by changing data in URL that appear after '?'
			if(isset($_GET['ID']) && !empty($_GET['ID']) && is_numeric($_GET['ID'])){
				$post_id = sanitize($_GET['ID']);
			}
			else header("location:index.php");
			
/* 	-----------------------------------------------------------------------------------------------------*/

			if (isset($post_id)) {

				// this condition check if the post with given $post_id exist in database. If not, it shows an error message
				if(!(array_key_exists('id', (mysql_fetch_assoc(mysql_query("SELECT id FROM `blog_posts` WHERE id= '$post_id'")))))) {
						die(error_message("Post with post id $post_id doesn't exist",1));
					}
			
				//query database to get post content with id = $post_id
				$post_query = mysql_query("SELECT * FROM `blog_posts` WHERE id= '$post_id'")  or die(error_message("Cannot Connect to database."));  //this function make query to database, or print error
				
			}
			else { die(error_message("Unable to get post from database.",1)); }
				

/* 	-----------------------------------------------------------------------------------------------------*/

			// this block show the post with $post_id 
			$row = mysql_fetch_assoc($post_query);
				echo "<h2 class='post_title'>".$row['title']."</h2>";
				echo "<p class='muted'>".$row['category']."</p>";
				echo "<p align='justify'><pre>".stripslashes($row['post'])."</pre></p>";
				echo "<p> Last Updated: ".$row['date_posted']."</p>";
				
			
			$post_id = $row['id']; //blog_comment.php need variable $post_id to be set to fetch comments from database
			include 'blog_comment.php';
	?>
	</div>	

<?php include_once 'assets/includes/_footer.php'; ?>