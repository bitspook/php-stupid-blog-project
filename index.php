<?php include_once 'assets/includes/_header.php'; ?>

<!-- THIS IS THE HOME PAGE -->
	<div id="post_list"  >
		
					
	<!-- HERE STARTS THE SLIDESHOW CODE -->
			<div id="myCarousel" class="carousel slide">
				<div class="carousel-inner">
					<div class="item">
						<img src="assets/img/img1.jpg" alt="">
						<div class="carousel-caption">
							<h4>We are just awesome</h4>
							<p></p>
						</div>
					</div>
					<div class="item">
						<img src="assets/img/img2.jpg" alt="">
						<div class="carousel-caption">
							<h4>Second Thumbnail label</h4>
							<p></p>
						</div>
					</div>
					<div class="item active">
						<img src="assets/img/img3.jpg" height=272px alt="">
						<div class="carousel-caption">
							<h4>Third Thumbnail label</h4>
							<p></p>
						</div>
					</div>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
			</div>
			<!-- SLIDESHOW CODE ENDS -->
			
		<?php 
			$post_query = mysql_query("SELECT * FROM `blog_posts` ORDER BY id DESC LIMIT 10")  or die(error_message("Cannot Connect fetch data from database."));  //this function make query to database, or print error

			$author = "Admin";
			while ($post = mysql_fetch_assoc($post_query)) {
					echo "<div class='post blue-well'>";
					echo "<h1><a href='show_blogpost.php?ID=".$post['id']."'>".$post['title']."</a></h1>";
					echo "<p>".substr(($post['post']), 0, 450)."<b>...</b></p>";
					echo "<p><a href='show_blogpost.php?ID=".$post['id']."'> Read More</a><br>";
					echo "<span class='footer'>Posted By: ".$author."  &#9618; Last Updated: ".$post['date_posted']."</span><br><br><br>"; //." Tags: ". $post->tags
					echo "</div>";
			}
			echo "</div";
			include_once 'assets/includes/_footer.php';
 		?>
 	</div>