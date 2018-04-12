<?php

function createCommentsForm(){

	//include('class/GoldenBook.class.php');
	include_once('view/commentsForm.view.php');
	//$test = GoldenBookModel::listingComments();
}

function addComment(){

	if(isset($_SESSION['user'])){
		$user_id = $_SESSION['user'];
		$title = $_POST['title'];
		$content = $_POST['content'];
		$comment = new GoldenBook();
		$comment->createComment($title, $content, $user_id);

		header("Location : /index.php?action=commentsAllForm");
	}
	else {
		include_once('view/notConnectedResponse.view.php');
	}


}

function commentsAllForm(){
	include_once('view/commentsAllForm.view.php');
}

?>