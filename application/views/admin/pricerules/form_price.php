<?php require_once(APPPATH.'views/admin/content/header.php'); ?>
<div class="grid-form">
<?php if (!empty($error)): ?>
	<p><?php echo $error ?></p>
<?php endif ?>	
<?php echo validation_errors(); ?>
<div class="grid_3 grid_5">
	<div class="but_list">
			<?php if (empty($banner)): ?>
				<form enctype="multipart/form-data" method="POST" action="<?=base_url('admin/price/insert')?>" class ="form-horizontal">
		  	<?php else: ?>
		  		<form enctype="multipart/form-data" method="POST" action="<?=base_url('admin/banner/update/'.$banner->id)?>" class ="form-horizontal">

		  	<?php endif ?>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Name</label>
						<div class="col-sm-9 form-group1">
							<input type="text" class="form-control1" id="name" name="name" placeholder="Name" value="<?php if(!empty($banner)){ echo($banner->position); }  ?>">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Period</label>
						<div class="col-sm-4">
							<input type="date" class="form-control1 ng-invalid ng-invalid-required" id="from" name="from" ng-model="model.date" required="">
						</div>
						<div class="col-sm-1">
							<p align="center"></p>
						</div>
						<div class="col-sm-4">
							<input type="date" class="form-control1 ng-invalid ng-invalid-required" id="to" name="to" ng-model="model.date" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label" id="label">Reduction Type</label>
						<div class="col-sm-9 form-group2">
							<select  id="type" name="type">
								<option value="percentage" <?php if(!empty($banner)){ if($banner->type == 'Homeslider'){echo set_select('type',$banner->type, TRUE);}} ?>>Percentage</option>
								<option value="amount" <?php if(!empty($product)){ if($banner->type == 'Midhome'){echo set_select('available',$banner->type, TRUE);}} ?>>Amount</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Reduction</label>
						<div class="col-sm-9">
							<input type="text" class="form-control1" id="reduction" name="reduction" placeholder="0.00" value="<?php if(!empty($banner)){ echo($banner->title); }  ?>">
						</div>
					</div>
					<!-- <div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Category</label>
						<div class="col-sm-9">
							<select class="js-data-category-ajax form-control" name="category_id[]" id="category_id" multiple="multiple">
                               
                            </select>
						</div>
					</div> -->
					<div class="form-group">
						<label for="focusedinput" class="col-sm-3 control-label">Products</label>
						<div class="col-sm-9">
							<select class="js-data-product-ajax form-control" name="product_id[]" id="product_id" multiple="multiple">
                               
                            </select>
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
<script src="<?=base_url('assets/js/select2.min.js')?>"></script>
<?php require_once(APPPATH.'views/admin/content/footer.php'); ?>
<script>
            jQuery(document).ready(function($) {

                    $(document).ready(function(){
                        function formatRepo (repo) {
                              if (repo.loading) return repo.text;

                              var markup = "<div class='select2-result-repository clearfix'>" +

                                "<div class='select2-result-repository__meta'>" +
                                  "<div class='select2-result-repository__title'>" + repo.name + "</div>";

                              "</div></div>";

                              return markup;
                            }

                        function formatRepoSelection (repo) {
                          return repo.name || repo.text;
                        }

                        $(".js-data-product-ajax").select2({
                              ajax: {
                                url: "<?=base_url('admin/price/product_json')?>",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                  return {
                                    name: params.term, // search term
                                  };
                                },
                                processResults: function (data, params) {
                                  // parse the results into the format expected by Select2
                                  // since we are using custom formatting functions we do not need to
                                  // alter the remote JSON data, except to indicate that infinite
                                  // scrolling can be used
                                  params.page = params.page || 1;

                                  return {
                                    
                                    results: data.data,
                                    pagination: {
                                      more: (params.page * 30) < data.total_count
                                    }
                                  };
                                },
                                cache: true
                              },
                              escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                              minimumInputLength: 1,
                              templateResult: formatRepo, // omitted for brevity, see the source of this page
                              templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                            });

						 $(".js-data-category-ajax").select2({
                              ajax: {
                                url: "<?=base_url('admin/price/category_json')?>",
                                dataType: 'json',
                                delay: 250,
                                data: function (params) {
                                  return {
                                    name: params.term, // search term
                                  };
                                },
                                processResults: function (data, params) {
                                  // parse the results into the format expected by Select2
                                  // since we are using custom formatting functions we do not need to
                                  // alter the remote JSON data, except to indicate that infinite
                                  // scrolling can be used
                                  params.page = params.page || 1;

                                  return {
                                    
                                    results: data.data,
                                    pagination: {
                                      more: (params.page * 30) < data.total_count
                                    }
                                  };
                                },
                                cache: true
                              },
                              escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
                              minimumInputLength: 1,
                              templateResult: formatRepo, // omitted for brevity, see the source of this page
                              templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
                            });
                    });
            });
    </script>
