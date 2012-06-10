<?php	$in_admin_dir = strstr($_SERVER['SCRIPT_NAME'], 'admin');?>
	 
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container" style="width: 70%; align:center;">
						<!-- ifs in this block give right link address to nav links depending on where they are -->
						<a class="brand" 
						<?php if($in_admin_dir){
								echo "href = '../index.php'";
							} else echo 'href="index.php"' ?>
						>Stupid Blog</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li ><a  
						<?php if($in_admin_dir){
								echo "href = '../index.php'";
							} else echo 'href="index.php"'; ?>
						>Home</a></li>
								<li ><a   
						<?php if($in_admin_dir){
								echo "href='../categories.php'";
							} else echo 'href="categories.php"'; ?>
						>Categories</a></li>
								
							</ul>
							
							<ul class="nav pull-right">
								<!-- if admin has logged in put new buttons in navbar-->
								<?php										
									if (isset($_SESSION['auth']) && $_SESSION['auth']==1){ 
										
										//Show New Post button
										echo '<li><a id="new-post-btn"';
										if($in_admin_dir) echo 'href="edit_blog_form.php?new=1"';
										else echo 'href="admin/edit_blog_form.php?new=1"';
										echo '>New Post</a></li>';

										//show edit post button
										//active post is editable
										if (isset($_GET['ID'])) {
											echo '<li><a id="edit-post-btn" href="admin/edit_blog_form.php?id='.$_GET['ID'].'">Edit Post</a></li>';
											echo '<li><a id="delete-post-btn" href="admin/delete.php?post_id='.$_GET['ID'].'">Delete</a></li>';
										}
										//inactive if no editable post
										else {
											echo '<li><a id="edit-post-btn-disabled">Edit Post</a></li>';	
											echo '<li><a id="delete-post-btn-disabled">Delete</a></li>';	
										}
								?>
										
										<li class="divider-vertical"></li>
										<li><a href=
											<?php 
												if($in_admin_dir) echo "login.php?logout=1";
												else echo "admin/login.php?logout=1";
											?>
											>Log Out</a></li>
								<?php } else { 
											echo "<li><a ";
											if($in_admin_dir) echo "href='login_form.php'";
											else echo "href='admin/login_form.php'";
											echo ">Log In</a></li>";
								 } ?>

										 
							</ul>
						</div><!-- /.nav-collapse -->
					</div>
				</div><!-- /navbar-inner -->
			</div>

