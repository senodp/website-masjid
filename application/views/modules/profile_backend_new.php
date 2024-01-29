					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
					<div class="row">
						<div class="col-md-8">
							<div class="tab-content">
								<div class="tab-pane active" id="mt-eng">
									<div class="form-group">
										<label for="name">Name</label>
										<input type="text" class="form-control <?=error_class('name')?>" name="name" value="<?=set_row_value('name',$row)?>" />
										<?=error_block('name')?>
									</div>

									<div class="form-group">
										<label for="position">Position</label>
										<input type="text" class="form-control <?=error_class('position')?>" name="position" value="<?=set_row_value('position',$row)?>" />
										<?=error_block('position')?>
									</div>

									<div class="form-group">
										<label for="description">Description</label>
										<textarea name="description" id="description" cols="30" rows="3" class="editor form-control <?=error_class('description')?>" data-height="150"><?=set_row_value('description',$row)?></textarea>
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
										<label for="ind_position">Position</label>
										<input type="text" class="form-control <?=error_class('ind_position')?>" name="ind_position" value="<?=set_row_value('ind_position',$row)?>" />
										<?=error_block('ind_position')?>
									</div>

									<div class="form-group">
										<label for="ind_description">Description</label>
										<textarea name="ind_description" id="ind_description" cols="30" rows="3" class="editor form-control <?=error_class('ind_description')?>" data-height="150"><?=set_row_value('ind_description',$row)?></textarea>
										<?=error_block('ind_description')?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="photo">Photo</label>
								<?=html_upload_img($row['photo'],'photo','profiles','290x375');?>
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