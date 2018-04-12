<?php

class GoldenBook 
{
	private $id;
	private $title;
	private $content;
    private $user_id;

    public function __construct() {
    	$this->id = null;
    	$this->title = null;
    	$this->content = null;
    	$this->user_id = null;
	}

	function createComment($title, $content, $user_id)
	{

		$this->id = null;
		$this->title = $title;
		//$this->content = $content;
		$this->user_id = $user_id;
		$this->registerComment();
	}

	function updateComment($id, $title, $content, $user_id)
	{

		$this->id = $id;
		$this->title = $title;
		$this->content = $content;
		$this->user_id = $user_id;
		$this->registerComment();
	}


    public function getId() {
    	return $this->id;
	}
	public function setId($value) {
    	$this->id = $value;
	}

    public function getTitle() {
    	return $this->title;
	}
	public function setTitle($value) {
    	$this->title = $value;
	}

	public function getContent() {
    	return $this->content;
	}
	public function setContent($value) {
    	$this->content = $value;
	}

	public function getUserId() {
    	return $this->user_id;
	}
	public function setUserId($value) {
    	$this->user_id = $value;
	}


	public static function listingAllComments(){
		$db = database::getConnection();
		$stmt = $db->prepare("SELECT title, pseudo FROM goldenPage");
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;

	}

	public static function listingComments($user_id){
		$db = Database::getConnection();
		$sql = user_id;
		$stmt = $db->prepare("SELECT title, content FROM goldenPage WHERE userId = :user_id");
		$result = $stmt->execute(['user_id' => $user_id])->fetchAll();
		var_dump($result);
		return $result;

	}

	function registerComment()
	{	

		$pdo = Database::getConnection();
		if($this->id == null)
		{
			$result = $pdo->query('INSERT INTO goldenPage(title,content, userId) VALUES ("'.htmlentities(Security::secureVar($this->title).'","'.Security::secureVar($this->content).'","'.Security::secureVar($this->user_id).'")'));
			
		}
		else
		{
			$result = $pdo->query('UPDATE goldenPage SET title = "'.Security::secureVar($this->title).'", content="'.Security::secureVar($this->content).'", userId="'.Security::secureVar($this->user_id).'" WHERE id='.$this->id);
		}
	}
}