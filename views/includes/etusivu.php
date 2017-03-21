<div class="container-fluid">
	
	<div class="section">
		<h1 id="riko_kupla">Puhkaise oma kuplasi</h1>
		<p id="minakin_pystyin">- Älä jää kuplasi vangiksi.</p>
	</div>
	
	
	<div class="row etusivu-boxes">
		
		<div class="col-md-6 diary"></div>
		
		<div class="col-md-6 box">
			
			<h2>Blogi</h2>
			<div class="newest_post">
				<h3>Uusin blogi julkaisu: <a href="/views/posts/post.php?post_id=<?php echo $newest_post['id'] ?>">"<?php echo $newest_post['title']; ?>"</a></h3>
				<p id="post_sample"><?php echo substr(html_entity_decode(strip_tags($newest_post['body'])), 0, strpos(html_entity_decode(strip_tags($newest_post['body'])), ' ', 100)); ?></p>
			</div>
		</div>
	
	</div>

	<div class="row section">
		
		<div class="col-md-4 box">
			
			<h2>Blogi</h2>
			
			<article>
				
				Sivulta löydät erilaisia blogeja.
			
			</article>
		
		</div>
		
		<div class="col-md-4 col-sm-4 box">

			<h2>Matkat</h2>
		
		</div>
		
		<div class="col-md-4 col-sm-4 box">

			<h2>Kauppa</h2>
		
		</div>
	
	</div>



	<div class="row etusivu-boxes">

		<div class="col-md-6 box">
			
			<h2>Blogi</h2>
		
		</div>
		
		<div class="col-md-6 man-tablet">
		</div>
		

	</div>
	


	<div class="section">
		<h1 id="riko_kupla">Puhkaise oma kuplasi</h1>
		<p id="minakin_pystyin">- Tee se jo tänään!</p>
	</div>


	<div class="row etusivu-boxes">

		
		<div class="col-md-6 pencils"></div>


		<div class="col-md-6 box">
			
			<h2>Blogi</h2>
		
		</div>
		

	</div>

</div>