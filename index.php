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
		<?php
			include("navi.php");
		?>
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-6 order-2 order-lg-1">
					<h2 class="pt-3 text-center">Development Log</h2>
					<hr />
					<div>
						<?php
							$g_items = GetDevLogs($g_base, 10);
							while($g_entry = mysqli_fetch_assoc($g_items)):
								$g_text = FormatBody($g_entry["Text"]);
							?>
							<div class="card w-100 my-2" id="newsId<?= $g_entry["ID"];?>">
								<div class="card-body">
									<h4 class="card-title"><b><?= $g_entry["Title"]; ?></b></h4>
									<h6 class="card-subtitle mb-2 text-muted"><a href="devlogview.php?id=<?= $g_entry["ID"]; ?>">Posted on <?= $g_entry["Date"]; ?></a></h6>
									<p class="card-text"><?= $g_text; ?></p>
									<a href="devlogview.php?id=<?= $g_entry["ID"]; ?>" class="card-link">Read More</a>
								</div>
							</div>
						<?php
							endwhile;
						?>
					</div>
					<hr />
					<div class="row justify-content-center py-2">
						<button type="button" class="mx-auto btn <?= ($g_canMovePrev) ? "btn-outline-primary" : "btn-secondary"; ?>">
							<?= ($g_canMovePrev) ? "<a href=\"" . $_SERVER["PHP_SELF"] . "?base=" . $g_prevBase . "\">" : "<a>"; ?>
								&lt;&lt; Older Log Entries
							</a>
						</button>
						<button type="button" class="mx-auto btn <?= ($g_canMoveNext) ? "btn-outline-primary" : "btn-secondary" ?>">
							<?= ($g_canMoveNext) ? "<a href=\"" . $_SERVER["PHP_SELF"] . "?base=" . $g_nextBase . "\">" : "<a>"; ?>
								Newer Log Entries &gt;&gt;
							</a>
						</button>
					</div>
				</div>
			</div>
		</div>

	</body>

</html>
