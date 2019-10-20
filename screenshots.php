<!DOCTYPE HTML>
<?php

function DisplayImage($id)
{
	echo "<a href=\"./screenshots/i_" . $id . ".png\"><img src=\"ssthumb.php?id=" . $id . "\" alt=\"Screenshot #" . $id . "\" /></a>";
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
	</head>
	
	<body>

	<?php
			include("navi.php");
		?>
		<div class="container-fluid">

			<?php foreach($games as $title => $images_id): ?>
			<div class="row justify-content-center p-4">
				<div class="col-12 col-md-10">

					<div class="card w-100">
						<div class="card-body">
							<h5 class="card-title text-center"><?= $title ?></h5>
							<p class="card-text text-center">
								<?php
									foreach($images_id as $image_id)
									{
										DisplayImage($image_id);
									}
								?>
							</p>
						</div>
					</div>

				</div>
			</div>
			<?php endforeach; ?>

		</div>
	</body>

</html>
