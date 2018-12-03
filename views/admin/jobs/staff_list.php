<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">
					<a href="?mod=job" title="Back"  ><i class="material-icons">reply</i></a>Job Management 
				</span>				
			</h2>		
			
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div>
		<legend style="padding-bottom: 20px">
			List of Staff in Job: 
			<a href="" title="More than" class="btn btn-sm" data-toggle="modal" data-target="#job_detail_modal_<?php echo $job['id'] ?>"><b><?php echo $job['name'] ?></b></a>			
		</legend>
		<div class="modal fade" id="job_detail_modal_<?php echo $job['id'] ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title" style="color: blue">Job detail informations</h3>
					</div>
					<div class="modal-body">
						<table class="table table-striped text-left" >										

							<tr>
								<td><label for="">Name</label></td>
								<td><?php echo $job['name'] ?></td>
							</tr>
							<tr>
								<td><label for="">Description</label></td>
								<td><?php echo $job['description'] ?></td>
							</tr>
							<tr>
								<td><label for="">Created time</label></td>
								<td><?php echo $job['created_at'] ?></td>
							</tr>
							<tr>
								<td><label for="">Lastest update</label></td>
								<td><?php echo $job['updated_at'] ?></td>
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
					<!-- <th class="text-center">Avatar</th> -->
					<th class="text-center">Mobile</th>
					<th class="text-center">Email</th>
					<!-- <th class="text-center">Job</th> -->
					<th class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($data as $key => $staff) { ?>
				<tr class="">
					<td class="text-center"><?php echo $staff['id'] ?></td>
					<td class="text-left"><?= $staff['name'] ?></td>
					<td class="text-right"><?= $staff['mobile'] ?></td>
					<td class="text-right"><?= $staff['email'] ?></td>
					<!-- <td class="text-right"><?= $staff['job'] ?></td> -->
					<td class="text-center">
						<a href="#detail_modal_<?php echo $staff['id'] ?>" title="More" class="fa fa-info btn btn-sm btn-info" data-toggle="modal" ></a>
						<!-- modal detail -->
						<div class="modal fade" id="detail_modal_<?php echo $staff['id'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Staff infomation</h4>
									</div>
									<div class="modal-body">
										<div>
											<img src="upload/admin/staff/<?php echo $staff['avatar'] ?>" alt="" class="img-circle " style="width: 100px;height: 100px">
										</div>
										<br>
										<legend>ID: <?php echo $staff['code'] ?></legend>
										<br>
										<table class="table table-hover text-left">
											
											<tbody>
												<tr>
													<td>
														<label for="">Name</label>
													</td>
													<td><?php echo $staff['name'] ?></td>
												</tr>
												<tr>
													<td>
														<label for="">Mobile</label>
													</td>
													<td><?php echo $staff['mobile'] ?></td>
												</tr>
												<tr>
													<td>
														<label for="">Email</label>
													</td>
													<td><?php echo $staff['email'] ?></td>
												</tr>
												<!-- <tr>
													<td>
														<label for="">Job</label>
													</td>
													<td><?php echo $staff['job'] ?></td>
												</tr> -->
												<tr>
													<td>
														<label for="">Address</label>
													</td>
													<td><?php echo $staff['address'] ?></td>
												</tr>
												<tr>
													<td>
														<label for="">Gender</label>
													</td>
													<td><?php echo ($staff['name']==0)?'Male':'Female' ?></td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						<!-- .detail -->

						<a href="#edit_modal_<?php echo $staff['id'] ?>" title="Update" class="fa fa-pencil btn btn-sm btn-warning" data-toggle="modal"></a>

						<!-- modal update -->
						<div class="modal fade" id="edit_modal_<?php echo $staff['id'] ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title">Edit Staff infomation <legend>Code: <?php echo $staff['code'] ?></legend></h4>
									</div>

									<form action="?mod=staff&act=update" method="POST" role="form" enctype="multipart/form-data">
										<div class="modal-body text-left">
											<input type="hidden" name="id" value="<?php echo $staff['id'] ?>">
											<input type="hidden" name="avatar" value="<?php echo $staff['avatar'] ?>">
											<div class="text-center">
												<img src="upload/admin/staff/<?php echo $staff['avatar'] ?>" alt="" class="img-circle" style="width: 100px; height: 100px">
											</div>
											<br>
											<div class="form-group">
												<label for="">Avatar</label>
												<input type="file"  id="avatar" placeholder="" name="avatar" class="">
											</div>
											<br>
											<div class="form-group">
												<label for="">Code</label>
												<input type="text" class="form-control" id="code" placeholder="Input field" name="code" value="<?php echo $staff['code']  ?>" >
											</div>
											<br><br>
											<div class="form-group">
												<label for="">Name</label>
												<input type="text" class="form-control" id="name" placeholder="Input field" name="name" value="<?php echo $staff['name']  ?>" >
											</div>
											<br>	<br>
											<div class="form-group">
												<label for="">Password</label>
												<input type="password" class="form-control" id="password" placeholder="Input field" name="password" value="<?php echo $staff['password']  ?>" >
											</div>
											<br>	<br>											
											<div class="form-group">
												<label for="">Mobile</label>
												<input class="form-control" id="mobile" placeholder="Input field" name="mobile" value="<?php echo $staff['mobile'] ?>"></input>
											</div>
											<br>	<br>											
											<div class="form-group">
												<label for="">Email</label>
												<input class="form-control" id="email" placeholder="Input field" name="email" value="<?php echo $staff['email'] ?>"></input>
											</div>
											<br>		<br>										
											<div class="form-group">
												<label for="">Address</label>
												<input class="form-control" id="address" placeholder="Input field" name="address" value="<?php echo $staff['address'] ?>"></input>
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

						<a href="?mod=staff&act=del&id=<?php echo $staff['id'] ?>" title="Delete" class="fa fa-trash btn btn-sm btn-danger delete"  ></a>
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