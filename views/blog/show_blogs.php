<?php
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
$pageName = "Blogs";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Xbubble.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Blogger.php");
$db_con = new Database();
$xbubble = new Xbubble($db_con);
$blogs = $xbubble->getBlogs();

?>

 <div class="container">
 	<!-- Preview Image -->
 	<img class="img-responsive" src="http://placehold.it/1200x400" alt="">
	<h1>xBubble sivuston blogit</h1>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		<?php
			foreach($blogs as $blog){
				$blogger = new Blogger($blog['blogger_id'], $db_con);
				echo "<h2 id='blogs_h2'><a href=/views/blog/blog.php?blog_id=" . $blog["blog_id"] . "&blogname=" . urlencode($blog["blogname"]) . ">" . $blog["blogname"] . "</a></h2>";
				echo "<p class='post-meta'>" . $blogger->getBloggerName() . "</p> ";
				echo "<hr>";
			}
		?>
		</div>
	</div>
            <!-- Pager -->
    <ul class="pager">
        <li class="next">
            <a href="#">More Blogs &rarr;</a>
        </li>
    </ul>
</div> 



</body>

</html>