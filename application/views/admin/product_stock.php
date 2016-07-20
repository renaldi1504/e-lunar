<div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
	<a class="btn btn-success" role="button" id="add"><i class="fa fa-plus" aria-hidden="true"></i> New Stock</a>
	<table class="table table-hover" id="detail">
    <thead>
      <tr>
        <th></th>
        <th>Color</th>
        <th>Size</th>
        <th>Stock</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php if (!empty($product)): ?>
    	<?php foreach ($stock as $stock_product => $stocks): ?>
    		<tr>
		        <td><?php echo ($stock_product+1); ?></td>
		        <td><?php echo $stocks['color'] ?></td>
		        <td><?php echo $stocks['size'] ?></td>
		        <td><?php echo $stocks['stock'] ?></td>
		        <td><a href="#" class="btn btn-warning" role="button" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></a>  <a href="#" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a></td>
	      	</tr>
    	<?php endforeach ?>
    <?php endif ?>
    </tbody>
  </table>
  <div id="newStock" style="display:none;">
    	<form role="form" class="form-horizontal">
			<div class="form-group">
				<label class="col-md-2 control-label">Color</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-envelope-o"></i>
						</span>
						<input type="text" class="form-control1" value="" placeholder="Color">
					</div>
				</div>
			</div> 
			<div class="form-group">
				<label class="col-md-2 control-label">Size</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-envelope-o"></i>
						</span>
						<input type="text" class="form-control1" value="" placeholder="Size">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label">Stock</label>
				<div class="col-md-8">
					<div class="input-group">							
						<span class="input-group-addon">
							<i class="fa fa-envelope-o"></i>
						</span>
						<input type="text" class="form-control1" value="Stock" placeholder="Product Name">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="input-group">							
						<button type="button" class="btn btn-info">Save</button>
						<a class="btn btn-default" role="button" id="back" style="margin-left:10px"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Cancel</a>
					</div>
				</div>
			</div> 
		</form>
    </div>
</div>

<script>
	$("#add").click(function(){
		$("#detail").hide();
		$('#add').hide();
		$('#newStock').show();
	});
	$("#back").click(function(){
		$("#detail").show();
		$('#add').show();
		$('#newStock').hide();
	});
</script>