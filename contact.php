<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Text Input Effects | Set 1</title>
		<meta name="description" content="Simple ideas for enhancing text input interactions" />
		<meta name="keywords" content="input, text, effect, focus, transition, interaction, inspiration, web design" />
		<meta name="author" content="Codrops" />

	</head>
	<body>
		<?php
		 	include_once 'header.php';
		 ?>

	<div id="textinput">
		<div class="container">
			<h2 class="text-center">Contact me</h2>
			<div class="col-md-6 col-md-offset-3">
				<form name='registration' action='demo.php' method='POST'/>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="user_name" type="text" id="input-35" />
						<label class="input__label input__label--kaede" for="input-35">
							<span class="input__label-content input__label-content--kaede">First Name</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="phone" type="number"  id="input-36" />
						<label class="input__label input__label--kaede" for="input-36">
							<span class="input__label-content input__label-content--kaede">Number</span>
						</label>
					</span>
					<span class="input input--kaede">
						<input class="input__field input__field--kaede" name="email" type="email" id="input-37" />
						<label class="input__label input__label--kaede" for="input-37">
							<span class="input__label-content input__label-content--kaede">Email</span>
						</label>
					</span>
					<span class="input input--kaede">
						<label class="input__label input__label--kaede" for="input-38" id="message">Message:</label>
						<textarea class="input__field input__field--kaede"  name="comment" rows="5" id="input-38"></textarea>
						</label>
					</span>
						<button type="submit"  class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
			
			
		</div><!-- /container -->
	</div>
		<script src="js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
		<!--==============================FOOTER=============================================-->
    <footer class="footer">
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
	
