<?php

include("config.php");

if(!isset($_REQUEST['platform']))
{
	die("invalid request");
}

switch($_REQUEST['platform'])
{
	case "win32x86":
		$url = "https://s3.us-east-2.amazonaws.com/playbuilds/%COMMIT_HASH%/Play-0.30-32.exe";
		break;
	case "win32x64":
		$url = "https://s3.us-east-2.amazonaws.com/playbuilds/%COMMIT_HASH%/Play-0.30-64.exe";
		break;
	case "macos":
		$url = "https://s3.us-east-2.amazonaws.com/playbuilds/%COMMIT_HASH%/Play.dmg";
		break;
	case "linux":
		$url = "https://s3.us-east-2.amazonaws.com/playbuilds/%COMMIT_HASH%/Play!-%COMMIT_HASH%-x86_64.AppImage";
		break;
	case "android":
		$url = "https://s3.us-east-2.amazonaws.com/playbuilds/%COMMIT_HASH%/Play-release.apk";
		break;
	case "ios":
		$url = "https://s3.us-east-2.amazonaws.com/playbuilds/%COMMIT_HASH%/Play.ipa";
		break;
	break;
	default:
		die("invalid platform");
}

$content = file_get_contents("$ps_api_base/api/builds");
$json = json_decode($content);
$hash = $json->commitHash;

$url = str_replace("%COMMIT_HASH%", $hash, $url);
header("Location: $url", true, 302);
