<?php
	session_start();
	include('yoyo_conn_db.php');

	if(isset($_SESSION['username']))
	{
		$uname=$_SESSION['username'];

		$title=mysqli_query($conn,"select * from quiz_list where Username='$uname'");
			include("main_header.html");
		?><center><table id="tab_design" border="">
			<tr><th colspan='6' align="center"><h3>Created Quiz List</h3></th></tr>
			<tr><th>Sr.No
				<th>Code
				<th>Quiz Title
				<th>Type
				<th>Maximum Point
				<th>View all Scores
			</tr><?php

			while($userrow=mysqli_fetch_array($title))
			{
				STATIC $s=0;
				$t=$userrow['Title'];
				$ty=$userrow['Type'];
				$c=$userrow['Quiz_Code'];
				$mp=$userrow['Total_point'];

				$s=$s+1;
				?>
				<tr><td><?php echo $s;?></td>
					<td><?php echo $c;?></td>
					<td><a href='view_quiz_list.php?&type=<?php echo $ty;?>&code=<?php echo $c;?>&title=<?php echo $t;?>'><?php echo $t;?></a></td>
					<td><?php echo $ty;?></td>
					<td><?php echo $mp;?></td>
					<td><form action="custom_score.php?title=<?php echo $t;?>" method="post"><input type="submit" id="button"  name="v_score_b" value="View score board"></form>
				</tr>
				<?php
			}

			?> </table>
				</center>
				<?php

	}
	include("footer.html");
?>
