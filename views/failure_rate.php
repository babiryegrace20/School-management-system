<?php if(!isset($_SESSION['username'])) {

	echo '<p class="alert alert-danger">You are not logged in, please log in first!<p>';
	echo '<meta http-equiv="refresh" content="2;url=?page=login.php" />'; 
}else {?>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">

					<center><h3 id="heading">FAILURE RATE</h3></center>
<table class='table table-bordered table-hover' border='1'>
	<thead>
		<tr>
			<th>USER ID</th>
			<th>JOBS SUBMITTED</th>
			<th>TIME</th>
			<th>FAILURE(%)</th>
		</tr>
	</thead>
<tbody>

<?php

		$q="SELECT *FROM job";
			$r=mysqli_query($conn,$q);

			if ($r->num_rows>0) {

			while ($row=$r->fetch_assoc()) {
				$userId=$row['userId'];
				$time=$row['submissionTime'];
				$jobs_submitted=jobs_per_user($userId);
				$fail_rate=failure_rate($userId);

						echo "
							<tbody>
							<tr>
								<td>$userId</td>
								<td>$jobs_submitted</td>
								<td>$time</td>
								<td>$fail_rate</td>
							</tr>";

						# check out:	https://stackoverflow.com/questions/45794460/get-values-from-mysql-database-and-store-in-php-array
				}

			}
			else{
				echo "<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>";
				echo '<p class="alert alert-danger">No jobs available as yet!</p>';
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