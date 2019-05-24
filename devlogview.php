<!DOCTYPE HTML>
<?php
include("database.php");
include("devlogutils.php");

if(!isset($_GET["id"]))
{
	$g_devLogId = 0;
}
else
{
	$g_devLogId = $_GET["id"];
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Development Log</title>
		<link rel="alternate" title="RSS (Developments)" href="devlogrss.php" type="application/rss+xml" />
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

		<?php
			$g_item = GetDevLog($g_devLogId);
			$g_entry = mysqli_fetch_assoc($g_item);
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
		
		<div>

			<br />

		</div>
		
		<br />

	</body>

</html>
