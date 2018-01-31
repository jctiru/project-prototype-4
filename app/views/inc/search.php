<form action="<?php echo URLROOT ?>/books/page/1" method="GET">
	<div class="row">
		<div class="col-md-5 mb-1">
			<input value="<?php echo isset($_GET['novel-search']) ? $_GET['novel-search'] : ''; ?>" name="novel-search" type="text" class="form-control" placeholder="Novel Name">
		</div>
		<div class="col-md-5 mb-1">
			<select name="novel-genre" class="custom-select">
		    	<option value="0">Light Novel Genre</option>
		    	<?php foreach($data['genresList'] as $genre): ?>
		    	<option <?php echo (isset($_GET['novel-genre']) && $_GET['novel-genre']==$genre->genre) ? 'selected="selected"' : ''; ?> value="<?php echo $genre->genre ?>"><?php echo $genre->genre ?></option>
		    	<?php endforeach; ?>
		    </select>
		</div>
		<div class="col-md-2 mb-1">
			<button class="btn btn-outline-dark btn-block" type="submit"><i class="fa fa-search"></i> Find Book</button>
		</div>
	</div>
</form>

