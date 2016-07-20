<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
	<?php if (!empty($error)): ?>
	<p><?php echo $error ?></p>
	<?php endif ?>
<div class="grid_3 grid_5">
	<div class="but_list">
		<nav>
		<a href="<?php echo base_url('category/form/insert'); ?>" class="btn btn-success" id="addbtn">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Category
		</a>
  		</nav>
	<table class="table" id="product">
	    <thead>
	        <tr>
		        <th>Id</th>
		        <th>Name</th>
				<th>Description</th>
				<th>Link Rewrite</th>
			    <th>Position</th>
			    <th>Action</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach ($category as $key => $cat): ?>
			   	<tr>
			   		<td><?php echo $cat->id ?></td>
			   		<td><?php echo $cat->name ?></td>
			   		<td><?php echo $cat->description ?></td>

			   		<td><?php echo $cat->link_rewrite ?></td>
			   		<td><?php echo $cat->position ?></td>
			   		<td>
			   			<!-- <a href="<?php echo base_url('ngadmin/category/'.$cat->id) ?>" class="btn-success button-admin" data-toggle="tooltip" title="View"><i class="fa fa-eye" aria-hidden="true" style="color:white"></i></a> -->
			   			<a href="<?php echo base_url('category/form/'.$cat->link_rewrite) ?>" class="btn-warning button-admin" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></a>
			   			<a href="<?php echo base_url('category/delete/'.$cat->id) ?>" class="btn-danger button-admin" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a>
			   		</td>
		    	</tr>
		  	<?php endforeach ?>
		</tbody>
	</table>
	</div>
</div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
