<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container">
	<?php flash('book_message') ?>
	<div class="row mb-3">
		<div class="col-md-6">
			<h1>Shop</h1>
		</div>
		<?php if(isset($_SESSION['admin_mode'])): ?>
			<div class="col-md-6">
				<a href="<?php echo URLROOT; ?>/books/add" class="btn btn-primary pull-right"><i class="fa fa-pencil"></i> Add Book</a>
			</div>
		<?php endif; ?>
	</div>
	<div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <?php foreach ($data['books'] as $book): ?>
                    <div class="col-lg-3 col-md-6 col-12 mt-3 mb-3 d-flex">
                        <div class="card mb-xs-5 mt-xs-5">
                            <a href="<?php echo URLROOT ?>/books/show/<?php echo $book->id ?>"><img class="card-img-top" src="<?php echo IMGSRC . $book->image; ?>"></a>
                            <div class="card-body">
                                <h4 class="card-title"><strong><a href="<?php echo URLROOT ?>/books/show/<?php echo $book->id ?>"><?php echo $book->name; ?></a></strong></h4>
                                <h6 class="card-subtitle mb-3 text-muted">
                                	<?php foreach($book->category as $category): ?>
                                		<?php echo $category . " " ?>
	                                <?php endforeach; ?>
                            	</h6>
                            </div>
                            <div class="card-footer">
								Price: <?php echo $book->price ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT .'/views/inc/footer.php'; ?>