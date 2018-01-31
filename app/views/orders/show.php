<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container mb-5">
    <a href="" class="btn btn-ligth mb-2 back"><i class="fa fa-backward"></i> Back</a>
    <br>
	<div id="cart-section" class="card border-secondary">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-md-0 mb-sm-2"><i class="fa fa-list-alt fa-lg"></i> Order Details</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-0"><i class="fa fa-calendar" fa-lg"></i> Order Date: <?php echo $data['orderDate'] ?></h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3 class="mb-0">Item</h3>
                </div>
                <div class="col-md-5">
                    <div class="row text-center">
                        <div class="col-md-3 text-dark">
                            Price
                        </div>
                        <div class="col-md-3 text-dark">
                            Quantity
                        </div>
                        <div class="col-md-3 text-dark">
                            Subtotal
                        </div>
                    </div>
                </div>
            </div>
            <?php foreach ($data['books'] as $book): ?>
            <div id="bookRowId_<?php echo $book->id ?>">
                <hr>                
                <div class="row">
                    <div class="col-md-1"><a href="<?php echo URLROOT ?>/books/show/<?php echo $book->id ?>"><img class="img-fluid" src="<?php echo IMGSRC . $book->image; ?>"></a>
                    </div>
                    <div class="col-md-6">
                        <h5 class="product-name mb-0"><strong><a href="<?php echo URLROOT ?>/books/show/<?php echo $book->id ?>"><?php echo $book->name ?></a></strong></h5>
                        <p class="text-muted mb-0">
                            <?php foreach($book->category as $genre): ?>
                                <?php echo $genre . " " ?>
                            <?php endforeach; ?>    
                            </p>
                    </div>
                    <div class="col-md-5">
                        <div class="row align-items-center text-center">
                            <div class="col-md-3">
                                <h6 class="mb-0"><strong>P<?php echo $book->price ?></strong></h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-0"><strong><?php echo $book->quantity; ?></strong></h6>
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-0"><strong>P<?php echo $book->linePrice; ?></strong></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach?>
        </div>
        <div class="card-footer text-muted">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h4 class="text-right mb-0">Total:
                    <strong>
                        <?php echo 'P'.$data['totalPrice'] ?>
                    </strong>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT .'/views/inc/footer.php'; ?>