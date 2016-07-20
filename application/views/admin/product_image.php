    
<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab" id="product">
	<?php if(!empty($product)): ?>
		<?php echo form_open('adminan/detail/'.$product[0]->product_id,'class="form-horizontal"','role="form"'); ?>
	<?php else: ?>
		<?php echo form_open('adminan/detail/insert','class="form-horizontal"','role="form"'); ?>
	<?php endif ?>
		<input type="hidden" name="id" value="<?php if(!empty($product)){echo $product[0]->product_id;} ?>" />
		<div class="form-group">
			<label class="col-md-2 control-label">Product Image-1</label>
			<div class="col-md-4">
				<div class="input-group">
					<input type="file" id="product_img1" name="img1" class="form-control" placeholder="Img product 1" >
				</div>
			</div>
			<div class="col-md-4">
				<?php if (!empty($product_image[0]['url_img1'])): ?>
					@<?php echo $product_image[0]['url_img1']; ?>
				<?php endif ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Image-2</label>
			<div class="col-md-4">
				<div class="input-group">
					<input type="file" id="product_img2" name="img2" class="form-control" placeholder="Img product 2" >
				</div>
			</div>
			<div class="col-md-4">
				<?php if (!empty($product_image[0]['url_img2'])): ?>
					@<?php echo $product_image[0]['url_img2']; ?>
				<?php endif ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Image-3</label>
			<div class="col-md-4">
				<div class="input-group">
					<input type="file" id="product_img3" name="img3" class="form-control" placeholder="Img product 3" >
				</div>
			</div>
			<div class="col-md-4">
				<?php if (!empty($product_image[0]['url_img3'])): ?>
					@<?php echo $product_image[0]['url_img3']; ?>
				<?php endif ?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-2 control-label">Product Image-4</label>
			<div class="col-md-4">
				<div class="input-group">
					<input type="file" id="product_img4" name="img4" class="form-control" placeholder="Img product 4" >
				</div>
			</div>
			<div class="col-md-4">
				<?php if (!empty($product_image[0]['url_img4'])): ?>
					@<?php echo $product_image[0]['url_img4']; ?>
				<?php endif ?>
			</div>
		</div>
		<div class="form-group">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="input-group">							
						<button type="submit" class="btn btn-info">Save</button>
					</div>
				</div>
			</div> 
	</form>
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
				<span id="urlimgpreview"></span>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			
			</div>
		  </div>
		</div>
<script>
	$('#product').on('click', '.btn-imgpreview', function() {
		alert($(this).data('imgpreview'));
		$("#urlimgpreview").html("<img src='<?php echo base_url('assets/images'); ?>/"+$(this).data('imgpreview')+"' width='50%' />");
		//$('#formpayment_ordernbr').val(urlencode($(this).data('order')));//''+$(this).data('order');						
	});
</script>