<?php
 // session_start();

//Now we'll display comments and add a form to enter new comments
			echo "<h2>Comments</h2>";
			echo "<div class='well'>";
			//this line make a query to get comments from the database
			$comment_query = mysql_query("SELECT * FROM `blog_comments` WHERE post_id= '$post_id'") or die(mysql_error());

			
			//this loop extracts all the comments from the database and print them on page
			while($row = mysql_fetch_assoc($comment_query)){
				echo "<a name='".$row['comment_id']."'></a>";
				echo "<h3>".$row['name']." said </h3>";
				if (isset($_SESSION['auth'])) {
					echo "<a class='btn btn-danger pull-right' href='admin/delete.php?comment_id=";
					echo $row['comment_id']."'>Delete</a>";
				}
				echo "<p class='comment'>".$row['comment']."</p>";
				//echo "<p> on ".$row['comment_time']."</p>";
			}
			//form to post comments
			
		echo "<h2>Post a comment</h2>";
		echo "<div class='well'>";
		echo "<form action='post_comment.php?ID=".$post_id."' method='post' class='form-vertical'>";
		?>		<table>
					<tr><td><label for="commenter_name">Your Name:</label></td>
						<td><input type=text id="cmnt_name_in" name="commenter_name" value=
							"<?php if (isset($_SESSION['commenter_name'])) {
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

