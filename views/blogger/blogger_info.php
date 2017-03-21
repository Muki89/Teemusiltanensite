<?php 
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
$pageName = "Blogger_info";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
?>
<div class="container">
	<div class="blogger_info">
		<h1><?php echo $_SESSION["blogger"]->bloggername; ?></h1>
		<h2><?php echo $_SESSION["blogger"]->blogger_id; ?></h2>
		<h2><?php echo $_SESSION["blogger"]->blogger_email; ?></h2>
		<h2><?php echo $_SESSION["blogger"]->blog_id; ?></h2>
	</div>
</div>