<?php
	include('yoyo_conn_db.php');


		if(isset($_POST['proceed']))
		{

			$noq=$_POST['noq'];
			$type=$_POST['type'];
			$code=$_POST['code'];



			?>

			<html>
					<body>
						<?php include("main_header.html");?>

					<center>
					<form action="insert_custom_question.php" method="post">

							<input type="text" name="title" class="form_control" placeholder="Enter Name of the Quiz" required>
							<table>
					<?php

							for($i=0;$i<$noq;$i++)
							{
								STATIC $qn=0;
								$qn=$qn+1;

									?>

								<tr><td>Question <?php echo $qn;?><textarea name="question[]" rows="2" cols="15" class="form_control"></textarea></td></tr>
										<?php
											if($type=="mcq")
											{
										?>
												<tr><td>
												A<input type="text" name="o1[]" class="form_control">
												<td>B<input type="text" name="o2[]" class="form_control">
												<td>C<input type="text" name="o3[]" class="form_control">
												<td>D<input type="text" name="o4[]" class="form_control"></tr>

												<tr><td>Correct option <select name="Correct_op[]" class="form_control">
																<option value="A">A</option>
																<option value="B">B</option>
																<option value="C">C</option>
																<option value="D">D</option>
																</select></td></tr>

										<?php
											}
											else
											{
										?>
												<tr><td>correct Answer</td></tr>
												<tr><td><input type="text" name="answer[]" class="form_control">
										<?php
											}

							}

							if($type=="mcq")
							{
								$mcq = "CREATE TABLE `$code`(
										`Question_no` int(100),
										`Question` VARCHAR(500),
										`Option_1` VARCHAR(100),
										`Option_2` VARCHAR(100),
										`Option_3` VARCHAR(100),
										`Option_4` VARCHAR(100),
										`Correct_option` VARCHAR(100))";

										if (mysqli_query($conn,$mcq))
										{
											echo '<script>alert("(MCQ) quiz created succesfully")</script>';

										}
										else
										{
											echo '<script>alert("Code already exist! try another Code")</script>';
											echo'<script>window.location.href="create_quiz_form.php";</script>';
										}

							}
							else
							{
								$desc = "CREATE TABLE `$code`(
										`Question_no` int(100),
										`Question` VARCHAR(500),
										`Correct_answer` VARCHAR(500))";


										if (mysqli_query($conn,$desc))
										{
											echo '<script>alert("(Descriptive) quiz created succesfully")</script>';

										}
										else
										{
											echo '<script>alert("Code already exist! try another Code")</script>';
											echo'<script>window.location.href="create_quiz_form.php";</script>';

										}

							}


								?>


									<input type="hidden" name="code" value="<?php echo $code; ?>"/>
									<input type="hidden" name="type" value="<?php echo $type; ?>"/>
									<input type="hidden" name="noq" value="<?php echo $noq; ?>"/>

									<tr><td><input type="submit" id="button" name="upload" value="Upload" ></td></tr>

									</table>
								</form>
							</center>
									<?php include("footer.html");?>
						</body
					</html>
								<?php

		}


								?>
