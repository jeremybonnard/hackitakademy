<?php

/////////////////////////////////
//
// Controller user
//
////////////////////////////////

function userCreateResponse()
{
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];
	include('class/User.class.php');
	$user = new User();
	$user->creeUser($pseudo, $password);
	include('view/createUserResponse.view.php');
}

function userCreateForm()
{
	include('view/createUserForm.view.php');
}

function userUpdateForm()
{
	$_SESSION['csrf'] = security::secureCsrf();

	include('view/updateUserForm.view.php');
}

function userUpdateResponse()
{
	$pseudo = security::secureVar($_POST['pseudo']);
	$password = security::secureVar($_POST['password']);
	$avatar = security::secureFile($_FILE['avatar']);
	$id = security::secureVar($_POST['id']);
	$csrf = security::secureVar($_POST['csrf']);
	if($csrf == $_SESSION['csrf'])
	{
		$erreur = true;
		$erreurMessage = 'Le CSRF est incorrect!';
	}
	include('view/updateUserResponse.view.php');
}