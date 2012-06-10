<?php include_once '../assets/includes/_header.php'; ?>
<?php
	if (isset($_GET['atmpt'])) {
		if ($_GET['atmpt'] == 0) {
			error_message("Please enter both username and password.");
		}
		else {
			error_message("Wrong username and password combination.");	
		}
	}
?>
<div class="well container span6" style="float:center;">
	<form action="login.php" method="post">
		<table cellpadding=10>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="username" placeholder="Enter Username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" placeholder="Enter Password"></td>
			</tr>
			<tr>
				<td><input type="submit" name="login" value="Log In" class="btn btn-primary"></td>
			</tr>

		</table>
	</form>
</div>

<?php
	include_once '../assets/includes/_footer.php';
 ?>