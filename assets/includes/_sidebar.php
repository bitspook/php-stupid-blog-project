<div class="span4 pull-right sidebar">
	<ul class="top-posts">
		<h3>Random Stupid posts</h3>
		<?php
			$query = mysql_query("SELECT id,title,category FROM blog_posts ORDER BY RAND() DESC LIMIT 4") or error_message(mysql_error());

			while($row = mysql_fetch_assoc($query)){
				echo "<div onclick=\"location.href='show_blogpost.php?ID=".$row['id']."'\" style=\"cursor:pointer;\"><li> <a href=\"show_blogpost.php?ID=".$row['id']."\">".$row['title']."</a><br>";
				echo $row['category']."</li></div>";
	}?>
	</ul>

</div>