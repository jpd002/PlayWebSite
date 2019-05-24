<?php
include("dbconfig.php");

$db_connect = mysqli_connect($db_server, $db_username, $db_password);

if(!$db_connect)
{
	die("Error while connecting to the database");
}

mysqli_select_db($db_connect, $db_database);
mysqli_query($db_connect, "SET NAMES 'utf8'");

///////////////////////////////////////////
//DevLog Processing
///////////////////////////////////////////

$g_devLogGetQueryPredicate = "FROM purei_devlog ORDER BY Date DESC";

function GetDevLogCount()
{
	global $db_connect;
	global $g_devLogGetQueryPredicate;
	$query = sprintf("SELECT COUNT(*) as devcount %s", $g_devLogGetQueryPredicate);
	$result = mysqli_query($db_connect, $query);
	$row = mysqli_fetch_assoc($result);
	return $row["devcount"];
}

function GetDevLog($id)
{
	global $db_connect;
	$stmt = mysqli_prepare($db_connect, "SELECT * FROM purei_devlog WHERE ID = ?");
	$stmt->bind_param("i", $id);
	$stmt->execute();
	return $stmt->get_result();
}

function GetDevLogs($offset, $count)
{
	global $db_connect;
	global $g_devLogGetQueryPredicate;
	$query = sprintf("SELECT * %s LIMIT %d, %d", $g_devLogGetQueryPredicate, $offset, $count);
	$result = mysqli_query($db_connect, $query);
	return $result;
}

function InsertDevLog($title, $text)
{
	global $db_connect;
	$title = mysqli_real_escape_string($db_connect, stripslashes($title));
	$text = mysqli_real_escape_string($db_connect, stripslashes($text));
	$query = "INSERT INTO purei_devlog (Title, Text, Date) VALUES (\"" . $title . "\", \"" . $text . "\", NOW())";
	mysqli_query($db_connect, $query);
}

function UpdateDevLog($id, $title, $text)
{
	global $db_connect;
	$title = mysqli_real_escape_string($db_connect, stripslashes($title));
	$text = mysqli_real_escape_string($db_connect, stripslashes($text));
	$query = "UPDATE purei_devlog SET Title = '" . $title . "', Text = '" . $text . "' WHERE ID = " . $id;
	mysqli_query($db_connect, $query);
}

function GetDevLogRow($id)
{
	global $db_connect;	
	$query = sprintf("SELECT * FROM purei_devlog WHERE ID = %d", $id);
	$result = mysqli_query($db_connect, $query);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function IsValidDevLog($id)
{
	global $db_connect;
	$query = sprintf("SELECT ID FROM purei_devlog WHERE ID = %d", $id);
	$result = mysqli_query($db_connect, $query);
	if(mysqli_num_rows($result) == 0)
	{
		return false;
	}
	return true;
}

?>
