<?php
include("database.php");

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");

?>

<rss version="2.0">

	<channel>
		
		<title>Play! News</title>
		<description>Play! News</description>
		<link>http://purei.org/dev.php</link>
		<docs>http://blogs.law.harvard.edu/tech/rss</docs>
		
		<?php
		
				$query = sprintf("SELECT ID, Title, Date FROM purei_devlog ORDER BY ID DESC LIMIT 10");
				$g_news = mysqli_query($db_connect, $query);
			
				while($g_entry = mysqli_fetch_assoc($g_news))
				{
				
					?>
					
						<item>
						
							<title><?php echo(htmlspecialchars($g_entry["Title"]) . " (" . $g_entry["Date"] . ")"); ?></title>
							<link>http://<?php echo($_SERVER["HTTP_HOST"])?>/devlogview.php?id=<?php echo($g_entry["ID"]);?></link>
							<guid isPermaLink="false"><?php echo($g_entry["ID"]); ?></guid>
						
						</item>
					
					<?php

				}			
		
		?>

	</channel>

</rss>
