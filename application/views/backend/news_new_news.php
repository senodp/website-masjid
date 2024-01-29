<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="image">Image</label>
				<?=html_upload_img($row['image'],'image','news','500x300');?>
			</div>
		</div>
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane active" id="mt-eng">
				    <div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
						<?=error_block('title')?>
					</div>					
					<div class="form-group">
						<label for="highlight">Highlight</label>
						<textarea class="editor form-control <?=error_class('highlight')?>" name="highlight" rows="20" data-height="120"><?=set_row_value('highlight',$row)?></textarea>
						<?=error_block('highlight')?>
					</div>
					<div class="form-group">
						<label for="subtitle">Description</label>
						<textarea class="editor form-control <?=error_class('subtitle')?>" name="subtitle" rows="20" data-height="120"><?=set_row_value('subtitle',$row)?></textarea>
						<?=error_block('subtitle')?>
					</div>
				</div>
				<div class="tab-pane" id="mt-ind">
				    <div class="form-group">
						<label for="ind_title">Title</label>
						<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
						<?=error_block('ind_title')?>
					</div>					
					<div class="form-group">
						<label for="ind_highlight">Highlight</label>
						<textarea class="editor form-control <?=error_class('ind_highlight')?>" name="ind_highlight" rows="20" data-height="120"><?=set_row_value('ind_highlight',$row)?></textarea>
						<?=error_block('ind_highlight')?>
					</div>
					<div class="form-group">
						<label for="ind_subtitle">Description</label>
						<textarea class="editor form-control <?=error_class('ind_subtitle')?>" name="ind_subtitle" rows="20" data-height="120"><?=set_row_value('ind_subtitle',$row)?></textarea>
						<?=error_block('ind_subtitle')?>
					</div>		
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="file">File</label>
				<?=html_upload($row['file'],'file','news');?>
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
		<div class="col-md-12">
			<div class="form-group">
				<label for="url">URL (Optional)</label>
				<input type="text" class="form-control <?=error_class('url')?>" name="url" value="<?=set_row_value('url',$row)?>" />
				<?=error_block('url')?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<button class="btn btn-dark btn-submit btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
				<a href="<?=$Page_url?>" tabindex="7" class="btn btn-info btn-cancel btn-rounded"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
			</div>							
		</div>
	</div>
</form>