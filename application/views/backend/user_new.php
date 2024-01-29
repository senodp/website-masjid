				<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

				<div class="row">
					<?=validation_block('alert alert-danger col-md-12')?>
					<div class="col">
						<div class="form-row">
							<div class="col">
								<div class="form-group">
									<label for="first_name">First Name</label>
									<input type="text" class="form-control form-control-lg <?=error_class('first_name')?>" name="first_name" value="<?=set_row_value('first_name',$row)?>" />
									<?=error_block('first_name')?>
								</div>
							</div>
							<div class="col">
								<label for="last_name">Last Name</label>
								<input type="text" class="form-control form-control-lg <?=error_class('last_name')?>" name="last_name" value="<?=set_row_value('last_name',$row)?>" />
								<?=error_block('last_name')?>
							</div>
						</div>

						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control form-control-lg <?=error_class('username')?>" name="username" value="<?=set_row_value('username',$row)?>" />
							<?=error_block('username')?>
						</div>

						<div class="form-group">
							<label for="email">E-mail Address</label>
							<input type="email" class="form-control form-control-lg <?=error_class('email')?>" name="email" value="<?=set_row_value('email',$row)?>" />
							<?=error_block('email')?>
						</div>
					<?php if ($Page_action == 'new'): ?>
						<div class="form-row">
							<div class="col">
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" class="form-control form-control-lg <?=error_class('password')?>" name="password" value="" />
									<?=error_block('password')?>
								</div>
							</div>
							<div class="col">
								<label for="password_re">Repeat Password</label>
								<input type="password" class="form-control form-control-lg <?=error_class('password_re')?>" name="password_re" value="" />
								<?=error_block('password_re')?>
							</div>
						</div>
					<?php endif; ?>

					<div class="form-group">
						<label for="groups[]" style="display: block; margin: 0 0 5px 0;">Select Groups</label>
						<?php foreach ($groups as $g): ?>
							<div class="form-check form-check-inline">
								<input type="checkbox" class="form-check-input" name="groups[]" value="<?=$g['id']?>" <?=is_checked('groups[]', $g['id'], $row['groups_array'])?> >
								<label for="groups[]" class="form-check-label"><?=$g['description']?></label>
							</div>
						<?php endforeach; ?>
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
				