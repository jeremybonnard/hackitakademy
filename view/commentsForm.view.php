<form action="index.php?action=addComment" method="POST">
  	<fieldset>
    	<legend>Golden Book</legend>
    	<div class="form-group row">
      	<label for="staticTitle" class="col-sm-2 col-form-label">Title</label>
    	</div>
    	<div class="form-group">
      		<input type="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter the title" name="title">
      		<small id="titleHelp" class="form-text text-muted">A good Title will bring visibility</small>
    	</div>	
    	<div class="form-group">
      		<label for="exampleTextarea">Comments</label>
      		<textarea class="form-control" id="content" rows="3" name="content"></textarea>
      		<small id="titleHelp" class="form-text text-muted">We'll share your comments with everybody.</small>
    	</div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
