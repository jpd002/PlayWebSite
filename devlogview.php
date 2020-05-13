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

$g_item = GetDevLog($g_devLogId);
$g_entry = mysqli_fetch_assoc($g_item);
$g_text = FormatBody($g_entry["Text"]);

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
				<div class="col-12 col-lg-10">
					<div class="card w-100 my-2" id="newsId<?= $g_entry["ID"];?>">
						<div class="card-body">
							<h4 class="card-title"><b><?= $g_entry["Title"]; ?></b></h4>
							<h6 class="card-subtitle mb-2 text-muted"><a href="devlogview.php?id=<?= $g_entry["ID"]; ?>">Posted on <?= $g_entry["Date"]; ?></a></h6>
							<p class="card-text"><?= $g_text; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once __DIR__ . "/include/footer.include.php"; ?>
	</body>

</html>
