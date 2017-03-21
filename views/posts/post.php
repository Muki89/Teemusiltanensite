<?php
include($_SERVER['DOCUMENT_ROOT'] . "/classes/User.php");
$pageName = "Post";
include($_SERVER['DOCUMENT_ROOT'] . "/views/includes/head.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Post.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/Blogger.php");
include($_SERVER['DOCUMENT_ROOT'] . "/classes/database.class.php");

$post_id = $_GET['post_id'];
$post = new Post($post_id, new Database());
$blogger = new Blogger($post->getBloggerId(), new Database());

?>

</div>
<!-- Page Content -->
    <div class="container">

		<!-- Blog Post Content Column -->

		<!-- Blog Post -->

		<!-- Title -->
		<h1><?php echo $post->getPostTitle(); ?></h1>

		<!-- Author -->
		<p class="lead">
		    by <a href="#"><?php echo $blogger->getBloggerName(); ?></a>
		</p>

		<hr>

		<!-- Date/Time -->
		<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post->getCreatedAtTime(); ?></p>

		<hr>

		<!-- Preview Image -->
<!-- 		<img class="img-responsive" src="http://placehold.it/1200x400" alt=""> -->

<!-- 		<hr> -->

		<!-- Post Content -->
		
		<?php echo $post->getBodyContent(); ?>

		<hr>

		<!-- Blog Comments -->

		<!-- Comments Form -->
<!-- 		<div class="well">
		    <h4>Leave a Comment:</h4>
		    <form role="form">
		        <div class="form-group">
		            <textarea class="form-control" rows="3"></textarea>
		        </div>
		        <button type="submit" class="btn btn-primary">Submit</button>
		    </form>
		</div>

		<hr> -->

		<!-- Posted Comments -->

		<!-- Comment -->
<!-- 		<div class="media">
		    <a class="pull-left" href="#">
		        <img class="media-object" src="http://placehold.it/64x64" alt="">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading">Start Bootstrap
		            <small>August 25, 2014 at 9:30 PM</small>
		        </h4>
		        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		    </div>
		</div> -->

		<!-- Comment -->
	<!-- 	<div class="media">
		    <a class="pull-left" href="#">
		        <img class="media-object" src="http://placehold.it/64x64" alt="">
		    </a>
		    <div class="media-body">
		        <h4 class="media-heading">Start Bootstrap
		            <small>August 25, 2014 at 9:30 PM</small>
		        </h4>
		        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->
		        <!-- Nested Comment -->
		<!--         <div class="media">
		            <a class="pull-left" href="#">
		                <img class="media-object" src="http://placehold.it/64x64" alt="">
		            </a>
		            <div class="media-body">
		                <h4 class="media-heading">Nested Start Bootstrap
		                    <small>August 25, 2014 at 9:30 PM</small>
		                </h4>
		                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
		            </div>
		        </div> -->
		        <!-- End Nested Comment -->
    </div>