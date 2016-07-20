<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
<?php echo validation_errors(); ?>
<div class="grid_3 grid_5">
	<div class="but_list">

	<?php if (empty($category)): ?>
		  		<form method="POST" action="<?php echo base_url('category/insert') ?>" accept-charset="UTF-8" class ="form-horizontal">
		  	<?php else: ?>
		  		<form method="POST" action="<?php echo base_url('category/update/'.$category[0]->link_rewrite) ?>" accept-charset="UTF-8" class ="form-horizontal">
		  	<?php endif ?>
				
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="name" name="name" placeholder="Category Name" value="<?php if(!empty($category)){ echo($category[0]->name); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Meta Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="metatitle" name="metatitle" placeholder="Meta Tittle" value="<?php if(!empty($category)){ echo($category[0]->meta_title); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Description</label>
						<div class="col-sm-9 form-group1">
							<textarea id="description" name="description"><?php if(!empty($category)){ echo($category[0]->description); }  ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Position</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="position" name="position" placeholder="Position" value="<?php if(!empty($category)){ echo($category[0]->position); }  ?>">
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

	</div>
</div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
