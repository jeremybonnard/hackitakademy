<?php

/////////////////////////////////
//
// Controller user
//
////////////////////////////////

function userCreateResponse($pseudo, $password)
{
	include('class/User.class.php');
	$user = new User();
	$user->creeUser($pseudo, $password);
	include('view/createUserResponse.view.php');
}

function userCreateForm()
{
	include('view/createUserForm.view.php');
}