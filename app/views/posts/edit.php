<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container">
	<a href="<?php echo URLROOT ?>/posts" class="btn btn-ligth"><i class="fa fa-backward"></i> Back</a>
	<div class="card card-body bg-light mt-5 mb-5">
		<h2>Edit Post</h2>
		<p>Create a post with this form</p>
		<form action="<?php echo URLROOT ?>/posts/edit/<?php echo $data['id']; ?>" method="POST">
			<div class="form-group">
				<label for="title">Title <sup>*</sup></label>
				<input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : '' ?>" value="<?php echo $data['title'] ?>">
				<span class="invalid-feedback"><?php echo $data['title_err'] ?></span>
			</div>
			<div class="form-group">
				<label for="body">Body: <sup>*</sup></label>
				<textarea name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : '' ?>"><?php echo $data['body'] ?></textarea>
				<span class="invalid-feedback"><?php echo $data['body_err'] ?></span>
			</div>
			<input type="submit" class="btn btn-success" name="submit" value="Submit">
		</form>
	</div>
</div>
<?php require APPROOT .'/views/inc/footer.php'; ?>