<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">Report - Statistic </span>
			</h2>
			
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div>
		<legend style="padding-bottom: 20px">List of Invoice - Danh sách Hóa đơn</legend>
		<p for="">Lọc nâng cao
			<form action="?mod=invoice&act=filter" method="POST" class="form-inline" role="form">
				<label  for="date_start">Từ</label>
				<input type="date" name="date_start" id="date_start" class="form-control" required="required" >
				<label  for="date_end">Đến</label>
				<input type="date" name="date_end" id="date_end" class="form-control"  required="required" >			
				<button type="submit" class="btn btn-primary" name="submit">Search</button>
			</form>
		</p>
		<br/>
		<hr/>
		
		<table  id="myTable" class="table table-hover table-striped table-bordered">
			<thead>
				<tr>
					<th class="text-center">Code </th>
					<th class="text-center">Invoice ID</th>
					<th class="text-center">Staff ID</th>
					<th class="text-center">Customer ID</th>
					<th class="text-center">Date</th>
					<th class="text-center">Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1 ?>
				<?php foreach ($data as $key => $invoice) { ?>
				<tr class="">
					<td class="text-center"><a href="?mod=invoice&act=detail&id=<?php echo $invoice['id'] ?>" title="" class="btn btn-warning"><?php echo $i++ ?></a></td>
					<td class="text-left"><?= $invoice['id'] ?></td>
					<td class="text-center"><?= $invoice['staff_id'] ?></td>
					<td class="text-center"><?= $invoice['customer_id'] ?></td>
					<td class="text-center"><?= $invoice['date'] ?></td>
					<td class="text-right"><?= number_format($invoice['money']) ?></td>
				</tr>

				<?php } ?>
			</tbody>
		</table>

	</div>
</div>
<!-- /.container-fluid -->
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>