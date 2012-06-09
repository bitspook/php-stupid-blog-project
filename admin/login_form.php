<?php include_once '../assets/includes/_header.php'; ?>
<?php
	if (isset($_GET['atmpt'])) {
		if ($_GET['atmpt'] == 0) {
			echo "<div style='margin:3em 5em 2em 7em;' class='container span5 alert-error alert'>Please enter username and password.</div>";
		}
		else {
			echo "<div style='margin:3em 5em 2em 7em;' class='container span5 alert-error alert'>Wrong username and password combination.</div>";	
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