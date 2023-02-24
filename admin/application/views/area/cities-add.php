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
								<h2 class="main-content-title tx-24 mg-b-5">City</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item "  aria-current="page">City</li>
									<li class="breadcrumb-item active">Add City</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									
									
								</div>
							</div>
							
						</div>
					

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
									<form action="<?php echo base_url(); ?>Area/add_city_db" method="POST" enctype="multipart/form-data" id="myForm">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row row-sm">
													<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">City Name</p>
															<input type="text" class="form-control " name="city" id="city" placeholder="City Name" value="<?php if(isset($city)){ echo $city['city'];} ?>">
															<?php if(isset($city)){ ?>
															<input type="hidden" class="form-control " name="id" id="id" placeholder="Category Name" value="<?php if(isset($city)){ echo $city['id'];} ?>">
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
						<!-- End Row -->

						
					</div>
				</div>
			</div>
			<!-- End Main Content-->

			<!-- Scroll with content modal -->
			<div class="modal" id="scrollmodal">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Select Image</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<table class="table table-stripped table-bordered">
								<?php foreach($media as $m){ ?>
								<tr>
									<td>
										<img src="<?php echo base_url().$m['path']; ?>" height="75">
										<?php echo $m['title']; ?>
									</td>
									<td>
										<button class="btn btn-success" onClick="selectImage('<?php echo $m['id']; ?>','<?php echo $m['path']; ?>')">Select</button>
									</td>
								</tr>
							<?php } ?>
							</table>
						</div>
						<div class="modal-footer">
							<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
							<button class="btn ripple btn-info" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Scroll with content modal -->

			<?php $this->load->view("include/footer"); ?>
			<?php $this->load->view("include/leftsidemenu"); ?>

			

		</div>
		<!-- End Page -->

		<?php $this->load->view("include/script"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#myForm").validate({
					rules: {
						city: {
							required: true,
						}
					}
				});
			})
		</script>

	</body>
</html>