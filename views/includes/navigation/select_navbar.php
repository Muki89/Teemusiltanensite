<?php
	if(isset($_SESSION['user'])){
		include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/navigation/user_nav.php");
	} elseif(isset($_SESSION['blogger'])){
		include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/navigation/blogger_nav.php");
	} else{
		include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/navigation/guest_nav.php");
	}
?>

