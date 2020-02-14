<

?php

function jobs_per_user($usaId) {

	$user=array();
	$num_jobs_submitted=0;
	$a="SELECT *FROM job";
	$b=mysqli_query(mysqli_connect("localhost","root","", "stms_db"),$a);

			if ($b->num_rows>0) {

					#stores users in an array
					while ($row=$b->fetch_assoc()) {
						$user[]=$row['userId'];
						}

						$arrlength=count($user);

								#checks all jobs with same userID
								for($i = 0; $i < $arrlength; $i++){

									if($user[$i]==$usaId){
										$num_jobs_submitted += 1;
									}

								}
				return $num_jobs_submitted;

		}else {
			return "Empty";
		}		

}

function failure_rate($usaId) {

			$failed_tasks=0;
			$failure_rate=0;
			$jobsSubmitted=jobs_per_user($usaId);
			$proctime=0;
			$m="SELECT *FROM job WHERE userId='$usaId' AND status='failed'";
			$n=mysqli_query(mysqli_connect("localhost","root","", "stms_db"),$m);

			if ($n->num_rows>0) {

					while ($row=$n->fetch_assoc()) {
						$proctime=$row['processingTime'];

								$failed_tasks+=1;
					}

				$failure_rate=($failed_tasks/$jobsSubmitted)*100;

				return $failure_rate;
			}
			else{
				exit;
			}
}


function success_rate($usaId) {

		$success_rate=0;
		$successful_tasks=0;
		$jobsSubmitted=jobs_per_user($usaId);
		$proctime=0;
			$m="SELECT *FROM job WHERE userId='$usaId' AND status='ready'";
			$n=mysqli_query(mysqli_connect("localhost","root","", "stms_db"),$m);

			if ($n->num_rows>0) {

					while ($row=$n->fetch_assoc()) {
						$proctime=$row['processingTime'];

								$successful_tasks+=1;
					}

				$success_rate=($successful_tasks/$jobsSubmitted)*100;

				return $success_rate;
			}
			else{
				exit;
			}

}

function average_rate() {

	$numberOfReadyJobs=0;
	$total_ptime=0;
	$average=0;
	$m="SELECT *FROM job WHERE status='ready' OR status='failed'";
	$n=mysqli_query(mysqli_connect("localhost","root","", "stms_db"),$m);

		if ($n->num_rows>0) {

				while ($row=$n->fetch_assoc()) {
					$ptime=$row['processingTime'];

					#time considered is "hh:mm:ss"
					#this code converts time in "hh:mm:ss" to seconds
					$ptime = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $ptime);
					sscanf($ptime, "%d:%d:%d", $hours, $minutes, $seconds);
					$ptime_seconds = $hours * 3600 + $minutes * 60 + $seconds;

					$numberOfReadyJobs=mysqli_num_rows($n);
					$total_ptime+=$ptime_seconds;
					$average=($total_ptime/$numberOfReadyJobs);
				}

			return $average."s";
		}
		else{
			return "<p class='alert alert-danger'>No completed job!<p>";
		}

}

?>