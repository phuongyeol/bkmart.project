<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">SALES </span>
			</h2>
			<div class="col-lg-offset-11">
				<a href="?mod=sale&act=cart" title="Giỏ hàng hiện tại" class="fa fa-shopping-cart btn btn-success btn-lg"><b>&nbsp;Cart</b></a>
			</div>
		</div>
		<!-- /.col-lg-12 -->

		<!-- list -->
		<div class="container-fluid">
			<legend style="padding-bottom: 20px">List product</legend>

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
							<a href="" title="More about " class="btn btn-sm " data-toggle="modal" data-target="#product_detail_modal_<?php echo $product['id'] ?>"><i class="fa fa-info"></i></a>

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

							<!-- add2cart -->
							<a href="?mod=sale&act=add2cart&id=<?php echo $product['id'] ?>" title="Add" class="btn btn-sm" style="color: red"><i class="fa fa-cart-plus"></i></a>
						</td>
					</tr>
					
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>