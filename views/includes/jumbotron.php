<?php 
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Xbubble.php"); 
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");

$xbubble = new Xbubble(new Database());
$newest_post = $xbubble->getNewestPost();
?>
<div class="jumbotron">
		<div class="container">
			<h1 id="tervehdi"></h1>
			<h2 id="timer"></h2>
			<!-- <button onclick="tervehdiUudestaan()" type="button" id="painike" class="btn btn-primary">Paina tästä</button> -->
			<?php 
				if (isset($_SESSION['blogger'])){  
					?><h1 id="loggedin_greeting">Tervetuloa käyttämään sivuja <?php echo $_SESSION['blogger']->bloggername; ?>!</h1><?php
					} else if(isset($_SESSION['user'])){
						?> <h1> Tervetuloa käyttämään sivuja <?php echo $_SESSION['user']->username; ?>!</h1> <?php
					} else{
						?><h1 id="not_loggedin_greeting"><a href="/views/login/login.php">Kirjaudu sisään</a> tai <a href="/views/login/new_user.php">rekisteröidy</a> nähdäksesi kaikki sivun sisältö</h1><?php
					} 
			?>
			
			<script>tervehdi();</script>

		</div>
</div>


