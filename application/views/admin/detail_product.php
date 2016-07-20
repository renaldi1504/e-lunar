<div class="grid-form">
	<div class="grid-form1">
		 <div class="grid_3 grid_5">
	     <h4 class="head-top"><?php if (!empty($product)): ?>Category <?php echo $product[0]->category; ?><?php else: ?>Add New Product<?php endif ?></h4>
	     <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Product Detail</a></li>
			  <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Product Image</a></li>
			  <li role="presentation">
			    <a href="#dropdown1" role="tab" id="myTabDrop1" class="" data-toggle="tab" aria-controls="dropdown1">Product Stock</a>
			  </li>
			</ul>
			<div id="myTabContent" class="tab-content">
   			   	<?php echo validation_errors(); ?>
			  	<?php include('product_detail.php'); ?>
			 	<?php include('product_image.php'); ?>
			  	<?php include('product_stock.php'); ?>
			</div>
   </div>
   </div>
  </div>
 
	</div>
</div>