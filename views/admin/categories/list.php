<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">Category Management </span>
				<span>
					<a title="Add new" class="btn fa fa-plus btn btn-success" data-toggle="modal" data-target="#category_add_modal"></a>
				</span>
			</h2>
			<!-- form add new category -->
			<div class="modal fade" id="category_add_modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add new Category</h4>
						</div>
						<!-- <div class="modal-body"> -->
							<form action="?mod=category&act=store" method="POST" role="form">
								<div class="modal-body">
									<div class="form-group">
										<label for="">Name</label>
										<input type="text" class="form-control" id="name" placeholder="Input field" name="name">
									</div>
									<div class="form-group">
										<label for="">Description</label>
										<input type="text" class="form-control" id="description" placeholder="Input field" name="description">
									</div>							

									
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="submit">Add</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</form>
							<!-- </div> -->

						</div>
					</div>
				</div>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div>
			<legend style="padding-bottom: 20px">List Category</legend>

			<table  id="myTable" class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Name</th>
						<th class="text-center">Description</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $category) { ?>
					<tr class="">
						<td class="text-center"><?php echo $category['id'] ?></td>
						<td class="text-left">
							<a href="?mod=category&act=product_list&id=<?php echo $category['id'] ?>" title="" class="link">
								<?= $category['name'] ?>								
							</a>
						</td>
						<td class="text-right"><?= $category['description'] ?></td>
						<td class="text-center" width="20%">
							<!-- INFO -->
							<a href="" title="More about category" class="btn btn-sm " data-toggle="modal" data-target="#category_detail_modal_<?php echo $category['id'] ?>"><i class="fa fa-info"></i></a>

							<div class="modal fade" id="category_detail_modal_<?php echo $category['id'] ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Category detail informations</h4>
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
							<!-- ./INFO  -->
							
							<!-- list product -->
							<a href="?mod=category&act=product_list&id=<?php echo $category['id'] ?>" title="Product List" class="btn btn-sm" style="color: green"><i class="fa fa-product-hunt"></i></a>
							
							<!-- edit -->
							<a href="" title="Update" class="btn btn-sm" style="color: orange" data-toggle="modal" data-target="#category_edit_modal_<?php echo $category['id'] ?>"><i class="fa fa-pencil"></i></a>							
							
							<div class="modal fade" id="category_edit_modal_<?php echo $category['id'] ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">EDIT CATEGOGY</h4>
										</div>
										<form action="?mod=category&act=update" method="POST" role="form">
											<div class="modal-body text-left">
												<input type="hidden" name="id" value="<?php echo $category['id'] ?>">
												<div class="form-group">
													<label for="">Name</label>
													<input type="text" class="form-control" id="name" placeholder="Input field" name="name" value="<?php echo $category['name']  ?>" style="border-bottom:1px solid green;">
												</div>
												<br>
												<br>
												<div class="form-group">
													<label for="">Description</label>
													<textarea class="form-control" id="description" placeholder="Input field" name="description" style="border-bottom:1px solid green;" ><?php echo $category['description'] ?></textarea>
												</div>
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
							<a href="?mod=category&act=del&id=<?php echo $category['id'] ?>" title="Delete" class="btn btn-sm delete" style="color: red"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					
					<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>
	<!-- /.container-fluid -->
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>