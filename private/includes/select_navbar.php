<?php
	if(isset($_SESSION["username"])){
		include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/user_head.php");
	} elseif(isset($_SESSION["blogger_id"])){
		include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/blogger_head.php");
	} else{
		include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/head.php");
	}
?>

