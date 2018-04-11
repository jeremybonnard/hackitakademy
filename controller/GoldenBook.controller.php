<?php

function showComments(){

	include('class/GoldenBook.class.php');
	include('view/commentsForm.view.php');
	$test = GoldenBookModel::listingComments();
}


?>