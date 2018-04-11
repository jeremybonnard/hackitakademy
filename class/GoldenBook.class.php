<?php

	class GoldenBookModel {
		
		private $id;
		private $title;
		private $text;
	    private $user_id;

	    public function __construct($id, $title, $text, $user_id) {
        	$this->id = $id;
        	$this->title = $title;
        	$this->text = $text;
        	$this->user_id = $user_id;
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

    	public function getText() {
        	return $this->text;
    	}
    	public function setText($value) {
        	$this->text = $value;
    	}

    	public function getUserId() {
        	return $this->user_id;
    	}
    	public function setUserId($value) {
        	$this->user_id = $value;
    	}


		public function listing($user_id){
			$db = Database::getConnection();
			//$sql = 'SELECT title, pseudo FROM goldenPage WHERE '
		}
	}
?>