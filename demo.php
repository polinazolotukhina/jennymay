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
	 	include 'config.inc.php';
	 ?>
	<div id="thankyou">
		<div class="container">
		 	<?php

				try {


					$sql = "INSERT INTO " . $table . " (username, phone, email, comment) VALUES ('".$_POST["user_name"]."','".$_POST["phone"]."','".$_POST["email"]."', '".$_POST["comment"]."')";
							
				if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
						if ($conn->query($sql)) {
							// Email admin
							mail('jmay_mua@yahoo.com', 'New user registration', "Seems like you have a new customer, contact him/her ASAP. Contact information: " . $_POST["user_name"] . ',  ' . $_POST["phone"] . ',  ' . $_POST['email'] .' , ' . $_POST["comment"]);

							//mail('jmay_mua@yahoo.com' 'New user registration', "Seems like you have a new customer, contact him/her ASAP. " );

							// Email the user who signed up
							mail($_POST['email'], 'from Jenny May', "Thank you for contact me. I will be in touch soon! JMay");
						}

						echo  '<h2 class ="message text-center"> Thank you for your message, I will contact you soon.</h2>' ;
						

					} else {
						echo '<h2 class ="message text-center"> the information is not valid</h2>';
					}

					
				} catch(PDOException $e) {
					echo '<h2 class ="message text-center"> Connection failed: </h2>' . $e->getMessage();
				}

			?>
		</div>
	</div>
	<!--==============================FOOTER=============================================-->
		<footer class="footer fixfooter">
	      <div class="container">
	        <p class="text-muted">&copy; MakeUp by JMay <?php echo date("Y"); ?></p>
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
