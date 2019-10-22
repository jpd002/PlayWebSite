<!DOCTYPE HTML>
<?php

function DisplayImage($id, $group_id)
{
	echo "<a class=\"grouped_elements\" data-fancybox=\"group_$group_id\" href=\"./screenshots/i_" . $id . ".png\"><img src=\"ssthumb.php?id=" . $id . "\" alt=\"Screenshot #" . $id . "\" /></a>\n";
}

$games = [];
$games["悪魔城ドラキュラ：闇の呪印 (Castlevania : Curse of Darkness)"] = ["000144", "000145", "000149"];
$games["Atelier Iris : Eternal Mana"] = ["000131", "000120", "000127", "000124"];
$games["Ys 1 &amp; 2 : Eternal Story"] = ["000080", "000087", "000088", "000089"];

?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Screenshots</title>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<?php require_once __DIR__ . "/include/header.include.php"; ?>
		<meta property="og:title" content="Play! - Screenshot">
		<meta property="og:description" content="Various screenshot of Play! in action.">
		<meta property="og:image" content="<?= $g_base_url; ?>/images/PREVIEW_GRAPH.png">
		<meta property="og:url" content="<?= $g_base_url; ?>/screenshots.php">
		<script>
			$(document).ready(function()
			{
				$("a.grouped_elements").fancybox();
			});
		</script>
	</head>
	
	<body>

	<?php
			include("navi.php");
		?>
		<div class="container-fluid">

			<?php $i = 1; foreach($games as $title => $images_id): ?>
			<div class="row justify-content-center p-4">
				<div class="col-12 col-md-10">

					<div class="card w-100">
						<div class="card-body">
							<h5 class="card-title text-center"><?= $title ?></h5>
							<p class="card-text text-center">
								<?php
									foreach($images_id as $image_id)
									{
										DisplayImage($image_id, $i);
									}
								?>
							</p>
						</div>
					</div>

				</div>
			</div>
			<?php ++$i; endforeach; ?>

		</div>
	</body>

</html>
