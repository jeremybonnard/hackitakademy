<?php

	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors',1);
	error_reporting(E_ALL);
	if(!isset($_SESSION['session']))
	{
		session_start();
		$_SESSION['session'] = 'true';
	}


	//Model
	include('class/GoldenBook.class.php');	
	include('class/Database.php');
	include('class/Security.php');


	
	include('class/User.class.php');

	include('controller/user.controller.php');
	include('controller/GoldenBook.controller.php');

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
	if(isset($_GET['action']) )
	{
		if($_GET['action'] == 'userCreateResponse')
		{
			userCreateResponse();
		}
		elseif($_GET['action'] == 'createCommentsForm')
		{
			createCommentsForm();
		}
		elseif($_GET['action'] == 'addComment')
		{	
			addComment();
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
		elseif($_GET['action'] == 'commentsAllForm')
		{	
			commentsAllForm();
		}
		elseif($_GET['action'] == 'userDisconnectResponse')
		{
			userDisconnectResponse();

		}
		else
		{
			echo "404 Action non trouvée!";
		}	
	}
	else
	{

	}
	

	echo 			'<div class="list-group">';
	echo 				'<a href="index.php?action=userConnectForm" class="list-group-item list-group-item-action">Se connecter</a>';
	echo 				'<a href="index.php?action=userCreateForm" class="list-group-item list-group-item-action">S\'inscrire';
	echo 				'<a href="index.php?action=userUpdateForm" class="list-group-item list-group-item-action">Update son compte (il faut être connecter!)</a>';
	echo 				'<a href="index.php?action=commentsAllForm" class="list-group-item list-group-item-action">Voir tous les commentaires</a>';
	echo 				'<a href="index.php?action=createCommentsForm" class="list-group-item list-group-item-action">Ajouter un commentaire (il faut être connecter!)</a>';
	echo 			"</div>";
	echo 		"</body>";
	echo 	"</html>";
?>