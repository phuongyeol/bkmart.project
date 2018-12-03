<?php include_once 'views/admin/layouts/header.php'; ?>

<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">
				<a href="?mod=invoice&act=list" title="">
					<i class="material-icons">keyboard_backspace</i>
				</a>
				<span class="text-uppercase">Invoice details</span>			
			</h2>

		</div>
		<!-- /.col-lg-12 -->
		<div class="container-fluid">
			
			<div>
				<p>Invoice ID: <b><?php echo $invoice_info['id'] ?></b></p>
				<p>Date: <?php echo $invoice_info['date'] ?></p>
				<hr>
				<div class="col-md-6 col-sm-12">
					<p class="text-uppercase">Customer:</p>
					<p><b><?php echo "Full name: ".$customer_info['name']." - ID: ".$customer_info['id']."<br> Email: ".$customer_info['email'] ?></b> </p>
				</div>
				<div>
					<p class="text-uppercase">CHI NHANH: DAN PHUONG - Hanoi</p>
					<p>Cashier: <?php echo $_SESSION['staff_login']['name']." - ID: ".$_SESSION['staff_login']['id'] ?></p>
				</div>
			</div>
			<br/>
			
			<table  id="" class="table table-hover table-striped table-bordered" style="font-weight: bold">
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
					<?php foreach ($product_list as $key => $product) { ?>
					<tr class="">
						<td class="text-left">
							<?php echo $product['id'] ?>
						</td>
						<td class="text-left">
							<?php echo $product['name'] ?>
						</td>
						<td class="text-left">
							<?php echo $product['category'] ?>
						</td>
						<td class="text-center">							
							<?php echo number_format($product['quantity']) ?>
						</td>
						<td class="text-right">							
							<?php echo number_format($product['price']) ?>
						</td>						
						<td class="text-right">
							<?php echo number_format($product['price']*$product['quantity']); ?>
						</td>
					</tr>					
					<?php } ?>
					<tr>
						<td colspan="6" ></td>
					</tr>
					<tr class="text-right">
						<td colspan="5" >Sum: </td>
						<td><?php echo $invoice_info['money'] ?></td>
					</tr>
					</tr>
				</tbody>
			</table>

		</div>
		<!-- /.container-fluid -->
	</div>
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>