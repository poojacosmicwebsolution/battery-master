<!DOCTYPE html>
<html lang="en">
	<head>

		<?php $this->load->view("include/head"); ?>

	</head>

	<body class="main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo ASSETS; ?>assets/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">

			<?php $this->load->view("include/sidemenu"); ?>


			<?php $this->load->view("include/header"); ?>

			

			<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Delivery Time</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Delivery Time list</li>
								</ol>
							</div>
							
							
						</div>
						<!-- End Page Header -->
						<div class="row row-sm">
							<div class="col-md-12">
								<?php if($this->session->flashdata('error')){ ?>
								<div class="alert alert-danger" role="alert">
										<button aria-label="Close" class="close" data-dismiss="alert" type="button">
											<span aria-hidden="true">&times;</span>
										</button>
									<?php echo $this->session->flashdata('error'); ?>
								</div>
								<?php } ?>

								<?php if($this->session->flashdata('success')){ ?>
								<div class="alert alert-success" role="alert">
									<button aria-label="Close" class="close" data-dismiss="alert" type="button">
										<span aria-hidden="true">&times;</span>
									</button>
									<?php echo $this->session->flashdata('success'); ?>
								</div>
								<?php } ?>
							</div>
							<div class="col-lg-12">
										<form action="<?php echo base_url(); ?>Delivery_time/add_time" method="POST" enctype="multipart/form-data" id="myForm">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row row-sm">
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Time</p>
															<input type="text" class="form-control " name="time" id="time" placeholder="Delivery Time" value="<?php if(isset($dtime)){ echo $dtime['time'];} ?>">
															<?php if(isset($dtime)){ ?>
															<input type="hidden" class="form-control " name="id" id="id" placeholder="dtime Name" value="<?php if(isset($dtime)){ echo $dtime['id'];} ?>">
														<?php } ?>
														</div>
													</div>
													
												</div>
												<div class="form-group row justify-content-end mb-0">
														<div class="col-md-8 pl-md-2">
															<button class="btn ripple btn-secondary pd-x-30" type="reset">Cancel</button>
															<button class="btn ripple btn-primary pd-x-30 mg-r-5" type="submit">Submit</button>
														</div>
													</div>
											</div>
										</div>
									</form>
							</div>

						</div>

						<!-- Row -->
						<div class="row row-sm">
							
							
								<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">Time List</h6>
											<p class="text-muted card-sub-title">This are all Delivery Times you added</p>
										</div>
										<div class="table-responsive">
											<table class="table" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">ID</th>
														<th class="wd-25p">Time</th>
														<th class="wd-20p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($delivery_times as $dt){ ?>
													<tr>
														<td><?php echo $dt['id']; ?></td>
														<td><?php echo $dt['time']; ?></td>
														<td>
																		<a href="<?php echo base_url(); ?>Delivery_time/delete/<?php echo $dt['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
																		<a href="<?php echo base_url(); ?>Delivery_time/edit/<?php echo $dt['id']; ?>" class="btn btn-info btn-sm">Edit</a>

																													
															</td>
													</tr>
													<?php } ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

						</div>
						<!-- End Row -->

						
					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<?php $this->load->view("include/footer"); ?>
			<?php $this->load->view("include/leftsidemenu"); ?>

			

		</div>
		<!-- End Page -->

		<?php $this->load->view("include/script"); ?>
		<!-- Internal Data Table js -->
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/dataTables.buttons.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/jszip.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/pdfmake.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/vfs_fonts.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/buttons.html5.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/buttons.print.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/plugins/datatable/fileexport/buttons.colVis.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/js/table-data.js"></script>

		<script type="text/javascript">
			function copyToClipboard(text){
				// var text = "Example text to appear on clipboard";
				navigator.clipboard.writeText(text).then(function() {
					alert("Copied to clipboard")
				  // console.log('Async: Copying to clipboard was successful!');
				}, function(err) {
					alert("Copy not supported on this browser")
				  // console.error('Async: Could not copy text: ', err);
				});
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#myForm").validate({
					rules: {
						time: {
							required: true,
						}
					}
				});
			})
		</script>


	</body>
</html>