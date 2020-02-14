<?php if(!isset($_SESSION['username'])) {

	echo '<p class="alert alert-danger">You are not logged in, please log in first!<p>';
	echo '<meta http-equiv="refresh" content="2;url=?page=login.php" />'; 
}else {?>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">

					<center><h3 id="heading">REGISTERED USERS</h3></center>

<table class='table table-bordered table-hover' border='1'>
	<thead>
		<tr>
			<th>USER ID</th>
			<th>NAME</th>
			<th>USER TYPE</th>
			<th>EMAIL</th>
			<th>JOBS SUBMITTED</th>
		</tr>
	</thead>
<tbody>

<?php

		$q="SELECT *FROM user";
			$r=mysqli_query($conn,$q);

			if ($r->num_rows>0) {

			while ($row=$r->fetch_assoc()) {
				$userId=$row['userId'];
				$usertype=$row['usertype'];
				$fname=$row['Fname'];
				$lname=$row['Lname'];
				$email=$row['email_address'];
				$jobs_submitted=jobs_per_user($userId);

						echo "<tr>
								<td>$userId</td>
								<td>$fname $lname</td>
								<td>$usertype</td>
								<td>$email</td>
								<td>$jobs_submitted</td>
							</tr>";
				}					
			}
			else{
				echo "<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>";
				echo '<p class="alert alert-danger">No students registered as yet!</p>';
			}
?>
</tbody>
<tfoot></tfoot>
</table>

				</div>
			</div>
		</div>
	</div>


<?php } ?>