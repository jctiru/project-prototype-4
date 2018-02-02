<?php require APPROOT .'/views/inc/header.php'; ?>
<!-- Jumbotron -->
<div class="container">    
    <div id="orders-index-jumbotron" class="jumbotron text-center py-4 mb-3">
        <h1 class="text-white jumbotron-text-shadow">Orders History</h1>
    </div>
</div>
<div class="container mt-1 mb-5">
	<?php foreach($data['orders'] as $order): ?>
	<div class="card border-secondary">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-md-0 mb-sm-2"><i class="fa fa-list-ul"></i>Order</h4>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-0"><?php echo isset($_SESSION['admin_mode']) ? '<i class="fa fa-user"></i>CustomerID: '.$order->customer_id : ''; ?></h4>
                </div>
            </div>
        </div>
        <div class="card-body my-2">
            <div class="row align-items-center">
        		<div class="col-md-6">
					<h5 class="mb-0"><i class="fa fa-calendar"></i>Date: <?php echo $order->order_date; ?></h5>
				</div>
				<div class="col-md-6">
					<h5 class="mb-0"><i class="fa fa-money"></i>Total Cost: P<?php echo $order->total_price; ?></h5>
				</div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <a href="<?php echo URLROOT; ?>/orders/show/<?php echo $order->id ?>" class="btn btn-block btn-dark btn-sm">View Details</a>
        </div>
    </div>
    <hr style="margin: 0 5%;border-color: inherit;" class="my-3 border-secondary">
    <?php endforeach?>
</div>
<?php require APPROOT .'/views/inc/paginationorders.php'; ?>
<?php require APPROOT .'/views/inc/footer.php'; ?>