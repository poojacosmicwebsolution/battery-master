<!DOCTYPE html>
<html lang="en">
	<head>

		<?php $this->load->view("include/head"); ?>
		
<style type="text/css">
	.rem-btn{
		   /* position: relative;
    top: 0px;
    left: 1px;*/
	}
</style>
		<!-- Internal Summernote css-->
		<link rel="stylesheet" href="<?php echo ASSETS; ?>assets/plugins/summernote/summernote-bs4.css">
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
								<h2 class="main-content-title tx-24 mg-b-5">Cms</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item " >Cms</li>
									<li class="breadcrumb-item active"  aria-current="page">Manage Website Contents</li>
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
										
										<div class="row row-sm">
											<div class="col-xl-3 col-lg-12 col-md-12">
												<div class="card custom-card">
													<div class="card-header">
														<h3 class="main-content-label">Product Data</h3>
													</div>
													
													<ul class="item1-links nav nav-tabs  mb-0">
														
														<li class="nav-item">
															<a data-target="#about_us_tab" class="nav-link active" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> About Us</a>
														</li>
														<!--<li class="nav-item">-->
														<!--	<a data-target="#contact_us_tab" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> Contact Us</a>-->
														<!--</li>-->
														<li class="nav-item">
															<a data-target="#terms_and_conditions_tab" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> Terms And Conditions</a>
														</li>
														<li class="nav-item">
															<a data-target="#refund_policy_tab" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> Refund Policy</a>
														</li>
														<li class="nav-item">
															<a data-target="#privacy_policy_tab" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> Privacy Policy</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="col-xl-9 col-lg-12 col-md-12">
												<div class="card custom-card">
													<div class="card-body">
														<div class="tab-content" id="myTabContent">
															<div class="tab-pane fade show active" id="about_us_tab" role="tabpanel">
																<div class="d-flex mb-4">
																	<label class="main-content-label my-auto">About Us</label>
																	
																</div>
																<div class="table-responsive">
																	<form method="POST" action="<?php echo base_url(); ?>Cms/update/about_us">
																		<textarea name="value" id="about_us"><?php if(isset($about_us) ){ echo $about_us; } ?></textarea>
																		<br>
																		<br>
																		<input type="submit" name="update" value="Update" class="btn btn-sm- btn-primary float-right">
																	</form>
																</div>
															</div>

															<!--<div class="tab-pane fade show " id="contact_us_tab" role="tabpanel">-->
															<!--	<div class="d-flex mb-4">-->
															<!--		<label class="main-content-label my-auto">Contact Us</label>-->
																	
															<!--	</div>-->
															<!--	<div class="table-responsive">-->
															<!--		<form method="POST" action="<?php echo base_url(); ?>Cms/update/contact_us">-->
															<!--			<textarea name="value" id="contact_us"><?php if(isset($contact_us) ){ echo $contact_us; } ?></textarea>-->
															<!--			<br>-->
															<!--			<br>-->
															<!--			<input type="submit" name="update" value="Update" class="btn btn-sm- btn-primary float-right">-->
															<!--		</form>-->
															<!--	</div>-->
															<!--</div>-->
															<div class="tab-pane fade show " id="terms_and_conditions_tab" role="tabpanel">
																<div class="d-flex mb-4">
																	<label class="main-content-label my-auto">Terms and Conditions</label>
																	
																</div>
																<div class="table-responsive">
																	<form method="POST" action="<?php echo base_url(); ?>Cms/update/terms_and_conditions">
																		<textarea name="value" id="terms_and_conditions"><?php if(isset($terms_and_conditions) ){ echo $terms_and_conditions; } ?></textarea>
																		<br>
																		<br>
																		<input type="submit" name="update" value="Update" class="btn btn-sm- btn-primary float-right">
																	</form>
																</div>
															</div>
															<div class="tab-pane fade show " id="privacy_policy_tab" role="tabpanel">
																<div class="d-flex mb-4">
																	<label class="main-content-label my-auto">Privacy Policy</label>
																	
																</div>
																<div class="table-responsive">
																	<form method="POST" action="<?php echo base_url(); ?>Cms/update/privacy_policy">
																		<textarea name="value" id="privacy_policy"><?php if(isset($privacy_policy) ){ echo $privacy_policy; } ?></textarea>
																		<br>
																		<br>
																		<input type="submit" name="update" value="Update" class="btn btn-sm- btn-primary float-right">
																	</form>
																</div>
															</div>
															<div class="tab-pane fade show " id="refund_policy_tab" role="tabpanel">
																<div class="d-flex mb-4">
																	<label class="main-content-label my-auto">Return & Refund Policy</label>
																	
																</div>
																<div class="table-responsive">
																	<form method="POST" action="<?php echo base_url(); ?>Cms/update/refund_policy">
																		<textarea name="value" id="refund_policy"><?php if(isset($refund_policy) ){ echo $refund_policy; } ?></textarea>
																		<br>
																		<br>
																		<input type="submit" name="update" value="Update" class="btn btn-sm- btn-primary float-right">
																	</form>
																</div>
															</div>
															
															
														</div>
													</div>
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

			<div class="modal" id="modalAddAttribute">
				<div class="modal-dialog modal-md" role="document">
					<form method="POST" action="<?php echo base_url(); ?>Product/add_attribute" id="attributeForm">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">Add Attribute</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="row row-sm">
									<div class="col-md-12">
										<div class="form-group">
											<p class="mg-b-10">Select Attribute</p>
											<select  class="form-control select2" name="attribute_id" id="attribute_id" placeholder="Product Name " >
												<option value="">Select Attribute</option>
													<?php foreach ($all_attributes as $at) { ?>
														
													<option value="<?php echo $at['id']; ?>" data-textvalue="<?php echo $at['name']; ?>"><?php echo $at['name']; ?></option>
													<?php } ?>
											</select>
											<input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
											<input type="hidden" name="product_attribute_id" id="product_attribute_id">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<p class="mg-b-10">Set Value</p>
											<textarea type="text" class="form-control " rows="6" name="attribute_value" id="attribute_value" placeholder="Value or Description" ></textarea>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn-primary" type="submit" >Save changes</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<div class="modal" id="modalAddVariant">
				<div class="modal-dialog modal-md" role="document">
					<form method="POST" action="<?php echo base_url(); ?>Product/add_Variant" id="variantForm">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">Add Variant</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<div class="row row-sm">
									
									<div class="col-md-12">
										<div class="form-group">
											<p class="mg-b-10">Variant Text</p>
											<input type="text" class="form-control "  name="variant_text" id="variant_text" placeholder="variant Text" >
											<input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
											<input type="hidden" name="product_variant_id" id="product_variant_id">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<p class="mg-b-10">Price</p>
											<input type="text" class="form-control "  name="price" id="price" placeholder="Price" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<p class="mg-b-10">Special Price</p>
											<input type="text" class="form-control "  name="special_price" id="special_price" placeholder="Special Price" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<p class="mg-b-10">SKU</p>
											<input type="text" class="form-control "  name="sku" id="sku" placeholder="SKU" >
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<p class="mg-b-10">Stock Qty</p>
											<input type="text" class="form-control "  name="stock" id="stock" placeholder="Stock Qty" >
										</div>
									</div>
									
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn ripple btn-primary" type="submit" >Save changes</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			<?php $this->load->view("include/footer"); ?>
			<?php $this->load->view("include/leftsidemenu"); ?>

			

		</div>
		<!-- End Page -->

		<?php $this->load->view("include/script"); ?>
		<!-- Internal Summernote js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/summernote/summernote-bs4.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				
				$('#about_us').summernote({
					placeholder: 'About Us Content',
					tabsize: 3,
					height: 300
				});
				$('#contact_us').summernote({
					placeholder: 'Contact Us Content',
					tabsize: 3,
					height: 300
				});
				$('#terms_and_conditions').summernote({
					placeholder: 'Terms and Conditions Content',
					tabsize: 3,
					height: 300
				});
				$('#privacy_policy').summernote({
					placeholder: 'Privacy Policy Content',
					tabsize: 3,
					height: 300
				});
				$('#refund_policy').summernote({
					placeholder: 'Refund Policy Content',
					tabsize: 3,
					height: 300
				});
			})

			
		</script>

	</body>
</html>