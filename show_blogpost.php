<?php include 'assets/includes/_header.php';

//THIS PAGE SHOW A SINGLE BLOGPOST BY ID
/* 	-----------------------------------------------------------------------------------------------------*/		//this block check if the data sent in $_GET variable is correct and proper. It is important to check $_GET data, since it can be easily changed by changing data in URL that appear after '?'
			if(isset($_GET['ID']) && !empty($_GET['ID']) && is_numeric($_GET['ID'])){
				$post_id = sanitize($_GET['ID']);
				$likes = mysql_fetch_row(mysql_query("SELECT likes from blog_posts WHERE id='$post_id' "))[0];
				if (! is_numeric($likes)) {
					$likes = 0;
				}
			}
			else header("location:index.php");
			
/* 	-----------------------------------------------------------------------------------------------------*/

			if (isset($post_id)) {

				// this condition check if the post with given $post_id exist in database. If not, it shows an error message
				if(!(array_key_exists('id', (mysql_fetch_assoc(mysql_query("SELECT id FROM `blog_posts` WHERE id= '$post_id'")))))) {
						die(error_message("Post with post id $post_id doesn't exist",1));
					}
			
				//query database to get post content with id = $post_id
				$post_query = mysql_query("SELECT * FROM `blog_posts` WHERE id= '$post_id'")  or die(error_message("Cannot Connect to database."));  //this function make query to database, or print error
				
			}
			else { die(error_message("Unable to get post from database.",1)); }
				

// --------------------------------------------------------------------------//
			?>

		<script type="text/javascript" src="assets/jquery.cookie.js"></script>

		<div class="btn-group span2 pull-right" id='like'>
			<input type="hidden" id='#post-id' value='<?php echo $post_id;?>'>
			<button class="btn" id='like-btn' onclick="like()">Like <i class="icon-thumbs-up"></i></button>
			<button class="btn disabled" id="counter">
			 	<input type="hidden" value='<?php echo $likes;  ?>'>
			 	<script>document.write($('#counter input[type=hidden]').val());</script> 
			 </button>
		</div>

		<script type="text/javascript">


		var $btn = $('#like-btn i');
		var post = $('input[type=hidden]').val();
		var post_cookie = 'liked-post'+post;
		jQuery(document).ready(function($) {
			if($.cookie(post_cookie)) {
				$btn.removeClass('icon-thumbs-up');
				$btn.addClass('icon-thumbs-down');
			}
		});
		
		var send_like = function(post, action){
			$.ajax({
				type: "POST",
				url: "/likes.php?action="+action+"&post="+post,
			}).done(function (count){
				$('#counter').html(count);
				// alert(count);
			});
		};

		var like = function(){

			if ($.cookie(post_cookie) === null) {
				$.cookie(post_cookie, true, {expires: 1, path: '/'});
				send_like(post, 'increase');
				if ($btn.hasClass('icon-thumbs-up')) {
					$btn.removeClass('icon-thumbs-up');
					$btn.addClass('icon-thumbs-down');
				}
			} else
			if($.cookie(post_cookie)) {
				$.removeCookie(post_cookie);
				send_like(post, 'decrease');
				$btn.removeClass('icon-thumbs-down');
				$btn.addClass('icon-thumbs-up');
			};
		};

		// smooth scrolling of like button
		$(document).scroll(function() {
			var fixed = false;
		    if( $(this).scrollTop() >= 100 ) {
		        if( !fixed ) {
		            fixed = true;
		            $('#like').css({position: 'fixed', top:70});
		        }
		    }
		    if( $(document).scrollTop() < 100){
		        if( 1 ) {
		            fixed = false;
		            $('#like').css({position:'absolute',top: 170});
		        }
		    }
		});
		</script>
		<?

/* 	-----------------------------------------------------------------------------------------------------*/

			// this block show the post with $post_id 
			$row = mysql_fetch_assoc($post_query);
				echo "<h2 class='post_title'>".$row['title']."</h2>";
				echo "<p class='muted'>".$row['category']."</p>";
				echo "<div class='post'><p>".($row['post'])."</p>";
				echo "<p> Last Updated: ".$row['date_posted']."</p></div>";
				
			
			$post_id = $row['id']; //blog_comment.php need variable $post_id to be set to fetch comments from database
			include 'blog_comment.php';
	?>
	

<?php include_once 'assets/includes/_footer.php'; ?>