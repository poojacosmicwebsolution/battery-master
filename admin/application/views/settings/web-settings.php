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
								<h2 class="main-content-title tx-24 mg-b-5">Settings</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Settings</a></li>
									<li class="breadcrumb-item active"  aria-current="page">Web Settings</li>
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
									<form action="<?php echo base_url(); ?>Settings/update_web_settings" method="POST" enctype="multipart/form-data" id="myForm">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row row-sm">
													<div class="col-md-4">
														<div class="form-group">
															<p class="mg-b-10">Site Title</p>
															<input type="text" class="form-control " name="site_title" id="site_title" placeholder="Site Title" value="<?php if(isset($web_settings['site_title'])){ echo $web_settings['site_title'];} ?>">
															
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<p class="mg-b-10">Support Number</p>
															<input type="text" class="form-control " name="support_number" id="support_number" placeholder="Support Number"  value="<?php if(isset($web_settings['support_number'])){ echo $web_settings['support_number'];} ?>">
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group">
															<p class="mg-b-10">Support Email</p>
															<input type="text" class="form-control " name="support_email" id="support_email" placeholder="Support Email"  value="<?php if(isset($web_settings['support_email'])){ echo $web_settings['support_email'];} ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<!--<p class="mg-b-10">Minimum Cart Amount</p>-->
															<p class="mg-b-10">Minimum Referal Settings</p>
															<input type="text" class="form-control " name="min_cart_amount" id="min_cart_amount" placeholder="Min Referal Setting"  value="<?php if(isset($min_cart_amount)){ echo $min_cart_amount;} ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Referal Bonus</p>
															<input type="text" class="form-control " name="referal_bonus" id="referal_bonus" placeholder="Referal Bouns"  value="<?php if(isset($web_settings['referal_bonus'])){ echo $web_settings['referal_bonus'];} ?>">
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">Address</p>
															<textarea type="text" class="form-control " name="address" id="address" placeholder="Address"  ><?php if(isset($web_settings['address'])){ echo $web_settings['address'];} ?></textarea>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">Short Description</p>
															<textarea type="text" class="form-control " name="short_description" id="short_description" placeholder="Short Description"  ><?php if(isset($web_settings['short_description'])){ echo $web_settings['short_description'];} ?></textarea>
														</div>
													</div>

													<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">Map IFrame</p>
															<textarea rows="5" class="form-control " name="map_iframe" id="map_iframe" placeholder="Map IFrame"  ><?php if(isset($web_settings['map_iframe'])){ echo $web_settings['map_iframe'];} ?></textarea>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Website Logo</p>
															<a class="btn ripple btn-secondary" data-target="#scrollmodal" data-toggle="modal" href="">Select Image</a>
															<br>
															
														</div>

													</div>
													<div class="col-md-6">
														<div class="form-group">
															
															<?php if(isset($web_settings['web_logo'])){  ?>
															<input type="hidden" name="web_logo" id="web_logo" value="<?php if(isset($web_settings['web_logo'])){ echo $web_settings['web_logo'];} ?>">
															<img src="<?php echo base_url().$web_settings['web_logo']; ?>" id="img-preview" height="100px">
															<?php }else{ ?>
															<input type="hidden" name="web_logo" id="web_logo">
															<img src="" id="img-preview" style="display:none" height="100px">
															<?php } ?>
														</div>

													</div>


												</div>
													<hr>
												<div class="row  row-sm">
													<h4>Social Media Links</h4>
												</div>
												<div class="row  row-sm">
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Linkedin</p>
															<input type="text" class="form-control " name="linkedin" id="Linkedin" placeholder="Linkedin" value="<?php if(isset($web_settings['linkedin'])){ echo $web_settings['linkedin'];} ?>">
															
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Facebook</p>
															<input type="text" class="form-control " name="facebook" id="facebook" placeholder="Facebook"  value="<?php if(isset($web_settings['facebook'])){ echo $web_settings['facebook'];} ?>">
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Instagram</p>
															<input type="text" class="form-control " name="instagram" id="instagram" placeholder="Instagram" value="<?php if(isset($web_settings['instagram'])){ echo $web_settings['instagram'];} ?>">
															
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Youtube</p>
															<input type="text" class="form-control " name="youtube" id="youtube" placeholder="Youtube"  value="<?php if(isset($web_settings['youtube'])){ echo $web_settings['youtube'];} ?>">
														</div>
													</div>
												</div>
												<hr>
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
								<?php
								$media = $this->common_model->getAllMedia();
								 foreach($media as $m){ ?>
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
				// 		site_title: {
				// 			required: true,
				// 		},
				// 		support_number: {
				// 			required: true,
				// 		},
				// 		support_email: {
				// 			required: true,
				// 		},
				// 		address: {
				// 			required: true,
				// 		},
				// 		short_description: {
				// 			required: true,
				// 		},
				// 		map_iframe: {
				// 			required: true,
				// 		},
				// 		twitter: {
				// 			required: true,
				// 		},
				// 		facebook: {
				// 			required: true,
				// 		},
				// 		instagram: {
				// 			required: true,
				// 		},
				// 		youtube: {
				// 			required: true,
				// 		},
				// 		web_logo: {
				// 			required: true,
				// 		}
					}
				});
			})
			function selectImage(id,path){
				$("#img-preview").attr("src","<?php echo base_url(); ?>"+path);
				$("#img-preview").show();
				$("#scrollmodal").modal("hide");
				$("#web_logo").val(path);
			}
		</script>

	</body>
</html>