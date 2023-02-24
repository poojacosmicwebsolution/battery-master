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
								<h2 class="main-content-title tx-24 mg-b-5">Orders</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Order list</li>
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
											<h6 class="main-content-label mb-1">Orders List</h6>
											<p class="text-muted card-sub-title">This are all Orders by your customers</p>
										</div>
										<div class="table-responsive">
											<table class="table orders" id="example1">
												<thead>
													<tr>
														<th class="wd-20p">ID</th>
														<th class="wd-25p">Order No</th>
														<th class="wd-25p">Order Date</th>
														<th class="wd-25p">Order Type</th>
														<th class="wd-20p">Customer</th>
														<th class="wd-15p">Amount</th>
														<th class="wd-15p">Area</th>
														<th class="wd-15p">City</th>
														<th class="wd-15p">Pincode</th>
														<th class="wd-20p">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php 
												// 	  echo "<pre>"; print_r($orders);
													foreach($orders as $o){ ?>
													<tr>
														<td><?php echo $o['id']; ?></td>
														<td><?php echo $o['order_no']; ?></td>
														<td><?php echo $o['payment_type']; ?></td>
														<td><?php echo date("d F, Y H:i A",strtotime($o['order_date'])); ?></td>
														<td><?php echo $o['customer_name']; ?></td>
														<td><?php echo $o['amount']; ?></td>
														<td><?php echo $o['area']; ?></td>
														<td><?php echo $o['city']; ?></td>
														<td><?php echo $o['pincode']; ?></td>
														<td>
														<!--<a href="#" class="btn btn-info btn-sm" onclick="getOrderDetails(<?php echo $o['id']; ?>)">Details</a>-->

														<a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#prod-status-modal<?php echo $o['id']; ?>">Status</a>
														
														<!--<a href="<?php echo base_url() ?>Orders/delete/<?php echo $o['id']?>" class="btn btn-danger btn-sm" >Delete</a>-->
														<a href="<?php echo base_url() ?>Orders/invoice/<?php echo $o['id']?>" target="_blank" class="btn btn-danger btn-sm" >invoice</a>
																		
																													
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

		<!-- Scroll with content modal -->
			<div class="modal" id="prod-details-modal">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Order Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
						    
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>Product</th>
										<th>Qty</th>
										<th>Price</th>
										<th>GST</th>
										<th>Promo</th>
										<th>Total</th>
									</tr>
								</thead>
								<tbody id="prod-details">
									
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					</div>
				</div>
			</div>


<!-- Scroll with content modal -->
<?php foreach($orders as $o){ ?>
			<div class="modal" id="prod-status-modal<?php echo $o['id']; ?>">
				<div class="modal-dialog modal-dialog-scrollable" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Status Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<form method="post" action="<?php echo base_url() ?>Orders/status">

								
								<!-- <div class="form-group">
									<select  class="form-control select2" name="status" id="Delivered" placeholder="" >
										<option value="Placed" >Placed</option>
										<option value="Packed">Packed</option>
										<option value="Shipped">Shipped</option>
										<option value="Delivered">Delivered</option>
									</select>
								</div> -->
								<input type="hidden" name="id" value="<?php echo $o['id'] ?>" >
								<select  name="status" class="form-control select2">
									
									<option value="<?php echo $o['status']; ?>" 
									<?php if($o['status'] == 'Placed'){ echo 'selected'; } ?> >
									
									<?php echo $o['status']; ?>
										
									</option>

									<option value="Placed">Placed</option>
									<option value="Packed">Packed</option>
									<option value="Shipped">Shipped</option>
									<option value="Delivered">Delivered</option>

									
									
								</select>

								

								
						</div>
						<div class="modal-footer">
							<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
							<input class="btn ripple btn-primary" type="submit" name="submit" value="Submit" >
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button" >Close</button>
						</div>
							</form>
					</div>
				</div>
			</div>

		<?php } ?>

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
			function getOrderDetails(id){
				$.ajax({
					url:"<?php echo base_url(); ?>Orders/ajaxOrderDetails",
					data:{order_id: id},
					type:"POST",
					success: function(response){
						// location.reload();
						$("#prod-details").empty();
						$("#prod-details").append(response);
						$("#prod-details-modal").modal("show");
					},
					error: function(){
						alert("Unable to get content, please try again");
					},
					complete: function(response){
						
					}
				});
			}

			$('#prod-status-modal').modal('show');
			
				// oTable = $('.orders').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    //                 $('#myInputTextField').keyup(function(){
    //                       oTable.search($(this).val()).draw() ;
    //                 })
		</script>


	</body>
</html>