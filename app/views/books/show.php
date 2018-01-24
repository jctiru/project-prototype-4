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
              		<p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
              		<p class="card-text">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              		<a href="#" class="btn btn-primary">Read More</a>
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