<?php
session_start();
include("yoyo_conn_db.php");
include("main_header.html");

  $username=$_SESSION['username'];

  $profile=mysqli_query($conn,"select * from registration where Username='$username'");
  while($userrow=mysqli_fetch_array($profile))
  {
    $name=$userrow['Name'];
    $qual=$userrow['Qualification'];
    $dob=$userrow['Date_Of_Birth'];
    $contact=$userrow['Contact'];
    $role=$userrow['Role'];

  }
 ?>
<html>
  <head>
      <title>Yo Yo Quiz | your Profile </title>
  </head>
  <body>
    <h3 align="center">My Profile</h3>
    <div class="prof">
      <b>Name: </b><?php echo $name;?>
    </div>
    <div class="prof">
      <b>Qualification: </b><?php echo $qual;?>
    </div>
    <div class="prof">
      <b>Date of birth: </b><?php echo $dob;?>
    </div>
    <div class="prof">
      <b>Contact: </b><?php echo $contact;?>
    </div>
    <div class="prof">
      <b>I am: </b><?php echo $role;?>
    </div>
    <center>
      <form action="editprofile.php" method="post">
      <input type="submit" id="button" name="edit" value="Update your Profile">
    </form>
    </center>
      <?php include("footer.html");?>
  </body>
</html>
