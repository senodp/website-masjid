<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">		
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<label for="image">Image</label>
				<?=html_upload_img($row['image'],'image','ourvalues','512x512');?>
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
						<div class="col-md-12">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
								<?=error_block('title')?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="content">Description - <i>Max.109 Characters</i></label>
								<textarea class="form-control <?=error_class('content')?>" name="content" rows="3" data-height="100"><?=set_row_value('content',$row)?></textarea>
								<?=error_block('content')?>
							</div>
						</div>				
					</div>					
				</div>

				<div class="tab-pane" id="mt-ind">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="ind_title">Title</label>
								<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
								<?=error_block('ind_title')?>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="form-group">
								<label for="ind_content">Description - <i>Max.109 Characters</i></label>
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