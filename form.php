<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Image Tilt Effect</title>
		  <!-- Bootstrap core CSS -->
    	
	</head>
	<body>
	 <?php
	 	include_once 'header.php';
	 ?>

	<div class="container">
		<div class="text-center">
			<h2> Contact me</h2>
		</div>
		<form name='registration' action='demo.php' method='POST'/>
			<div class="col-md-6 col-md-offset-3">
				<form>
					<div class="form-group">
					    <label for="user_name">Name</label>
					    <input type="text" name="user_name" class="form-control" id="user_name" placeholder="Enter name">
					  </div>
					  <div class="form-group">
					    <label for='phone'>Phone</label>
					    <input type="number" name="phone" class="form-control" id="exampleInputNumber" placeholder="Enter phone number">
					  </div>
					  <div class="form-group">
					    <label for='email'>Email address</label>
					    <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
					  </div>
					  <div class="form-group">
						  <label for="comment">Message:</label>
						  <textarea class="form-control" name="comment" rows="5" id="comment"></textarea>
					</div>
					  <button type="submit"  class="btn btn-primary">Submit</button>
				</form>
			</div>
		</form>
	</div><!--container-->

<!--==============================FOOTER=============================================-->
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