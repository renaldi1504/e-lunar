<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
	<?php echo validation_errors(); ?>
<div class="grid_3 grid_5">
	<div class="but_list">
<?php echo form_open_multipart('product/add_stock/'.$product[0]->id);?>
	<div class ="form-horizontal">
	<div class="form-group">
		<p for="focusedinput" class="col-sm-3 control-label">Product Name</p>
		<div class="col-sm-9">
			<input type="text" class="form-control1" id="name" name="name" value="<?php echo $product[0]->name ?>" disabled>
		</div>
	</div>
	<div class="form-group">
		<p for="focusedinput" class="col-sm-3 control-label">Color</p>
		<div class="col-sm-9">
			<input type="text" class="form-control1" id="color" name="color" value="">
		</div>
	</div>
	<div class="form-group">
		<p for="focusedinput" class="col-sm-3 control-label">Size</p>
		<div class="col-sm-9">
			<input type="text" class="form-control1" id="size" name="size" value="">
		</div>
	</div>
	<div class="form-group">
		<p for="focusedinput" class="col-sm-3 control-label">Quantity</p>
		<div class="col-sm-9">
			<input type="text" class="form-control1" id="qty" name="qty" value="">
		</div>
	</div>
	<div class="form-group">
		<label for="focusedinput" class="col-sm-3 control-label"></label>
		<div class="col-sm-4 form-group1">
			<input class="btn btn-success btn-large" type="submit" value="Save">
			<a href="<?php echo base_url('product/form/'.$product[0]->id) ?>" class="btn btn-warning btn-large">Cancel</a>
		</div>
	</div>
</div>
</form>
	</div>
</div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
