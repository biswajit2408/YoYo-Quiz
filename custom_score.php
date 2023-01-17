<?php
  session_start();
  include("yoyo_conn_db.php");
  include("main_header.html");


        if(isset($_POST['v_score_b']) || isset($_POST['submit_m']) || isset($_POST['submit_d']))
        {



        //________________________________________________SCORE FOR HOST?TEACHER-------------------------------
          if(isset($_POST['v_score_b']))
            {
              $uname=$_SESSION['username'];
              $tt=$_GET['title'];

               $v_score=mysqli_query($conn,"select * from score_board where Title='$tt'");
    ?>
               <html><body>
                <center>
                 <table id="tab_design" border="">
                  <tr ><th colspan="3"><?php echo $tt;?></tr>
                  <tr><th>Name of Student
                      <th>Maximum Point
                      <th>Obtained Point
                    </tr>
                  <?php
                while($userrow=mysqli_fetch_array($v_score))
                 {
                   $typ=$userrow['Type_of_question'];
                   $t_pnt=$userrow['Total_Point'];
                   $pt=$userrow['Point'];
                   $nm=$userrow['Name'];
                   ?>

                   <tr><td><?php echo $nm;?>
                        <td><?php echo $t_pnt;?>
                        <td><?php echo "$pt";?>
                        </tr>

    <?php
                }?>
                </table>
                </center>
              </body>
                </html>

<?php
          }

//--------------------------------------------SCORE FOR STUDENT MCQ TYPE ONLY-----------------------

             if(isset($_POST['submit_m']))
             {

                $uname=$_SESSION['username'];
                $c=$_POST['e_code_m'];
                STATIC $score_m=0;

                 $co=mysqli_query($conn,"select Correct_option from `$c`");

                 $select_name=mysqli_query($conn,"select Name from registration where Username='$uname' ");
                 while ($userrow=mysqli_fetch_array($select_name))
                 {
                     $nm=$userrow['Name'];

                 }
                 while ($userrow=mysqli_fetch_array($co))
                 {
                   STATIC $qn=0;



                        $c_o=$userrow['Correct_option'];
                          if($c_o==$_POST['option'.$qn])
                          {

                              $score_m=$score_m+1;

                          }

                          $qn=$qn+1;


                  }


                  $select = mysqli_query($conn,"select * from quiz_list where Quiz_Code='$c' ");

                	while($userrow=mysqli_fetch_array($select))
              		{

              			$t_point=$userrow['Total_point'];
              			$tp=$userrow['Title'];
              			$typ=$userrow['Type'];

                  }?>
                  <html>
                  <body>
                   <center>
                    <table id="tab_design" border="">
                     <tr ><th colspan="3"><?php echo "$tp  ($typ) ";?></tr>
                       <tr><th>Name of Student
                           <th>Maximum Point
                           <th>Obtained Point
                         </tr>

                   <tr><td><?php echo $nm; ?>
                       <td><?php echo $t_point; ?>
                      <td><?php echo $score_m; ?>
                      </tr>
                  </table>
                </center>
              </body>
              </html>


                  <?php

                $score=mysqli_query($conn,"insert into score_board (Name,E_code,Title,Type_of_question,Point,Total_point) values ('$nm','$c','$tp','$typ','$score_m','$t_point') ");


            }

//--------------------------------------------SCORE FOR STUDENT ONE WORD TYPE ONLY-----------------------
            if(isset($_POST['submit_d']))
            {
                $uname=$_SESSION['username'];
               $c=$_POST['e_code_d'];
               STATIC $score_d=0;



                $co=mysqli_query($conn,"select Correct_answer from `$c`");

                $select_name=mysqli_query($conn,"select Name from registration where Username='$uname' ");
                while ($userrow=mysqli_fetch_array($select_name))
                {
                    $nm=$userrow['Name'];

                }
                while ($userrow=mysqli_fetch_array($co))
                {
                  STATIC $qn=0;

                       $c_o=$userrow['Correct_answer'];

                         if($c_o==$_POST['answer'.$qn])
                         {

                             $score_d=$score_d+1;

                         }

                         $qn=$qn+1;


                 }


                 $select = mysqli_query($conn,"select * from quiz_list where Quiz_Code='$c' ");

                  while($userrow=mysqli_fetch_array($select))
                  {
                        $t_point=$userrow['Total_point'];
                        $tp=$userrow['Title'];
                        $typ=$userrow['Type'];
                  }

                  ?>
                  <html>
                  <body>
                   <center>
                    <table id="tab_design" border="">
                     <tr ><th colspan="3"><?php echo "$tp  ($typ) ";?></tr>
                       <tr><th>Name of Student
                           <th>Maximum Point
                           <th>Obtained Point
                         </tr>

                   <tr><td><?php echo $nm; ?>
                       <td><?php echo $t_point; ?>
                      <td><?php echo $score_d; ?>
                      </tr>
                  </table>
                </center>
              </body>
              </html><?php
                  $score=mysqli_query($conn,"insert into score_board (Name,E_code,Title,Type_of_question,Point,Total_point) values ('$nm','$c','$tp','$typ','$score_d','$t_point') ");


           }

      }

include("footer.html");
 ?>
