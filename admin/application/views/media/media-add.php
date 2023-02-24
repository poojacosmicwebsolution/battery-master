<!DOCTYPE html>
<html lang="en">
	<head>

		<?php $this->load->view("include/head"); ?>
		<!-- InternalFileupload css-->
		<link href="<?php echo ASSETS; ?>assets/plugins/fileuploads/css/fileupload.css" rel="stylesheet" type="text/css"/>

		<!-- InternalFancy uploader css-->
		<link href="<?php echo ASSETS; ?>assets/plugins/fancyuploder/fancy_fileupload.css" rel="stylesheet" />

		<link href="<?php echo ASSETS; ?>assets/crop-image/cropper.min.css" rel="stylesheet" />

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
								<h2 class="main-content-title tx-24 mg-b-5">Media</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Add Media</li>
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
									<form action="<?php echo base_url(); ?>Media/add_media" method="POST" enctype="multipart/form-data">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row mb-4">
													<div class="col-sm-6 col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Select Size</p>
															<select name="size" id="size" class="form-control " onchange="sizechanged()">
																<option value=""  >Select Size</option>
																<option value="category" data-height="325" data-width="1520">Category Image</option>
																<option value="product" data-height="650" data-width="570">Product Image</option>
																<option value="offer" data-height="341" data-width="634">Offer Image</option>
																<option value="offer_big_size" data-height="532" data-width="1276">Offer Big Size Image</option>
																<option value="banner" data-height="100" data-width="400">Banner Image</option>
																<option value="home_slider" data-height="550" data-width="1500">Home Slider</option>
																<option value="home_middle_banner" data-height="250" data-width="1170">Home Middle Banner</option>
																<option value="blog_thumbnail" data-height="600" data-width="500">Blog Thumbnail</option>
																<option value="Logo" data-height="auto" data-width="auto">Logo</option>
																
															</select>
														</div>
													</div>
													<div class="col-sm-6 col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Select Image</p>
															<input type="file" name="media" id="media" class="form-control" required data-image-index="0" />
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


				<!-- Internal Fileuploads js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/fileuploads/js/fileupload.js"></script>
        <script src="<?php echo ASSETS; ?>assets/plugins/fileuploads/js/file-upload.js"></script>

		<!-- InternalFancy uploader js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/fancyuploder/jquery.ui.widget.js"></script>
        <script src="<?php echo ASSETS; ?>assets/plugins/fancyuploder/jquery.fileupload.js"></script>
        <script src="<?php echo ASSETS; ?>assets/plugins/fancyuploder/jquery.iframe-transport.js"></script>
        <script src="<?php echo ASSETS; ?>assets/plugins/fancyuploder/jquery.fancy-fileupload.js"></script>
        <script src="<?php echo ASSETS; ?>assets/plugins/fancyuploder/fancy-uploader.js"></script>

		<!-- Internal Form-elements js-->
		<!-- <script src="<?php echo ASSETS; ?>assets/js/advanced-form-elements.js"></script> -->
		<script src="<?php echo ASSETS; ?>assets/js/custom.js"></script>

		<script src="<?php echo ASSETS; ?>assets/crop-image/cropper.min.js"></script>
		<script src="<?php echo ASSETS; ?>assets/crop-image/image-crop-app.js"></script>
		<script type="text/javascript">
			$('input[name="media"]').change(function(){

				// loadimagecropper();
				var height = $("#size").find(':selected').attr('data-height');
				var width = $("#size").find(':selected').attr('data-width');
				if(height && width){

					var ht = parseInt(height);
					var wdt = parseInt(width);
					loadImagePreview(this, (wdt / ht));
				}else{
					alert("Please select Image Type")
				}
			});
			// function loadimagecropper(){
			// 	var height = $("#size").find(':selected').attr('data-height');
			// 	var width = $("#size").find(':selected').attr('data-width');
			// 	if(height && width){

			// 		var ht = parseInt(height);
			// 		var wdt = parseInt(width);
			// 		loadImagePreview($('input[name="media"]'), (wdt / ht));
			// 	}else{
			// 		alert("Please select Image Type")
			// 	}
			// }
			function sizechanged(){
				// var file = document.getElementById("media");
				// if(file.files.length > 0 ){
	   //              loadimagecropper();
	   //          }
			}
		</script>


	</body>
</html>