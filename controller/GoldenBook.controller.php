<?php

function createCommentsForm(){

	//include('class/GoldenBook.class.php');
	include_once('view/commentsForm.view.php');
	//$test = GoldenBookModel::listingComments();
}

function addComment(){

	if(isset($_SESSION['user'])){
		$user_id = $_SESSION['user'];
		var_dump($_SESSION['user']);
		$title = $_POST['title'];
		$content = $_POST['content'];
		include_once('class/GoldenBook.class.php');
		$comment = new GoldenBook();
		$comment->createComment($title, $content, $user_id);
		var_dump($comment->listingAllComments());
	}
	else {
		include_once('view/notConnectedResponse.view.php');
	}


}

?>