<?php if(!isset($_SESSION['username'])) {

	echo '<p class="alert alert-danger">You are not logged in, please log in first!<p>';
	echo '<meta http-equiv="refresh" content="2;url=?page=login.php" />'; 
}else {?>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">

					<center><h3 id="heading">WAITING JOBS</h3></center>

<table class='table table-bordered table-hover' border='1'>
	<thead>
		<tr>
			<th>JOB ID</th>
			<th>USER ID</th>
			<th>TIME</th>
		</tr>
	</thead>
<tbody>

<?php

		$q="SELECT *FROM job WHERE status='waiting'";
			$r=mysqli_query($conn,$q);

			if ($r->num_rows>0) {

			while ($row=$r->fetch_assoc()) {
				$jobId=$row['jobId'];
				$userId=$row['userId'];
				$time=$row['submissionTime'];

						echo "<tr>
								<td>$jobId</td>
								<td>$userId</td>
								<td>$time</td>
							</tr>";
				}					
			}
			else{
				echo "<tr>
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