<?php
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
$pageName = "Blog";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Xbubble.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Blog.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Blogger.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Post.php");

$blog_id = $_GET['blog_id'];
$xbubble = new Xbubble(new Database());
$blog = new Blog($blog_id, new Database());
$blogger = new Blogger($blog->getBloggerId(), new Database());
?>

<div class="container">
	<h1><?php echo $blog->getBlogname() ?></h1>
	<div class="view_blog">
		<?php
			echo $blog->getBlogname() . '<br>';
			echo $blogger->getBloggerName() . '<br>'; 
			echo $blog->getBlogId() . '<br>';
			echo $blog->getCreationTime() . '<br>';
			echo $blog->getUpdatedTime();
		?>
	</div>
	<h2>Posts</h2>
	<div class="view_posts">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-1 col-md-10 col-md-offset-1">
				<?php
					if(!empty($xbubble->getPostsByBlogId($blog_id))){
						foreach($xbubble->getPostsByBlogId($blog_id) as $post){
							echo "<a href=/views/posts/post.php?post_id=". $post["id"] . ">" . $post["title"] . "</a><br>";
							echo "<p class='post-meta'>" . $post["created_at"] . "</p> ";
							echo "<hr>";
						}
					} else{
						echo "<p>Ei julkaisuja</p>";
					}
				?>
			</div>
		</div>
	</div>


</body>

</html>

    