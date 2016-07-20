<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						<?php if(!empty($product)): ?>
							<?php echo form_open_multipart('adminan/detail/'.$product[0]->product_id,'class="form-horizontal"','role="form"'); ?>
						<?php else: ?>
							<?php echo form_open_multipart('adminan/detail/insert','class="form-horizontal"','role="form"'); ?>
						<?php endif ?>
						<input type="hidden" name="id" value="<?php if(!empty($product)){echo $product[0]->product_id;} ?>" />
						<div class="form-group">
							<label class="col-md-2 control-label">Product Name</label>
							<div class="col-md-8">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" name="name" value="<?php if (!empty($product)): ?><?php echo $product[0]->product_name; ?><?php endif ?>" placeholder="Name">										
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Category</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<select class = "form-control1" name="category">
										<?php foreach ($category as $key => $value): ?>
											<?php if ($product[0]->category == $value['cat_name']): ?>
												<option selected value=<?php echo $key ?>>
													<?php echo $value['cat_name'] ?>
												</option>
											<?php else: ?>
												<option value=<?php echo $key ?>>
													<?php echo $value['cat_name'] ?>
												</option>
											<?php endif ?>
										<?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Product DESC</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" name="desc" value="<?php if (!empty($product)): ?><?php echo $product[0]->product_desc; ?><?php endif ?>" placeholder="Product Desc">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Price</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" name="price" value="<?php if (!empty($product)): ?><?php echo $product[0]->price; ?><?php endif ?>" placeholder="Price">
								</div>
							</div>
						</div> 
						<div class="form-group">
							<label class="col-md-2 control-label">Weight</label>
							<div class="col-md-8">
								<div class="input-group">							
									<span class="input-group-addon">
										<i class="fa fa-envelope-o"></i>
									</span>
									<input type="text" class="form-control1" name="weight" value="<?php if (!empty($product)): ?><?php echo $product[0]->weight; ?><?php endif ?>" placeholder="Weight">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Image-1</label>
							<div class="col-md-4">
								<div class="input-group">
									<input type="file" name="userfile[]" class="form-control" size="20" >
								</div>
							</div>
							<div class="col-md-4">
								<?php if (!empty($product_image[0]['url_img1'])): ?>
									@<?php echo $product_image[0]['url_img1']; ?>
								<?php endif ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image-2</label>
							<div class="col-md-4">
								<div class="input-group">
									<input type="file"  name="userfile[]" class="form-control" >
								</div>
							</div>
							<div class="col-md-4">
								<?php if (!empty($product_image[0]['url_img2'])): ?>
									@<?php echo $product_image[0]['url_img2']; ?>
								<?php endif ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image-3</label>
							<div class="col-md-4">
								<div class="input-group">
									<input type="file" id="product_img3" name="userfile[]" class="form-control" placeholder="Img product 3" >
								</div>
							</div>
							<div class="col-md-4">
								<?php if (!empty($product_image[0]['url_img3'])): ?>
									@<?php echo $product_image[0]['url_img3']; ?>
								<?php endif ?>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Image-4</label>
							<div class="col-md-4">
								<div class="input-group">
									<input type="file" id="product_img4" name="userfile[]" class="form-control" placeholder="Img product 4" >
								</div>
							</div>
							<div class="col-md-4">
								<?php if (!empty($product_image[0]['url_img4'])): ?>
									@<?php echo $product_image[0]['url_img4']; ?>
								<?php endif ?>
							</div>
						</div>
						<?php if(!empty($product)):?>
						<div class="form-group">
							<label class="col-md-2 control-label">Created_Date</label>
							<div class="col-md-8">
								<div class="input-group input-icon right">
									<?php if (!empty($product)): ?><?php echo $product[0]->created_date; ?><?php endif ?>
								</div>
							</div>
						</div>	
						<?php endif ?>
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