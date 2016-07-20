<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
	<?php if (!empty($error)): ?>
	<p><?php echo $error ?></p>
	<?php endif ?>
<div class="grid_3 grid_5">
	<div class="but_list">
		<nav>
		<a href="<?php echo base_url('ngadmin/banner/'.'insert'); ?>" class="btn btn-success" id="addbtn">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Banners
		</a>
  		</nav>
	<table class="table" id="product">
	    <thead>
	        <tr>
		        <th>Id</th>
		        <th>Image</th>
				<th>Title</th>
				<th>Type</th>
			    <th>Position</th>
			    <th>Enabled</th>
			    <th>Action</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach ($banner as $key => $cat): ?>
			   	<tr>
			   		<td><?php echo $cat->id ?></td>
			   		<td></td>
			   		<td><?php echo $cat->title ?></td>
			   		<td><?php echo $cat->type ?></td>
			   		<td><?php echo $cat->position ?></td>
			   		<td><?php if($cat->status == 1){ ?><a href="<?= base_url('admin/banner/change/'.$cat->id.'/0')?>" class="btn-success button-admin" data-toggle="tooltip" title="enable"><i class="fa fa-check" aria-hidden="true" style="color:white"></i></a><?php }else{?>
		        	<a href="<?= base_url('admin/banner/change/'.$cat->id.'/1')?>" class="btn-danger button-admin" data-toggle="tooltip" title="Disabled"><i class="fa fa-times" aria-hidden="true" style="color:white"></i></a><?php } ?>
		        	</td>
			   		<td>
			   			<!-- <a href="<?php echo base_url('ngadmin/category/'.$cat->id) ?>" class="btn-success button-admin" data-toggle="tooltip" title="View"><i class="fa fa-eye" aria-hidden="true" style="color:white"></i></a> -->
			   			<a href="<?= base_url('admin/banner/update/'.$cat->id)?>" class="btn-warning button-admin" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></a>
			   			<a href="<?= base_url('admin/banner/delete/'.$cat->id)?>" class="btn-danger button-admin" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a>
			   		</td>
		    	</tr>
		  	<?php endforeach ?>
		</tbody>
	</table>
	</div>
</div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
