				<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

				<div class="row">
					<div class="col">

					<?php if ($Page_action == 'new_group'): ?>
						<div class="form-group">
							<label for="group_name">Name</label>
							<input type="text" class="form-control form-control-lg <?=error_class('group_name')?>" name="group_name" value="<?=set_row_value('name',$row)?>" />
							<?=error_block('group_name')?>
						</div>
					<?php else: ?>
						<input type="hidden" value="<?=$row['name']?>" name="group_name" />
					<?php endif; ?>

						<div class="form-group">
							<label for="group_description">Label</label>
							<input type="text" class="form-control form-control-lg <?=error_class('group_description')?>" name="group_description" value="<?=set_row_value('description',$row)?>" />
							<?=error_block('group_description')?>
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
				