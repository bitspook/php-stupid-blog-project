<?php	

//This is the code for navigation bar. It is from bootstrap framework, so don't worry about all the code here, you get it readymade

$in_admin_dir = strstr($_SERVER['SCRIPT_NAME'], 'admin');

function create_link($link){
	$in_admin_dir = strstr($_SERVER['SCRIPT_NAME'], 'admin');
	if($in_admin_dir){
		echo "../".$link;
	} else echo $link;
}


?> 
	 
			<div class="navbar navbar-inverse navbar-fixed-top">
				<div class="navbar-inner">
					<div class="container" >
						<!-- ifs in this block give right link address to nav links depending on where they are -->
						<a class="brand" href = 
						<?php create_link('index.php');?>							
						>Stupid Blog</a>
						<div class="nav-collapse">
							<ul class="nav">
								<li ><a href = "<?php create_link('index.php');?>";>Home</a>
								</li>
								<li ><a href='<?php create_link('categories.php');?>';>Index</a>
								</li>
								<li style="margin-left: 50px;">
									<form class="navbar-search pull-left" action="search.php">
              					<input type="text" class="search-query span2" placeholder="Search" name="search">
              				</form>
								</li>

							</ul>
							
							<ul class="nav pull-right">
								<li>
									<a href="#aboutus_Modal" data-toggle="modal">About Us</a>
								</li>
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

<!-- ABOUT US MODAL CONTENT START HERE -->
		<div class="modal hide fade" id="aboutus_Modal" style="display: none;">
            <div class="modal-header">
              <button data-dismiss="modal" class="close" type="button">×</button>
              <h3>About Us</h3>
            </div>
            <div class="modal-body">
            	<div class='well pull-center' style="height:160px;">
            		<img class='thumbnail pull-right' height=145 width=120 src=<?php create_link('assets/img/creator.jpg')?> />
            		<table class='table pull-left span3' style="width:50%;">
            			<tr>
            				<th>Name</th>
            				<td>Charanjit Singh</td>
            				<td></td>
            			</tr>
            			<tr>
            				<th>Roll No.</th>
            				<td>100260824409</td>
            			</tr>
            			<tr>
            				<th>Description</th>
            				<td>This block is just way too small to hold the legend of my awesomeness.</td>
            			</tr>
            		</table>
            	</div>
            		<div class='well pull-center' style="height:160px;">
            			<img class="thumbnail pull-right" height=145 width=120 src=<?php create_link('assets/img/creator1.jpg')?>>
            				<table class='table pull-left span3' style="width:50%;">
            					<tr>
            						<td>Name</td>
            						<td>Sunny Singh</td>
            					</tr>
            					<tr>
            						<td>Roll No.</td>
            						<td>123456</td>
            					</tr>
            					<tr>
            						<td>Description</td>
            						<td>ummm...well..I exist</td>
            					</tr>
            				</table>
            			</div>
              	</div>
            
            <div class="modal-footer">
              <a data-dismiss="modal" class="btn" href="#">Close</a></div></div>