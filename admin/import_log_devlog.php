<?php
include("../database.php");

$input_query = "SELECT * FROM purei_log LEFT JOIN purei_development ON purei_log.DevelopmentID = purei_development.ID";
$input_rows = mysql_query($input_query);

while($input_row = mysql_fetch_assoc($input_rows))
{
	$title = mysql_real_escape_string($input_row["Description"]);
	$text = mysql_real_escape_string($input_row["Text"]);
	$date = mysql_real_escape_string($input_row["Date"]);
	$query = "INSERT INTO purei_devlog (Title, Text, Date) VALUES (\"" . $title . "\", \"" . $text . "\", '" . $date . "');";
	if(!mysql_query($query))
	{
		echo("<b>Failed!</b>");
		echo("<b>" . mysql_error($db_connect) . "</b>");
		echo($query);
		echo("<br />");
	}
}

?>
