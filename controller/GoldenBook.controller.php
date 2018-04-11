<?php

function createCommentsForm(){

	//include('class/GoldenBook.class.php');
	include('view/commentsForm.view.php');
	//$test = GoldenBookModel::listingComments();
}

function addComment($user_id){

	$title = $_POST['title'];
	$content = $_POST['content'];
	include('class/GoldenBook.class.php');
	$comment = new GoldenBook();
	$comment->createComment($title, $content, $user_id);

}

?>