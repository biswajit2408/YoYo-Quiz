<?php
  include("main_header.html");
  ?>
  <html>
  <head>
        <script>
      function confirmdelete() {

        var r = confirm("Are you sure");
        document.getElementById("button").innerHTML = txt;
      }
      </script>
  </head>
  <body>
    <center>
      <form action="deleteaccount.php" method="post">
          <table id="ind_tab">
            <h3 align="center">Delete Account</h3>

            <tr><td>Password:<input type="password" name="pwd" class="form_control" required></tr>
            <tr><td><input type="submit" id="button" onclick="confirmdelete()" name="del" value="Delete"></tr>
          </table>
        </form>
      </center>
    </body>
  </html>
<?php
include("yoyo_conn_db.php");
session_start();
$username=$_SESSION['username'];

  if(isset($_POST['del']))
  {
    $pwd=$_POST['pwd'];
    $select=mysqli_query($conn,"select * from registration where Username='$username'");
    $select_list=mysqli_query($conn,"select * from quiz_list where Username='$username'");
    $delete="delete from registration where Username='$username'";
    $del_list="delete from Quiz_list where Username='$username'";

      while($userrow=mysqli_fetch_array($select))
      {
        if ($userrow['Password']==$pwd)
        {
          while($userrow=mysqli_fetch_array($select_list))
          {
              $code=$userrow['Quiz_Code'];
                $del_code=mysqli_query($conn,"drop table $code");
          }

          if(mysqli_query($conn,$delete) && mysqli_query($conn,$del_list))
          {

            echo '<script>alert(" Profile deleted successfully!")</script>';
            echo'<script>window.location.href="signout.php";</script>';
          }
          else
          {
              echo '<script>alert("Please try again later!")</script>';
              echo'<script>window.location.href="deleteaccount.php";</script>';
          }

          mysqli_close($conn);
        }
        else {

        }
      }
  }

include("footer.html");
 ?>
