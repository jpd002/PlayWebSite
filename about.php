<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - About</title>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<meta property="og:title" content="Play! - About">
		<meta property="og:description" content="Contact: jean-philip.desjardins@polymtl.ca.">
		<meta property="og:image" content="<?= $g_base_url; ?>/images/PREVIEW_GRAPH.png">
		<meta property="og:url" content="<?= $g_base_url; ?>/about.php">
		<?php require_once __DIR__ . "/include/header.include.php"; ?>
	</head>
	
	<body>

	<?php
			include("navi.php");
		?>
		<div class="container-fluid">

		<div class="row justify-content-center p-4">
				<div class="col-12 col-lg-8">
					<div class="jumbotron w-100 py-5 mx-auto">
						<h1>About</h1>
						<p class="lead">
							Play! is a portable PlayStation2 emulator. The focus of the project is on making PlayStation2 
							emulation easy and accessible. Just pop in your favorite game's disc and have fun!
							<ul>
								<li>No BIOS required. Play! is an high-level emulator.</li>
								<li>Easy configuration. No custom settings to fix specific games.</li>
								<li>Available on many platforms. Making sure the experience is the same everywhere.</li>
							</ul>
						</p>
					</div>
				</div>
			</div>

			<div class="row justify-content-center p-4">
				<div class="col-12 col-md-10">

					<div class="card w-100">
						<div class="card-body">
							<h5 class="card-title">Supporting the project</h5>
							<p class="card-text">
								<div>
									Supporting me financially will allow me to spend more time on the project and improve the quality of the emulator.
									It's currently possible to contribute through these channels:
								</div>
								<ul>
									<li>Patreon: <a href="https://www.patreon.com/bePatron?u=7311516" data-patreon-widget-type="become-patron-button">Become a Patron!</a><script async src="https://c6.patreon.com/becomePatronButton.bundle.js"></script></li>
									<li>
										<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
											<input type="hidden" name="cmd" value="_s-xclick">
											<input type="hidden" name="hosted_button_id" value="SEFB8MUHNHB4Y">
											Paypal: <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
											<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
										</form>
									</li>
								</ul>
							</p>
						</div>
					</div>

				</div>
			</div>

			<div class="row justify-content-center p-4">
				<div class="col-12 col-md-10">

					<div class="card w-100">
						<div class="card-body">
							<h5 class="card-title">Contact Info </h5>
							<p class="card-text">
								Author: Jean-Philip Desjardins
								<br />
								e-mail: <a href="mailto:jean-philip.desjardins@polymtl.ca">Click Here</a>.
							</p>
						</div>
					</div>

				</div>
			</div>

		</div>
		<?php include_once __DIR__ . "/include/footer.include.php"; ?>
	</body>

</html>
