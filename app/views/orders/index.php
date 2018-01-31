<?php require APPROOT .'/views/inc/header.php'; ?>
<div class="container py-3">
	<h1>Orders</h1>
</div>
<div class="container mt-3 mb-5 pb-5">
	<?php foreach($data['orders'] as $order): ?>
	<div class="card border-secondary card-body mb-3 text-dark">
		<h4 class="card-title">Order</h4>
		<div class="row">
			<div class="col-md-6">
				<h5>Date: <?php echo $order->order_date; ?></h5>
			</div>
			<div class="col-md-6">
				<h5>Total Cost: P<?php echo $order->total_price; ?></h5>
			</div>
		</div>
		<p class="card-text"></p>
		<a href="<?php echo URLROOT; ?>/orders/show/<?php echo $order->id ?>" class="btn btn-dark btn-sm">View Details</a>
	</div>
	<?php endforeach; ?>
</div>
<?php require APPROOT .'/views/inc/footer.php'; ?>