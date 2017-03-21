<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width" />
<title>Teemu Siltanen</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link href="/styles/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
<script src="/styles/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="/styles/style.css">
<script type="text/javascript" src="/functions/scripts.js"></script>
<script type="text/javascript" src="/private/includes/tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/private/includes/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
<script>
		tinymce.init({ 
			selector:'#myTextarea',
			plugins : 'advlist autolink link image imagetools lists charmap print preview code',
			images_upload_credentials: true,
			image_title: true,
			paste_data_images : true,
		});
	</script>

</head>

<body>

<?php 
if($pageName != "Login" && ($pageName != "New_user"))
	include("navigation/select_navbar.php");
?>
