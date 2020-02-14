<?php

$conn=mysqli_connect("localhost","root","", "stms_db");

	if(!$conn){
		die("Cannot connect to database! Error: " .mysqli_error($conn));
	}
?>