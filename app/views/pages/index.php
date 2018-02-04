<?php require APPROOT .'/views/inc/header.php'; ?>
<!-- Jumbotron -->
<div class="container">
    <?php flash('loginout_message') ?>
	<div id="primary-jumbotron" class="jumbotron jumbotron-fluid text-center mb-3">
		<div id="font-jumbotron-text" class="container py-5 my-5">
			<h1 class="text-white display-4 primary-jumbotron-text-shadow">The LNShop</h1>
			<p class="lead text-light">Go buy your favorite Light Novels</p>
		</div>
	</div>
</div>
<!-- Searchbar -->
<div class="container mb-5">
	<?php require APPROOT .'/views/inc/search.php'; ?>
</div>
<!-- Featuring -->
<div class="bg-dark pt-4 pb-3 mb-5 pt-md-5 pb-md-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-1 text-center mb-3 mb-md-0">
                <i class="fa fa-book fa-2x"></i>
            </div>
            <div class="col-sm-12 col-md-3 text-center text-md-left mb-3 mb-md-0">
                <p class="lead mb-0">We have a very wide selection of light novels.</p>
            </div>
            <div class="col-sm-12 col-md-1 text-center mb-3 mb-md-0">
                <i class="fa fa-usd fa-2x"></i>
            </div>
            <div class="col-sm-12 col-md-3 text-center text-md-left mb-3 mb-md-0">
                <p class="lead mb-0">Go get your light novels with competetive pricing.</p>
            </div>
            <div class="col-sm-12 col-md-1 text-center mb-3 mb-md-0">
                <i class="fa fa-line-chart fa-2x"></i>
            </div>
            <div class="col-sm-12 col-md-3 text-center text-md-left mb-3 mb-md-0">
                <p class="lead mb-0">We have up-to-date novels from all publishers.</p>
            </div>
        </div>
    </div>
</div>
<!-- CTA -->
<div class="container-fluid pb-3">    
    <div id="secondary-jumbotron" class="jumbotron">
        <h3 class="text-white">Browse through our collection of light novels</h3>
        <blockquote class="blockquote">
            <p class="mb-0">Books are a uniquely portable magic.</p>
            <div class="blockquote-footer">Stephen King</div>
        </blockquote>
        <p class="lead">
            <a class="text-white" href="<?php echo URLROOT ?>/books">Browse light novels <i class="fa fa-long-arrow-right"></i></a>
        </p>
    </div>
</div>
<!-- Random Novels Section -->
<hr style="margin: 0 5%;border-color: inherit;" class="mb-5">
<div class="container mb-5">
	<div class="row">
		<div class="col-12 text-center">
			<h2 class="text-dark">Random Novels</h2>
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
                <div class="card-footer text-dark">
					Price: P<?php echo $book->price ?>
                </div>
            </div>
        </div>
        <?php endforeach?>
    </div>
</div>
<hr style="margin: 0 5%;border-color: inherit;" class="mb-5">
<?php require APPROOT .'/views/inc/footer.php'; ?>