<?php

	function startsWith($haystack, $needle)
	{
	     $length = strlen($needle);
	     return (substr($haystack, 0, $length) === $needle);
	}

	// redirect to subdomain shortcuts
	$server = $_SERVER["HTTP_HOST"];
	if (startsWith($server, "mail.")) {
		header('Location: //mail.google.com/');
		die();
	} elseif (startsWith($server, "start.")) {
		header('Location: //start.creativelift.net/');
		die();		
	}
	// redirect to https - heroku style
	if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == "http") {
			if(!headers_sent()) {
					header("Status: 301 Moved Permanently");
					header(sprintf(
							'Location: https://%s%s',
							$_SERVER['HTTP_HOST'],
							$_SERVER['REQUEST_URI']
					));
					exit();
			}
	}

?>
<?php require("header.php"); ?>
<!--  /index.php -->


<section id='index-section'>
	<a name='index'></a>
	<div id='index-content'>
		<?php require("index/index-content.php"); ?>
	</div>
</section>


<section id='project-section'>
	<div id='work-content'>
	<?php require("work/work-content.php"); ?>
	</div>
</section>

<section id='about-section'>
	<div id='about-content'>
	<?php require("about/about-content.php"); ?>
	</div>
</section>

<section id='contact-section'>
	<div id='contact-content'>
	<?php require("contact/contact-content.php"); ?>
	</div>
</section>




<?php require("footer.php"); ?>