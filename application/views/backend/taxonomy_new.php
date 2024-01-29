					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="cluster" value="<?=set_row_value('cluster', $row)?>">
					<input type="hidden" name="page_id" value="<?=set_row_value('page_id', $row)?>">

					<div class="row">
						<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane active" id="mt-eng">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control <?=error_class('name')?>" name="name" value="<?=set_row_value('name',$row)?>" />
										<?=error_block('name')?>
									</div>
									<div class="form-group">
										<label for="description">Description</label>
										<textarea class="form-control <?=error_class('description')?>" name="description" rows="3" data-height="100"><?=set_row_value('description',$row)?></textarea>
										<?=error_block('description')?>
									</div>
								</div>
								<div class="tab-pane" id="mt-ind">
									<div class="form-group">
										<label for="ind_name">Name</label>
										<input type="text" class="form-control <?=error_class('ind_name')?>" name="ind_name" value="<?=set_row_value('ind_name',$row)?>" />
										<?=error_block('ind_name')?>
									</div>
									<div class="form-group">
										<label for="ind_description">Content</label>
										<textarea class="form-control <?=error_class('ind_description')?>" name="ind_description" rows="3" data-height="100"><?=set_row_value('ind_description',$row)?></textarea>
										<?=error_block('ind_description')?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 text-center"> <hr>
							<div class="form-group" style="margin: 0;">
								<button class="btn btn-rounded btn-primary btn-submit" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
								
								<a href="<?=$Page_url?>" tabindex="7" class="btn btn-rounded btn-warning btn-cancel"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
							</div>							
						</div>
					</div>

					</form>