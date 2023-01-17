<html>
	<head>
		<title>yoyo Quiz | Change Password </title>
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
            <table id="ind_tab">
          <form action="changepassword.php" method="post">


                  <tr><td>Current Password:<input type="password" name="curr" class="form_control"></tr>
                  <tr><td>New Password:<input type="password" name="newpwd" class="form_control" required></tr>
                  <tr><td><font color="red">Note: New password cannot be same as Current Password.</font></tr>
                  <tr><td><input type="submit" id="button" name="change" value="Change Password"></tr>


            </form>
            </table>
          </center>
        </body>
        </html>

					<?php
					session_start();
					include("yoyo_conn_db.php");

					$username=$_SESSION['username'];
					if(isset($_POST['change']))
					{
					       $current=$_POST['curr'];
                 $newpassword=$_POST['newpwd'];

                 $check=mysqli_query($conn,"select Password from registration where Username='$username'");
                 $change="update registration set Password='$newpassword' where Username='$username'";

                while($userrow=mysqli_fetch_array($check))
                {
                  if($current==$userrow['Password'] && $newpassword!=$userrow['Password'])
                  {
                    if(mysqli_query($conn,$change))
    								{

    									echo '<script>alert(" Password changed successfully!")</script>';
    									echo'<script>window.location.href="signout.php";</script>';
    								}

    								mysqli_close($conn);

                  }
                  else
                  {
                      echo '<script>alert("Invalid password")</script>';
                      echo'<script>window.location.href="changepassword.php";</script>';
                  }

                }

		      }


include("footer.html");
 ?>
