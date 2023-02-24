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
								<h2 class="main-content-title tx-24 mg-b-5">Products</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item " >Products</li>
									<li class="breadcrumb-item active"  aria-current="page">Add Product</li>
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
									<form action="<?php echo base_url(); ?>Product/add_product" method="POST" enctype="multipart/form-data" id="myForm">
										<div class="card custom-card">
											<div class="card-body">
												<div class="row row-sm">
													<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">Product Name</p>
															<input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="<?php if(isset($product)){ echo $product['name'];} ?>">
															<input type="hidden" class="form-control" name="id" id="id" placeholder="Product Name" value="<?php if(isset($product)){ echo $product['id'];} ?>">
														    
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">Short Description</p>
															<textarea rows="3" class="form-control " name="short_description" id="short_description" placeholder="Short Description"  ><?php if(isset($product)){ echo $product['short_desc'];} ?></textarea>
														</div>
													</div>
													<!-- <div class="col-md-12"> -->
														
														<!--<div class="col-md-8">-->
														<!--	<div class="form-group">-->
														<!--		<p class="mg-b-10">Tags (used for better search result)</p>-->
														<!--		<input type="text" class="form-control " name="tags" id="tags" placeholder="Tags (comma seperated)" value="<?php if(isset($product)){ echo $product['tags'];} ?>">-->
																
														<!--	</div>-->
														<!--</div>-->
													<!-- </div> -->

												</div>
												<div class="row row-sm">
												    <div class="col-md-4">
															<div class="form-group">
																<p class="mg-b-10">Categories</p>
																<select name="category_id" id="category_id" class="form-control select2">
																	<option value="0">Select Category</option>
																	<?php foreach ($categories as $cat) { ?>
																		
																	<option value="<?php echo $cat['id']; ?>" <?php if(isset($product) && $product['category_id'] == $cat['id']){ echo 'selected'; } ?>><?php echo $cat['name']; ?></option>
																	<?php } ?>
																</select>
																
															</div>
														</div>
														
													<div class="col-md-4">
															<div class="form-group">
																<p class="mg-b-10">Tax</p>
																<select name="tax_id" id="category_id" class="form-control select2">
																	<option value="0">Select Category</option>
																	<?php foreach ($taxes as $tax) { ?>
																		
																	<option value="<?php echo $tax['id']; ?>" <?php if(isset($product) && $product['tax_id'] == $tax['id']){ echo 'selected'; } ?>><?php echo $tax['tax_name']; ?></option>
																	<?php } ?>
																</select>
																
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
															<p class="mg-b-10">HSN Code</p>
															<input type="text" class="form-control" name="hsn_code" id="hsn_code" placeholder="HSN code" value="<?php if(isset($product)){ echo $product['hsn_code'];} ?>">
															
														    
														</div>
														</div>
												</div>
												<div class="row row-sm">
												
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Size</p>
															<select name="sizes[]" id="sizes" class="form-control select2" multiple>
															    <!--<option value="none"  >None</option>-->
									                             <?php
															    $result = $this->db->order_by("display_order","ASC")->get("tbl_sizes")->result_array();
															    $selected = array();
															    if(isset($product)){
															        $selected = $sizes;
															    }
															    foreach($result as $row){
															        ?>
															        
															            <option value="<?php echo $row['id']; ?>" <?php if(in_array($row['id'],$selected)) echo "selected";  ?>  ><?php echo $row['size_name']; ?></option>
															        }
                                                                <?php
															    }
															    ?>
                                                            </select>
															
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Fabric</p>
													
        											        	<select class="form-control select2" name="fabric[]" multiple="multiple">
                													 <?php
        															    $result = $this->db->order_by("display_order","ASC")->get("tbl_fabric")->result_array();
        															    $selected = array();
        															    if(isset($product)){
        															        $selected = $sizes;
        															    }
        															    foreach($result as $row){
        															        ?>
        															        
        															            <option value="<?php echo $row['id']; ?>" <?php if(in_array($row['id'],$selected)) echo "selected";  ?>  ><?php echo $row['fabric_name']; ?></option>
        															        }
                                                                        <?php
        															    }
        															    ?>
                												</select>
											
											              
														</div>
													</div>
												</div>
												
													<div class="row row-sm">
												

								
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Padding</p>
													
        											        	<select class="form-control select2" name="padding[]" multiple="multiple">
                													<?php
        															    $result = $this->db->order_by("display_order","ASC")->get("tbl_padding")->result_array();
        															    $selected = array();
        															    if(isset($product)){
        															        $selected = $sizes;
        															    }
        															    foreach($result as $row){
        															        ?>
        															        
        															            <option value="<?php echo $row['id']; ?>" <?php if(in_array($row['id'],$selected)) echo "selected";  ?>  ><?php echo $row['padding_name']; ?></option>
        															        }
                                                                        <?php
        															    }
        															    ?>
                												</select>
											
											              
														</div>
													</div>
													
													<div class="col-md-6">
														<div class="form-group">
															<p class="mg-b-10">Coverage</p>
													
        											        	<select class="form-control select2" name="coverage[]" multiple="multiple">
                														<?php
        															    $result = $this->db->order_by("display_order","ASC")->get("tbl_coverage")->result_array();
        															    $selected = array();
        															    if(isset($product)){
        															        $selected = $sizes;
        															    }
        															    foreach($result as $row){
        															        ?>
        															        
        															            <option value="<?php echo $row['id']; ?>" <?php if(in_array($row['id'],$selected)) echo "selected";  ?>  ><?php echo $row['coverage_name']; ?></option>
        															        }
                                                                        <?php
        															    }
        															    ?>
                												</select>
											
											              
														</div>
													</div>
												</div>
												
												
													
												
												
												<div class="row row-sm">
													<div class="col-md-3">
														<div class="form-group">
															<p class="mg-b-10">Trending Products ?</p>
															<?php if(!empty($product['trending_products'])){?>
															
															<label class="custom-switch">
																<span class="custom-switch-description">NO</span> 
																<input type="checkbox" name="trending_products" class="custom-switch-input" checked>
																<span class="custom-switch-indicator"></span>
																<span class="custom-switch-description">Yes</span>
															</label>
															<?php } else { ?>
														
															<label class="custom-switch">
																<span class="custom-switch-description">NO</span> 
																<input type="checkbox" name="trending_products" class="custom-switch-input" >
																<span class="custom-switch-indicator"></span>
																<span class="custom-switch-description">Yes</span>
															</label>
															
															<?php } ?>
														
															
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<p class="mg-b-10">Is Best Seller?</p>
															<?php if(!empty($product['best_seller'])){?>
															
															<label class="custom-switch">
																<span class="custom-switch-description">NO</span> 
																<input type="checkbox" name="best_seller" class="custom-switch-input" checked>
																<span class="custom-switch-indicator"></span>
																<span class="custom-switch-description">Yes</span>
															</label>
															<?php }else{ ?>
															
															
														    
															<label class="custom-switch">
																<span class="custom-switch-description">NO</span> 
																<input type="checkbox" name="best_seller" class="custom-switch-input" >
																<span class="custom-switch-indicator"></span>
																<span class="custom-switch-description">Yes</span>
															</label>
															<?php } ?>
														
															
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<p class="mg-b-10">Price</p>
															<input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php if(isset($product)){ echo $product['price'];} ?>">
															
														</div>
													</div>
													
													<div class="col-md-3">
														<div class="form-group">
															<p class="mg-b-10">Special Price </p>
															<input type="text" class="form-control" name="special_price" id="special_price" placeholder="Special Price" value="<?php if(isset($product)){ echo $product['special_price'];} ?>">
															
														</div>
													</div>
													



												</div>
												
												<div class="row row-sm">
													<div class="col-md-6">
														<div class="form-group" >
															<p class="mg-b-10">Main Image</p>
															<input type="text" readonly="" class="form-control " name="path" id="path"  value="<?php if(isset($product)){ echo $product['main_image'];} ?>" >
															<br>
															<a class="btn ripple btn-secondary" data-target="#scrollmodal" data-toggle="modal" href="" onclick="setCurrentFlag('main')">Select Image</a>
														</div>
														
													</div>
													<div class="col-md-6">
														<div class="form-group row justify-content-center mb-0">
															 <?php if(isset($product)){  ?>

															<img  id="img-preview" src="<?php echo base_url().$product['main_image']; ?>" height="75">
															 	<?php }else{ ?>
															<img src="" id="img-preview" style="display:none" height="75">
															 	<?php } ?>
														</div>
														
													</div>
												</div>
												
												<div class="col-md-12">
														<div class="form-group">
															<p class="mg-b-10">Product Type </p>
															<select name="type" id="type" class="form-control select2">
																<option value="simple_product" <?php if(isset($product) && $product['type'] == 'simple_product'){ echo 'selected'; } ?>>Simple</option>
																<option value="variable_product" <?php if(isset($product) && $product['type'] == 'variable_product'){ echo 'selected'; } ?>>Variable</option>
															</select>
															
														</div>
														
													</div>
												
												<textarea name="product_description" id="product_description" placeholder="Product Description"></textarea>
												<div class="form-group row justify-content-end mb-0">
														<div class="col-md-8 pl-md-2">
															<input type="hidden" name="current_image_section" id="current_image_section">
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
		<!-- Internal Summernote js-->
		<script src="<?php echo ASSETS; ?>assets/plugins/summernote/summernote-bs4.js"></script>

		<script type="text/javascript">
			$(document).ready(function(){
				$("#myForm").validate({
					rules: {
						category_name: {
							required: true,
						},
						price:{
						    required: true,
						},
						special_price:{
						    required: true,
						},
						path: {
							required: true,
						},
						sizes: {
							required: true,
						},
						order: {
							required: true,
							number: true,
							min: 1,
						}
					}
				});

				$('.select2').select2({
					placeholder: 'Choose one',
					searchInputPlaceholder: 'Search',
					 width: '100%'
				});
					$('.select3').select2({
					placeholder: 'Choose one',
					searchInputPlaceholder: 'Search',
					 width: '100%'
				});
				$('#product_description').summernote({
					placeholder: 'Product Description',
					tabsize: 3,
					height: 300
				});
			})
			function selectImage(id,path){
				var flg = $("#current_image_section").val();
				console.log(flg)
					$("#scrollmodal").modal("hide");
				if(flg == 'main'){
					$("#img-preview").attr("src","<?php echo base_url(); ?>"+path);
					$("#img-preview").show();
					$("#path").val(path);
				}else if(flg == 'extra'){
					$("#extra-images").append('<div class="col-sm-4" > <button class="rem-btn" type="button">X</button><img  id="img-preview1" src="<?php echo base_url(); ?>'+path+'" height="75"><input type="hidden" name="extra_images[]" value="'+path+'"></div>');
					// $("#img-preview").show();
					// $("#path").val(path);
				}
			}
			function setCurrentFlag(path){
				$("#current_image_section").val(path);
			}
			function removeDiv(div){
				$("#"+div).remove()
			}
			function removeimg(i)
            {   
                
                if (confirm("The image will be deleted after updating the product.") == true) {
                    document.getElementById('#'+i).remove();
                }
            }
            function removeimg1(x)
            {   
                
                if (confirm("The image will be deleted after updating the product.") == true) {
                    document.getElementById('#'+x).remove();
                }
            }
             $('#extra-images').delegate('button.rem-btn', 'click', function () {
		        $(this).parent().fadeOut('slow').remove();
		        return false;
		    });
		</script>

	</body>
</html>