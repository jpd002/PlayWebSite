<?php
include("../database.php");

$newMode = false;

if(isset($_GET["new"]))
{
	$newMode = $_GET["new"];
}

if(!$newMode)
{
	$id = $_GET["id"];

	if(!IsValidDevLog($id))
	{
		die("Invalid ID.");
	}

	$detail = GetDevLogRow($id);

	if(isset($_POST["Update"]))
	{
		UpdateDevLog($id, $_POST["Title"], $_POST["Text"]);
		header("Location: index.php");
	}
}
else
{
	if(isset($_POST["Insert"]))
	{
		InsertDevLog($_POST["Title"], $_POST["Text"]);
		header("Location: index.php");
	}
}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/admin.css" />
		<title>Play! Website - Dev Log Editor</title>
	</head>
	<body>
		<div style="text-align: center">
			<h3>Dev Log Entry Editor</h3>
		</div>
		<br />

		<form name="input" action="" method="post">

			<div class="editZone">

				Title: <input name="Title" value="<?php if(!$newMode) echo(htmlspecialchars($detail["Title"])); ?>" size="40"/>
				<br />
				<br />

				Text:
				<br />

				<textarea name="Text" rows="25" cols="100"><?php if(!$newMode) echo(htmlspecialchars($detail["Text"])); ?></textarea>

				<br />
				<br />

				<?php 
					if($newMode)
					{
						?>
						<input name="Insert" value="Insert" type="submit" />
						<?php
					}
					else
					{
						?>
						<input name="Update" value="Update" type="submit" />
						<?php
					}
				?>
				
				<input name="Cancel" value="Cancel" type="button" onClick="parent.location='index.php'" />
				
				<br />

			</div>

		</form>
	</body>
</html>
