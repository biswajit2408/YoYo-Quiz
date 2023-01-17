<?php
	session_start();
	include('yoyo_conn_db.php');

	include("main_header.html");

	if(isset($_SESSION['username']))
	{
		$uname=$_SESSION['username'];
		$tp=$_GET['title'];
		$c=$_GET['code'];
		$typ=$_GET['type'];

				if($typ=="mcq")
				{
					?>
						<h3 align="center"><?php echo $tp;?></h3>

						<?php


					$select_quiz=mysqli_query($conn,"select * from $c");
					while ($userrow_m=mysqli_fetch_array($select_quiz))
					{
						$qno=$userrow_m['Question_no'];
						$ques=$userrow_m['Question'];
						$op1=$userrow_m['Option_1'];
						$op2=$userrow_m['Option_2'];
						$op3=$userrow_m['Option_3'];
						$op4=$userrow_m['Option_4'];
						$co=$userrow_m['Correct_option'];
						?>
						<div class="ques">
							<p><b><?php echo "Q. ",$qno," ",$ques;?></b></p>
							<p> (A) <?php echo $op1;?></p>
								<p> (B) <?php echo $op2;?></p>
								<p> (C) <?php echo $op3;?></p>
								<p> (D) <?php echo $op4;?></p>
								<p><b>Correct option:</b><?php echo $co; ?></p>

						</div>

						<?php
					}
				}
				else
				{
					?><center><table border="" id="tab_design">
						<tr><th colspan="3"><?php echo $tp; ?></th></tr>
						<tr><td><b>Question No.
							<td><b>Questions
							<td><b>Correct Answer</b>
						</tr>
								<?php
					$select_quiz=mysqli_query($conn,"select * from $c");

					while($userrow_d=mysqli_fetch_array($select_quiz))
					{
						$q_no=$userrow_d['Question_no'];
						$d_ques=$userrow_d['Question'];
						$c_o=$userrow_d['Correct_answer'];
						?>

						<tr><td><?php echo $q_no; ?>
						<td><?php echo $d_ques;?>
						<td><?php echo $c_o;?>
						</tr>
						<?php

					}
					?></table>
					</center><?php
				}

	}
	include("footer.html");
?>
