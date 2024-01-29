<?php $this->load->view('backend/_header'); ?>

	<div class="wrapper">
        <div class="container-fluid">
			<div class="text-center">
				<a href="<?=control_url()?>" class="logo"><h1><?=app_name(false)?></h1></a>
				<h5 class="text-muted m-t-0 font-600">content management</h5>
			</div>

			<div class="row justify-content-center">
				<div class="col-4">
					<div class="m-t-40 card-box">
				<div class="text-center">
					<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
				</div>
				<div class="panel-body">
					<?=validation_block()?>
					<form class="form-horizontal m-t-20" action="<?=current_url()?>" method="post">

						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="email" required="" placeholder="Email" name="email" autofocus tabindex="1" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-12">
								<input class="form-control" type="password" required="" placeholder="Password" name="password" tabindex="2" required>
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
								<div class="checkbox checkbox-custom">
									<input id="checkbox-signup" type="checkbox" name="remember" tabindex="3">
									<label for="checkbox-signup">
										Remember me
									</label>
								</div>

							</div>
						</div>

						<div class="form-group text-center m-t-30">
							<div class="col-xs-12">
								<button class="btn btn-custom btn-rounded btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
							</div>
						</div>

						<!-- <div class="form-group m-t-30 m-b-0">
							<div class="col-sm-12">
								<a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
							</div>
						</div> -->
					</form>

				</div>
			</div>
				</div>
			</div>
			
		</div>
		</div>
		<!-- end wrapper page -->

<?php $this->load->view('backend/_footer'); ?>