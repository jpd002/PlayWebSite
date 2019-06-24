<!DOCTYPE HTML>
<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Downloads</title>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="css/purei.css" />
		<link rel="stylesheet" type="text/css" href="css/navi.css" />
	</head>
	
	<body>

		<?php
			include("navi.php");
		?>

		<div>
			<br />
			<br />
		</div>

		<table class="center">
			<tr>
				<td class="Header">
					Downloads
				</td>
			</tr>
		</table>
		
		<div>
			<br />
		</div>
		
		<table class="center">
			<tr>
				<td class="Log">
					<b>Notice:</b> Please download the prerequisite packages for the packages you're going to install if you haven't installed them previously. 
					Also be sure to read the documentation if you're not sure about the way of using the program you have installed!
				</td>
			</tr>
		</table>
		
		<script>
			var apiBaseUrl = new URL("<?php echo $ps_api_base; ?>");
			apiBaseUrl.protocol = window.location.protocol;
			var xhr = new XMLHttpRequest();
			var url = apiBaseUrl + "/api/builds";
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
		</script>
		
		<div>
			<br />
		</div>
		
		<table class="center">
			<tr>
				<td class="Title">
					<b>Play!</b>
				</td>
			</tr>
			<tr>
				<td class="Log">
					<div>
						This package will install the PlayStation 2 emulator on your computer or mobile device. 
						
						<br />
						<br />
						
						<a href="./downloads/play/weekly/">Weekly Builds (for Windows, macOS, Android and iOS)</a>
						<br />
						<a href="http://cydia.purei.org">Cydia Repository (for iOS)</a>
						<br />
						<br />
						
						<b>Automated Builds (warning: might be unstable!)</b>
						<div>
							Commit: <a target="_blank" id="build-commitMessage"></a>
						</div>
						<div>
							Date: <span id="build-commitDate"></span>
						</div>
						<div>
							Downloads: <a id="build-download-win32x86">Win32 (x86)</a> | <a id="build-download-win32x64">Win32 (x64)</a> | <a id="build-download-macos">macOS</a> | <a id="build-download-linux">Linux</a> | <a id="build-download-android">Android</a> | <a id="build-download-ios">iOS</a>
						</div>
						
						<br />
						
						Prerequisites (for Windows):
						<br />
						<a href="http://www.microsoft.com/downloads/details.aspx?FamilyID=2DA43D38-DB71-4C1B-BC6A-9B6652CD92A3&amp;displaylang=en">DirectX Runtime</a>
					</div>
				</td>
			</tr>
		</table>
		
		<div>
			<br />
		</div>
		
		<table class="center">
			<tr>
				<td class="Title">
					<b>PsfPlayer</b>
				</td>
			</tr>
			<tr>
				<td class="Log">
					<div>
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
					</div>
				</td>
			</tr>
		</table>

		<div>
			<br />
		</div>
		
		<table class="center">
			<tr>
				<td class="Title">
					<b>Source Code</b>
				</td>
				
			</tr>
			<tr>
				<td class="Log">
					<div>
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
						
					</div>
				</td>
			</tr>
		</table>

		<br />
		
	</body>
</html>
