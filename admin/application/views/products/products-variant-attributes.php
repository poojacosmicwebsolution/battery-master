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
									<li class="breadcrumb-item active"  aria-current="page">Attributes and Variants</li>
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
									<form action="<?php echo base_url(); ?>Product/update_variants_and_attributes" method="POST" enctype="multipart/form-data" id="myForm">
										<?php if(isset($product)){ ?>
															<input type="hidden" class="form-control " name="id" id="id" placeholder="Product Name" value="<?php if(isset($product)){ echo $product['id'];} ?>">
														<?php } ?>
										<div class="row row-sm">
							<div class="col-xl-3 col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-header">
										<h3 class="main-content-label">Product Data</h3>
									</div>
									<div class="card-body text-center item-user">
										<div class="profile-pic">
											<div class="profile-pic-img">
												<span class="bg-success dots" data-toggle="tooltip" data-placement="top" title="online"></span>
												<img src="<?php echo base_url().$product['main_image']; ?>" class="rounded-circle" alt="user">
											</div>
											<a href="#" class="text-dark"><h5 class="mt-3 mb-0 font-weight-semibold"><?php echo $product['name']; ?></h5></a>
										</div>
									</div>
									<ul class="item1-links nav nav-tabs  mb-0">
										<li class="nav-item">
											<a data-target="#attributes" class="nav-link active" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> Attributes</a>
										</li>
										<li class="nav-item">
											<a data-target="#variants" class="nav-link" data-toggle="tab" role="tablist"><i class="ti-save-alt icon1"></i> Variants</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-9 col-lg-12 col-md-12">
								<div class="card custom-card">
									<div class="card-body">
										<div class="tab-content" id="myTabContent">
											<div class="tab-pane fade show active" id="attributes" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto">All Attributes</label>
													<h6 class="mb-0 ml-auto"><button class="btn btn-success  float-right" data-target="#modalAddAttribute" data-toggle="modal" type="button" onclick="clearAttributeId()"><i class=""></i>Add Attribute</button></h6>
												</div>
												<div class="table-responsive">
													
													<table class="table border text-md-nowrap text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Attribute Name</th>
																<th>Name</th>
																<th>Code</th>
																<th>Image</th>
																<th>Action</th>
															</tr>
														</thead>
														
														<tbody>
															<?php
															// echo "<pre>"; print_r($attributes);
															foreach($attributes as $att){ 
																
																?>
															<tr class="border-bottom">
																<th scope="row"><?php echo $att['id']; ?></th>
																<td><?php echo $att['attribute_name']; ?></td>
																<td><?php echo $att['value']; ?></td>
																<td><?php echo $att['code']; ?></td>
																
																<td>
																    <?php
																    if(isset($attributes)){ 
    															 	$extra_image_array = json_decode($att['path']);
    															    if(!empty($extra_image_array)){
																    ?>
																    <img src="<?php echo base_url().$extra_image_array[0]; ?>">
																    <?php }else{ ?>
																    <img src="<?php echo base_url().$att['path']; ?>">
																    <?php  } } ?>
																    </td>
																<td>
																	<a href="<?php echo base_url(); ?>Product/delete_attribute/<?php echo $att['id']; ?>/<?php echo $att['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
																	<a href="#" onclick="editAttribute('<?php echo $att['id']; ?>','<?php echo $att['attribute_id']; ?>','<?php echo $att['value']; ?>','<?php echo $att['code']; ?>','<?php $extra_img=json_decode($att['path']);  if(!empty($extra_img)){ foreach($extra_img as $img){ echo $img.' '; }  }else{  $att['path']; }    ?>')" class="btn btn-info btn-sm">Edit</a>
																	<!-- <a href="#" onclick="editAttribute('<?php echo $att['id']; ?>','<?php echo $att['attribute_id']; ?>','<?php echo $att['value']; ?>','<?php echo $att['code']; ?>',<?php $extra_img=json_decode($att['path']);  if(!empty($extra_img)){ foreach($extra_img as $img){ echo '\''.$img.'\','; } echo ')'; }else{  '\''.$att['path'].'\')'; }    ?>" class="btn btn-info btn-sm">Edit</a> -->
																	
																	
																</td>
															</tr>
														<?php } ?>
															
														</tbody>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="variants" role="tabpanel">
												<div class="d-flex mb-4">
													<label class="main-content-label my-auto">All Variants</label>
													<?php if($product['type'] == 'variable_product' || (count($variants) < 1)){ ?>
													<h6 class="mb-0 ml-auto"><button class="btn btn-success  float-right" type="button" data-target="#modalAddVariant" data-toggle="modal" onclick="clearVariantId()"><i class=""></i>Add Variant</button></h6>
												<?php } ?>
												</div>
												<div class="table-responsive">
													<table class="table border text-md-nowrap text-nowrap">
														<thead>
															<tr>
																<th>#</th>
																<th>Text</th>
																<th>Price</th>
																<th>Special Price</th>
																<th>ON/OFF Size</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php
															foreach($variants as $var){ ?>
															<tr class="border-bottom">
																<th scope="row"><?php echo $var['id']; ?></th>
																<td><?php echo $var['variant_text']; ?></td>
																<td><?php echo $var['price']; ?></td>
																<td><?php echo $var['special_price']; ?></td>
																<td>
            														    
            															<?php if($var['enable']==1){ ?>
            															<label class="custom-switch">
            																
            															<input type="checkbox" name="showdata" class="custom-switch-input show" data-id="<?php echo $var['id'] ?>" checked >
            															<span class="custom-switch-indicator"></span>
            																
            															</label>
            														<?php }else{ ?>
            															<label class="custom-switch">
            																
            															<input type="checkbox" name="showdata" class="custom-switch-input show" data-id="<?php echo $var['id'] ?>"  >
            															<span class="custom-switch-indicator"></span>
            																
            															</label>
            														<?php } ?>
            														
            														</td>
																<td>
																	<a href="<?php echo base_url(); ?>Product/delete_variant/<?php echo $var['id']; ?>/<?php echo $var['product_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
																	<a href="#" onclick="editVariant('<?php echo $var['id']; ?>','<?php echo $var['variant_text']; ?>','<?php echo $var['price']; ?>','<?php echo $var['special_price']; ?>','<?php echo $var['sku']; ?>','<?php echo $var['stock']; ?>')" class="btn btn-info btn-sm">Edit</a>
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
			<div class="modal" id="scrollmodal" style="z-index: 999999">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Select Image</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
						<div class="table-responsive">
            					<table class="table " id="example1">
            						<thead>
            							<tr>
            								<th class="wd-25p">Image</th>
            								<th class="wd-20p">Action</th>
            							</tr>
            						</thead>
            						<tbody>
            							<?php foreach($media as $m){ ?>
            							<tr>
            								<td>
            									<img src="<?php echo base_url().$m['path']; ?>" height="50">
            									<?php echo $m[ 'title']; ?>
            								</td>
            								<td>
            									<button class="btn btn-success" onClick="selectImage('<?php echo $m['id']; ?>','<?php echo $m['path']; ?>')">Select</button>
            								</td>
            							</tr>
            							<?php } ?>
            						</tbody>
            					</table>
            				</div>
						</div>
						<div class="modal-footer">
							<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
							<button class="btn ripple btn-info" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!--End Scroll with content modal -->

			<div class="modal" id="modalAddAttribute" style="z-index: 9999">
				<div class="modal-dialog modal-md modal-dialog-scrollable" role="document">
					<form method="POST" action="<?php echo base_url(); ?>Product/add_attribute" id="attributeForm">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title">Add Attribute</h6><button aria-label="Close" class="close" data-dismiss="modal" onclick="closebtn()" type="button"><span aria-hidden="true">&times;</span></button>
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
											<p class="mg-b-10">Set Name</p>
											<input type="text" class="form-control" name="attribute_value" id="attribute_value" placeholder="Name">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<p class="mg-b-10">Set Code</p>
											<input type="color" class="form-control" name="attribute_code" id="attribute_code" placeholder="Code">
										</div>
									</div>
									<div class="col-md-12">
										<!--<div class="form-group" >-->
										<!--	<p class="mg-b-10">Main Image</p>-->
										<!--	<input type="text" readonly="" class="form-control" name="path" id="path">-->
										<!--	<br>-->
										<!--	<a class="btn ripple btn-secondary" data-target="#scrollmodal" data-toggle="modal" href="" onclick="setCurrentFlag('main')">Select Image</a>-->
										<!--</div>-->
										
										<div class="col-md-6">
														<div class="form-group" >
															<p class="mg-b-10">Extra Images</p>
															
															<br>
															<a class="btn ripple btn-secondary" data-target="#scrollmodal" data-toggle="modal" href="" onclick="setCurrentFlag('extra')">Select Image</a>
														</div>
														
													</div>
													<div class="col-md-6">
																
																
    															  <div class="row" >
    															      <div id="extra-images">
    															          
    															          <!--<div class="col-sm-4" id="path"> <button class="rem-btn"  type="button">X</button><img  id="path1" src="<?php echo base_url(); ?>'+path+'"  height="75"><input type="hidden" name="path[]" value=""></div>-->
    															      </div>
    															  
    															</div>
    															 	
    															 
														
													</div>
										
									</div>
								</div>
							</div>
							<div class="modal-footer">
							    <input type="hidden" name="current_image_section" id="current_image_section">
								<button class="btn ripple btn-primary" type="submit" >Save changes</button>
								<button class="btn ripple btn-secondary" data-dismiss="modal" onclick="closebtn()" type="button">Close</button>
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
		<script src="<?php echo ASSETS; ?>assets/plugins/summernote/summernote-bs4.js"></script>
		

		<script type="text/javascript">
			$(document).ready(function(){
				$("#myForm").validate({
					rules: {
						category_name: {
							required: true,
						},
						path: {
							required: true,
						},
						order: {
							required: true,
							number: true,
							min: 1,
						}
					}
				});

				$("#attributeForm").validate({
					rules: {
						attribute_id: {
							required: true,
						},
						attribute_value: {
							required: true,
						},
						attribute_code: {
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
					$("#extra-images").append('<div class="col-sm-12" > <button class="rem-btn" type="button">X</button><img  id="img-preview1" src="<?php echo base_url(); ?>'+path+'" ><input type="hidden" name="path[]" value="'+path+'"></div>');
					// $("#img-preview").show();
					// $("#path").val(path);
				}
			}
			function setCurrentFlag(path){
				$("#current_image_section").val(path);
			}
			$('#extra-images').delegate('button.rem-btn', 'click', function () {
		        $(this).parent().fadeOut('slow').remove();
		        return false;
		    });
			function removeDiv(div){
				$("#"+div).remove()
			}
			function editAttribute(id,attribute_id,value,code,path){
				$("#product_attribute_id").val(id);
				$("#attribute_id").val(attribute_id);
				$("#attribute_value").val(value);
				$("#attribute_code").val(code);
				// $("#path").val(path);
				
				
			

				nameArr = path.split(' ');
				newArr1 = nameArr.filter(n => n);
				console.log(newArr1);
				
				for (let i = 0; i < newArr1.length; i++) {
				    // console.log(arry[i]) + "<br>";
					// $("#extra-images").append(nameArr[i]);
				
				// $("#path1").attr("src","<?php echo base_url(); ?>"+path);
				$("#extra-images").append('<div class="col-sm-12"> <button class="rem-btn" type="button">X</button><img id="path1" src="<?php echo base_url(); ?>'+newArr1[i]+'" ><input type="hidden" name="path[]" value="'+newArr1[i]+'"></div>');
			}
				$("#modalAddAttribute").modal("show")
				$('#attribute_id').select2({refresh:'1'});

			}
			
			function clearAttributeId(){
				$("#product_attribute_id").val("");
				$("#attribute_id").val("");
				$("#attribute_value").val("");
				$("#attribute_code").val("");
				$("#path").val("");
				$("#extra-images").val("");
				// $('#attribute_id').select2({refresh:'1'});
			}
			function closebtn() {
				// $(this).parent().remove();
                $("#extra-images").empty();
                $(this).removeAttr('');
             }
			function clearVariantId(){
				$("#product_variant_id").val("");
				$("#variant_text").val("");
				$("#price").val("");
				$("#special_price").val("");
				$("#sku").val("");
				$("#stock").val("");
				
			}
			function editVariant(id,variant_text,price,special_price,sku,stock){
				$("#product_variant_id").val(id);
				$("#variant_text").val(variant_text);
				$("#price").val(price);
				$("#special_price").val(special_price);
				$("#sku").val(sku);
				$("#stock").val(stock);
				$("#modalAddVariant").modal("show")
			}
				$('.show').click(function(){
		    // var baseUrl = 'https://localhost/webcosmic/organic/html/';
		    var value=$(this).data("id");
		    // var user = $('#uid').val();
		        $.ajax({
		            url: "<?php echo base_url(); ?>product/show_on_home",
		            type: 'post',
		            data: {value: value},
		            dataType:'json',
		            success: function (response) {
		            // $('#sprice').text('₹'+response.special_price +' /'+ response.variant_text);
		            // $('#price').text('₹'+response.price +' /'+ response.variant_text);
		            // $('#sprice1').val(response.special_price);
		            // $('#spricev').val(response.variant_text);
		                // alert(response);
		                // records = JSON.parse(response);
		            }
		        });
		    });
		</script>

	</body>
</html>