<div class="container-fluid my-5">
  <div class="row">
    <div class="col-md-12">	
	  <?php if ($data['totalPages'] > 1): ?>
		  <ul class="pagination justify-content-center">
			<!-- Link of the first page -->
			<li class='page-item <?php ($data['page'] <= 1 ? print 'disabled' : '') ?>'>
			  <a class='page-link' href='<?php echo URLROOT ?>/orders/page/1'>&laquo;</a>
			</li>
			<!-- Link of the previous page -->
			<li class='page-item <?php ($data['page'] <= 1 ? print 'disabled' : '') ?>'>
			  <a class='page-link' href='<?php echo URLROOT ?>/orders/page/<?php ($data['page'] > 1 ? print($data['page'] - 1) : print 1) ?>'>&lsaquo;</a>
			</li>
			<!-- Links of the pages with page number -->
			<?php for ($i = $data['start']; $i <= $data['end']; $i++): ?>
			<li class='page-item <?php ($i == $data['page'] ? print 'active' : '')?>'>
			  <a class='page-link' href='<?php echo URLROOT ?>/orders/page/<?php echo $i; ?>'><?php echo $i; ?></a>
			</li>
			<?php endfor; ?>
			<!-- Link of the next page -->
			<li class='page-item <?php ($data['page'] >= $data['totalPages'] ? print 'disabled' : '')?>'>
			  <a class='page-link' href='<?php echo URLROOT ?>/orders/page/<?php ($data['page'] < $data['totalPages'] ? print($data['page'] + 1) : print $data['totalPages'])?>'>&rsaquo;</a>
			</li>
			<!-- Link of the last page -->
			<li class='page-item <?php ($data['page'] >= $data['totalPages'] ? print 'disabled' : '')?>'>
			  <a class='page-link' href='<?php echo URLROOT ?>/orders/page/<?php echo $data['totalPages'] ?>'>&raquo;
			  </a>
			</li>
		  </ul>
	   <?php endif;?>
	</div>
 </div>
</div>