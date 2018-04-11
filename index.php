<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	include('controller/user.controller.php');

	echo "<html>";
	echo 	"<head>";
	echo 		'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">';
	echo 	"</head>";
	echo 	"<body>";

	if($_GET['action'] == 'userCreateResponse')
	{
		userCreateResponse("toto", "mdp");
	}
	elseif($_GET['action'] == 'userCreateForm')
	{
		userCreateForm();
	}
	else
	{
		Echo "404 Action non trouver!";
	}
	
	echo 	"</body>";
?>