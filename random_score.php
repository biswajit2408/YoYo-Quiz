<?php
include('yoyo_conn_db.php');

if(isset($_POST['submit']))
{
  $category=$_POST['cate'];
   $heading=$_POST['head'];

   STATIC $score=0;

    $co=mysqli_query($conn,"select Correct_answer from `$category`");

    STATIC $tp=0;
    while ($userrow=mysqli_fetch_array($co))
    {
          STATIC $qn=0;
           $c_o=$userrow['Correct_answer'];
             if($c_o==$_POST['option'.$qn])
             {

                 $score=$score+1;

             }

             $qn=$qn+1;
            $tp=$tp+1;

     }
     include("main_header.html");
     ?>
     <html>

     <body>
       <center>
       <table id="tab_design" border="">

        <tr ><th colspan="2"><?php echo "$heading";?></tr>
          <tr>
              <th>Maximum Point
              <th>Obtained Point
            </tr>

      <tr>
          <td><?php echo $tp; ?>
         <td><?php echo $score; ?>
         </tr>
     </table>

   </center>
 </body>
 </html>


     <?php
}
include("footer.html");
?>
