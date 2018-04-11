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

		$this->id = null;
		$this->pseudo = $pseudo;
		$this->password = $password;
		$this->avatar = null;
		$this->enregistrerUser();
	}

	function chargerUser($id)
	{	
		$pdo = database::getConnection();
		$data = $pdo->query('SELECT * FROM user WHERE id = '.database::secureVar($id).'');
		foreach  ($data as $row) {
			$this->setId($row['id']);
			$this->setPseudo($row['pseudo']);
			$this->setPasswordMD5($row['password']);
			$this->setAvatar($row['avatar']);
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
		$this->password = $password;
	}
	function setAvatar($avatar)
	{
		$this->avatar = $avatar;
	}

	function enregistrerUser()
	{	

		$pdo = database::getConnection();
		if($this->id == null)
		{
			$return = $pdo->query('INSERT INTO user(pseudo,password) VALUES ("'.htmlentities($this->pseudo).'","'.database::secureVar($this->password).'")');
			$this->id = $pdo->lastInsertId;
		}
		else
		{
			$return = $pdo->query('UPDATE user SET pseudo = "'.$this->pseudo.'", password="'.$this->password.'", avatar="'.$this->avatar.'" WHERE id='.$this->id);
		}
		return $return;
	}

}
