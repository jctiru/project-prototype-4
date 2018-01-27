<?php require APPROOT . '/views/inc/header.php';?>
<div class="container mt-5 mb-5">
	<div id="cart-section" class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0"><i class="fa fa-shopping-cart fa-lg"></i> Shopping Cart</h5>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo URLROOT; ?>/books" class="btn btn-primary btn-sm btn-block">
                        <i class="fa fa-backward"></i> Continue shopping
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3 class="mb-0">Product</h3>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3">
                            Price
                        </div>
                        <div class="col-md-3">
                            Quantity
                        </div>
                        <div class="col-md-4">
                            Subtotal
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($_SESSION['cart'])): ?>
            <form method="POST" action="" id="cart-form">          
                <?php foreach ($data['books'] as $book): ?>
                <hr>
                <div class="row">
                    <div class="col-md-1"><img class="img-fluid" src="<?php echo IMGSRC . $book->image; ?>">
                    </div>
                    <div class="col-md-6">
                        <h5 class="product-name"><strong><?php echo $book->name ?></strong></h5>
                        <p><small><?php //echo $book->description ?></small></p>
                    </div>
                    <div class="col-md-5">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <h6 class="mb-0"><strong>P<?php echo $book->price ?></strong></h6>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="bookQuantityId_<?php echo $book->id ?>" min="1" class="form-control form-control-sm product-quantity" value="<?php echo $_SESSION['cart'][$book->id] ?>">
                            </div>
                            <div class="col-md-3">
                                <h6 class="mb-0"><strong id="bookLinePrice_<?php echo $book->id ?>">P<?php echo $book->linePrice; ?></strong></h6>
                            </div>
                            <div class="col-md-3 text-center">
                                <button type="button" class="btn btn-link btn-sm">
                                    <i class="fa fa-trash-o fa-2x"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </form>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h6 class="text-right mb-0">Added items?</h6>
                </div>
                <div class="col-md-3">
                    <button type="submit" disabled id="update-cart-button" form="cart-form" class="btn btn-outline-primary btn-sm btn-block">
                        <i class="fa fa-refresh"></i> Update Cart
                    </button>
                </div>
            </div>     
            <?php endif;?>
        </div>
        <div class="card-footer text-muted">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h4 class="text-right mb-0">Total:
                    <strong id="cart-total-cost">
                        <?php if(!empty($_SESSION['cart'])): ?>
                            <?php echo 'P' . $data['totalPrice']; ?>
                        <?php endif; ?>
                    </strong>
                    </h4>
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-success btn-block">
                        <i class="fa fa-shopping-basket"></i> Checkout
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Used for loading -->
    <img id="throbber" style="display: none;" src="<?php echo IMGSRC ?>ajax-loader-2.svg">
</div>
<?php require APPROOT . '/views/inc/footer.php';?>