<?php
# Start Session:
session_start();


#database connection
include_once($_SERVER['DOCUMENT_ROOT'] ."/stms/connection.php");


#Functions
include_once($_SERVER['DOCUMENT_ROOT'] ."/stms/functions/calculations.php");


if(isset($_GET['page'])) {
	$page = $_GET['page']; // Set $pageid to equal the value given in the URL
} else {
	$page = 'home.php'; // Set $pageid equal to 1 or the Home Page.
}


#Pages
include 'pages.php';

$site_title = 'String Task Management System';

?>