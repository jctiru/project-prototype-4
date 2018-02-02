<?php require APPROOT . '/views/inc/header.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<a href="" class="btn btn-ligth back"><i class="fa fa-backward"></i> Back</a>
			<div class="card card-body bg-light mt-2 mb-5">
				<h2 class="text-dark">Add Book</h2>
				<p>Add book with this form</p>
				<form action="<?php echo URLROOT ?>/books/add" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<label for="image">Image <sup>*</sup> <em>Max 300KB</em></label>
								<!-- Set max upload size to 300KB before interrupting upload -->
								<input type="hidden" name="MAX_FILE_SIZE" value="300000">
								<input type="file" name="image" accept="image/*" onchange="loadFile(event)" class="form-control-file form-control-sm form-control <?php echo (!empty($data['image_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['image'] ?>">
								<span class="invalid-feedback"><?php echo $data['image_err'] ?></span>
								<hr>
								<img id="output" class="w-100">
								<script>
								  	var loadFile = function(event) {
								    	var output = document.getElementById('output');
								    	output.src = URL.createObjectURL(event.target.files[0]);
								  	};
								</script>
							</div>		
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="name">Name <sup>*</sup></label>
								<input type="text" name="name" class="form-control form-control-sm <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['name'] ?>">
								<span class="invalid-feedback"><?php echo $data['name_err'] ?></span>
							</div>
							<div class="form-group">
								<label for="body">Description: <sup>*</sup></label>
								<textarea name="description" class="form-control form-control-sm <?php echo (!empty($data['description_err'])) ? 'is-invalid' : '' ?>"><?php echo $data['description'] ?></textarea>
								<span class="invalid-feedback"><?php echo $data['description_err'] ?></span>
							</div>
							<div class="form-group">
								<label for="name">Price: <sup>*</sup></label>
								<input type="number" name="price" class="form-control form-control-sm <?php echo (!empty($data['price_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['price'] ?>">
								<span class="invalid-feedback"><?php echo $data['price_err'] ?></span>
							</div>
							<?php foreach($data['genres'] as $genre): ?>
								<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" value="<?php echo $genre->id; ?>" name="<?php echo $genre->id; ?>" id="<?php echo $genre->id; ?>" <?php echo $data['genresChecked'][$genre->id] ?>>
								<label class="custom-control-label" for="<?php echo $genre->id; ?>">
									<?php echo $genre->genre ?>
								</label>
								</div>								
							<?php endforeach; ?>
						</div>
					</div>
					<input type="submit" class="btn btn-success" name="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>

</div>
<?php require APPROOT . '/views/inc/footer.php';?>