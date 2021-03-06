<?php

/////////////////////////////////
//
// Controller user
//
////////////////////////////////
// Todo: Ajouter a security : secureUser et returnUser, et secureFile

function userCreateForm()
{
	include('view/createUserForm.view.php');
}

function userCreateResponse()
{
	$pseudo = security::secureVar($_POST['pseudo'],0);
	$password = security::secureVar($_POST['password'],0);
	$user = new User();
	$user->creeUser($pseudo, $password);
	$_SESSION['user'] = security::secureUser($user);
	include('view/createUserResponse.view.php');
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
	$pseudo = security::secureVar($_POST['pseudo'],1);
	$password = security::secureVar($_POST['password'],2);
	$avatar = security::secureFile($_FILES['avatar'],1);
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
		$pseudo = security::secureVar($_POST['pseudo'],0);
		$password = security::secureVar($_POST['password'],1);
		$passwordmd5 = md5($password);
		$rqt = 'SELECT id FROM utilisateur WHERE pseudo = "'.$pseudo.'" AND password ="'.$passwordmd5.'"';
		$connection = false;
		foreach($pdo->query($rqt,PDO::FETCH_ASSOC) as $row) {
			$_SESSION['user'] = $row['id'];
			$connection = true;
		}

		if($connection)
		{
			include('view/connectUserResponse.view.php');
		}		
		else
		{
			$erreur = true;
			include('view/connectUserForm.view.php');
		}
	}

}

function userDisconnectResponse()
{
	session_destroy();
	session_start();
	include('view/connectUserForm.view.php');
}