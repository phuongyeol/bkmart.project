<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">	
				Add new customer
			</h2>				
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="container-fluid">
		<form action="?mod=sale&act=store_customer" method="POST" role="form" enctype="multipart/form-data">			

			<div class="form-group">
				<label for="">Code</label>
				<input type="text" class="form-control" id="code" placeholder="Your code" name="code" class="">
			</div>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" id="name" placeholder="Your name" name="name" class="">
			</div>
			<div class="form-group">
				<label for="">Address</label>
				<input type="text" class="form-control" id="address" placeholder="Your address" name="address" class="">
			</div>
			<div class="form-group">
				<label for="">Mobile</label>
				<input type="text" class="form-control" id="mobile" placeholder="Your phone number" name="mobile" class="">
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Your email" name="email" class="">
			</div>			

			<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div>
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>