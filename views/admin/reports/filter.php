<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<a href="?mod=invoice&act=list" title="">
					<i class="material-icons">keyboard_backspace</i>
				</a>				
				<span class="text-uppercase">Report - Statistic </span>
				<a href="?mod=report&act=revenue&date_start=<?php echo $date_start_input ?>&date_end=<?php echo $date_end_input ?>" title="" class="fa fa-print btn btn-success" style="float: right;"><b>&nbsp;Export PDF</b></a>	
			</h2>			
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div>
		<legend style="padding-bottom: 20px">Danh sách Hóa đơn từ <?php echo $date_start_input ?> đến <?php echo $date_end_input ?></legend>
		<div style="float: right; font-weight: bold">
			Tổng doanh thu: <?php echo number_format($sum) ."VND" ?>
		</div>
		<br/>
		<br/>
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
				<?php $i=1; $sum=0 ?>
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