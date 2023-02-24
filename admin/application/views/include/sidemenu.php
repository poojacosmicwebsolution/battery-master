<!-- Sidemenu -->
			<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="index.html">
						<?php
							$settings = $this->common_model->getSetting("web_settings",true);
							 if(isset($settings['web_logo'])){ ?>
						<img src="<?php echo base_url().$settings['web_logo']; ?>" class="header-brand-img desktop-logo my-customm-logo-class" alt="logo">
						<img src="<?php echo base_url().$settings['web_logo']; ?>" class="header-brand-img icon-logo my-customm-logo-class" alt="logo">
						<img src="<?php echo base_url().$settings['web_logo']; ?>" class="header-brand-img desktop-logo theme-logo my-customm-logo-class" alt="logo">
						<img src="<?php echo base_url().$settings['web_logo']; ?>" class="header-brand-img icon-logo theme-logo my-customm-logo-class" alt="logo">
						<?php }else{ ?>
							<img src="<?php echo ASSETS; ?>assets/img/brand/logo-light.png" class="header-brand-img desktop-logo" alt="logo">
						<img src="<?php echo ASSETS; ?>assets/img/brand/icon-light.png" class="header-brand-img icon-logo" alt="logo">
						<img src="<?php echo ASSETS; ?>assets/img/brand/logo.png" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="<?php echo ASSETS; ?>assets/img/brand/icon.png" class="header-brand-img icon-logo theme-logo" alt="logo">
						<?php } ?>
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
						

						<!-- <li class="nav-header"><span class="nav-label">Dashboard</span></li> -->
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Dashboard"><span class="shape1"></span><span class="shape2"></span><i class="ti-home sidemenu-icon"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Customer"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Customers</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Distributor"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Distributors</span></a>
						</li>
							<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Retailer"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Retailer</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Returnreq"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Return Request</span></a>
						</li>
						
						
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Categories"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Categories</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Promocode"><span class="shape1"></span><span class="shape2"></span><i class="ti-user sidemenu-icon"></i><span class="sidemenu-label">Promo Code</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Media</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Media">Media Master</a>
								</li>
							</ul>
						</li>
						<!--<li class="nav-item">-->
						<!--	<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Blog</span><i class="angle fe fe-chevron-right"></i></a>-->
						<!--	<ul class="nav-sub">-->
						<!--		<li class="nav-sub-item">-->
						<!--			<a class="nav-sub-link" href="<?php echo base_url(); ?>Blog">Blog Category</a>-->
						<!--		</li>-->
						<!--		<li class="nav-sub-item">-->
						<!--			<a class="nav-sub-link" href="<?php echo base_url(); ?>Blog/blog_list">Blog</a>-->
						<!--		</li>-->
						<!--	</ul>-->
						<!--</li>-->
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Blog/blog_list"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Blog</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Orders"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Orders</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-shopping-cart-full sidemenu-icon"></i><span class="sidemenu-label">Product</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Attributes">Attributes</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Taxes">Taxes</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Size_master">Size Master</a>
								</li>
								
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Fabric_master">Fabric Master</a>
								</li>
								
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Coverage_master">Coverage Master</a>
								</li>
								
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Padding_master">Padding Master</a>
								</li>
								
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Product">Product</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-settings sidemenu-icon"></i><span class="sidemenu-label">Settings</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Settings/web">General Settings</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Cms">Web Settings/CMS</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href="#"><span class="shape1"></span><span class="shape2"></span><i class="ti-settings sidemenu-icon"></i><span class="sidemenu-label">Location</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">

								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Area/city">City</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="<?php echo base_url(); ?>Area">Area & Pincode</a>
								</li>
								
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Offer"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Offer</span></a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Size_calculator"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Size Calculator</span></a>
						</li>
						<!--<li class="nav-item">-->
						<!--	<a class="nav-link" href="<?php echo base_url(); ?>Notification"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Notification</span></a>-->
						<!--</li>-->
						<!--<li class="nav-item">-->
						<!--	<a class="nav-link" href="<?php echo base_url(); ?>Offer"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Offer</span></a>-->
						<!--</li>-->
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Slider"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">Slider</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url(); ?>Faq"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">FAQ</span></a>
						</li>
						<!--<li class="nav-item">-->
						<!--	<a class="nav-link" href="<?php echo base_url(); ?>System_users"><span class="shape1"></span><span class="shape2"></span><i class="ti-wallet sidemenu-icon"></i><span class="sidemenu-label">System Users</span></a>-->
						<!--</li>-->
					
						
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->