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
								<h2 class="main-content-title tx-24 mg-b-5">Size</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<?php if(isset($size) && !empty($size['id'])){ ?>
									<li class="breadcrumb-item active" aria-current="page">Edit Size</li>
														<?php }else{ ?> 
									<li class="breadcrumb-item active" aria-current="page">Add Size</li>
															<?php } ?>
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
									<form action="<?php echo base_url(); ?>Size_master/add_size" method="POST" enctype="multipart/form-data" id="myForm">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row row-sm">
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Size Name</p>
															<input type="text" class="form-control " name="size_name" id="size_name" placeholder="Size Name" value="<?php if(isset($size) && !empty($size['size_name'])){ echo $size['size_name'];} ?>" >
															<?php if(isset($size) && !empty($size['id'])){ ?>
															<input type="hidden" class="form-control " name="id" id="id"  value="<?php if(isset($size) && !empty($size['id'])){ echo $size['id'];} ?>" >
														<?php } ?>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Display Order</p>
															<input type="text" class="form-control " name="display_order" id="display_order" placeholder="Display Order" value="<?php if(isset($size) && !empty($size['display_order'])){ echo $size['display_order'];} ?>" >
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

			<?php $this->load->view("include/footer"); ?>
			<?php $this->load->view("include/leftsidemenu"); ?>

			

		</div>
		<!-- End Page -->

		<?php $this->load->view("include/script"); ?>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#myForm").validate({
					rules: {
						size_name: {
							required: true,
						},
						display_order: {
							required: true,
						}
					}
				});
			})
		</script>

	</body>
</html>