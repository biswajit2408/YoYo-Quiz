<?php
	include('yoyo_conn_db.php');

	if(isset($_POST['vp']))
	{

		$username=$_POST['unm'];
		$mobile=$_POST['mob'];

		$view = mysqli_query($conn,"select * from registration where Username='$username'");

	$a=0;
		while($userrow=mysqli_fetch_array($view))
		{
			$id=$userrow['Username'];
			$mob=$userrow['Contact'];
			$userpassword=$userrow['Password'];

			if($username==$id && $mobile==$mob)
			{

				$a=1;


			}
		else
				{
						$a=0;


				}

		}
		if($a==1)
		{
			echo "<font color='blue'>Your Password: $userpassword</font>";
			include("index.php");

		}
	else
		{
					echo '<script>alert("Something went Wrong ! enter valid data")</script>';
					echo'<script>window.location.href="forgetpassword.php";</script>';

			}



		mysqli_close($conn);
	}
?>
