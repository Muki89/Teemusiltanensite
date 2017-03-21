<?php
$user_error = "";
$pass_error = "";
$email_error = "";
$same_name_email_error = "";
$pageName = "New_user";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");

if (isset($_POST['register'])) {
	User::register(new Database());
}
?>

	<div class="container-fuild register">

		<div class="row">
			<div class="col-lg-3 col-md-3 register-side">
			</div>
			<div class="col-lg-6 col-md-3 register-center">
				<div class="login-headers">
					<h2>xBubble</h2>
					<h3>Rekisteröidy</h3>
				</div>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" id="register-form">
				<p>Oletko jo rekisteröitynyt? <a href="/views/login/login.php">Kirjaudu sisään täällä.</a></p>
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
			<div class="col-lg-3 col-md-3 register-side">
			</div>
		</div>

	</div>

</body>

</html>