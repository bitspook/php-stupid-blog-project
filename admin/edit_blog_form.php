<?php	include_once "../assets/includes/_header.php";

//This file presents a form editing a post, or creating a new post. If editing a post, it fills the form with data of old post. If creating new post, it present a new empty form.

	//IF EDITING EXISTING POST THIS IF BLOCK IS EXECUTED
	if (isset($_GET['id'])) {  //This block checks if $_GET has 'id' attribute. if it do, following block is executed
		$id = $_GET['id'];
		echo "<h2>Edit Blog Entry</h2><br>"; //if editing existing post, this is the header

		$query = mysql_query("SELECT * FROM blog_posts WHERE id='$id'"); //query to fetch data from database.
		$row = mysql_fetch_assoc($query);

		//below form fills the different fields in form with data fetched from database. Since we are editing an old post, it is needed to fill in previous data.
	
?>
		<form method="post" action="edit_blog.php?edit=<?php echo $id ?>">
		<table cellpadding=10>
			<tr>
				<td>
					<lable>Title</lable>
				</td> 
				<td>
					<input id="title_in" type="text" name="title" placeholder="New post title"
					value="<?php echo $row['title']; ?>">
				</td>
			</tr>
			<tr>
				<td><lable>Description</lable> </td> <td><input id='title_in' type="text" name="category" value="<?php echo $row['category']; ?>"></td>
			</tr>
			<tr>
				<td><lable>Body</lable></td> 
				<td>
					<textarea id="post_in" name="content"><?php echo $row['post']; ?></textarea>
				</td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" name="submit" value="Update"></td>
			</tr>
		</table>
	</form>

<?php
	}

	//Following block is executed if creating a new post
	else {
		echo "<h2>New Blog Entry</h2><br>";	//if creating new post, this is the header

?>



	<form method="post" action="edit_blog.php">
		<table cellpadding=10>
			<tr>
				<td>
					<lable>Title</lable>
				</td> 
				<td>
					<input id="title_in" type="text" name="title" placeholder="New post title">
				</td>
			</tr>
			<tr>
				<td><lable>Description</lable> </td> <td><input id="title_in" type="text" name="category"></td>
			</tr>
			<tr>
				<td><lable>Body</lable></td> 
				<td>
					<textarea id="post_in" name="content"></textarea>
				</td>
			</tr>
			<tr>
				<td><input class="btn btn-primary" type="submit" name="submit" value="Publish"></td>
			</tr>
		</table>
	</form>

<?php } include_once "../assets/includes/_footer.php"; ?>
