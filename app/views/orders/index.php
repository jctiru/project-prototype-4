<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container pt-3 pb-1">
	<h1 class="text-dark"><i class="fa fa-list-alt fa-lg"></i>Orders</h1>
</div>
<div class="container mt-1 mb-5">
	<?php foreach($data['orders'] as $order): ?>
	<div class="card border-dark card-body mb-3 text-dark">
		<div class="row">
			<div class="col-md-6">
				<h4 class="card-title"><i class="fa fa-list-ul"></i>Order</h4>
			</div>
			<div class="col-md-6">
				<h4 class="card-title"><?php echo isset($_SESSION['admin_mode']) ? '<i class="fa fa-user"></i>CustomerID: '.$order->customer_id : ''; ?></h4>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<h5><i class="fa fa-calendar"></i>Date: <?php echo $order->order_date; ?></h5>
			</div>
			<div class="col-md-6">
				<h5><i class="fa fa-money"></i>Total Cost: P<?php echo $order->total_price; ?></h5>
			</div>
		</div>
		<p class="card-text"></p>
		<a href="<?php echo URLROOT; ?>/orders/show/<?php echo $order->id ?>" class="btn btn-dark btn-sm">View Details</a>
	</div>
	<hr style="margin: 0 5%;border-color: inherit;" class="mb-3 border-dark">
	<?php endforeach; ?>
</div>
<?php require APPROOT .'/views/inc/paginationorders.php'; ?>
<?php require APPROOT .'/views/inc/footer.php'; ?>