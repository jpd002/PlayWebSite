<!DOCTYPE HTML>
<?php
include("config.php");
include("database.php");
include("devlogutils.php");


$g_items = GetDevLogs(0, 1);
$g_entry = mysqli_fetch_assoc($g_items);
$g_youtube = ["JeLHXMU-iYs", "SL19AESXeM4", "CvTFkiSsxZQ", "focbbjTaUBE", "ID0LVFs5-xE", "OOc3F5pbSZM", "Y0Mik6Osjus", "JNIN4iJlE1s", "Nu4xnYpg1Cg"];
$g_play_videos = array_rand($g_youtube, 2);

?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Playstation 2 Emu</title>
		<link rel="alternate" title="RSS (Developments)" href="devlogrss.php" type="application/rss+xml" />
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<meta property="og:title" content="Play! - Playstation 2 Emu">
		<meta property="og:description" content="Play! is a PlayStation 2 emulator that runs natively on Windows, Linux, macOS, iOS and Android platforms, supporting 32 and 64 bit architectures.">
		<meta property="og:image" content="<?= $g_base_url; ?>/images/PREVIEW_GRAPH.png">
		<meta property="og:url" content="<?= $g_base_url; ?>/">
		<?php require_once __DIR__ . "/include/header.include.php"; ?>
		<style>
			.preview-2
			{
				background: url(images/PREVIEW2.jpg);
				background-repeat: no-repeat;
				background-position: center;
			}
		</style>
	</head>
	
	<body>

		<script>
			function getStatesTotal(states)
			{
				var total = 0;
				for(var state of states)
				{
					total += state.count;
				}
				return total;
			}

			function updateState(states, stateName, total)
			{
				var stateElement = document.getElementById("compat-details-" + stateName);
				var state = states.find(function(state) { return state.state === stateName; });
				stateElement.innerText = Math.floor(state.count / total * 100) + "%";
			}

			function fetchCompatibility() 
			{
				var apiBaseUrl = new URL("<?php echo $ps_api_base; ?>");
				apiBaseUrl.protocol = window.location.protocol;
				var url = new URL("/api/compatibility", apiBaseUrl);
				var xhr = new XMLHttpRequest();
				xhr.open("GET", url, true);
				xhr.setRequestHeader("Content-type", "application/json");
				xhr.onload = 
					function()
					{
						if(xhr.status === 200)
						{
							var response = JSON.parse(xhr.responseText);
							var total = getStatesTotal(response.items);
							updateState(response.items, "state-nothing", total);
							updateState(response.items, "state-loadable", total);
							updateState(response.items, "state-intro", total);
							updateState(response.items, "state-ingame", total);
							updateState(response.items, "state-playable", total);
							var formatOptions = { year: "numeric", month: "numeric", day: "numeric", hour: "numeric", minute: "numeric", second: "numeric", timeZoneName: "short" };
							var dateText = new Intl.DateTimeFormat("en-CA", formatOptions).format(Date.parse(response.updateTime));
							document.getElementById("compat-updateTime").innerText = dateText;
							document.getElementById("compat-totalGames").innerText = total;
						}
						else
						{
							fetchStatusElement.innerText = "Failed to obtain compatibility info.";
						}
					};
				xhr.send();
			}
			$(document).ready(function()
			{
				fetchCompatibility();
			});
		</script>



		<?php
			include("navi.php");
		?>

		<div class="container-fluid">
			<div class="row justify-content-center bg-primary check-contrast py-2 min-vh-100">
				<div class="col-md-6 container-alt text-light text-center py-2">
					<h3>
						Play! is a PlayStation 2 emulator that runs natively on Windows, Linux, macOS, iOS and Android platforms, supporting 32 and 64 bit architectures.
					</h3>
					<h3>
						Read on to find out more about the development of Play!.
					</h3>
					<p><a class="mx-2 text-light btn btn-outline-info" href="downloads.php">Download Latest Build Now</a></p>
				</div>
				<div class="col-12 col-md-8 container-alt text-light py25">
					<img style="width: 100%;" src="images/PREVIEW.png" />
				</div>
			</div>
		</div>


		<div class="container">
			<div class="row text-center py-4">
				<div class="col-lg-4 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fab fa-playstation"></i></span></h1>
							<h4 class="card-title text-primary">PlayStation 2</h4>
							<p class="card-text">PS2 was the most popular Sony console with over 156m sale world wide.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fas fa-compact-disc"></i></span></h1>
							<h4 class="card-title text-primary">Games</h4>
							<p class="card-text">PS2 library is made up over 2500 unique games.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary">.XYZ</span></h1>
							<h4 class="card-title text-primary">VPU</h4>
							<p class="card-text">PS2 didn't contain a dedicated GPU, but instead featured "Vector Processor Unit" for fast number crunching.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid" id="compat">
			<div class="row justify-content-center text-center bg-primary py-4">
				<div class="col-12 col-md-7 text-light">
					<h2>Compatibility Tracker</h2>
					
					<p style="font-size: smaller;">
						<span id="compat-totalGames"></span> games tested.
						<br />
						Last updated: <span id="compat-updateTime"></span>.
						<br />
						<a class="text-light" href="https://github.com/jpd002/Play-Compatibility">Contribute to the tracker</a>
					</p>
				</div>
			</div>
		</div>

		<div class="container-fluid" id="compat-details">
			<div class="row justify-content-center text-center py-4">
				<div class="col-lg-2 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fas fa-times"></i></h1>
							<h4 class="card-title text-primary"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-nothing">Nothing</a></h4>
							<p class="card-text"><div class="CompatDetail" id="compat-details-state-nothing"></div></p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fas fa-spinner"></i></h1>
							<h4 class="card-title text-primary"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-loadable">Loadable</a></h4>
							<p class="card-text"><div class="CompatDetail" id="compat-details-state-loadable"></div></p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fas fa-spinner fa-spin"></i></h1>
							<h4 class="card-title text-primary"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-intro">Intro</a></h4>
							<p class="card-text"><div class="CompatDetail" id="compat-details-state-intro"></div></p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fas fa-compact-disc fa-spin"></i></span></h1>
							<h4 class="card-title text-primary"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-ingame">Ingame</a></h4>
							<p class="card-text"><div class="CompatDetail" id="compat-details-state-ingame"></div></p>
						</div>
					</div>
				</div>
				<div class="col-lg-2 mb-4">
					<div class="card h-100 copyable">
						<div class="card-body d-flex flex-column justify-content-center align-items-center">
							<h1 class="display-2 text-primary"><i class="fab fa-playstation"></i></span></h1>
							<h4 class="card-title text-primary"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-playable">Playable</a></h4>
							<p class="card-text"><div class="CompatDetail" id="compat-details-state-playable"></div></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row justify-content-center text-center bg-primary py-4">
				<div class="col-12 col-md-7 text-light">
					<h2>Check Out The Latest Developement Blogs</h2>
					<h2><?= $g_entry["Title"]; ?> - Posted on <?= substr($g_entry["Date"], 0, -9); ?></h2>
					<h2><a style="color: white; text-decoration: underline;" href="devlogview.php?id=<?= $g_entry["ID"]; ?>">Read More</a></h2>
				</div>
			</div>
		</div>

		<div class="container-fluid preview-2">
			<div class="row  justify-content-center py-2">
				<div class="col-12 col-md-7 col-lg-5 container-alt text-center text-light py-5">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $g_youtube[$g_play_videos[0]]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row justify-content-center bg-primary check-contrast text-center py-4">
				<h2 class="col-12 col-md-6 text-light">With your continued excitement, donations, and support, Play! will continue to improve and develop, until we offer you the best PS2 emulation experience.</h2>
			</div>
		</div>


		<div class="container-fluid preview-2">
			<div class="row  justify-content-center py-2">
				<div class="col-12 col-md-7 col-lg-5 container-alt text-center text-light py-5">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $g_youtube[$g_play_videos[1]]; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>

		<?php include_once __DIR__ . "/include/footer.include.php"; ?>
	</body>

</html>
