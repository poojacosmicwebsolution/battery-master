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
								<h2 class="main-content-title tx-24 mg-b-5">Slider</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item "  aria-current="page">Slider</li>
									<li class="breadcrumb-item active">Add Slider</li>
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
									<form action="<?php echo base_url(); ?>Slider/add_slider" method="POST" enctype="multipart/form-data" id="myForm">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row row-sm">
													
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Select Slider</p>
															<select name="slider" id="slider" class="form-control select2">
																<option value="home slider" <?php if(isset($slider['slider']) && $slider['slider'] == 'home slider'){ echo 'selected'; } ?> >Home Slider</option>
																<!--<option value="home banner slider" <?php if(isset($slider['slider']) && $slider['slider'] == 'home banner slider'){ echo 'selected'; } ?> >Home Banner Slider</option>-->
																
															</select>
															<?php if(isset($slider)){ ?>
															<input type="hidden" class="form-control " name="id" id="id" placeholder="slider Name" value="<?php if(isset($slider)){ echo $slider['id'];} ?>">
														<?php } ?>
														</div>
													</div>
													
													 <div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Add Link To Slider</p>
															<input type="text" class="form-control " name="sliderlink" id="order" placeholder="Link"  value="<?php if(isset($slider)){ echo $slider['href'];} ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group" >
															<p class="mg-b-10">Image Path</p>
															<input type="text" readonly="" class="form-control " name="path" id="path"  value="<?php if(isset($slider)){ echo $slider['image'];} ?>" >
															<br>
															<a class="btn ripple btn-secondary" data-target="#scrollmodal" data-toggle="modal" href="">Select Image</a>
														</div>
														
													</div>
													<div class="col-md-6">
														<div class="form-group row justify-content-center mb-0">
															 <?php if(isset($category)){  ?>

															<img  id="img-preview" src="<?php echo base_url().$slider['image']; ?>" height="250">
															 	<?php }else{ ?>
															<img src="" id="img-preview" style="display:none" height="250">
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
						slider: {
							required: true,
						},
						path: {
							required: true,
						}
					}
				});
				$('.select2').select2({
					placeholder: 'Choose one',
					searchInputPlaceholder: 'Search',
					 width: '100%'
				});
			})
			function selectImage(id,path){
				$("#img-preview").attr("src","<?php echo base_url(); ?>"+path);
				$("#img-preview").show();
				$("#scrollmodal").modal("hide");
				$("#path").val(path);
			}
		</script>

	</body>
</html>