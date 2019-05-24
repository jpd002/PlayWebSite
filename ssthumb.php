<?php

$imagepath = "./screenshots/i_" . $_GET["id"] . ".png";
$thumbpath = "./screenshots/t_" . $_GET["id"] . ".png";

if(!file_exists($thumbpath))
{

	if(file_exists($imagepath))
	{
	
		list($width,  $height) = getimagesize($imagepath);

		$newwidth = $width * 0.25;
		$newheight = $height * 0.25;
		
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		$source = imagecreatefrompng($imagepath);

		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		imagepng($thumb, $thumbpath);


	}

}

header("Location: " . $thumbpath);

?>