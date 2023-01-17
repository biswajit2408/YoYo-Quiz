<?php

$conn= new mysqli("localhost","root","","yoyo_quiz");

if ($conn->connect_error)
{
  die("Connection failed: " . $conn->connect_error);
}
?>
