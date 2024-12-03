<!DOCTYPE HTML>
<?php
include("config.php");
$g_buildCommitMessage = "0.68";
$g_buildCommitHash = "69ce62f6";
$g_buildCommitDate = "November 22, 2024 8:33:04 AM";
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
		
<!--
		<script>
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
							element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play-x86-32.exe");
						}
						{
							var element = document.getElementById("build-download-win32x64");
							element.setAttribute("href", "https://s3.us-east-2.amazonaws.com/playbuilds/" + buildInfo.commitHash + "/Play-x86-64.exe");
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
-->
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
						
						<b>Latest Stable Build</b>
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

						<a href="https://github.com/jpd002/Play-/blob/master/README.md">General Documentation</a>
						<br />

						<br />

						<a href="./downloads/play/stable/">Other Stable Builds (for Windows, macOS, Linux, Android and iOS)</a>
						<br />
						<a href="https://play.google.com/store/apps/details?id=com.virtualapplications.play">Google Play Store (for Android)</a>
						<br />
						<a href="https://flathub.org/apps/org.purei.Play">Flathub (for Linux)</a>
						<br />
						<a href="http://cydia.purei.org">Cydia Repository (for iOS)</a>
						<br />
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
						Source code for this project is available at <a href="https://github.com/jpd002/Play-">https://github.com/jpd002/Play-</a>.
					</div>
				</td>
			</tr>
		</table>

		<br />
		
		<script>
			{
				var element = document.getElementById("build-commitMessage");
				console.log(element);
				element.setAttribute("href", "https://github.com/jpd002/Play-/commit/<?php echo $g_buildCommitHash; ?>");
				element.innerHTML = "<?php echo $g_buildCommitMessage; ?> [<?php echo $g_buildCommitHash; ?>]";
			}
			{
				var element = document.getElementById("build-commitDate");
				element.innerHTML = "<?php echo $g_buildCommitDate; ?>";
			}
			{
				var element = document.getElementById("build-download-win32x86");
				element.setAttribute("href", "./downloads/play/stable/<?php echo $g_buildCommitMessage; ?>/Play-x86-32.exe");
			}
			{
				var element = document.getElementById("build-download-win32x64");
				element.setAttribute("href", "./downloads/play/stable/<?php echo $g_buildCommitMessage; ?>/Play-x86-64.exe");
			}
			{
				var element = document.getElementById("build-download-macos");
				element.setAttribute("href", "./downloads/play/stable/<?php echo $g_buildCommitMessage; ?>/Play.dmg");
			}
			{
				var element = document.getElementById("build-download-linux");
				element.setAttribute("href", "./downloads/play/stable/<?php echo $g_buildCommitMessage; ?>/Play!-<?php echo $g_buildCommitHash; ?>-x86_64.AppImage");
			}
			{
				var element = document.getElementById("build-download-android");
				element.setAttribute("href", "./downloads/play/stable/<?php echo $g_buildCommitMessage; ?>/Play-release.apk");
			}
			{
				var element = document.getElementById("build-download-ios");
				element.setAttribute("href", "./downloads/play/stable/<?php echo $g_buildCommitMessage; ?>/Play.ipa");
			}
		</script>

	</body>
</html>
