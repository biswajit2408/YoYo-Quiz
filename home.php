<?php
  	include('yoyo_conn_db.php');
  session_start();
  $username=$_SESSION['username'];
  if(isset($username))
  {
    $select=mysqli_query($conn,"select Role from registration where Username='$username'");
    while($userrow=mysqli_fetch_array($select))
    {
      $role=$userrow['Role'];
      if($role=="Teacher")
      {
          echo'<script>window.location.href="hosthome.php";</script>';
      }
      else
      {
        echo'<script>window.location.href="user_home.php";</script>';
      }
    }
  }
 ?>
