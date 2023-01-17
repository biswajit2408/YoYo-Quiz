<?php
  session_start();
  session_destroy();
  echo '<script>alert("log Out successfully!")</script>';
  echo'<script>window.location.href="index.php";</script>';
 ?>
