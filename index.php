<?php
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	if(!isset($_SESSION['session']))
	{
		session_start();
		$_SESSION['session'] = 'true';
	}


	include('class/Database.php');
	include('class/Security.php');

	
	include('class/User.class.php');
	include('controller/user.controller.php');



	echo "<html>";
	echo 	"<head>";
	echo 		'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">';
	echo 	"</head>";
	echo 	"<body>";

	if($_GET['action'] == 'userCreateResponse')
	{
		userCreateResponse();
	}
	elseif($_GET['action'] == 'userCreateForm')
	{
		userCreateForm();
	}
	elseif($_GET['action'] == 'userUpdateForm')
	{
		userUpdateForm();
	}
	elseif($_GET['action'] == 'userUpdateResponse')
	{
		userUpdateResponse();
	}
	elseif($_GET['action'] == 'userConnectForm')
	{
		userConnectForm();
	}
	elseif($_GET['action'] == 'userConnectResponse')
	{
		userConnectResponse();
	}
	else
	{
		Echo "404 Action non trouver!";
	}
	echo "<div>";

	echo "</div>";
	echo 	"</body>";
?>