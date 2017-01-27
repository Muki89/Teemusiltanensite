<?php
session_start();
$user_error = "";
$pass_error = "";
$email_error = "";
$same_name_email_error = "";
$pageName = "New_user";
include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/select_navbar.php");

if (isset($_POST['register'])) {
	include($_SERVER['DOCUMENT_ROOT'] . "/private/Database/db_connect.php");
	include($_SERVER['DOCUMENT_ROOT'] . "/functions/user_functions.php");
    register($conn);
}
?>
	<div class="container login">

	<form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="form">
		<div class="form-group">
	        <label for="username">Username</label>
	        <input class="form-control" type="text" name="username" id="username"> <?php echo $user_error; ?>
		</div>

	    <div class="form-group">
	        <label for="password">Password</label>
	        <input class="form-control" type="password" name="password" id="password"> <?php echo $pass_error; ?>
	    </div>
	    <div class="form-group">
	        <label for="email">Email</label>
	        <input class="form-control" type="text" name="uemail" id="email"> <?php echo $email_error; ?>
	    </div>
	    <button type="submit" class="btn btn-primary" name="register">Rekisteröidy</button>
	    <?php echo $same_name_email_error; ?>
	</form>

	</div>

</body>

</html>