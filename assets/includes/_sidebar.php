<div class="span4 pull-right sidebar">
	<ul class="top-posts">
		<h3>Top Stupid posts</h3>
		<?php
			$query = mysql_query("SELECT id,title,category FROM blog_posts ORDER BY likes DESC LIMIT 4") or error_message(mysql_error());

			while($row = mysql_fetch_assoc($query)){
				echo "<div onclick=\"location.href='show_blogpost.php?ID=".$row['id']."'\" style=\"cursor:pointer;\"><li> <a href=\"show_blogpost.php?ID=".$row['id']."\">".$row['title']."</a><br>";
				echo $row['category']."</li></div>";
	}?>
	</ul>

	<script type="text/javascript">
	// smooth scrolling of like scrollbar
		$(document).scroll(function() {
			var fixed = false;
		    if( $(this).scrollTop() >= 250 ) {
		        if( !fixed ) {
		            fixed = true;
		            $('.sidebar').css({position: 'fixed', top:150});
		        }
		    }
		    if( $(document).scrollTop() < 250){
		        if( 1 ) {
		            fixed = false;
		            $('.sidebar').css({position:'absolute',top: 400});
		        }
		    }
		});
	</script>
</div>