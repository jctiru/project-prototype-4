<?php require APPROOT . '/views/inc/header.php';?>
<div class="container">
	<div class="card mt-5 mb-5">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h5><i class="fa fa-shopping-cart fa-lg"></i> Shopping Cart</h5>
                </div>
                <div class="col-6">
                    <a href="<?php echo URLROOT; ?>/books" class="btn btn-primary btn-sm btn-block">
                        <i class="fa fa-backward"></i> Continue shopping
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-7">
                    <h3>Product</h3>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-3">
                            Price
                        </div>
                        <div class="col-3">
                            Quantity
                        </div>
                        <div class="col-4">
                            Subtotal
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($_SESSION['cart'])): ?>
            <?php foreach ($data['books'] as $book): ?>
            <hr>
            <div class="row">
                <div class="col-1"><img class="img-fluid" src="<?php echo IMGSRC . $book->image; ?>">
                </div>
                <div class="col-6">
                    <h5 class="product-name"><strong><?php echo $book->name ?></strong></h5>
                    <p><small><?php echo $book->description ?></small></p>
                </div>
                <div class="col-5">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h6 class=""><strong>P </strong><strong class="product-price"><?php echo $book->price ?></strong></h6>
                        </div>
                        <div class="col-3">
                            <input type="number" min="1" class="form-control form-control-sm product-quantity" value="<?php echo $_SESSION['cart'][$book->id] ?>">
                        </div>
                        <div class="col-3">
                            <h6><strong class="product-lineprice"><?php //echo $value ?></strong></h6>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn btn-link btn-xs product-removal">
                                <i class="fa fa-trash-o fa-2x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach?>
            <?php endif;?>
        </div>
        <div class="card-footer text-muted">
            <div class="row text-center">
                <div class="col-md-9">
                    <h4 class="text-right">Total:
                    <strong id="cartTotalCost"></strong>
                    </h4>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-block">
                        Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php';?>