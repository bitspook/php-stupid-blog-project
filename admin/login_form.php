<?php include_once '../assets/includes/_header.php'; 

// This file presents login form, and send entered data to login.php file

	if (isset($_GET['atmpt'])) { //if atmpt variable is set, it means user is redirected from login.php and an error message has to be displayed. This block decide which error to show.
		if ($_GET['atmpt'] == 0) {
			//if atmpt is 0, that means either username or password was not filled (see login.php)
			error_message("Please enter both username and password.");
		}
		else {
			//otherwise, username and password combination was wrong, so this error is shown
			error_message("Wrong username and password combination.");	
		}
	}

	//Here is the login form
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