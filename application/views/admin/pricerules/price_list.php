<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
	<?php if (!empty($error)): ?>
	<p><?php echo $error ?></p>
	<?php endif ?>
<div class="grid_3 grid_5">
	<div class="but_list">
		<nav>
		<a href="<?php echo base_url('admin/price/insert'); ?>" class="btn btn-success" id="addbtn">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Price Rules
		</a>
  		</nav>
	<table class="table" id="product">
	    <thead>
	        <tr>
		        <th>Id</th>
		        <th>Name</th>
				<th>Reduction</th>
				<th>Reduction Type</th>
			    <th>From</th>
			    <th>To</th>
			    <th>Action</th>
		    </tr>
		</thead>
		<tbody>
			<?php foreach ($list as $price): ?>
			   	<tr>
			   		<td><?php echo $price->id ?></td>
			   		<td><?php echo $price->name ?></td>
			   		<td><?php if($price->reduction_type =='percentage'){echo $price->reduction;}else{ echo $price->price;} ?></td>
			   		<td><?php echo $price->reduction_type ?></td>
			   		<td><?php echo $price->from ?></td>
			   		<td><?php echo $price->to ?></td>
			   		<td>
			   			<!-- <a href="<?php echo base_url('ngadmin/category/'.$cat->id) ?>" class="btn-success button-admin" data-toggle="tooltip" title="View"><i class="fa fa-eye" aria-hidden="true" style="color:white"></i></a> -->
			   			<a href="<?php echo base_url('admin/price/update/'.$price->id) ?>" class="btn-warning button-admin" data-toggle="tooltip" title="Update"><i class="fa fa-pencil-square-o" aria-hidden="true" style="color:white"></i></a>
			   			<a href="<?php echo base_url('admin/price/delete/'.$price->id) ?>" class="btn-danger button-admin" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o" style="color:white" aria-hidden="true"></i></a>
			   		</td>
		    	</tr>
		  	<?php endforeach ?>
		</tbody>
	</table>
	</div>
</div>
</div>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
