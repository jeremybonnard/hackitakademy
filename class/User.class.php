<?php 
////////////////////////////////////////
//
// Class User
//
////////////////////////////////////////

class User
{
	private $id;
	private $pseudo;
	private $password;
	private $avatar;

	function __construct()
	{
		$this->id = null;
		$this->pseudo = null;
		$this->password = null;
		$this->avatar = null;
	}

	function creeUser($pseudo, $password)
	{

		$this->setId(null);
		$this->setPseudo($pseudo);
		$this->setPassword($password);
		$this->setAvatar(null);
		$this->enregistrerUser();
	}

	function chargerUser($id)
	{	
		$pdo = database::getConnection();
		$data = $pdo->query('SELECT * FROM utilisateur WHERE id = '.security::secureVar($id).'');
		if($data)
		{
			foreach  ($data as $row) {
				$this->setId($row['id']);
				$this->setPseudo($row['pseudo']);
				$this->setPasswordMD5($row['password']);
				$this->setAvatar($row['avatar']);
  			}
		}

	}

	function getId()
	{
		return $this->id;
	}
	function getPseudo()
	{
		return $this->pseudo;
	}
	function getPassword()
	{
		return $this->password;
	}
	function getAvatar()
	{
		return '<img src="'.$this->avatar.'"/>';
	}
	function getAvatarUrl()
	{
		return $this->avatar;
	}
	function setId($id)
	{
		$this->id = $id;
		return true;
	}
	function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
		return true;
	}
	function setPassword($password)
	{
		$this->password = md5($password);
		return true;
	}
	function setPasswordMD5($passwordMD5)
	{

		$this->password = $passwordMD5;
		return true;
	}
	function setAvatar($avatar)
	{
		$this->avatar = $avatar;
		return true;
	}

	function enregistrerUser()
	{	

		$pdo = database::getConnection();
		if($this->id == null)
		{
			$rqt = 'INSERT INTO utilisateur (pseudo,password) VALUES ("'.$this->pseudo.'","'.$this->password.'")';
			$return = $pdo->query($rqt);
			$this->id = $pdo->lastInsertId();
		}
		else
		{
			$rqt = 'UPDATE utilisaeur SET pseudo = "'.$this->pseudo.'", password="'.$this->password.'", avatar="'.$this->getAvatar.'" WHERE id='.$this->id;
			$return = $pdo->query($rqt);
		}
		return $return;
	}

}
