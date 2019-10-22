<!DOCTYPE HTML>
<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Downloads</title>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<meta property="og:title" content="Play! - Downloads">
		<meta property="og:description" content="Get your automated builds here.">
		<meta property="og:image" content="<?= $g_base_url; ?>/images/PREVIEW_GRAPH.png">
		<meta property="og:url" content="<?= $g_base_url; ?>/downloads.php">

		<?php require_once __DIR__ . "/include/header.include.php"; ?>

		<script>
			$(document).ready(function() {
				
				var apiBaseUrl = new URL("<?php echo $ps_api_base; ?>");
				apiBaseUrl.protocol = window.location.protocol;
				var url = new URL("/api/builds", apiBaseUrl);
				var xhr = new XMLHttpRequest();
				xhr.onreadystatechange = 
					function()
					{
						if((this.readyState == 4) && (this.status == 200))
						{
							var buildInfo = JSON.parse(this.responseText);
							{
								var element = document.getElementById("build-commitMessage");
								element.setAttribute("href", "https://github.com/jpd002/Play-/commit/" + buildInfo.commitHash);
								element.innerHTML = buildInfo.commitMessage + " [" + buildInfo.commitHash + "]";
							}
							{
								var element = document.getElementById("build-commitDate");
								var commitDate = new Date(Date.parse(buildInfo.commitDate));
								var options = { year: 'numeric', month: 'short', day: '2-digit'};
								element.innerHTML = new Intl.DateTimeFormat('en-GB', options).format(commitDate);
							}
							{
								var element = document.getElementById("build-download-win32x86");
								element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play-0.30-32.exe");
							}
							{
								var element = document.getElementById("build-download-win32x64");
								element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play-0.30-64.exe");
							}
							{
								var element = document.getElementById("build-download-macos");
								element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play.dmg");
							}
							{
								var element = document.getElementById("build-download-linux");
								element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play!-" + buildInfo.commitHash + "-x86_64.AppImage");
							}
							{
								var element = document.getElementById("build-download-android");
								element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play-release.apk");
							}
							{
								var element = document.getElementById("build-download-ios");
								element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play.ipa");
							}
						}
					};
				xhr.open("GET", url, true);
				xhr.send();
			});
		</script>
	</head>
	
	<body>

		<?php
			include("navi.php");
		?>
		<div class="container-fluid">
			<div class="row justify-content-center p-4">
				<div class="col-12 col-lg-8">
					<div class="jumbotron w-100 py-5 mx-auto">
						<h1>Downloads</h1>
						<p class="lead">
							<b>Notice:</b> Please download the prerequisite packages for the packages you're going to install if you haven't installed them previously. 
							Also be sure to read the documentation if you're not sure about the way of using the program you have installed!
						</p>
					</div>
				</div>
			</div>

			<div class="row justify-content-center p-4">
				<div class="col-12 col-md-10">

					<div class="card w-100">
						<div class="card-body">
							<h5 class="card-title">Play!</h5>
							<p class="card-text">
								<b>Automated Builds (warning: might be unstable!)</b>
								<div>
									Commit: <a target="_blank" id="build-commitMessage"></a>
								</div>
								<div>
									Date: <span id="build-commitDate"></span>
								</div>
								<div>
									Downloads: 
									<div class="my-4 row justify-content-center">
										<a class="mx-2 col-4 btn btn-outline-info" id="build-download-win32x86">Windows <i class="fab fa-windows"></i> (x86)</a>
										<a class="mx-2 col-4 btn btn-outline-info" id="build-download-win32x64">Windows <i class="fab fa-windows"></i> (x64)</a>
									</div>
									<div class="my-4 row justify-content-center">
										<a class="mx-2 col-4 btn btn-outline-info" id="build-download-linux">Linux <i class="fab fa-linux"></i></a>
										<a class="mx-2 col-4 btn btn-outline-info" id="build-download-android">Android <i class="fab fa-android"></i></a>
									</div>
									<div class="my-4 row justify-content-center">
										<a class="mx-2 col-4 btn btn-outline-info" id="build-download-macos">macOS <i class="fas fa-laptop"></i> <i class="fab fa-apple"></i></a>
										<a class="mx-2 col-4 btn btn-outline-info" id="build-download-ios">iOS <i class="fas fa-mobile"></i> <i class="fab fa-apple"></i></a>
									</div>
								</div>
								<br />
								<p>
								Prerequisites (for Windows):
								<a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=2DA43D38-DB71-4C1B-BC6A-9B6652CD92A3&amp;displaylang=en">DirectX Runtime</a>
								</p>
							</p>
						</div>
					</div>

				</div>
			</div>

			<div class="row justify-content-center p-4">
				<div class="col-12 col-md-10">

					<div class="card w-100">
						<div class="card-body">
							<h5 class="card-title">PsfPlayer</h5>
							<p class="card-text">
								This package will install the PSF music file player on your computer. Check the <a href="links.php">links</a> to find PSF music archives.

								<br />
								<br />

								Latest Version: Version 1.02
								<br />
								Release Date: July 3rd, 2014
								<br />
								<ul>
									<li>
										<a href="./downloads/psfplayer/PsfPlayer-1.02-32.exe">32-bits Version</a>
										<br />
										MD5 Checksum: 397f42e4c5205e54a0e725e429f15898
									</li>
									
									<li>
										<a href="./downloads/psfplayer/PsfPlayer-1.02-64.exe">64-bits Version</a>
										<br />
										MD5 Checksum: c722e78f78d999ae43759f664770edd7
									</li>
								</ul>

								<a href="./downloads/psfplayer/">Previous Versions</a>
								<br />
								<br />

								Prerequisites:
								<br />
								<a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=2DA43D38-DB71-4C1B-BC6A-9B6652CD92A3&amp;displaylang=en">DirectX Runtime</a>
								<br />
								<a href="http://connect.creativelabs.com/openal/Downloads/oalinst.zip">OpenAL Runtime</a> (Only required to use the OpenAL sound handler)
							</p>
						</div>
					</div>

				</div>
			</div>

			<div class="row justify-content-center p-4">
					<div class="col-12 col-md-10">

						<div class="card w-100">
							<div class="card-body">
								<h5 class="card-title">Source Code</h5>
								<p class="card-text">
									Source code required to recompile Play! and PsfPlayer is available in the following Git repositories:
									
									<ul>
										<li>Play! and PsfPlayer : <a href="https://github.com/jpd002/Play-">https://github.com/jpd002/Play-</a></li>
										<li>Framework Library: <a href="https://github.com/jpd002/Play--Framework">https://github.com/jpd002/Play--Framework</a></li>
										<li>CodeGen Library: <a href="https://github.com/jpd002/Play--CodeGen">https://github.com/jpd002/Play--CodeGen</a></li>
									</ul>
									
									Play! and PsfPlayer also depends on these libraries that you will need to download and install:
									
									<ul>
										<li><a href="http://boost.org">Boost C++ Libraries</a></li>
										<li><a href="http://msdn.microsoft.com/en-us/directx/default.aspx">DirectX SDK</a></li>
										<li><a href="http://zlib.net">zlib</a></li>
										<li><a href="http://bzip.org">bzip2</a> (Required only for Play!)</li>
										<li><a href="http://glew.sourceforge.net">OpenGL Extension Wrangler Library</a> (Required only for Play!)</li>
										<li><a href="http://connect.creativelabs.com/openal/default.aspx">OpenAL SDK</a> (Required only to compile the OpenAL sound handler in PsfPlayer)</li>
									</ul>
									
									I understand that the compilation environment might be hard to configure properly, so if you have any questions, don't hesitate to 
									<a href="about.php">contact</a> me.
								</p>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
		<?php include_once __DIR__ . "/include/footer.include.php"; ?>
	</body>

</html>
