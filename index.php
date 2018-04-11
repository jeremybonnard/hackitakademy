<?php  
	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);

	include('Include/Database.php');
	//Model
	include('class/GoldenBook.class.php');
	//Controller
	include('controller/user.controller.php');
	include('controller/GoldenBook.controller.php');
	//View
	include('view/viewComments.html');

	echo "<!doctype html>";
	echo 	"<html lang=\"fr\">";
	echo 		"<head>";
	echo 			"<meta charset=\"utf-8\">";
	echo 			'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">';
	echo 			'<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>';
	echo 			'<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>';
	echo 			'<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>';
	echo 		"</head>";
	echo 		"<body>";
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
	echo 		"</body>";
	echo 	"</html>"

?>