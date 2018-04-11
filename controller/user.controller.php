<?php

/////////////////////////////////
//
// Controller user
//
////////////////////////////////
// Todo: Ajouter a security : secureUser et returnUser, et secureFile
function userCreateResponse()
{
	$pseudo = $_POST['pseudo'];
	$password = $_POST['password'];
	$user = new User();
	$user->creeUser($pseudo, $password);
	$_SESSION['user'] = security::secureUser($user);
	include('view/createUserResponse.view.php');
}

function userCreateForm()
{
	include('view/createUserForm.view.php');
}

function userUpdateForm()
{
	$user = new User();
	if(isset($_SESSION['user']))
	{
		$user->chargerUser(security::returnUser($_SESSION['user']));
		$_SESSION['csrf'] = security::secureCsrf();
		include('view/updateUserForm.view.php');
	}
	else
	{
		include('view/createUserForm.view.php');
	}

}

function userUpdateResponse()
{
	$pseudo = security::secureVar($_POST['pseudo']);
	$password = security::secureVar($_POST['password']);
	$avatar = security::secureFile($_FILES['avatar']);
	$id = security::secureVar($_POST['id']);
	$csrf = security::secureVar($_POST['csrf']);
	if($csrf == $_SESSION['csrf'])
	{
		$erreur = true;
		$erreurMessage = 'Le CSRF est incorrect!';
	}
	$user = new User();
	$user->chargerUser(security::returnUser($_SESSION['user']));
	$user->setPseudo($pseudo);
	if($password != '')
	{
		$user->setPassword($password);
	}
	if($avatar != null)
	{
		$filename = $avatar["tmp_name"];
  
		$extension = explode('.', $filename);
		  
		$ext = $extension[sizeof($extension) - 1];
		move_uploaded_file($avatar['tmp_name'], 'upload/'.$user->getId().'/avatar.'.$ext);
		$user->setAvatar(true);
	}
	$user->enregistrerUser();
	include('view/updateUserResponse.view.php');
}

function userConnectForm()
{
	include('view/connectUserForm.view.php');
}

function userConnectResponse()
{
	if(isset($_POST['pseudo']) && isset($_POST['password']))
	{
		$pdo = database::getConnection();
		$pseudo = security::secureVar($_POST['pseudo']);
		$password = security::secureVar($_POST['password']);
		$passwordmd5 = md5($password);
		$rqt = 'SELECT id FROM utilisateur WHERE pseudo = "'.$pseudo.'" AND password ="'.$passwordmd5.'"';
		$result = $pdo->query($rqt);
		if($result)
		{
			$_SESSION['user'] = $user->getId();
			include('view/connectUserResponse.view.php');
		}
		else
		{
			include('view/connectUserForm.view.php');
		}
	}

}