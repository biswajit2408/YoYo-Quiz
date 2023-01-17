<html>
	<head>
		<title>yoyo Quiz | custom Quiz</title>
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

		<form action="question_info.php" method="post">
			<table id="tab" cellpadding="10px" cellspacing="10px">
			<tr><th><h3 align="center">Quiz Format</h3></th></tr>
			<tr><td>Quiz Code<input type="text" name="code" class="form_control"></td>
			<td>Number of question<input type="number" id="noq" name="noq" step="1" class="form_control"></td>
			<td>Question type  <select name="type" class="form_control">
				<option value="mcq">MCQ</option>
			 	<option value="one_word">One Word</option>
				</select>
			<td><input type="submit" id="button" name="proceed" value="Proceed"></td></tr>


			</table>
		</form>
	</center>
	<?php include("footer.html"); ?>
</body>
</html>
