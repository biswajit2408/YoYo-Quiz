<?php
	include('yoyo_conn_db.php');
	include("user_header.html");
	?>
	<center>
	<table>
		<form action="play_custom.php" method="post">
			<tr><td><input type="text" name="e_code" class="form_control" placeholder="Enter a join code"></td>
			</tr>
			<tr><td><input type="submit" id="button" name="play" value="Join"></td></tr>



	</table>
	</center>
	<?php

	include("footer.html");
?>
