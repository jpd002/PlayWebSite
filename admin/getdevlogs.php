<?php

include("../database.php");

$startIndex = 0;
$itemCount = 10;

if(isset($_GET["startIndex"]))
{
	$startIndex = $_GET["startIndex"];
}

if(isset($_GET["itemCount"]))
{
	$itemCount = $_GET["itemCount"];
}

$queryString = sprintf("SELECT ID, Title FROM purei_devlog ORDER BY ID DESC LIMIT %d, %d", $startIndex, $itemCount);
$devLogs = mysqli_query($db_connect, $queryString);
$result = array();
while($r = mysqli_fetch_assoc($devLogs)) 
{
	$result[] = $r;
}
echo json_encode($result);

?>
