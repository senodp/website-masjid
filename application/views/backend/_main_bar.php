			<div class="topbar-main">
				<div class="container-fluid">

					<!-- Logo container-->
					<div class="logo">
						<!-- Text Logo -->
						<!--<a href="index.html" class="logo">-->
							<!--<span class="logo-small"><i class="zmdi zmdi-radar"></i></span>-->
							<!--<span class="logo-large"><i class="zmdi zmdi-radar"></i> Adminto</span>-->
						<!--</a>-->
						<!-- Image Logo -->
						<a href="<?=control_url()?>" class="logo">
							<?=app_icon()?>  <?=app_name()?>
						</a>

					</div>
					<!-- End Logo container-->


					<div class="menu-extras topbar-custom">

						<ul class="list-unstyled topbar-right-menu float-right mb-0">

							<li class="menu-item">
								<!-- Mobile menu toggle-->
								<a class="navbar-toggle nav-link">
									<div class="lines">
										<span></span>
										<span></span>
										<span></span>
									</div>
								</a>
								<!-- End mobile menu toggle-->
							</li>
							<!-- <li class="hide-phone">
								<form class="app-search">
									<input type="text" placeholder="Search..."
										   class="form-control">
									<button type="submit"><i class="fa fa-search"></i></button>
								</form>
							</li> -->
							<!-- <li> -->
								<!-- Notification -->
								<!-- <div class="notification-box">
									<ul class="list-inline mb-0">
										<li>
											<a href="javascript:void(0);" class="right-bar-toggle">
												<i class="zmdi zmdi-bell-outline noti-icon"></i>
											</a>
											<div class="noti-dot">
												<span class="dot"></span>
												<span class="pulse"></span>
											</div>
										</li>
									</ul>
								</div> -->
								<!-- End Notification bar -->
							<!-- </li> -->

							<li class="dropdown notification-list">
								<a class="nav-link waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
								   aria-haspopup="false" aria-expanded="false">
									<img src="holder.js/128x128?auto=yes&text=Admin" alt="user" class="rounded-circle">
								</a>
							</li>

						</ul>
					</div>
					<!-- end menu-extras -->

					<div class="clearfix"></div>

				</div> <!-- end container -->
			</div>
			<!-- end topbar-main -->