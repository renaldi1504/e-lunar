<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
	<div class="grid-form1">
		<nav>
		<a href="<?php echo base_url('product/form/insert'); ?>" class="btn btn-success" id="addbtn">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add product
		</a>
  		</nav>
		
		<table class="table table-striped" id="product">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Image</th>
		        <th>Name</th>
		        <th>Reference</th>
		        <th>Category</th>
		        <th>Price</th>
		        <th>Status</th>
		        <th>Action</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<form action="<?php echo base_url('ngadmin/product') ?>" method="get">
		    	<td><input type="text" class="form-control" id="id" name="id"></td>
		    	<td>---</td>
		    	<td><input type="text" class="form-control" id="name" name="name"></td>
		    	<td><input type="text" class="form-control" id="reference" name="reference"></td>
		    	<td><input type="text" class="form-control" id="category" name="category"></td>
		    	<td>---</td>
		    	<td><select class="form-control" id = "status" name="status">
		    		<option value="">all</option>
		    		<option value="1">Yes</option>
		    		<option value="0">No</option>
		    	</select></td>
		    	<td><button type="submit" class="btn btn-primary" value=""><i class="fa fa-search" aria-hidden="true" style="color:white"></i></button></td>
		    	</form>
		    <?php foreach ($product as $pr) {?>
		       <tr>
		        <td><?php echo $pr->id; ?></td>
		        <td><img src="<?= base_url('assets'.'/'.$pr->path.'/'.$pr->filename) ?>" width="60" height="80"></td>
		        <td><?php echo $pr->name; ?></td>
		        <td><?php echo $pr->reference; ?></td>
		        <td><?php echo $pr->category; ?></td>
		        <td><?php echo "IDR ".number_format($pr->price); ?></td>
		        <td><?php if($pr->active == 1){ ?><a href="<?php echo base_url('product/editstatus/'.$pr->id.'/0/'.$page); ?>" class="btn-success button-admin" data-toggle="tooltip" title="enable"><i class="fa fa-check" aria-hidden="true" style="color:white"></i></a><?php }else{?>
		        	<a href="<?php echo base_url('product/editstatus/'.$pr->id.'/1/'.$page); ?>" class="btn-danger button-admin" data-toggle="tooltip" title="Disabled"><i class="fa fa-times" aria-hidden="true" style="color:white"></i></a><?php } ?>
		        </td>
		        <td><a href="<?php echo base_url('product/form/'.$pr->id) ?>" class="btn-warning button-admin" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></a>  <a href="<?php echo base_url('product/delete/'.$pr->id.'/'.$page) ?>" class="btn-danger button-admin" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a></td>
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
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
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