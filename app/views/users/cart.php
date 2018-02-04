<?php require APPROOT . '/views/inc/header.php';?>
<!-- Jumbotron -->
<div class="container">    
    <div id="users-cart-jumbotron" class="jumbotron text-center py-4 mb-3">
        <h1 class="text-white jumbotron-text-shadow">Cart</h1>
    </div>
</div>
<div class="container mt-2 mb-5 pb-5">
    <?php flash('checkout_message') ?>
    <div id="cart-alert" style="display: none;" class="alert alert-dismissible alert-success fade show">
        <button type="button" class="close" id="cart-alert-close">&times;</button>
        <strong id="cart-message"></strong>
    </div>
	<div id="cart-section" class="card border-secondary">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0"><i class="fa fa-shopping-cart fa-lg"></i> Shopping Cart</h5>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo URLROOT; ?>/books" class="btn btn-dark btn-sm btn-block">
                        <i class="fa fa-backward"></i> Continue shopping
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h3 class="mb-0">Item</h3>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-3 text-dark">
                            Price
                        </div>
                        <div class="col-md-3 text-dark">
                            Quantity
                        </div>
                        <div class="col-md-4 text-dark">
                            Subtotal
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($_SESSION['cart'])): ?>
            <form method="POST" action="" id="cart-form">          
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
                                    <button data-index="<?php echo $book->id ?>" type="button" class="btn btn-link btn-sm cart-delete-button">
                                        <i class="fa fa-trash-o fa-2x"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </form>
            <div id="cart-update-footer">
                <hr>
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h6 class="text-right mb-0">Added items?</h6>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" disabled id="update-cart-button" form="cart-form" class="btn btn-outline-dark btn-sm btn-block">
                            <i class="fa fa-refresh"></i> Update Cart
                        </button>
                    </div>
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
                        <?php else: ?>
                        P0    
                        <?php endif; ?>
                    </strong>
                    </h4>
                </div>
                <div class="col-md-3">
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <form method="POST" action="<?php echo URLROOT ?>/users/checkout">
                        <button id="checkout-button" type="submit" <?php echo (isset($_SESSION['cart']) && array_sum($_SESSION['cart'])>0) ? '' : 'disabled'; ?> class="btn btn-success btn-block">
                            <i class="fa fa-shopping-basket"></i> Checkout
                        </button>
                    </form>
                    <?php else: ?>
                        <!-- Button trigger modal -->
                        <button id="checkout-button" type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#cartModal" <?php echo (isset($_SESSION['cart']) && array_sum($_SESSION['cart'])>0) ? '' : 'disabled'; ?>>
                            <i class="fa fa-shopping-basket"></i> Checkout
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Login</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Eyeing a book? Come and log-in to start shopping!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a class="btn btn-primary pull-right" href="<?php echo URLROOT ?>/users/login">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Used for loading -->
    <img id="throbber" style="display: none;" src="<?php echo IMGSRC ?>ajax-loader-2.svg">
</div>
<?php require APPROOT . '/views/inc/footer.php';?>