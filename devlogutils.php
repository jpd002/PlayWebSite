<?php

function GetScreenShotHTML($ssid)
{
	$sspath = "./screenshots/i_" . $ssid . ".png";
	$thumbpath = "ssthumb.php?id=" . $ssid;

	$html  = "<a href=\"" . $sspath . "\">";
	$html .= "<img src=\"" . $thumbpath . "\" alt=\"Screenshot #" . $ssid . "\" />";
	$html .= "</a>";

	return $html;
}

function ExpandSsTags($string)
{
	$pos = strpos($string, "[ss=");
	while(1)
	{
		if($pos === false) break;
		$ssid = substr($string, $pos + 4, 6);
		$html = GetScreenShotHTML($ssid);
		$string = substr_replace($string, $html, $pos, 11);
		$pos++;
		$pos = strpos($string, "[ss=", $pos);
	}
	return $string;
}

function ExpandCenterTags($string)
{
	$replace = array("[c]", "[/c]");
	$replacement = array("<div style=\"text-align: center;\">", "</div>");
	return str_replace($replace, $replacement, $string);
}

function FormatBody($body)
{
	$body = str_replace("\n", "\n<br />\n", $body);
	$body = ExpandSsTags($body);
	$body = ExpandCenterTags($body);
	return $body;
}

?>
