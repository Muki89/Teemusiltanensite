<?php
session_start();
$pageName = "Login";
$error = "";
include($_SERVER['DOCUMENT_ROOT'] . "/private/includes/select_navbar.php");
if(isset($_POST['kirjaudu']))
	include($_SERVER['DOCUMENT_ROOT'] . "/private/Database/db_connect.php");
	include($_SERVER['DOCUMENT_ROOT'] . "/functions/user_functions.php");
	login($conn);
}
?>

<div class="container">
	<h1>
		<?php 
			if(@$_GET['registered'] == 'true'){	
				echo "Kiitos rekisteröitymisestä, voit nyt kirjautua sisään.";
			} 
		?>
	</h1>
	<form action="" method="POST" id="form">
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

</body>

</html>