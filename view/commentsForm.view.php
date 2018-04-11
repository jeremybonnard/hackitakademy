

	 <!--<title>Titre de la page</title>-->
  <!--<link rel="stylesheet" href="style.css">-->
  <!--<script src="script.js"></script>-->
<form method="post" action="action="index.php?action=userCreateResponse"">
  	<fieldset>
    	<legend>Golden Book</legend>
    	<div class="form-group row">
      	<label for="staticTitle" class="col-sm-2 col-form-label">Title</label>
    	</div>
    	<div class="form-group">
      		<input type="title" class="form-control" id="InputTitle" aria-describedby="titleHelp" placeholder="Enter the title">
      		<small id="titleHelp" class="form-text text-muted">A good Title will bring visibility</small>
    	</div>	
    	<div class="form-group">
      		<label for="exampleTextarea">Comments</label>
      		<textarea class="form-control" id="extarea" rows="3"></textarea>
      		<small id="titleHelp" class="form-text text-muted">We'll share your comments with everybody.</small>
    	</div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
