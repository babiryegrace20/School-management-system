<?php if(!isset($_SESSION['username'])) {

	echo '<p class="alert alert-danger">You are not logged in, please log in first!<p>';
	echo '<meta http-equiv="refresh" content="2;url=?page=login.php" />'; 
}else {?>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100">
					<center><h3 id="heading">AVERAGE PROCESSING RATE</h3></center>

<table class='table table-bordered table-hover' border='1'>
	<thead>
		<tr>
			<th>JOB ID</th>
			<th>USER ID</th>
			<th>JOB TYPE</th>
			<th>TIME</th>
			<th>PROCESSING RATE</th>
		</tr>
	</thead>
<tbody>

<?php

		$q="SELECT *FROM job";
			$r=mysqli_query($conn,$q);

			if ($r->num_rows>0) {

			while ($row=$r->fetch_assoc()) {
				$userId=$row['userId'];
				$jobId=$row['jobId'];
				$jobtype=$row['jobType'];
				$time=$row['submissionTime'];
				$ptime=$row['processingTime'];

					if($ptime==null){
						$ptime="Empty";
					}

						echo "<tr>
								<td>$jobId</td>
								<td>$userId</td>
								<td>$jobtype</td>
								<td>$time</td>
								<td>$ptime</td>
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

				echo '<p class="alert alert-danger">No jobs available as yet!</p>';
			}

		$av_rate=average_rate($userId);
?>
<tr>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><b>AVERAGE PROCESSING RATE:</b>
	</td><td><?php echo $av_rate; ?></td>
</tr>
</tbody>
<tfoot></tfoot>
</table>

				</div>
			</div>
		</div>
	</div>


<?php } ?>