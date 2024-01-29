					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
					<div class="row">
						<div class="col-md-6">
							<div class="tab-content">
								<div class="tab-pane active" id="mt-eng">
									<div class="form-group">
										<label for="title">Titleee (Optional)</label>
										<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
										<?=error_block('title')?>
									</div>

									<div class="form-group">
										<label for="subtitle">Short Description (Optional)</label>
										<textarea name="subtitle" id="subtitle" cols="30" rows="3" class="form-control <?=error_class('subtitle')?>"><?=set_row_value('subtitle',$row)?></textarea>
										<?=error_block('subtitle')?>
									</div>

									<div class="form-group">
										<label for="button_label">Button Label (Optional)</label>
										<input type="text" class="form-control <?=error_class('button_label')?>" name="button_label" value="<?=set_row_value('button_label',$row)?>" />
										<?=error_block('button_label')?>
									</div>

									<div class="form-group">
										<label for="url">Button URL (Optional)</label>
										<input type="text" class="form-control <?=error_class('url')?>" name="url" value="<?=set_row_value('url',$row)?>" />
										<?=error_block('url')?>
									</div>
								</div>

								<div class="tab-pane" id="mt-ind">
									<div class="form-group">
										<label for="ind_title">Title (Optional)</label>
										<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
										<?=error_block('ind_title')?>
									</div>

									<div class="form-group">
										<label for="ind_subtitle">Short Description (Optional)</label>
										<textarea name="ind_subtitle" id="ind_subtitle" cols="30" rows="3" class="form-control <?=error_class('ind_subtitle')?>"><?=set_row_value('ind_subtitle',$row)?></textarea>
										<?=error_block('ind_subtitle')?>
									</div>

									<div class="form-group">
										<label for="ind_button_label">Button Labellllll (Optional)</label>
										<input type="text" class="form-control <?=error_class('ind_button_label')?>" name="ind_button_label" value="<?=set_row_value('ind_button_label',$row)?>" />
										<?=error_block('ind_button_label')?>
									</div>

									<div class="form-group">
										<label for="ind_url">Button URL (Optional)</label>
										<input type="text" class="form-control <?=error_class('ind_url')?>" name="ind_url" value="<?=set_row_value('ind_url',$row)?>" />
										<?=error_block('ind_url')?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="image">Image</label>
								<?=html_upload_img($row['image'],'image','slides','1980x1090');?>
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