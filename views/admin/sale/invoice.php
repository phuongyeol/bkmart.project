<?php include_once 'views/admin/layouts/header.php'; ?>

<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header">
				<span class="text-uppercase">Chi tiết hóa đơn</span>	
				<a href="?mod=invoice&act=store" title="" class="fa fa-print btn btn-success" style="float: right;"><b>&nbsp;Printf</b></a>			
			</h2>

		</div> 
		<!-- /.col-lg-12 -->
		<div class="container-fluid">
			
			<div class="text-center">
				<label for=""><h3>BKMart</h3></label>
				<div>
					<i class="fa fa-map-marker " ></i> số 1, Lê Thanh Nghị, Hai Bà Trưng - Hanoi
					<br/>
					SDT: (084) 12.34.567.890
				</div>
				<br/>
				<hr/>
				<div >
					<h3>Invoice</h3>
					<br/>
					<div class="col-md-offset-4" style="padding-left:45px "><?php echo $_SESSION['buy']['invoice_barcode_id']  ?></div>
					<div>
						<?php echo $_SESSION['buy']['id']  ?>
					</div>
				</div>
			</div>
			<br>
			<div>
				<p>Invoice ID: <b><?php echo $_SESSION['buy']['id'] ?></b></p>
				<p>Date: <?php echo $_SESSION['buy']['date'] ?></p>
			</div>
			<br/>
			
			<table  id="" class="table table-hover table-striped table-bordered" style="font-weight: bold">
				<thead>
					<tr>
						<th class="text-center">Tên sản phẩm</th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Giá</th>						
						<th class="text-center">Discount</th>						
						<th class="text-center">Tổng tiền</th>
					</tr>
				</thead>
				<tbody>
					<?php if (count($data)>0) { $sum = 0; ?>
					<?php foreach ($data as $key => $product) { 
						$sum += $product['price']*$product['quantity'];
						?>
					<tr class="">
						<td class="text-left">
							<?php echo $product['name'] ?>
						</td>
						<td class="text-center">							
							<?php echo number_format($product['quantity']) ?>
						</td>
						<td class="text-right">							
							<?php echo number_format($product['price']) ?>
						</td>	
						<td class="text-right">
							<?php echo isset($product['discount'])?number_format($product['discount']):0 ."%" ?>
						</td>					
						<td class="text-right">
							<?php echo number_format($product['price']*$product['quantity']); ?>
						</td>
					</tr>					
					<?php }
						$_SESSION['buy']['money']=$sum;
					 ?>
					<tr>
						<td colspan="5" ></td>
					</tr>
					<tr class="text-right">
						<td colspan="4" rowspan="" headers="" >Sum: </td>
						<td><?php echo number_format($sum) ?></td>
					</tr>
					<tr class="text-right">
						<td colspan="4" >Discount: </td>
						<td>0</td>
					</tr>
					<tr class="text-right">
						<td colspan="4" >Tax: </td>
						<td>0</td>
					</tr>
					<tr class="text-right">
						<td colspan="4" >End: </td>
						<td><?php echo number_format($sum) ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<br/>
			<hr/>
			<div>
				<p class="text-uppercase">Thông tin khách hàng:</p>
				<p><b><?php echo "Tên: ".$_SESSION['buy']['customer']['name']." - Email: ".$_SESSION['buy']['customer']['email']." - Customer ID: ".$_SESSION['buy']['customer']['id'] ?></b> </p>
			</div>
			<br/>
			<hr/>
			<div>
				<p class="text-uppercase">CHI NHANH: Bách Khoa - Hanoi</p>
				<p>Thu ngân: <?php echo $_SESSION['staff_login']['name']." - ID: ".$_SESSION['staff_login']['id'] ?></p>
			</div>
			<hr>
			<div class="text-center">
				Thank you! See you again!
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>