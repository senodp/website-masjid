				<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

				<div class="row">
					<div class="form-row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control form-control-lg <?=error_class('password')?>" name="password" value="" />
								<?=error_block('password')?>
							</div>
						</div>
						<div class="col-md-12">
							<label for="password_re">Repeat Password</label>
							<input type="password" class="form-control form-control-lg <?=error_class('password_re')?>" name="password_re" value="" />
							<?=error_block('password_re')?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12 text-center"> <hr>
						<div class="form-group" style="margin: 0;">
							<button class="btn btn-primary btn-submit btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
							
							<a href="<?=$Page_url?>" tabindex="7" class="btn btn-warning btn-cancel btn-rounded"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
						</div>							
					</div>
				</div>

				</form>
				