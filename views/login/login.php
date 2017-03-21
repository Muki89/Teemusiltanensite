<?php
$pageName = "Login";
$error = "";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");
// include($_SERVER['DOCUMENT_ROOT'] . "/functions/user_functions.php");
if(isset($_POST['kirjaudu'])){
	User::login(new Database());
}
?>

<div class="container-fluid login">

	<div class="row">
		<div class="col-lg-4 col-md-4 login-half-small">

			<h1>
				<?php 
					if(@$_GET['registered'] == 'true'){	
						echo "Kiitos rekisteröitymisestä, voit nyt kirjautua sisään.";
					} 
				?>
			</h1>

			<div class="login-headers">
				<h2>xBubble</h2>
				<h3>Kirjaudu sisään</h3>
			</div>

			<form action="" method="POST" id="form">
				<p>Uusi lukija? <a href="/views/login/new_user.php">Rekisteröidy täällä.</a></p>
				<div class="form-group">
					<label for="username">Käyttäjätunnus</label>
					<input class="form-control" type="text" name="uname">
				</div>
				<div class="form-group">
					<label for="password">Salasana</label> 
					<input class="form-control" type="password" name="pword">
				</div>
				<button type="submit" class="btn btn-primary" name="kirjaudu">Kirjaudu sisään</button>
				<?php echo '<div>' . $error . '</div>'; ?>
			</form>
		</div>
		<div class="col-lg-8 col-md-8 login-half">

		</div>
	</div>
</div>

</body>

</html>