<html>
	<head>
		<title>yoyo Quiz | forgot Password</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/design.css" />
		<style>img[alt="www.000webhost.com"]{display: none}</style>
	</head>


		<body>

					<div class="header">

					</div>

					<div class="navbar">
					  <a href="help.php" class="right">Help</a>

					</div>
		<center>
		<form action="view_password.php" method="post">
		<table id="tab" cellpadding="5px" cellspacing="5px">

			<tr><th><h3>Forgot Password</h3></th></tr>
			<tr><td>Username:<input type="text" name="unm" class="form_control" placeholder="enter username"></td></tr>
			<tr><td>Mobile:<input type="text" name="mob" class="form_control"></td></tr>

			<tr align="center"><td><input type="submit" id="button" name="vp" value="View Password"></td></tr>


		</table>
		</form>
		</center>
	<?php include("footer.html");
	?>

	</body>
</html>
