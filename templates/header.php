<?php include_once($_SERVER['DOCUMENT_ROOT'] ."/stms/config/page_setup.php");?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title><?php echo /*$current_page['title'].*/' | '.$site_title; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="shortcut icon" type="image/png" href="resources/favicon.png"/>
	<link rel="shortcut icon" type="image/png" href="resources/favicon.png"/>

	<?php include_once($_SERVER['DOCUMENT_ROOT'] ."/stms/static/css.php");?>
	<?php include_once($_SERVER['DOCUMENT_ROOT'] ."/stms/static/javascript.php");?>

	
</head>
<body>
		
	<?php include_once($_SERVER['DOCUMENT_ROOT'] ."/stms/views/dashboard.php");?>