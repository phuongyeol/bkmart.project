<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<!-- Page Content -->
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="page-header">
						Customer Management 
						<span>
							<a href="?mod=customer&act=add" title="Add new user" class="fa fa-plus btn btn-warning text-right" ></a>
						</span>
					</h2>					
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->

			<div>
				<legend style="padding-bottom: 20px">List customers</legend>

				<table  id="myTable" class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th class="text-center">Code</th>
							<th class="text-center">Name</th>
							<th class="text-center">Mobile</th>
							<th class="text-center">Email</th>
							<th class="text-center">Address</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $key => $customer) { ?>
						<tr class="">
							<td class="text-center"><?php echo $customer['code'] ?></td>
							<td class="text-left"><?= $customer['name'] ?></td>
							<td class="text-right"><?= $customer['mobile'] ?></td>
							<td class="text-right"><?= $customer['email'] ?></td>
							<td class="text-right"><?= $customer['address'] ?></td>
							<td class="text-center">
								<a href="#detail_modal_<?php echo $customer['id'] ?>" title="More" class="fa fa-info btn btn-sm btn-info" data-toggle="modal" ></a>
								<!-- modal detail -->
								<div class="modal fade" id="detail_modal_<?php echo $customer['id'] ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Customer infomation</h4>
											</div>
											<div class="modal-body">
												
												<legend>Code: <?php echo $customer['code'] ?></legend>
												<br>
												<table class="table table-hover text-left">
													
													<tbody>
														<tr>
															<td>
																<label for="">Name</label>
															</td>
															<td><?php echo $customer['name'] ?></td>
														</tr>
														<tr>
															<td>
																<label for="">Mobile</label>
															</td>
															<td><?php echo $customer['mobile'] ?></td>
														</tr>
														<tr>
															<td>
																<label for="">Email</label>
															</td>
															<td><?php echo $customer['email'] ?></td>
														</tr>														
														<tr>
															<td>
																<label for="">Address</label>
															</td>
															<td><?php echo $customer['address'] ?></td>
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

								<a href="#edit_modal_<?php echo $customer['id'] ?>" title="Update" class="fa fa-pencil btn btn-sm btn-warning" data-toggle="modal"></a>

								<!-- modal update -->
								<div class="modal fade" id="edit_modal_<?php echo $customer['id'] ?>">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title">Edit customer infomation <legend>Code: <?php echo $customer['code'] ?></legend></h4>
											</div>

											<form action="?mod=customer&act=update" method="POST" role="form" enctype="multipart/form-data">
												<div class="modal-body text-left">
													<input type="hidden" name="id" value="<?php echo $customer['id'] ?>">
													<br>
													<div class="form-group">
														<label for="">Code</label>
														<input type="text" class="form-control" id="code" placeholder="Input field" name="code" value="<?php echo $customer['code']  ?>" >
													</div>
													<br><br>
													<div class="form-group">
														<label for="">Name</label>
														<input type="text" class="form-control" id="name" placeholder="Input field" name="name" value="<?php echo $customer['name']  ?>" >
													</div>
													<br><br>											
													<div class="form-group">
														<label for="">Mobile</label>
														<input type="text" class="form-control" id="mobile" placeholder="Input field" name="mobile" value="<?php echo $customer['mobile'] ?>"></input>
													</div>
													<br><br>											
													<div class="form-group">
														<label for="">Email</label>
														<input type="email" class="form-control" id="email" placeholder="Input field" name="email" value="<?php echo $customer['email'] ?>"></input>
													</div>
													<br>		<br>										
													<div class="form-group">
														<label for="">Address</label>
														<input type="text" class="form-control" id="address" placeholder="Input field" name="address" value="<?php echo $customer['address'] ?>"></input>
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

								<a href="?mod=customer&act=del&id=<?php echo $customer['id'] ?>" title="Delete" class="fa fa-trash btn btn-sm btn-danger delete"  ></a>
							</td>
						</tr>
						<?php } ?>

					</tbody>


				</table>
			</div>
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
</div>
<?php include_once 'views/admin/layouts/footer.php'; ?>