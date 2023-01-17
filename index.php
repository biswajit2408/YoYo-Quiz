<?php
	include("yoyo_conn_db.php");
	session_start();
STATIC $a=0;
if (isset($_SESSION['username']))
{
	$select = mysqli_query($conn,"select * from registration");


			while($userrow=mysqli_fetch_array($select))
			{
				$id=$userrow['Username'];
				$userpassword=$userrow['Password'];
				$rl=$userrow['Role'];

				if($_SESSION['username']==$id && $_SESSION['password']==$userpassword && $_SESSION['role']==$rl)
				{

					if($rl=="Student")
					{   $a++;

						echo '<script>alert("already logged in!")</script>';
						echo'<script>window.location.href="user_home.php";</script>';
						break;
					}
					else
					{	$a++;
						echo '<script>alert("already logged in!")</script>';
						echo'<script>window.location.href="hosthome.php";</script>';
					}

				}
			}

		mysqli_close($conn);
	}

else {
	?>
<html>
	<head>
		<title>yoyo Quiz | Sign In</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>img[alt="www.000webhost.com"]{display: none}</style>
		<link rel="stylesheet" href="css/design.css" />
	</head>


		<body>

					<div class="header">

					</div>

					<div class="navbar">
					  <a href="random.php">Random Quiz</a>
					  <a href="help.php" class="right">Help</a>

					</div>
		<div class="back">
		<center>
		<table id="ind_tab" >
			<form action="login_info.php" method="post">
			<tr><th><h3>Sign in</h3></th></tr>
			<tr><td>Username:<input type="text" formaction="view_quiz_list.php" name="unm" class="form_control" placeholder="enter username"></td></tr>
			<tr><td>Password:<input type="password" name="pwd" class="form_control"></td></tr>
			<tr><td>Role As: <input type="radio" name="role" value="Teacher">Teacher
							 <input type="radio" name="role" value="Student">Student</td></tr>
			<tr align="center"><td><input type="submit" id="button" name="signin" value="Sign In"></td></tr>
			<tr><td>___________________________________</td>
			<tr><td>New User?<a href="registration.php">Sign up</a></td></tr>
			<tr><td><a href="forgetpassword.php">Forget password?</a></td></tr>
			</form>

		</table>
		</center>
	</div>
	</body>
</html>
<?php }
	include("main_footer.html");

?>
