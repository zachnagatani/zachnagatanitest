<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Contact-ZN</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,700' rel='stylesheet' type='text/css'>

    <!-- TYPEKIT -->
    <script src="https://use.typekit.net/tgd1gbk.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<!-- HEADER -->
    <header>
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand raleway" href="#">ZN</a>
          </div><!-- NAVBAR-HEADER -->
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right" class="raleway">
              <li><a href="index.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="work.html">Work</a></li>
              <li class="active"><a href="contact.html">Contact</a></li>
            </ul>
          </div>
        </div><!-- CONTAINER -->
      </nav><!-- NAVBAR -->
    </header>

<!-- FEATURE IMAGE -->
    <section class="feature-image feature-image-default">
      <h1 class="myriad-pro"><strong>Let's Get in Touch!</strong></h1>
    </section>


<!-- CONTACT -->
	<section id="contact">
		<div class="container">
			<div class="row">
	          <div class="col-md-12">
	            <h2 class="raleway text-center">I'll be sure to respond as soon as possible.</h2>
	          </div><!-- col -->
	        </div><!-- row -->

		<?php 

			// Check for header injections
			function has_header_injection($str) {
				return preg_match( "/[\r\n]/", $str );
			}

			if (isset ($_POST['contact-submit'])) {

				$name = trim($_POST['name']);
				$email = trim($_POST['email']);
				$timeline = trim($_POST['timeline']);
				$budget = trim($_POST['budget']);
				$company = trim($_POST['company']);
				$website = trim($_POST['website']);
				$msg = trim($_POST['message']);

				// Check to see if $name or $email have header injections
				if (has_header_injection($name) || has_header_injection($email) || has_header_injection($timeline) || has_header_injection($budget) || has_header_injection($company) || has_header_injection($website)) {
					die(); // If true, kill the script
				}

				if ( !$name || !$email || !$timeline || !$budget || !$message ) {

					echo '<h4 class="raleway">Please fill all the required fields</h4><a href="contact.php" class="btn btn-block btn-lg btn-cta">Go back and try again!</a>';
					exit;
				}

				// Add the recipient email to a variable
				$to = "zachnagatani@gmail.com"

				// Create a subject
				$subject = "$name sent you a project inquiry";

				// Construct the message
				$message = "Name: $name\r\n";
				$message .= "Email: $email\r\n";
				$message .= "Timeline: $timeline\r\n";
				$message .= "Budget: $company\r\n";
				$message .= "Company: $company\r\n";
				$message .= "Website: $website\r\n";
				$message .= "Message: \r\n$msg";

				$message = wordwrap($message, 72);

				// Set the mail headers into a variable
				$headers = "MIME-Version: 1.0\r\n";
				$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
				$headers .= "From: $name <$email>\r\n";
				$headers .= "X-Priority: 1\r\n";
				$headers .= "X-MSMail-Priority: High\r\n\r\n";

				// Send the email!
				mail($to, $subject, $message, $headers);

		?>

			<!-- Show success message after email has sent -->
			<h4 class="raleway">Thanks for contacting me!</br>I'll get back to you shortly</h4>

		<?php } else { ?>

	   <form class="clearfix" role="form" method="post" action="" id="contact-form">
			<div class="row contact-row-top">
				<div class="col-md-3 contact-col">
					<input type="text" class="form-control input-lg text-center" id="contact-name" name="name" placeholder="Name*">
				</div><!-- col -->
				<div class="col-md-3 contact-col">
					<input type="email" class="form-control input-lg text-center" id="contact-email" name="email" placeholder="Email*">
				</div><!-- col -->
				<div class="col-md-6 contact-col">
					<input type="text" class="form-control input-lg text-center" id="contact-company" name="company" placeholder="Company/Organization">
				</div><!-- col -->
			</div><!-- row -->

			<div class="row">
				<div class="col-md-3 contact-col">
					<input type="text" class="form-control input-lg text-center" id="contact-timeline" name="timeline" placeholder="Timeline ex: 2-4 weeks*">
				</div><!-- col -->
				<div class="col-md-3 contact-col">
					<input type="text" class="form-control input-lg text-center" id="contact-budget" name="budget" placeholder="Budget ex: $500-1000*">
				</div><!-- col -->
				<div class="col-md-6 contact-col">
					<input type="text" class="form-control input-lg text-center" id="contact-website" name="website" placeholder="Current Website">
				</div><!-- col -->
			</div><!-- row -->

			<div class="row">
				<div class="col-md-8 contact-col">
					<textarea class="form-control input-lg text-center" id="contact-message" name="message" placeholder="Tell me about the project...*" rows="5"></textarea>
				</div><!-- col -->
				<div class="col-md-3 col-md-offset-1 contact-col-bottom v-center">
					<input type="submit" class="btn btn-cta btn-lg btn-block raleway" name="contact-submit" value="GO!" />
				</div><!-- col -->
			</div><!-- row -->
		</form>

		<?php } ?>
		</div><!-- container -->
	</section><!-- contact -->




<!-- FOOTER -->
    <footer>
    
<!-- SOCIAL MEDIA -->
      <section id="social">
        <div class="container">
          <div class="row" id="social-links">
            <div class="col-md-4">
              <a href="https://twitter.com/znagatani" target="_blank"><h3 class="myriad-pro"><img src="img/twitter.png" width="50" height="50" /> &#64;znagatani</h3></a>
            </div><!-- col -->
            <div class="col-md-4">
              <a href="https://github.com/zachnagatani" target="_blank"><h3 class="myriad-pro"><img src="img/github.png" width="50" height="50" /> /zachnagatani</h3></a>
            </div><!-- col -->
            <div class="col-md-4">
              <a href="https://www.linkedin.com/pub/zach-nagatani/69/851/573" target="_blank"><h3 class="myriad-pro"><img src="img/linkedin.png" width="50" height="50" /> Zach Nagatani</h3></a>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- container -->
      </section><!-- social -->

<!-- COPYRIGHT -->
      <section id="copyright">
        <div class="container" id="copyright-text" >
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <h6 style="color:white;">Copyright 2015 <span id="hide">-</span> <span id="block">Zach Nagatani</span></h6>
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- container -->
      </section><!-- copyright -->

    </footer>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>