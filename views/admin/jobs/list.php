<?php include_once 'views/admin/layouts/header.php'; ?>
<div class="content-wrapper" style="padding:0px 20px 20px 20px">
	<div class="row">
		<div class="col-lg-12">
			<h2 class="page-header ">
				<span class="text-uppercase">Job Management </span>
				<span>
					<a title="Add new" class="btn fa fa-plus btn btn-success" data-toggle="modal" data-target="#job_add_modal"></a>
				</span>
			</h2>
			<!-- form add new job -->
			<div class="modal fade" id="job_add_modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Add new Job</h4>
						</div>
						<!-- <div class="modal-body"> -->
							<form action="?mod=job&act=store" method="POST" role="form">
								<div class="modal-body">
									<div class="form-group">
										<label for="">Job</label>
										<input type="text" class="form-control" id="name" placeholder="Input field" name="name">
									</div>
									<div class="form-group">
										<label for="">Description</label>
										<input type="text" class="form-control" id="description" placeholder="Input field" name="description">
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="submit">Add</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
							</form>
							<!-- </div> -->

						</div>
					</div>
				</div>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div>
			<legend style="padding-bottom: 20px">List Job</legend>

			<table  id="myTable" class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Job</th>
						<th class="text-center">Description</th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $key => $job) { ?>
					<tr class="">
						<td class="text-center"><?php echo $job['id'] ?></td>
						<td class="text-left">
							<a href="?mod=job&act=staff_list&id=<?php echo $job['id'] ?>" title="" class="link">
								<?= $job['name'] ?>								
							</a>
						</td>
						<td class="text-left"><?= $job['description'] ?></td>
						<td class="text-center" width="20%">
							<!-- INFO -->
							<a href="" title="More about job" class="btn btn-sm " data-toggle="modal" data-target="#job_detail_modal_<?php echo $job['id'] ?>"><i class="fa fa-info"></i></a>

							<div class="modal fade" id="job_detail_modal_<?php echo $job['id'] ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">Job detail informations</h4>
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
							<!-- ./INFO  -->
							
							<!-- list product -->
							<a href="?mod=job&act=staff_list&id=<?php echo $job['id'] ?>" title="Staff List" class="btn btn-sm" style="color: green"><i class="fa fa-users"></i></a>
							
							<!-- edit -->
							<a href="" title="Update" class="btn btn-sm" style="color: orange" data-toggle="modal" data-target="#job_edit_modal_<?php echo $job['id'] ?>"><i class="fa fa-pencil"></i></a>							
							
							<div class="modal fade" id="job_edit_modal_<?php echo $job['id'] ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title">EDIT JOB INFORMATION</h4>
										</div>
										<form action="?mod=job&act=update" method="POST" role="form">
											<div class="modal-body text-left">
												<input type="hidden" name="id" value="<?php echo $job['id'] ?>">
												<div class="form-group">
													<label for="">Job</label>
													<input type="text" class="form-control" id="name" placeholder="Input field" name="name" value="<?php echo $job['name']  ?>" style="border-bottom:1px solid green;">
												</div>
												<br>
												<br>
												<div class="form-group">
													<label for="">Description</label>
													<textarea class="form-control" id="description" placeholder="Input field" name="description" style="border-bottom:1px solid green;" ><?php echo $job['description'] ?></textarea>
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
							<!-- ./edit -->

							<!-- delete -->
							<a href="?mod=job&act=del&id=<?php echo $job['id'] ?>" title="Delete" class="btn btn-sm delete" style="color: red"><i class="fa fa-trash"></i></a>
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