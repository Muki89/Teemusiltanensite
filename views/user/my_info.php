<?php 
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
$pageName = "User_info";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
?>
<div class="container">
	<div class="user_info">
		<h1><?php echo $_SESSION["user"]->username; ?></h1>
		<h2><?php echo $_SESSION["user"]->user_id; ?></h2>
		<h2><?php echo $_SESSION["user"]->user_email; ?></h2>
	</div>
</div>