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
									<li class="breadcrumb-item active" aria-current="page">Slider list</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									
									<!-- <button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
									</button> -->
									<a  class="btn btn-primary my-2 btn-icon-text" href="<?php echo base_url(); ?>Slider/add">Add Slider</a>
								</div>
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
										<div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
											<div class="card custom-card">
												
												<div aria-labelledby="headingOne" class="collapse" data-parent="#accordion" id="collapseOne" role="tabpanel">
													<div class="card-body">
														<div class="row mb-4">
															<div class="col-sm-12 col-md-12">
																<input type="file" class="dropify" data-height="300" />
															</div>
															
														</div>
													</div>
												</div>
											</div>
											
										</div>
							</div>

						</div>

						<!-- Row -->
						<div class="row row-sm">
							
							
								<div class="col-lg-12">
								<div class="card custom-card">
									<div class="card-body">
										<div>
											<h6 class="main-content-label mb-1">Slider List</h6>
											<p class="text-muted card-sub-title">This are all Slider you added</p>
										</div>
										<div class="table-responsive">
											<table class="table" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">ID</th>
														<th class="wd-25p">Name</th>
														<th class="wd-20p">Image</th>
														<th class="wd-20p">Link</th>
														<!--<th class="wd-20p">Show on Home</th>-->
														<th class="wd-20p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($slider as $s){ ?>
													<tr>
														<td><?php echo $s['id']; ?></td>
														<td><?php echo $s['slider']; ?></td>
														<td><img src="<?php echo MEDIAPATH.$s['image']; ?>" height="75"></td>
														<td><?php echo $s['href']; ?></td>
														<!--<td>-->
														    
														<!--	<?php if($s['show_on_home']==1){ ?>-->
														<!--	<label class="custom-switch">-->
																
														<!--	<input type="checkbox" name="showdata" class="custom-switch-input show" data-id="<?php echo $s['id'] ?>" checked >-->
														<!--	<span class="custom-switch-indicator"></span>-->
																
														<!--	</label>-->
														<!--<?php }else{ ?>-->
														<!--	<label class="custom-switch">-->
																
														<!--	<input type="checkbox" name="showdata" class="custom-switch-input show" data-id="<?php echo $s['id'] ?>"  >-->
														<!--	<span class="custom-switch-indicator"></span>-->
																
														<!--	</label>-->
														<!--<?php } ?>-->
														
														<!--</td>-->
														<td>
														    <a href="<?php echo base_url(); ?>Slider/delete/<?php echo $s['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
															<a href="<?php echo base_url(); ?>Slider/edit/<?php echo $s['id']; ?>" class="btn btn-info btn-sm">Edit</a>
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
			
				$('.show').click(function(){
		    // var baseUrl = 'https://localhost/webcosmic/organic/html/';
		    var value=$(this).data("id");
		    // var user = $('#uid').val();
		        $.ajax({
		            url: "<?php echo base_url(); ?>slider/show_on_home",
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