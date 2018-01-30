<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container">
	<div id="front-jumbotron" class="jumbotron jumbotron-fluid text-center mb-3">
		<div id="font-jumbotron-text" class="container py-5 my-5">
			<h1 class="text-white display-4">The LNShop</h1>
			<p class="lead">Go read your favorite Light Novels</p>
		</div>
	</div>
</div>
<div class="container mb-5">
	<?php require APPROOT .'/views/inc/search.php'; ?>
</div>
<div class="container mb-5">
	<div class="row">
		<div class="col-12 text-center">
			<h2>Random Novels</h2>
		</div>
	</div>
	<div class="row">
        <?php foreach ($data['books'] as $book): ?>
        <div class="col-lg-3 col-md-6 col-12 mt-3 mb-3 d-flex">
            <div class="card border-secondary mb-xs-5 mt-xs-5">
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
<?php require APPROOT .'/views/inc/footer.php'; ?>