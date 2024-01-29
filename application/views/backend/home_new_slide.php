<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
	<div class="row">
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane active" id="mt-eng">
					<div class="form-group">
						<label for="subtitle">Description</label>
						<textarea name="subtitle" id="subtitle" cols="30" rows="3" class="form-control <?=error_class('subtitle')?>"><?=set_row_value('subtitle',$row)?></textarea>
						<?=error_block('subtitle')?>
					</div>
					<div class="form-group">
						<label for="title">Title</label>
						<textarea name="title" id="title" cols="30" rows="3" class="editor form-control <?=error_class('title')?>"><?=set_row_value('title',$row)?></textarea>
						<?=error_block('title')?>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="button_label_left">Button Label Left (Optional)</label>
								<input type="text" class="form-control <?=error_class('button_label_left')?>" name="button_label_left" value="<?=set_row_value('button_label_left',$row)?>" />
								<?=error_block('button_label_left')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="button_label_right">Button Label Right (Optional)</label>
								<input type="text" class="form-control <?=error_class('button_label_right')?>" name="button_label_right" value="<?=set_row_value('button_label_right',$row)?>" />
								<?=error_block('button_label_right')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="url_left">Button URL Left (Optional)</label>
								<input type="text" class="form-control <?=error_class('url_left')?>" name="url_left" value="<?=set_row_value('url_left',$row)?>" />
								<?=error_block('url_left')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="url_right">Button URL Right (Optional)</label>
								<input type="text" class="form-control <?=error_class('url_right')?>" name="url_right" value="<?=set_row_value('url_right',$row)?>" />
								<?=error_block('url_right')?>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="mt-ind">
					<div class="form-group">
						<label for="ind_title">Title</label>
						<textarea name="ind_title" id="ind_title" cols="30" rows="3" class="editor form-control <?=error_class('ind_title')?>"><?=set_row_value('ind_title',$row)?></textarea>
						<?=error_block('ind_title')?>
					</div>
					<div class="form-group">
						<label for="ind_subtitle">Description</label>
						<textarea name="ind_subtitle" id="ind_subtitle" cols="30" rows="3" class="form-control <?=error_class('ind_subtitle')?>"><?=set_row_value('ind_subtitle',$row)?></textarea>
						<?=error_block('ind_subtitle')?>
					</div>	
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_button_label_left">Button Label Left (Optional)</label>
								<input type="text" class="form-control <?=error_class('ind_button_label_left')?>" name="ind_button_label_left" value="<?=set_row_value('ind_button_label_left',$row)?>" />
								<?=error_block('ind_button_label_left')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_button_label_right">Button Label Right (Optional)</label>
								<input type="text" class="form-control <?=error_class('ind_button_label_right')?>" name="ind_button_label_right" value="<?=set_row_value('ind_button_label_right',$row)?>" />
								<?=error_block('ind_button_label_right')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_url_left">Button URL Left (Optional)</label>
								<input type="text" class="form-control <?=error_class('ind_url_left')?>" name="ind_url_left" value="<?=set_row_value('ind_url_left',$row)?>" />
								<?=error_block('ind_url_left')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_url_right">Button URL Right (Optional)</label>
								<input type="text" class="form-control <?=error_class('ind_url_right')?>" name="ind_url_right" value="<?=set_row_value('ind_url_right',$row)?>" />
								<?=error_block('ind_url_right')?>
							</div>
						</div>
					</div>
				</div>								
			</div>
		</div>
		<div class="col-md-6">
				
			<div class="form-group">
				<label for="file">Image Background</label><br>
				<small>recommended image size is 1920x1080 pixels</small>
				<img width="250" src="<?=img_url($row['image'], 'slides')?>">
				<?=html_upload($row['image'],'image','slides');?>
			</div>					
		</div>
		<div class="col-md-6">		
			<div class="form-group">
				<label for="is_publish">Publish / Not Publish</label>
				<select name="is_publish" class="form-control">
					<option value="1" <?php echo $row['is_publish']==1 ? "selected" : "";?>>Publish</option>
					<option value="0" <?php echo !$row['is_publish'] ? "selected" : "";?>>Not Publish</option>
				</select>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<button class="btn btn-primary btn-submit btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
				
				<a href="<?=$Page_url?>" tabindex="7" class="btn btn-dark btn-cancel btn-rounded"><span class="glyphicon glyphicon-remove"></span> Cancel Changes</a>
			</div>							
		</div>
	</div>
</form>