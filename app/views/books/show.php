<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container">
	<a href="<?php echo URLROOT ?>/books" class="btn btn-ligth m-1"><i class="fa fa-backward"></i> Back</a>
	<br>
    <div class="card">
      	<div class="row ">
        	<div class="col-md-4">
            	<img src="<?php echo IMGSRC . $data['book']->image; ?>" class="w-100">
          	</div>
          	<div class="col-md-8 p-3">
            	<div class="card-block p-3">
              		<h4 class="card-title"><?php echo $data['book']->name ?></h4>
              		<h6 class="card-subtitle mb-3 text-muted">
                      <?php foreach($data['book']->category as $category): ?>
                        <?php echo $category . " " ?>
                      <?php endforeach; ?>
                  </h6>
              		<p class="card-text"><?php echo $data['book']->description ?></p>
              		<a href="#" class="btn btn-primary">Placeholder</a>
            	</div>
          	</div>
        </div>
  	</div>
	<?php if($_SESSION['user_is_admin'] == 1): ?>
		<hr>
		<a href="<?php echo URLROOT ?>/books/edit/<?php echo $data['book']->id; ?>" class="btn btn-dark">Edit</a>

		<form class="pull-right" action="<?php echo URLROOT ?>/books/delete/<?php echo $data['book']->id ?>" method="POST">
			<input type="submit" value="Delete" class="btn btn-danger">
		</form>
	<?php endif; ?>
</div>
<?php require APPROOT .'/views/inc/footer.php'; ?>