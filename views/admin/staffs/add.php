<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">
					<a href="?mod=staff" title="Back"  ><i class="material-icons">reply</i></a>Staff Management 
				</span>				
			</h2>				
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="container-fluid">
		<form action="?mod=staff&act=store" method="POST" role="form" enctype="multipart/form-data">
			<legend>Add new Staff</legend>

			<div class="form-group">
				<label for="">Code</label>
				<input type="text" class="form-control" id="code" placeholder="Your code" name="code" class="">
			</div>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" id="name" placeholder="Your name" name="name" class="">
			</div>
			<div class="form-group">
				<label for="">Avatar</label>
				<input type="file"  id="avatar" placeholder="" name="avatar" class="">
			</div>

			<div class="form-group">
				<label for="">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Your password" name="password" class="">
			</div>

			<div class="form-group">
				<label for="">Address</label>
				<input type="text" class="form-control" id="address" placeholder="Your address" name="address" class="">
			</div>

			<div class="form-group">
				<label for="">Gender</label>
				<div class="radio">
					<label>
						<input type="radio" name="gender" id="inputGender" value="0" style="border: 1px solid">Male
					</label>
					<label>
						<input type="radio" name="gender" id="inputGender" value="1" checked="checked">Female
					</label>
				</div>
			</div>

			<div class="form-group">
				<label for="">Job</label>
				<br>			
				<select name="job">
					<?php foreach ($job_data as $key => $job) {?>
					<option value="<?php echo $job['id'] ?>"><?php echo $job['name'] ?></option>
					<?php } ?>
				</select>
			</div>

			<div class="form-group">
				<label for="">Mobile</label>
				<input type="mobile" class="form-control" id="mobile" placeholder="Your phone number" name="mobile" class="">
			</div>

			<div class="form-group">
				<label for="">Email</label>
				<input type="email" class="form-control" id="email" placeholder="Your email" name="email" class="">
			</div>			

			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>