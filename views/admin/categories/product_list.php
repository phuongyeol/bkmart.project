<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">
					<a href="?mod=category" title="Back"  ><i class="material-icons">reply</i></a>Category Management 
				</span>				
			</h2>		
			
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div>
		<legend style="padding-bottom: 20px">
			List of Product in Catalog: 
			<a href="" title="More than" class="btn btn-sm" data-toggle="modal" data-target="#category_detail_modal_<?php echo $category['id'] ?>"><b><?php echo $category['name'] ?></b></a>			
		</legend>
		<div class="modal fade" id="category_detail_modal_<?php echo $category['id'] ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title" style="color: blue">Category detail informations</h3>
					</div>
					<div class="modal-body">
						<table class="table table-striped text-left" >										

							<tr>
								<td><label for="">Name</label></td>
								<td><?php echo $category['name'] ?></td>
							</tr>
							<tr>
								<td><label for="">Description</label></td>
								<td><?php echo $category['description'] ?></td>
							</tr>
							<tr>
								<td><label for="">Created time</label></td>
								<td><?php echo $category['created_at'] ?></td>
							</tr>
							<tr>
								<td><label for="">Lastest update</label></td>
								<td><?php echo $category['updated_at'] ?></td>
							</tr>

						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<table  id="myTable" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">ID</th>
					<th class="text-center">Name</th>
					<th class="text-center">Image</th>
					<th class="text-center">Quantity</th>
					<th class="text-center">Price</th>
					<th class="text-center">Category</th>
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $product) { ?>
				<tr class="">
					<td class="text-center"><?php echo $product['id'] ?></td>
					<td class="text-left">
						<?php echo $product['name'] ?>
					</td>
					<td class="text-center">
						<img src="upload/admin/product/<?php echo $product['img'] ?>" alt="" class="img-rounded" style="width: 120px; height: 120px;">
					</td>
					<td>
						<?php echo $product['quantity'] ?>
					</td>
					<td>
						<?php echo $product['price'] ?>
					</td>
					<td>
						<?php echo $product['category'] ?>
					</td>
					<td class="text-center" width="20%">
						<!-- INFO -->
						<a href="" title="More about product" class="btn btn-sm " data-toggle="modal" data-target="#product_detail_modal_<?php echo $product['id'] ?>"><i class="fa fa-info"></i></a>

						<div class="modal fade" id="product_detail_modal_<?php echo $product['id'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Product detail informations</h4>
									</div>
									<div class="modal-body">
										<div class="text-center">
											<img src="upload/admin/product/<?php echo $product['img'] ?>" alt="" class="img-circle" style="width: 100px;height: 100px">
										</div>
										<br>
										<legend>ID: <?php echo $product['id'] ?></legend>
										<br>
										<table class="table table-striped text-left" >										

											<tr>
												<td><label for="">Name</label></td>
												<td><?php echo $product['name'] ?></td>
											</tr>
											<tr>
												<td><label for="">Quantity</label></td>
												<td><?php echo $product['quantity'] ?></td>
											</tr>
											<tr>
												<td><label for="">Price</label></td>
												<td><?php echo $product['price'] ?></td>
											</tr>
											<tr>
												<td><label for="">Category</label></td>
												<td><?php echo $product['category'] ?></td>
											</tr>
											<tr>
												<td><label for="">Created time</label></td>
												<td><?php echo $product['created_at'] ?></td>
											</tr>
											<tr>
												<td><label for="">Lastest update</label></td>
												<td><?php echo $product['updated_at'] ?></td>
											</tr>
											
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- ./INFO  -->

						<!-- edit -->
						<a href="" title="Update" class="btn btn-sm" style="color: orange" data-toggle="modal" data-target="#product_edit_modal_<?php echo $product['id'] ?>"><i class="fa fa-pencil"></i></a>							
						
						<div class="modal fade" id="product_edit_modal_<?php echo $product['id'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">EDIT PRODUCT</h4>
									</div>
									<form action="?mod=product&act=update" method="POST" role="form" enctype="multipart/form-data">
										<div class="modal-body text-left">
											<input type="hidden" name="id" value="<?php echo $product['id'] ?>">
											<input type="hidden" name="old_img" value="<?php echo $product['img'] ?>">

											<div class="text-center">
												<img src="upload/admin/product/<?php echo $product['img'] ?>" alt="" class="img-circle" style="width: 100px; height: 100px">
											</div>
											<br>
											<div class="form-group">
												<label for="">Image</label>
												<input type="file"  id="image" placeholder="" name="image" class="">
											</div>
											<br><br>
											<div class="form-group">
												<label for="">Name</label>
												<input type="text" class="form-control" id="name" placeholder="Input field" name="name" value="<?php echo $product['name']  ?>" >
											</div>
											<br><br>
											<div class="form-group">
												<label for="">Category</label>
												<br>			
												<select name="category">
													<option value="<?php echo $product['category_id'] ?>"><?php echo $product['category'] ?></option>
													<?php foreach ($category_data as $key => $category) {?>
													<option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
													<?php } ?>
												</select>
											</div>
											<br><br>
											<div class="form-group">
												<label for="">Quantity</label>
												<input type="text" class="form-control" id="quantity" placeholder="Input field" name="quantity" value="<?php echo $product['quantity']  ?>" >
											</div>
											<br><br><div class="form-group">
												<label for="">Price</label>
												<input type="text" class="form-control" id="price" placeholder="Input field" name="price" value="<?php echo $product['price']  ?>" >
											</div>
											<br><br>
											
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary" name="submit">Update</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- ./edit -->

						<!-- delete -->
						<a href="?mod=product&act=del&id=<?php echo $product['id'] ?>" title="Delete" class="btn btn-sm" style="color: red"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				
				<?php } ?>
			</tbody>
		</table>
		<!-- <table  id="myTable" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">Code</th>
					<th class="text-center">Name</th>
					<th class="text-center">Category</th>
					<th class="text-center">Image</th>
					<th class="text-center">Quantity</th>						
					<th class="text-center">Price</th>												
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $product) { ?>
				<tr class="">
					<td class="text-center"><?php echo $product['id'] ?></td>
					<td class="text-left"><?= $product['name'] ?></td>
					<td class="text-left"><?= $product['category_id'] ?></td>
					<td class="text-center">
						<img src="upload/admin/product/<?= $product['img'] ?>" alt="" class="img-fluid" style="height: 120px;"></td>
					<td class="text-right"><?= $product['quantity'] ?></td>
					<td class="text-right"><?= $product['price'] ?></td>
					<td class="text-center">							
						<a href="" title="More about Product" class="btn" style="color: green"><i class="fa fa-pencil"></i></a>

						<a href="?mod=product&act=edit&id=<?php echo $product['id'] ?>" title="Update product informations" class="btn" style="color: green"><i class="fa fa-pencil"></i></a>
						<a href="?mod=product&act=del&id=<?php echo $product['id'] ?>" title="Delete product from system" class="btn" style="color: red"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table> -->

	</div>
</div>
<!-- /.container-fluid -->
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>