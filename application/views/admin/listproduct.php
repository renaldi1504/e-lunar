
<div class="grid-form">
	<div class="grid-form1">
		<nav>
		<a href="<?php echo base_url('adminan/product/addproduct'); ?>" class="btn btn-success" id="addbtn">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add product
		</a>
		<div style="float:right;">
  		<?php echo $paging ?>
  		</div>
  		</nav>
		
		<table class="table table-hover" id="product">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Category</th>
		        <th>Name</th>
		        <th>Price</th>
		        <th>Image</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<form action="<?php echo base_url('adminan/product') ?>" method="get">
		    	<td><input type="text" class="form-control" id="id" name="id"></td>
		    	<td><input type="text" class="form-control" id="cat" name="cat"></td>
		    	<td><input type="text" class="form-control" id="name" name="name"></td>
		    	<td><input type="text" class="form-control" id="price" name="price"></td>
		    	<td>...</td>
		    	<td><button type="submit" class="btn btn-primary" value=""><i class="fa fa-search" aria-hidden="true" style="color:white"></i></button></td>
		    	</form>
		    <?php foreach ($product as $pr) {?>
		      <tr>
		        <td><?php echo $pr->product_id; ?></td>
		        <td><?php echo $pr->cat_name; ?></td>
		        <td><a class="btn-data" data-toggle="modal" data-target="#detail" data-detail="Product ID : <?php echo $pr->product_id ?> <br> Product Name : <?php echo $pr->product_name ?> <br> Category : <?php echo $pr->cat_name; ?> <br> Product Desc : <?php echo $pr->product_desc; ?> <br> Created Date : <?php echo $pr->created_date ?>"><?php echo $pr->product_name;?></a></td>
		        <td><?php echo "IDR ".number_format($pr->price); ?></td>
		        <td><button type="button" class="btn btn-info btn-imgpreview" data-toggle="modal" data-target="#imgpreview" data-imgpreview="<?php echo $pr->url_img1;?>"><i class="fa fa-camera-retro" aria-hidden="true" style="color:white"></i></button></td>
		        <td><a href="<?php echo base_url('adminan/detail/'.$pr->product_id) ?>" class="btn btn-warning" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></a>  <a href="" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a></td>
		      </tr>
		    <?php } ?>
		       
		    </tbody>
  		</table>
  		<nav>
	  		<?php echo $paging ?>
  		</nav>
		
	</div>
</div>

<!-- Modal img preview-->
		<div class="modal fade" id="imgpreview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Preview Image</h4>
			  </div>
			  <div class="modal-body">
			  	<div>
					<span id="urlimgpreview"></span>
				</div>
			  </div>
			</div>
		  </div>
		</div>

		<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Detail Product</h4>
			  </div>
			  <div class="modal-body">
			  	<div>
					<span id="data"></span>
				</div>
			  </div>
			</div>
		  </div>
		</div>

<script>
	$('#product').on('click', '.btn-imgpreview', function() {
		//alert($(this).data('imgpreview'));
		$("#urlimgpreview").html("<img src='<?php echo base_url('assets/images'); ?>/"+$(this).data('imgpreview')+"' width='100%' />");
		//$('#formpayment_ordernbr').val(urlencode($(this).data('order')));//''+$(this).data('order');						
	});
	$('#product').on('click', '.btn-data', function() {
		//alert($(this).data('imgpreview'));
		$("#data").html($(this).data('detail'));
		//$('#formpayment_ordernbr').val(urlencode($(this).data('order')));//''+$(this).data('order');						
	});
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>