<?php require_once(APPPATH.'views/admin/content/header.php'); ?>

<div class="grid-form">
<?php echo validation_errors(); ?>

    <div class="grid_3 grid_5">
	    <div class="but_list">
	    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation"><a href="#info" role="tab" id="info-tab" data-toggle="tab" aria-controls="info">INFO</a></li>
			  <li role="presentation"><a href="#price" role="tab" id="price-tab" data-toggle="tab" aria-controls="price">PRICES & SHIPPING</a></li>
			  <li role="presentation"><a href="#seo" role="tab" id="seo-tab" data-toggle="tab" aria-controls="seo">SEO & ASSOCIATIONS</a></li>
			  
			  <li role="presentation"><a href="#quantities" role="tab" id="quantities-tab" data-toggle="tab" aria-controls="quantities">QUANTITIES</a></li>
			  <li role="presentation"><a href="#images" role="tab" id="images-tab" data-toggle="tab" aria-controls="images">IMAGES</a></li>
			</ul>
		<div id="myTabContent " class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="info" aria-labelledby="info-tab">
		  	<?php if (empty($product)): ?>
		  		<form method="POST" action="<?php echo base_url('product/addProduct') ?>" accept-charset="UTF-8" class ="form-horizontal">
		  	<?php else: ?>
		  		<form method="POST" action="<?php echo base_url('product/updateProduct/'.$product[0]->id) ?>" accept-charset="UTF-8" class ="form-horizontal">
		  	<?php endif ?>
				
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="name" name="name" placeholder="Product Name" value="<?php if(!empty($product)){ echo($product[0]->name); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Reference</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="reference" name="reference" placeholder="Reference product" value="<?php if(!empty($product)){ echo($product[0]->reference); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Enabled</label>
						<div class="col-sm-9 form-group2">
							<select  id="status" name="status">
								<option value="0" <?php if(!empty($product)){ if($product[0]->active != 1){echo set_select('status',$product[0]->active, TRUE);}} ?>>No</option>
								<option value="1" <?php if(!empty($product)){ if($product[0]->active == 1){echo set_select('status',$product[0]->active, TRUE);}} ?>>Yes</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Available</label>
						<div class="col-sm-9 form-group2">
							<select  id="available" name="available">
								<option value="1" <?php if(!empty($product)){ if($product[0]->available_for_order == 1){echo set_select('available',$product[0]->available_for_order, TRUE);}} ?>>Yes</option>
								<option value="0" <?php if(!empty($product)){ if($product[0]->available_for_order != 1){echo set_select('available',$product[0]->available_for_order, TRUE);}} ?>>No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Show Price</label>
						<div class="col-sm-9 form-group2">
							<select  id="showprice" name="showprice">
								<option value="1" <?php if(!empty($product)){ if($product[0]->show_price == 1){echo set_select('showprice',$product[0]->show_price, TRUE);}} ?>>Yes</option>
								<option value="0" <?php if(!empty($product)){ if($product[0]->show_price != 1){echo set_select('showprice',$product[0]->show_price, TRUE);}} ?>>No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Condition</label>
						<div class="col-sm-9 form-group2">
							<select  id="condition" name="condition">
								<option value="new" <?php if(!empty($product)){ if($product[0]->condition == 'new'){echo set_select('condition',$product[0]->condition, TRUE);}} ?>>New</option>
								<option value="used" <?php if(!empty($product)){ if($product[0]->condition == 'used'){echo set_select('condition',$product[0]->condition, TRUE);}} ?>>Used</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-9 form-group1">
							<textarea id="description" name="description"><?php if(!empty($product)){ echo($product[0]->description); }  ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label"></label>
						<div class="col-sm-9 form-group1">
							<input class="btn btn-success btn-large" type="submit" value="Save">
							<a href="<?php echo base_url('ngadmin/product/1') ?>" class="btn btn-warning btn-large">Cancel</a>
						</div>
					</div>
		    	<div class="clearfix"></div>
		  </div>
		  <div role="tabpanel" class="tab-pane fade" id="price" aria-labelledby="price-tab">
		 
		  	<div class ="form-horizontal">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Price</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="price" name="price" placeholder="Price" value="<?php if(!empty($product)){ echo($product[0]->price); }  ?>">
						</div>
					</div>
					<div class="form-group">
					<label for="focusedinput" class="col-sm-3 control-label">Package Width</label>
					<div class="col-sm-9 form-group1">
						<div class="input-group">							
							<span class="input-group-addon">
								cm
							</span>
							<input type="text" class="form-control1" id="width" name="width" value = "<?php if(!empty($product)){ echo($product[0]->width); }  ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="focusedinput" class="col-sm-3 control-label">Package Height</label>
					<div class="col-sm-9 form-group1">
						<div class="input-group">							
							<span class="input-group-addon">
								cm
							</span>
							<input type="text" class="form-control1" id="height" name="height" value = "<?php if(!empty($product)){ echo($product[0]->height); }  ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="focusedinput" class="col-sm-3 control-label">Package Depth</label>
					<div class="col-sm-9 form-group1">
						<div class="input-group">							
							<span class="input-group-addon">
								cm
							</span>
							<input type="text" class="form-control1" id="depth" name="depth" value ="<?php if(!empty($product)){ echo($product[0]->depth); }  ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="focusedinput" class="col-sm-3 control-label">Package Weight</label>
					<div class="col-sm-9 form-group1">
						<div class="input-group">							
							<span class="input-group-addon">
								kg
							</span>
							<input type="text" class="form-control1" id="weight" name="weight" value="<?php if(!empty($product)){ echo($product[0]->weight); }  ?>">
						</div>
					</div>
				</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label"></label>
						<div class="col-sm-9 form-group1">
							<input class="btn btn-success btn-large" type="submit" value="Save">
							<a href="<?php echo base_url('ngadmin/product/1') ?>" class="btn btn-warning btn-large">Cancel</a>
						</div>
					</div>
			</div>
		    	<div class="clearfix"></div>
		  </div>
		  <div role="tabpanel" class="tab-pane fade" id="seo" aria-labelledby="seo-tab">
		  	<div class ="form-horizontal">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Meta Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="metatitle" name="metatitle" placeholder="Meta Tittle" value="<?php if(!empty($product)){ echo($product[0]->meta_title); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Meta Description</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="metadesc" name="metadesc" placeholder="Meta Description" value="<?php if(!empty($product)){ echo($product[0]->meta_description); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Asociations</label>
						<div class="col-sm-9">
							<div>
							<ul>
							<?php foreach ($category as $key => $parent): ?>
								<li class="trees-toggle">
									<input class="#" name="category_id[]" type="checkbox" value="<?php echo $parent->id ?>" <?php if(!empty($product)){ 
									 if($product[0]->category_default_id == $parent->id){echo set_checkbox('category_id[]',$parent->id,TRUE);}
									} ?>/>
									<label for="<?php echo $parent->id ?>"><?php echo $parent->name ?></label>
								</li>	
							<?php endforeach ?>
							</ul>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Default Category</label>
						<div class="col-sm-9 form-group2">
							<select  id="category_default_id" name="category_default_id">
								<?php if (!empty($category)) {
									foreach ($category as $key => $cate) {
										 if($product[0]->category_default_id == $cate->id){
										?>
										<option value ="<?php echo $cate->id; ?>"><?php echo $cate->name ?></option>
								<?php	}}
								} ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label"></label>
						<div class="col-sm-9 form-group1">
							<input class="btn btn-success btn-large" type="submit" value="Save">
							<a href="<?php echo base_url('ngadmin/product/1') ?>" class="btn btn-warning btn-large">Cancel</a>
						</div>
					</div>
				</div>
		    	<div class="clearfix"></div>
		    		</form>
		  </div>
		  </form>
		  <div role="tabpanel" class="tab-pane fade" id="quantities" aria-labelledby="quantities-tab">
		  	<?php if (empty($product)): ?>
		  		<div class="alert alert-success" role="alert">
		        	You must save this product before add quantities
		       </div>
		    <?php else :?>
		    <form method="POST" action="<?php echo base_url('product/updateStock/'.$product[0]->id) ?>" accept-charset="UTF-8" class ="form-horizontal">
		    <div class ="form-horizontal">
		    	<table class="table" id="product">
		    		<a href="<?php echo base_url('product/add_stock/'.$product[0]->id) ?>" class="btn btn-warning btn-large">Add Quantity</a>
				    <thead>
				      <tr>
				      	<th>id</th>
				        <th>Name</th>
				        <th>Color</th>
				        <th>Size</th>
				        <th>Stock</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php foreach ($stocks as $key => $qty): ?>
				    	<tr>
				    		<td><input type="text" class="form-control1" name="id[]" value = "<?php echo $qty->id ?>" hidden><?php echo $qty->id ?></td>
				    		<td><?php echo $product[0]->name ?></td>
				    		<td><input type="text" class="form-control1" name="color[]" value = "<?php echo $qty->color ?>"></td>
				    		<td><input type="text" class="form-control1" name="size[]" value = "<?php echo $qty->size ?>"></td>
				    		<td><input type="text" class="form-control1" name="stock[]" value = "<?php echo $qty->quantity ?>"></td>
				    		<td><a href="<?php echo base_url('product/stock/delete/'.$product[0]->id.'/'.$qty->id) ?>" class="btn-danger button-admin" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a></td>
				    	</tr>
				    	<?php endforeach ?>
				    </tbody>
				</table>
				<div class="form-group">
					<label for="focusedinput" class="col-sm-3 control-label"></label>
					<div class="col-sm-9 form-group1">
						<input class="btn btn-success btn-large" type="submit" value="Save">
						<a href="<?php echo base_url('ngadmin/product/1') ?>" class="btn btn-warning btn-large">Cancel</a>
					</div>
				</div>
			</div>
			</form>
		  	<?php endif ?>
		  	<div class="clearfix"></div>
		  </div>
		  <div role="tabpanel" class="tab-pane fade" id="images" aria-labelledby="images-tab">
		  	<?php if (empty($product)): ?>
		  		<div class="alert alert-success" role="alert">
		        	You must save this product before add quantities
		       </div>
		    <?php else :?>
		     <form method="POST" action="<?php echo base_url('product/updateImage/'.$product[0]->id) ?>" accept-charset="UTF-8" class ="form-horizontal">
		    	<table class="table" id="product">
		    		<a href="<?php echo base_url('product/image/'.$product[0]->id) ?>" class="btn btn-warning btn-large">Upload Image</a>
				    <thead>
				      <tr>
				      	<th>ID</th>
				        <th>Image</th>
				        <th>Caption</th>
				        <th>Position</th>
				        <th>Cover</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php foreach ($medias as $key => $image): ?>
				    	<tr>
				    		<td><input type="text" class="form-control1" name="id[]" value = "<?php echo $image->id ?>" hidden><?php echo $image->id ?></td>
				    		<td><img src="<?php echo base_url('assets/'.$image->path.'/'.$image->filename) ?>" height="171" width="100"></td>
				    		<td><?php echo $image->caption ?></td>
				    		<td><input type="text" class="form-control1" name="position[]" value = "<?php echo $image->position ?>"></td>
				    		<td><input type="text" class="form-control1" name="cover[]" value = "<?php echo $image->cover ?>"></td>
				    		<td><a href="<?php echo base_url('product/image/delete/'.$product[0]->id.'/'.$image->id) ?>" class="btn-danger button-admin" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a></td>
				    	</tr>
				    	<?php endforeach ?>
				    </tbody>
				</table>
				<div class="clearfix"></div>
				 <div class ="form-horizontal">
					<div class="form-group">
						<div class="col-sm-3 form-group1">
							
						</div>
						<div class="col-sm-9 form-group1">
							<input class="btn btn-success btn-large" type="submit" value="Save">
							<a href="<?php echo base_url('ngadmin/product/1') ?>" class="btn btn-warning btn-large">Cancel</a>
						</div>
					</div>
				</div>
			</form>	
		  	<?php endif ?>
		  </div>
   		</div>
   		</div>
   
  </div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$(":checkbox").on('click', function(){
			if(this.checked)
			{
				$('#category_default_id').append('<option value="'+$(this).val()+'"> '+$("label[for='"+$(this).val()+"']").html()+'</option>');
			}
			else
			{
				$('#category_default_id option[value='+$(this).val()+']').remove();
			}
		});
		$('#category_default_id option').each(function(){
			var optionValues = [];
			optionValues.push($(this).val());
			$('input:checkbox[value="' + optionValues+'"]').atr('checked',true);
		});

	});
</script>