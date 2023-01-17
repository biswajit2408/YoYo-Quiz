<?php
	include('yoyo_conn_db.php');

	if(isset($_POST['Signup']))
	{
		$name=$_POST['nm'];
		$qualification=$_POST['qlf'];
		$dob=$_POST['dob'];
		$contact=$_POST['phone'];
		$username=$_POST['new'];
		$password=$_POST['newpwd'];
		$role=$_POST['role'];

		$check_id = mysqli_query($conn,"select Username from registration");

		$insert_info= "insert into registration (Name,Qualification,Date_Of_Birth,Contact,Username,Password,Role)values('$name','$qualification','$dob',$contact,'$username','$password','$role')";
		while($userrow=mysqli_fetch_array($check_id))
		{
			$id=$userrow['Username'];

			if($username==$id)
			{
				
				echo '<script>alert("Already have an Account please sign in!")</script>';
				echo'<script>window.location.href="index.php";</script>';
				exit();	
			}
			
		}	


		if (mysqli_query($conn,$insert_info)) 
		{
  			echo "<font color='green'><b> </b></font>";
			include('index.php');

			echo '<script>alert("Registered successfully please login!")</script>';
				echo'<script>window.location.href="index.php";</script>';
		}
  		else 
  		{
  			echo '<script>alert("Please try again later!")</script>';
			echo'<script>window.location.href="registration.php";</script>';
  		}
		

		mysqli_close($conn);
	}
?>



