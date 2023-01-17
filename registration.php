<html>
	<head>
		<title>yoyo Quiz | Sign Up</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/design.css" />
		<style>img[alt="www.000webhost.com"]{display: none}</style>
	</head>


		<body>

					<div class="header">
					</div>

					<div class="navbar">
					  <a href="#">Random Quiz</a>
					  <a href="help.php" class="right">Help</a>

					</div>
		<center>
		<form action="insert_registration_info.php" method="post">
		<table id="ind_tab">

			<tr>
			<tr><th><h3>Sign up</h3></th></tr>
			<tr><td>Name:<input type="text" name="nm" class="form_control"></td></tr>
			<tr><td>Qualification:<input type="text" name="qlf" class="form_control"></td></tr>
			<tr><td>Date of birth:<input type="Date" name="dob" class="form_control"></td></tr>
			<tr><td>Contact no.:<input type="tel" id="phone" name="phone" class="form_control"></td></tr>
			<tr><td>New Username:<input type="text" name="new" class="form_control" placeholder="enter username"></td></tr>
			<tr><td>New Password:<input type="Password" name="newpwd" class="form_control"></td></tr>
			<tr><td>Role As: <input type="radio" id="Teacher" name="role" value="Teacher">Teacher
							 <input type="radio" id="Student" name="role" value="Student">Student</td></tr>

			<tr align="center"><td><input type="submit" id="button" name="Signup" value="Sign Up"></td></tr>
			<tr><td>___________________________________</td>
			<tr><td>Already having account?<a href="index.php">Sign in</a></td></tr>


		</table>
		</form>
		</center>

		<?php include("main_footer.html"); ?>
	</body>
</html>
