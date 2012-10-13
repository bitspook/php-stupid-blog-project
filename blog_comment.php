<?php
 //This file is included in show_post.php file in the end of file. It show the comments for the post, and also present a form for users to make comments. It can't be used by itself as it uses variables declared in show_post.php file.

//Now we'll display comments and add a form to enter new comments
			echo "<h2>Comments</h2>";
			echo "<div class='well'>";
			//this line make a query to get comments from the database
			$comment_query = mysql_query("SELECT * FROM `blog_comments` WHERE post_id= '$post_id'") or die(mysql_error()); //it fetches comments for present post from database

			
			//this loop extracts all the comments from the database and print them on page
			while($row = mysql_fetch_assoc($comment_query)){
				echo "<a name='".$row['comment_id']."'></a>";
				echo "<h3>".$row['name']." said </h3>";

				//if the admin is browsing the page, this block show a delete button with comments to, well, delete the comments
				if (isset($_SESSION['auth'])) {
					echo "<a class='btn btn-danger pull-right' href='admin/delete.php?comment_id=";
					echo $row['comment_id']."' onclick='delete();'>Delete</a>";
				}
				echo "<p class='comment well'>".nl2br($row['comment'])."</p>";
				//echo "<p> on ".$row['comment_time']."</p>";
			}
			
			//form to post comments
		echo "<h2>Post a comment</h2>";
		echo "<div class='well'>";
		echo "<form action='post_comment.php?ID=".$post_id."' method='post' class='form-vertical'>";
		?>		<table>
					<tr><td><label for="commenter_name">Your Name:</label></td>
						<td><input type=text id="cmnt_name_in" name="commenter_name" value=
							"<?php
							//This if block check if user made a comment earlier. If she did, her name is filled in name field automatically
							 if (isset($_SESSION['commenter_name'])) {
							echo $_SESSION['commenter_name'];
							}?>"></td>
					</tr>
					<tr>
						<td>Comment</td>
						<td><textarea id="cmnt_in" name="comment"></textarea></td>
					</tr>
					<tr><td><input class='btn btn-primary' type="submit" value="Comment"></td></tr>
				</table>
			</form>
			</div>
		</div>

