<?php
session_start();
	include("yoyo_conn_db.php");
	include("main_header.html");
	STATIC $a=0;
	if(isset($_POST['play']))
	{

		$c=$_POST['e_code'];


		$select = mysqli_query($conn,"select * from quiz_list where Quiz_Code='$c' ");
		$select1 = mysqli_query($conn,"select * from quiz_list");

		while($userrow1=mysqli_fetch_array($select1))
		{
			if($userrow1['Quiz_Code']==$c)
			{
				$a=1;
			}
		}
		if($a==0)
		{
			echo '<script>alert(" Quiz not available!")</script>';
			echo'<script>window.location.href="enter_code.php";</script>';
		}

		while($userrow=mysqli_fetch_array($select))
		{
			$t_point=$userrow['Total_point'];
			$tp=$userrow['Title'];
			$typ=$userrow['Type'];

		}
			if($typ=="mcq")
				{
					?>
						<form action="custom_score.php" method="post">

							<h3 align="center"><?php echo "$tp   ( Maximum Point  :  $t_point )";
					$select_quiz=mysqli_query($conn,"select * from $c");

					while ($userrow_m=mysqli_fetch_array($select_quiz))
					{
						STATIC $n=0;

						$qno=$userrow_m['Question_no'];
						$ques=$userrow_m['Question'];
						$op1=$userrow_m['Option_1'];
						$op2=$userrow_m['Option_2'];
						$op3=$userrow_m['Option_3'];
						$op4=$userrow_m['Option_4'];

						?>

					</h3><div class=ques><?php echo "Q. ",$qno," ",$ques;?>
							<div class=ques>
							<p><input type="radio" name="<?php echo 'option'.$n; ?>" value="A">(A) <?php echo $op1;?></p>
									<p><input type="radio" name="<?php echo 'option'.$n; ?>" value="B">(B) <?php echo $op2;?></p>
									<p><input type="radio" name="<?php echo 'option'.$n; ?>" value="C">(C) <?php echo $op3;?></p>
									<p><input type="radio" name="<?php echo 'option'.$n; ?>" value="D">(D) <?php echo $op4;?></p>
								</div>
							</div><?php
							$n=$n+1;
					}
					?>
						<input type="hidden" name="e_code_m" value="<?php echo $c; ?>"/>
						<input type="hidden" name="title" value="<?php echo $tp; ?>"/>
						<p align="center"><input type="submit" id="button" name="submit_m" value="Done!"></p>


						</form>
						<?php
				}
				else
				{
					?>
						<form action="custom_score.php" method="post">

						<h3 align="center"><?php echo "$tp      ( Maximum Point  :  $t_point )"; ?></h3>

						<?php
					$select_quiz=mysqli_query($conn,"select * from $c");

					while($userrow_d=mysqli_fetch_array($select_quiz))
					{
						STATIC $d=0;
						$q_no=$userrow_d['Question_no'];
						$d_ques=$userrow_d['Question'];

						?>
						<div class=ques>
								<?php echo "Q. ",$q_no," ",$d_ques;?>
						<div class=ques>
						<input type="text" name="<?php echo 'answer'.$d; ?>" class="form_control" placeholder="Enter your answer">
					</div>
				</div>
						<?php
						$d=$d+1;
					}
					?>
						<input type="hidden" name="e_code_d" value="<?php echo $c; ?>"/>
							<input type="hidden" name="title" value="<?php echo $tp; ?>"/>
							<p align="center"><input type="submit" id="button" name="submit_d" value="Done!"></p>
					</form>

					<?php
				}

	}

	include("footer.html");
?>
