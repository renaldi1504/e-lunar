<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
	<?php if (!empty($error)): ?>
	<p><?php echo $error ?></p>
	<?php endif ?>
<div class="grid_3 grid_5">
	<div class="but_list">
<?php echo form_open_multipart('product/uploadImage/'.$product[0]->id);?>
	<div class ="form-horizontal">
	<div class="form-group">
		<p for="focusedinput" class="col-sm-3 control-label">Add a new image to this product</p>
		<div class="col-sm-9">
			<input type="file" name="userfile" size="20" />
		</div>
	</div>
	<div class="form-group">
		<p for="focusedinput" class="col-sm-3 control-label">Caption</p>
		<div class="col-sm-9">
			<input type="text" class="form-control1" id="caption" name="caption" value="<?php echo($product[0]->name); ?>">
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
