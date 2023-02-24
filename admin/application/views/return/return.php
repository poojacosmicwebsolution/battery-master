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
								<h2 class="main-content-title tx-24 mg-b-5">Return request</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Return request list</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									
									<!-- <button type="button" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-download-cloud mr-2"></i> Download Report
									</button> -->
									<!-- <a  class="btn btn-primary my-2 btn-icon-text" href="<?php echo base_url(); ?>Orders/add">Add Category</a> -->
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
											<h6 class="main-content-label mb-1">Return request List</h6>
											<p class="text-muted card-sub-title">This are all Return request by your customers</p>
										</div>
										<div class="table-responsive">
											<table class="table orders" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">ID</th>
														<th class="wd-25p">Order No</th>
														<th class="wd-25p">Return Date</th>
														<th class="wd-20p">Customer</th>
														<th class="wd-20p">Product Name</th>
														<th class="wd-20p">Description</th>
														<th class="wd-20p">Status</th>
														<th class="wd-20p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 
												// 	  echo "<pre>"; print_r($return); 
													foreach($return as $r){ ?>
													<tr>
														<td><?php echo $r['id']; ?></td>
														<td><?php echo $r['order_no']; ?></td>
														<td><?php echo date("d F, Y H:i A",strtotime($r['created'])); ?></td>
														<td><?php echo $r['username']; ?></td>
														<td><?php echo $r['product_name']; ?></td>
														<td><?php echo $r['desc']; ?></td>
														<td><?php echo $r['status']; ?></td>
													
														<td>
														<a href="#" class="btn btn-info btn-sm" onclick="getVideoDetails(<?php echo $r['id']; ?>)">video</a>

														<!-- <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#prod-status-modal<?php echo $r['id']; ?>">Status</a> -->
														
														<a href="<?php echo base_url() ?>Returnreq/delete/<?php echo $r['id']?>" class="btn btn-danger btn-sm" >Delete</a>
														
														
														
																										
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

			<div class="modal" id="prod-video-modal">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Video Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
						    
						
								<div id="video-details">
									
								</div>
							
						</div>
						<div class="modal-footer">
							<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>

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
			function getVideoDetails(id){
				$.ajax({
					url:"<?php echo base_url(); ?>Returnreq/ajaxVideoDetails",
					data:{id: id},
					type:"POST",
					success: function(response){
						// location.reload();
						$("#video-details").empty();
						$("#video-details").append(response);
						$("#prod-video-modal").modal("show");
					},
					error: function(){
						alert("Unable to get content, please try again");
					},
					complete: function(response){
						
					}
				});
			}

		
// 			$('#prod-video-modal').modal('show');
			
				// oTable = $('.orders').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
                //     $('#myInputTextField').keyup(function(){
                //           oTable.search($(this).val()).draw() ;
                //     })
		</script>


	</body>
</html>