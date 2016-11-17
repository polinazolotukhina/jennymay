<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <title>Jenny May</title>
	</head>
	<body>
	 <?php
	 	include_once 'header.php';
	 ?>
		<!--==============================PAGE=============================================-->
		
			<header class="codrops-header">
				<div class="hero visible-lg visible-md">
					<div class="hero__imgwrap">
						<img class="hero__img tilt-effect" data-tilt-options='{ "opacity" : 0.6, "movement": { "perspective" : 1500, "translateX" : 10, "translateY" : 10, "translateZ" : 2, "rotateX" : 3, "rotateY" : 3 } }' src="img/both.jpg" alt="Hero image" />
					</div>
					<h1><span>Everything has beauty</span> Make up by Jenny May</h1>
				</div>
			</header><!-- /codrops-header -->
		<!--==============================FOOTER=============================================-->
		<footer class="footer fixfooter">
	      <div class="container">
	        <p class="text-muted">&copy; MakeUp by JMay <?php echo date("Y"); ?> </p>
	      </div>
   		 </footer>
	
			<!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script src="js/bootstrap.js"></script>

		<script src="js/tiltfx.js"></script>
	</body>
</html>
