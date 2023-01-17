<html>
	<head>
		<title>yoyo Quiz | Edit Profile </title>
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

					<?php
					session_start();
					include("yoyo_conn_db.php");

					$username=$_SESSION['username'];
					if(isset($_POST['edit']))
					{
						?>
						<center>
						<form action="editprofile.php" method="post">
						<div class="prof">
						<table id="ind_tab">

							<tr>
							<tr><th><h3>Edit Your Profile</h3></th></tr>
							<tr><td>Name:<input type="text" name="nm" class="form_control"></td></tr>
							<tr><td>Qualification:<input type="text" name="qlf" class="form_control"></td></tr>
							<tr><td>Date of birth:<input type="Date" name="dob" class="form_control"></td></tr>
							<tr><td>Contact no.:<input type="tel" id="phone" name="phone" class="form_control"></td></tr>
							<tr align="center"><td><input type="submit" id="button" name="update" value="Update Now"></td></tr>


						</table>
					</div>
						</form>
						</center>
					</body>
				</html>
			<?php
		}

			if(isset($_POST['update']))
					{
						$name=$_POST['nm'];
						$qualify=$_POST['qlf'];
						$dob=$_POST['dob'];
						$mob=$_POST['phone'];

						$edit="update registration set Name='$name', Qualification='$qualify', Date_Of_Birth='$dob', Contact=$mob where Username='$username'";


								if(mysqli_query($conn,$edit))
								{

									echo '<script>alert(" Profile updated successfully!")</script>';
									echo'<script>window.location.href="profile.php";</script>';
								}
						  	else
						  	{
						  			echo '<script>alert("Please try again later!")</script>';
										echo'<script>window.location.href="profile.php";</script>';
						  	}

								mysqli_close($conn);
				  }
include("footer.html");
 ?>
