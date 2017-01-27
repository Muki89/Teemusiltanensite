<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width" />
<title>Teemu Siltanen</title>
<link rel="stylesheet" href="/styles/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="/styles/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<script src="/styles/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/functions/scripts.js"></script>

</head>

<body>

	<nav class="nav navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="/" class="navbar-brand" <?php if ($pageName=="Index") echo 'id="current"'?> >Muki</a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Painike</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			
			<ul class="nav navbar-nav navbar-right collapse navbar-collapse">
				<li><a href="/views/login/login.php" <?php if ($pageName=="Login") echo 'id="current"'; ?>>Kirjaudu sisään</a></li>
				<li><a href="/views/login/new_user.php"<?php if ($pageName=="New_user") echo 'id="current"'; ?>>Rekisteröidy</a></li>	
				<li><a href="/views/blog/show_blogs.php" <?php if($pageName == "Blogs") echo 'id="current"'; ?>>Blogi</a></li>
			</ul>
		</div>
	</nav>
