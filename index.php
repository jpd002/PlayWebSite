<!DOCTYPE HTML>
<?php
include("config.php");
include("database.php");
include("devlogutils.php");

if(!isset($_GET["base"]))
{
	$g_base = 0;
}
else
{
	$g_base = $_GET["base"];
}

$g_logIncr = 10;
$g_logCount = GetDevLogCount();

$g_canMoveNext = ($g_base != 0);
$g_canMovePrev = ($g_base + $g_logIncr) < $g_logCount;
$g_nextBase = $g_base - $g_logIncr;
if($g_nextBase < 0) $g_nextBase = 0;
$g_prevBase = $g_base + $g_logIncr;

?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Development Log</title>
		<link rel="alternate" title="RSS (Developments)" href="devlogrss.php" type="application/rss+xml" />
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

		<?php require_once __DIR__ . "/include/header.include.php"; ?>
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
						var fetchStatusElement = document.getElementById("compat-fetchStatus");
						var detailsElement = document.getElementById("compat-details");
						if(xhr.status === 200)
						{
							fetchStatusElement.style.display = "none";
							detailsElement.style.display = "inline";
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
			fetchCompatibility();
		</script>

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

					What is Play! ?
					
				</td>

			</tr>
			
			<tr>
			
				<td class="Log">
				
					Play! is an attempt at creating a PlayStation 2 emulator for the Win32, Linux, macOS, iOS and Android platforms. For more information about this project
					please visit the "<a href="about.php">About</a>" section of this site.
				
				</td>
				
			</tr>

		</table>

		<div>
			<br />
		</div>

		<table class="center">
			<tr>

				<td class="Header">
					
					Compatibility Status
					
				</td>

			</tr>
			
			<tr>
			
				<td class="Log">
				
				<div id="compat-details" style="display: none">
						<table class="Compat">
							<tr>
								<th class="CompatHeader"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-nothing">Nothing</a></td>
								<th class="CompatHeader"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-loadable">Loadable</a></td>
								<th class="CompatHeader"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-intro">Intro</a></td>
								<th class="CompatHeader"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-ingame">Ingame</a></td>
								<th class="CompatHeader"><a href="https://github.com/jpd002/Play-Compatibility/issues?q=is%3Aissue+is%3Aopen+label%3Astate-playable">Playable</a></td>
							</tr>
							<tr>
								<td class="CompatDetail" id="compat-details-state-nothing"></td>
								<td class="CompatDetail" id="compat-details-state-loadable"></td>
								<td class="CompatDetail" id="compat-details-state-intro"></td>
								<td class="CompatDetail" id="compat-details-state-ingame"></td>
								<td class="CompatDetail" id="compat-details-state-playable"></td>
							</tr>
						</table>
						<div style="text-align: center; font-size: smaller;">
							<span id="compat-totalGames"></span> games tested. Last updated: <span id="compat-updateTime"></span>.
							<br />
							<a href="https://github.com/jpd002/Play-Compatibility">Contribute to the tracker</a>
						</div>
					</div>
					
					<div id="compat-fetchStatus">
						Fetching compatibility status...
					</div>
				
				</td>
				
			</tr>
		</table>
		
		<div>
			<br />
		</div>

		<table class="center">

			<tr>

				<td class="Header">

					Development Log

				</td>

			</tr>
			
		</table>

		<?php
		
			$g_items = GetDevLogs($g_base, 10);
		
			while($g_entry = mysqli_fetch_assoc($g_items))
			{
				$g_text = FormatBody($g_entry["Text"]);
				
				?>

		<div>

			<br />

		</div>

		<table class="center">
				
				<tr>

					<td class="Title" id="newsId<?php echo($g_entry["ID"]);?>">

						<b>
							<?php echo($g_entry["Title"]); ?>
						</b>
						<br />
						<span class="dateElem">
							<a href="devlogview.php?id=<?php echo($g_entry["ID"]); ?>">Posted on <?php echo($g_entry["Date"]); ?></a>
						</span>

					</td>

				</tr>

				<tr>

					<td class="Log">

						<?php echo($g_text); ?>

					</td>

				</tr>

			</table>
		
			<?php
					
				}
					
			?>

		<div>

			<br />

		</div>

		<table class="center">
		
			<tr>
				
				<td class="DevNavi" style="width: 50%;">
					<?php
						if($g_canMovePrev)
						{
							echo("<a href=\"" . $_SERVER["PHP_SELF"] . "?base=" . $g_prevBase . "\">");
						}
					?>
						&lt;&lt; Older Log Entries
					<?php
						if($g_canMovePrev)
						{
							echo("</a>");
						}
					?>
				</td>
				<td class="DevNavi" style="width: 50%;">
					<?php
						if($g_canMoveNext)
						{
							echo("<a href=\"" . $_SERVER["PHP_SELF"] . "?base=" . $g_nextBase . "\">");
						}
					?>
						Newer Log Entries &gt;&gt;
					<?php
						if($g_canMoveNext)
						{
							echo("</a>");
						}
					?>
				</td>
					
			</tr>
		
		</table>
		
		<br />

	</body>

</html>
