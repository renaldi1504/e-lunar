<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
<?php if (!empty($error)): ?>
	<p><?php echo $error ?></p>
<?php endif ?>	
<?php echo validation_errors(); ?>
<div class="grid_3 grid_5">
	<div class="but_list">
			<?php if (empty($banner)): ?>
				<form enctype="multipart/form-data" method="POST" action="<?=base_url('admin/banner/insert')?>" class ="form-horizontal">
		  	<?php else: ?>
		  		<form enctype="multipart/form-data" method="POST" action="<?=base_url('admin/banner/update/'.$banner->id)?>" class ="form-horizontal">

		  	<?php endif ?>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Banner Type</label>
						<div class="col-sm-9 form-group2">
							<select  id="type" name="type">
								<option value="Homeslider" <?php if(!empty($banner)){ if($banner->type == 'Homeslider'){echo set_select('type',$banner->type, TRUE);}} ?>>HomeSlider</option>
								<option value="Midhome" <?php if(!empty($product)){ if($banner->type == 'Midhome'){echo set_select('available',$banner->type, TRUE);}} ?>>MidHome</option>
								<option value="Bottomhome" <?php if(!empty($product)){ if($banner->type == 'Bottomhome'){echo set_select('type',$banner->type, TRUE);}} ?>>BottomHome</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Banner Image</label>
						<div class="col-sm-9">
							<?php if (!empty($banner)): ?>
								<img src="<?=base_url('assets/'.$banner->image_web)?>" alt="" width="300" style="padding-bottom:20px">
							<?php endif ?>
							<input type="file" name="userfile" size="20" />
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label" id="label"  style="display:none;">Noted</label>
						<div class="col-sm-9 form-group1">
							<input type="text" style="display:none;" class="form-control1" id="noted" name="noted" placeholder="Noted" value="<?php if(!empty($banner)){ echo($banner->note); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Title</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="title" name="title" placeholder="Title" value="<?php if(!empty($banner)){ echo($banner->title); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Enabled</label>
						<div class="col-sm-9 form-group2">
							<select  id="status" name="status">
								<option value="1" <?php if(!empty($banner)){ if($banner->status == 1){echo set_select('status',$banner->status, TRUE);}} ?>>Yes</option>
								<option value="0" <?php if(!empty($product)){ if($banner->status != 1){echo set_select('status',$banner->status, TRUE);}} ?>>No</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label" id="label1"  style="display:none;">Description</label>
						<div class="col-sm-9 form-group1">
							<textarea id="description" name="description" style="display:none;"><?php if(!empty($banner)){ echo($banner->description); }  ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Position</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="position" name="position" placeholder="Position" value="<?php if(!empty($banner)){ echo($banner->position); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label"></label>
						<div class="col-sm-9 form-group1">
							<input class="btn btn-success btn-large" type="submit" value="Save">
							<a href="<?php echo base_url('ngadmin/banner') ?>" class="btn btn-warning btn-large">Cancel</a>
						</div>
					</div>
		    	<div class="clearfix"></div>
		</div>
	</div>
</div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
<script type="text/javascript">
jQuery(document).ready(function($) {
        $('#type').on('change',function(){
        if( $(this).val()==="Homeslider"){
	        $("#description").hide()
	        $("#noted").hide()
	        $("#label").hide()
	        $("#label1").hide()
        }
       else{
            $("#description").show()
	        $("#noted").show()
	        $("#label").show()
	        $("#label1").show()
        }
    });
});
</script>