<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">
				<span class="text-uppercase">Cart - Value: <?php echo isset($_SESSION['buy']['sum'])?number_format($_SESSION['buy']['sum']):0 ?> </span>				
			</h2>
			<div class="col-lg-offset-10">
				<a href="?mod=sale&act=list" title="Tiếp tục mua hàng" class="fa fa-shopping-cart btn btn-success"><b>&nbsp;Buy</b></a>
				<a title="Thanh toán" class="btn btn-danger fa fa-credit-card" data-toggle="modal" data-target="#order" ><b>&nbsp;Order</b></a>
				<!-- Modal -->
				<div id="order" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-body">
								<form action="?mod=sale&act=order" method="POST" role="form">
									<legend>Đặt hàng</legend>

									<div class="form-group">
										<label for="">Vui lòng nhập email để hoàn thành đặt hàng</label>
										<input type="email" class="form-control" id="" placeholder="Input email" name="email">
									</div>

									<button type="submit" class="btn btn-primary" name="submit">Submit</button>
								</form>

							</div>

						</div>

					</div>
				</div>
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
						<th class="text-center">Category</th>
						<th class="text-center">Quantity</th>
						<th class="text-center">Price</th>						
						<th class="text-center">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($data)>0) { ?>
					<?php foreach ($data as $key => $product) { ?>
					<tr class="">
						<td class="text-center"><?php echo $product['id'] ?></td>
						<td class="text-left">
							<?php echo $product['name'] ?>
						</td>
						<td>
							<?php echo $product['category'] ?>
						</td>
						<td class="text-center">
							<a href="?mod=sale&act=subcart&id=<?php echo $product['id'] ?>" title="Giảm số lượng" class="btn btn-primary fa fa-minus"></a>
							&nbsp;
							<?php echo number_format($product['quantity']) ?>
							&nbsp;
							<a href="?mod=sale&act=add2cart&id=<?php echo $product['id'] ?>" title="Tăng số lượng" class="btn btn-primary fa fa-plus"></a>
						</td>
						<td class="text-center">
							<?php echo number_format($product['price']) ?>
						</td>
						<td class="text-right">
							<?php echo number_format($product['price']*$product['quantity']); ?>
						</td>
					</tr>
					
					<?php } ?>
					<?php } ?>
				</tbody>
			</table>


		</div>
		<!-- /.container-fluid -->
	</div>
</div>

<?php include_once 'views/admin/layouts/footer.php'; ?>