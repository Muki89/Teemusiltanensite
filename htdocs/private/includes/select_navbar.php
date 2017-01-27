<?php
	if(isset($_SESSION["user_session"])){
		include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/user_head.php");
	} else if(isset($_SESSION["blogger_session"])){
		include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/blogger_head.php");
	} else{
		include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/head.php");
	}
?>

