<?php
	session_start();
	include('yoyo_conn_db.php');

									if(isset($_POST['upload']) && $_POST['code'] && isset($_SESSION['username']))
									{

										$noq= count($_POST['question']);
										$c=$_POST['code'];
										$t=$_POST['title'];
										$p=$_POST['type'];
										$uname=$_SESSION['username'];
										$t_point=$_POST['noq'];

										mysqli_query ($conn,"insert into quiz_list (Username, Title, Type, Quiz_Code,Total_point) VALUES ('$uname', '$t','$p','$c','$t_point')");

										for($i=0;$i<$noq;$i++)
										{
											STATIC $qn=0;
											$qn=$qn+1;

											if($p=="mcq")
											{


													$insert_mcq="INSERT INTO `$c` (`Question_no`, `Question`, `Option_1`, `Option_2`, `Option_3`, `Option_4`, `Correct_option`) VALUES ('$qn',
													'{$_POST['question'][$i]}',
													'{$_POST['o1'][$i]}',
													'{$_POST['o2'][$i]}',
													'{$_POST['o3'][$i]}',
													'{$_POST['o4'][$i]}',
													'{$_POST['Correct_op'][$i]}')";

													if (mysqli_query($conn,$insert_mcq))
													{
											  			echo '<script>alert("Questions uploaded succesfully! check in view QUIZ LIST")</script>';
														echo'<script>window.location.href="hosthome.php";</script>';
													}
											  		else
											 		{
											  			echo '<script>alert("Something went wrong!")</script>';
														echo'<script>window.location.href="hosthome.php";</script>';
											  		}

											}
											else
											{
												$insert_desc="INSERT INTO `$c` (`Question_no`, `Question`,`Correct_answer`) VALUES ('$qn',
													'{$_POST['question'][$i]}',
													'{$_POST['answer'][$i]}')";

													if (mysqli_query($conn,$insert_desc))
													{
											  			echo '<script>alert("Questions uploaded succesfully! check in view QUIZ LIST")</script>';
														echo'<script>window.location.href="hosthome.php";</script>';
													}
											  		else
											 		{
											  			echo '<script>alert("Something went wrong!")</script>';
														echo'<script>window.location.href="hosthome.php";</script>';
											  		}
											 }

										}
											mysqli_close($conn);
									}
?>
