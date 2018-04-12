<?php
$book = new GoldenBook();
?>

<?php 
	$listcommnents = $book->listingAllComments();
	foreach ($book->listingAllComments()as $key => $comments) {
		$title = $comments["title"];
		$content = $comments["content"];
?>
		<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  			<div class="card-header"><?php echo($title); ?></div>
  			<div class="card-body">
    			<p class="card-text"><?php echo($content); ?></p>
  			</div>
  		</div>
<?php
			
		
	}
?>


