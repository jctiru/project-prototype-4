<?php require APPROOT . '/views/inc/header.php';?>
<div class="container">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<a href="<?php echo URLROOT ?>/books" class="btn btn-ligth"><i class="fa fa-backward"></i> Back</a>
			<div class="card card-body bg-light mt-5 mb-5">
				<h2>Add Book</h2>
				<p>Add book with this form</p>
				<form action="<?php echo URLROOT ?>/books/add" method="POST">
					<div class="form-group">
						<label for="image">Image <sup>*</sup></label>
						<input type="file" name="image" class="form-control-file <?php echo (!empty($data['image_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['image'] ?>">
						<span class="invalid-feedback"><?php echo $data['image_err'] ?></span>
					</div>
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
					<input type="submit" class="btn btn-success" name="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>

</div>
<?php require APPROOT . '/views/inc/footer.php';?>