<?php include 'assets/includes/_header.php';
/* 	-----------------------------------------------------------------------------------------------------*/
			if(isset($_GET['ID']) && !empty($_GET['ID']) && is_numeric($_GET['ID'])){
				$post_id = $_GET['ID'];
			}
			elseif (isset($_GET['category']) && !empty($_GET['category'])){
				$category = $_GET['category'];
			}
			else header("location:index.php");
			
/* 	-----------------------------------------------------------------------------------------------------*/

/* 	-----------------------------------------------------------------------------------------------------*/
			if (isset($post_id)) {

				// this condition check if the post with given $post_id exist in database. If not, it redirects to home page
				if(!(array_key_exists('id', (mysql_fetch_assoc(mysql_query("SELECT id FROM `blog_posts` WHERE id= '$post_id'")))))) {
						header("location:index.php");
					}
			
				//query database to get post content with id = $post_id
				$post_query = mysql_query("SELECT * FROM `blog_posts` WHERE id= '$post_id'")  or die(error_message("Cannot Connect to database."));  //this function make query to database, or print error
				
			}
			elseif (isset($category)) {
				if(!(mysql_fetch_assoc(mysql_query("SELECT `category` FROM `blog_posts` WHERE `category`='$category'"))))
					{
						die(error_message("No Such Category found."));
						// header("location:index.php");
					}
							
				$post_query = mysql_query("SELECT * FROM `blog_posts` WHERE category= '$category'")  or die(error_message("No Such Category."));

				
			}

/* 	-----------------------------------------------------------------------------------------------------*/

			// this block show the post with $post_id 
			$row = mysql_fetch_assoc($post_query);
				echo "<h2 class='post_title'>".$row['title']."</h2>";
				echo "<p>".$row['post']."</p>";
				echo "<p> Last Updated: ".$row['date_posted']."</p>";
				echo "<p>Category: ".$row['category']."</p>";
			
			$post_id = $row['id']; //blog_comment.php need variable $post_id to be set to fetch comments from database
			include 'blog_comment.php';
	?>
	</div>	
</div>
<?php include_once 'assets/includes/_footer.php'; ?>