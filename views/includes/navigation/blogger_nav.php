<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
} 
?>

<nav class="nav navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="/" class="navbar-brand" <?php if ($pageName=="Index") echo 'id="current"'?> >xBubble</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Painike</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
		<ul class="nav navbar-nav navbar-right collapse navbar-collapse">
			<li><a href="/views/matkat.php" <?php if ($pageName=="Matkat") echo 'id="current"'; ?> >Matkat</a></li>
			<li><a href="/views/blog/show_blogs.php" <?php if($pageName == "Blogs") echo 'id="current"'; ?>>Blogit</a></li>
			<li><a href="/views/blog/new_blog.php" <?php if($pageName == "New_blog") echo 'id="current"'; ?>>Uusi Blogi</a></li>
			<li><a href="/views/blogger/blogger_info.php" <?php if($pageName == "Blogger_info") echo 'id="current"'; ?>><?php echo $_SESSION["blogger"]->bloggername; ?></a></li>
			<?php if(isset($_GET['blogname'])): ?>
				<li><a href="/views/blog/blog.php?blog_id=<?php echo $_GET['blog_id'] . '&blogname=' . urlencode($_GET['blogname']) ?>" <?php if($pageName == "Blog") echo "id='current'"; ?>> <?php echo $_GET["blogname"]; ?> </a></li>
			<?php endif; ?>
			<li><a href="/views/login/logout.php">Kirjaudu ulos</a></li>
		</ul>
	</div>
</nav>
