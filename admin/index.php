<!DOCTYPE HTML>
<?php

include("../database.php");

$devLogCountQuery = mysqli_query($db_connect, "SELECT COUNT(*) FROM purei_devlog");
$devLogCount = mysqli_fetch_row($devLogCountQuery)[0];

?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="../css/reset.css"/>
		<link rel="stylesheet" type="text/css" href="../css/admin.css" />
		<title>Play! Website - Admin Zone</title>
	</head>
	<body>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script type="text/javascript">
		
			var g_devLogCount = <?php echo($devLogCount); ?>;
			var g_devLogPageCount = 20;
			var g_currentDevLogIndex = 0;
			
			function updatePage()
			{
				$.getJSON('getdevlogs.php?startIndex=' + g_currentDevLogIndex + '&itemCount=' + g_devLogPageCount, 
					function(data)
					{
						var devLogsTable = $('#devLogsTable');
						var devLogsTableBody = devLogsTable.children('tbody');
						devLogsTableBody.html('');
					
						var items = [];

						$.each(data, 
							function(key, value) 
							{
								devLogsTableBody.append('<tr><td>' + value.Title + '</td> <td><a href="devlogedit.php?id=' + value.ID + '">Edit</a></td></tr>');
							}
						);
					}
				);
			}
			
			function prevPage()
			{
				if((g_currentDevLogIndex - g_devLogPageCount) >= 0)
				{
					g_currentDevLogIndex -= g_devLogPageCount;
					updatePage();
				}
			}

			function nextPage()
			{
				if((g_currentDevLogIndex + g_devLogPageCount) < g_devLogCount)
				{
					g_currentDevLogIndex += g_devLogPageCount;
					updatePage();
				}
			}
			
			$(document).ready(
				function()
				{
					updatePage();
				}
			);
		
		</script>
		
		<div style="text-align: center;">
			<h3>
				Development Log List (Most Recent First)
			</h3>
		</div>

		<br />
		
		<table id="devLogsTable" class="center">

			<thead>
				<tr>
					<th>
						<b>Dev Log Entry Title</b>
					</th>
					<th>
						<b>Actions</b>
					</th>
				</tr>
			</thead>

			<tbody>
			
			</tbody>
			
			<tfoot>
				<tr>
					<td><a href="javascript:prevPage();">&lt;&lt;</a> <a href="javascript:nextPage();">&gt;&gt;</a></td>
					<td><a href="devlogedit.php?new=1">New</a></td>
				</tr>
			</tfoot>
			
		</table>

	</body>
</html>
