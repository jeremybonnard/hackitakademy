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

	function __construct($id)
	{
		$pdo = new database();
		$data = $pdo->query('SELECT * FROM user WHERE id = '.$id);
		foreach  ($data as $row) {
			$this->id = $row['id'];
			$this->pseudo = $row['pseudo'];
			$this->password = $row['password'];
			$this->avatar = $row['avatar'];
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
		$this->password = $password;
		return true;
	}
	function setAvatar($avatar)
	{
		$this->avatar = $avatar;
	}

}
