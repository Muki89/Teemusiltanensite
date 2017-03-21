<?php
$pageName = "New_blog";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");
if(isset($_POST['publish'])){
	$conn = new DBconnection();
	include($_SERVER['DOCUMENT_ROOT'] . "/functions/blog_functions.php");
	newBlog($conn);
}
?>

<form id="new_blog_form" action="" method="POST">
	<div class="form-group">
		<label id="new_blog_title">Otsikko</label>
		<input class="form-control" type="text" name="title">
	</div>
	<div class="form-group">
		<textarea id="myTextarea" class="form-control" name="content"></textarea>
	</div>
	<div id="publish_buttons">
		<button type="submit" class="btn btn-primary" name="publish" id="publish_button">Julkaise</button>
		<button>Tallenna luonnos</button>
	</div>
</form>
<div id="blogside">
	<h2>Lisää blogikuva</h2>
</div>


</body>

</html>