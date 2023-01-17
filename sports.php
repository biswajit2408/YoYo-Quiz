<html>
<head>
		<title>yoyo Quiz | Random Quiz | Sports</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/design.css" />
		<style>img[alt="www.000webhost.com"]{display: none}</style>
	</head>


		<body>

					<div class="header">

					</div>

					<div class="navbar">
					  <a href="help.php" class="right">Help</a>
					</div>



		<?php
			include("yoyo_conn_db.php");

			if(isset($_GET['sports']) || isset($_GET['science']) || isset($_GET['gk']) || isset($_GET['mythology']))
			{
				 STATIC $cate="";
				STATIC $head="";

					if(isset($_GET['sports']))
					{
							$cate="sports";
							$head="Sports and Games";
					}
					elseif(isset($_GET['science']))
					{
							$cate="science";
							$head="Science And Technology";
					}
					elseif (isset($_GET['gk']))
					 {
						 	$cate="gk";
							$head="General Knowledge And Current Affairs";
					}
					elseif (isset($_GET['mythology']))
					{
							$cate="mythology";
							$head="Mythology And History";
					}

					?><div class="sports">
						<h4 align='center'><?php echo $head; ?></h4>
						<?php
						$select_quiz= mysqli_query($conn,"select * from $cate");


							while ($userrow=mysqli_fetch_array($select_quiz))
							{
								STATIC $n=0;

								$qno=$userrow['Q_no'];
								$ques=$userrow['Question'];
								$op1=$userrow['Option_1'];
								$op2=$userrow['Option_2'];
								$op3=$userrow['Option_3'];
								$op4=$userrow['Option_4'];

								?>
								<form action="random_score.php" method="post">
								<div class=ques><?php echo "Q. ",$qno," ",$ques;?>
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
							<input type="hidden" name="cate" value="<?php echo $cate; ?>"/>
								<input type="hidden" name="head" value="<?php echo $head; ?>"/>
								<p align="center"><input type="submit" id="button" name="submit" value="Done"></p>


									</form>
								<?php

			}
		?></div>
	</body>
</html>	<?php

		include("footer.html");
		 ?>
