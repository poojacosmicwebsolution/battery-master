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
								<h2 class="main-content-title tx-24 mg-b-5">Customers</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Customer list</li>
								</ol>
							</div>
							
						</div>
						<!-- End Page Header -->

						<!-- Row -->
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
								<div class="card custom-card">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">Customer List</h6>
											<p class="text-muted card-sub-title">This are all customers registered in website</p>
										</div>
										<div class="table-responsive">
											<table class="table" id="example3">
												<thead>
													<tr>
														<th class="wd-20p">Name</th>
														<th class="wd-25p">Mobile</th>
														<th class="wd-20p">Email</th>
														<th class="wd-15p">Wallet Balance</th>
														<th class="wd-15p">Active/Inactive</th>
														<th class="wd-20p">Reg On</th>
														<th class="wd-20p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($customer as $c){ ?>
													<tr>
														<td><?php echo $c['username']; ?></td>
														<td><?php echo $c['mobile']; ?></td>
														<td><?php echo $c['email']; ?></td>
														<td><?php echo $c['wallet_balance']; ?></td>
														<td><?php echo $c['active'] == '1' ? 'Yes' : 'No'; ?></td>
														<td><?php echo date("d F, Y",strtotime($c['created'])); ?></td>
														<td>
															<?php if($c['active'] == '1'){ ?>
																		<a href="<?php echo base_url(); ?>Customer/deactivate/<?php echo $c['id']; ?>" class="btn btn-danger btn-sm">Activate</a>
															<?php }else{ ?>
																		<a href="<?php echo base_url(); ?>Customer/activate/<?php echo $c['id']; ?>" class="btn btn-success btn-sm">Activate</a>
															<?php } ?>															
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


	</body>
</html>