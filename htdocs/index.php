<?php 
session_start();
$pageName = "Index";
include("private/includes/select_navbar.php");
?>
	<div class="jumbotron">
		<div class="container">
			<h1 id="tervehdi"></h1>
			<h2 id="timer"></h2>
			<button onclick="tervehdiUudestaan()" type="button" id="painike" class="btn btn-primary">Paina tästä</button>
			<?php 
			if (@$_GET['login'] == 'true' || isset($_SESSION["user_session"]) || isset($_SESSION["blogger_session"])){
				?><h1 id="loggedin_greeting">Tervetuloa käyttämään sivuja <?php echo $_SESSION['user_session'] ?>!</h1><?php
			} else{
				?><h1 id="not_loggedin_greeting">Kirjaudu sisään tai rekisteröidy nähdäksesi kaikki sivun sisältö</h1><?php
			}
			?>
			<script>tervehdi();</script>
		<!--	<video width="544" height="359" autoplay controls>
			  <source src="images/time_544x359.mp4" type="video/mp4">
			Your browser does not support the video tag.
			</video>
		-->


		</div>
	</div>

	<div class="container main-content">
	</div>

</body>

</html>