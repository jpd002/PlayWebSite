<!DOCTYPE HTML>
<?php

function DisplayImage($id)
{
	echo "<a href=\"./screenshots/i_" . $id . ".png\"><img src=\"ssthumb.php?id=" . $id . "\" alt=\"Screenshot #" . $id . "\" /></a>";
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<title>Play! - Screenshots</title>
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

					悪魔城ドラキュラ：闇の呪印 (Castlevania : Curse of Darkness)
					
				</td>

			</tr>
			
			<tr>
			
				<td class="Log">
				
					<div style="text-align: center;">
					
						<?php DisplayImage("000144"); ?>
						<?php DisplayImage("000145"); ?>
						<?php DisplayImage("000149"); ?>
				
					</div>
					
				</td>
				
			</tr>
			
			<tr>

				<td class="Header">

					Atelier Iris : Eternal Mana
					
				</td>

			</tr>
			
			<tr>
			
				<td class="Log">
				
					<div style="text-align: center;">
					
						<?php DisplayImage("000131"); ?>
						<?php DisplayImage("000120"); ?>
						<?php DisplayImage("000127"); ?>
						<?php DisplayImage("000124"); ?>
				
					</div>
					
				</td>
				
			</tr>

			<tr>

				<td class="Header">

					Ys 1 &amp; 2 : Eternal Story
					
				</td>

			</tr>
			
			<tr>
			
				<td class="Log">
				
					<div style="text-align: center;">
					
						<?php DisplayImage("000080"); ?>
						<?php DisplayImage("000087"); ?>
						<?php DisplayImage("000088"); ?>
						<?php DisplayImage("000089"); ?>
				
					</div>
					
				</td>
				
			</tr>

		</table>

	</body>

</html>
