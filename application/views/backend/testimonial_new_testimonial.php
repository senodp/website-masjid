<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">		
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="image">Image</label>
				<small>recommended image size is 300x300 pixels</small>
				<img width="250" src="<?=img_url($row['image'], 'testimonial')?>">
				<?=html_upload($row['image'],'image','testimonial');?>
			</div>
		</div>
		<div class="col-md-2">
			
		</div>
	</div>	
	<div class="row">
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane active" id="mt-eng">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="title">Name</label>
								<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
								<?=error_block('title')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="position">Position</label>
								<input type="text" class="form-control <?=error_class('position')?>" name="position" value="<?=set_row_value('position',$row)?>" />
								<?=error_block('position')?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="content">Description <!-- - <i>Max.280 Characters</i> --></label>
								<textarea class="form-control <?=error_class('content')?>" name="content" rows="3" data-height="100"><?=set_row_value('content',$row)?></textarea>
								<?=error_block('content')?>
							</div>
						</div>				
					</div>					
				</div>

				<div class="tab-pane" id="mt-ind">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_title">Nama</label>
								<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
								<?=error_block('ind_title')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_position">Position</label>
								<input type="text" class="form-control <?=error_class('ind_position')?>" name="ind_position" value="<?=set_row_value('ind_position',$row)?>" />
								<?=error_block('ind_position')?>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label for="ind_content">Description <!-- - <i>Max.280 Characters</i> --></label>
								<textarea class="form-control <?=error_class('ind_content')?>" name="ind_content" rows="3" data-height="100"><?=set_row_value('ind_content',$row)?></textarea>
								<?=error_block('ind_content')?>
							</div>
						</div>						
					</div>				
					
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			
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
		<div class="col-md-3">
			
		</div>
		<!-- <div class="col-md-6">
			<div class="form-group">
				<label for="url">URL (Optional)</label>
				<input type="text" class="form-control <?=error_class('url')?>" name="url" value="<?=set_row_value('url',$row)?>" />
				<?=error_block('url')?>
			</div>
		</div> -->
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<button class="btn btn-secondary btn-submit btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
				<a href="<?=$Page_url?>" tabindex="7" class="btn btn-warning btn-cancel btn-rounded btn-sm"><span class="glyphicon glyphicon-remove"></span> Cancel Changes</a>
			</div>							
		</div>
	</div>
</form>