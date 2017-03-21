<div canvas="container"> <!-- CANVAS START -->
<?php	

	if($pageName=='Matkat'){
		include($_SERVER['DOCUMENT_ROOT'] . "/views/matkat.php");
	} elseif($pageName == 'Etusivu'){
		include($_SERVER['DOCUMENT_ROOT'] . "/views/etusivu.php");
	} elseif($pageName == 'New_user'){
		include($_SERVER['DOCUMENT_ROOT'] . "/views/login/new_user.php");
	} elseif($pageName == 'Blog'){
		include($_SERVER['DOCUMENT_ROOT'] . "/views/blog/blog.php");
	}
	

?>