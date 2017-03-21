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
			<li><a href="/views/login/login.php" <?php if ($pageName=="Login") echo 'id="current"'; ?>>Kirjaudu sisään</a></li>
<!-- 			<li><a href="/views/login/new_user.php"<?php if ($pageName=="New_user") echo 'id="current"'; ?>>Rekisteröidy</a></li>	 -->
			<li><a href="/views/blog/show_blogs.php" <?php if($pageName == "Blogs") echo 'id="current"'; ?>>Blogit</a></li>
			<?php if(isset($_GET['blogname'])): ?>
				<li><a href="/views/blog/blog.php?blog_id=<?php echo $_GET['blog_id'] . '&blogname=' . urlencode($_GET['blogname']) ?>" <?php if($pageName == "Blog") echo "id='current'"; ?>> <?php echo $_GET["blogname"]; ?> </a></li>
			<?php endif; ?>
 		</ul>
	</div>
</nav>