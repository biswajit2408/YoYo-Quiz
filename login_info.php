<?php

	session_start();

	include('yoyo_conn_db.php');
	STATIC $a=0;
	if(isset($_POST['signin']))
	{

		$username=$_POST['unm'];
		$password=$_POST['pwd'];
		$role=$_POST['role'];

		$select = mysqli_query($conn,"select * from registration");


		while($userrow=mysqli_fetch_array($select))
		{
			$id=$userrow['Username'];
			$userpassword=$userrow['Password'];
			$rl=$userrow['Role'];

			if($username==$id && $password==$userpassword && $role==$rl)
			{
				$_SESSION['username']=$username;
				$_SESSION['password']=$password;
				$_SESSION['role']=$role;

				if($rl=="Student")
				{   $a++;

					echo '<script>alert("Signed In successfully!")</script>';
					echo'<script>window.location.href="user_home.php";</script>';
					break;
				}
				else
				{	$a++;
					echo '<script>alert("signed In succesfully!")</script>';
					echo'<script>window.location.href="hosthome.php";</script>';
				}

			}
		}
			if($a==0)
			{
				echo '<script>alert("Something went wrong! please Try again")</script>';
				echo'<script>window.location.href="index.php";</script>';


			}






		mysqli_close($conn);
	}


?>
