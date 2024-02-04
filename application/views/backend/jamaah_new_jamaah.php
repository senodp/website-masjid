<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
	<div class="row">
		<div class="col-md-12">
			<div class="tab-content">
				<div class="tab-pane active" id="mt-eng">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="title">Full Name</label>
								<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
								<?=error_block('title')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="phone">Phone / Whatsapp</label>
								<input type="number" class="form-control <?=error_class('phone')?>" name="phone" value="<?=set_row_value('phone',$row)?>" />
								<?=error_block('phone')?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="address">Address</label>
								<textarea class="form-control <?=error_class('address')?>" name="address" rows="3" data-height="100"><?=set_row_value('address',$row)?></textarea>
								<?=error_block('address')?>
							</div>
						</div>		
						<!-- <div class="col-md-12">
							<div class="form-group">
								<label for="ups">Unique Personality Sentence - <i><small>Max.87 Characters</small></i></label>
								<textarea class="form-control <?=error_class('ups')?>" name="ups" rows="3" data-height="100"><?=set_row_value('ups',$row)?></textarea>
								<?=error_block('ups')?>
							</div>
						</div> -->		
					</div>				
				</div>

				<div class="tab-pane" id="mt-ind">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_title">Full Name</label>
								<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
								<?=error_block('ind_title')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_phone">Phone / Whatsapp</label>
								<input type="text" class="form-control <?=error_class('ind_phone')?>" name="ind_phone" value="<?=set_row_value('ind_phone',$row)?>" />
								<?=error_block('ind_phone')?>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="ind_address">Address</label>
								<textarea class="form-control <?=error_class('ind_address')?>" name="ind_address" rows="3" data-height="100"><?=set_row_value('ind_address',$row)?></textarea>
								<?=error_block('ind_address')?>
							</div>
						</div>		
						<!-- <div class="col-md-12">
							<div class="form-group">
								<label for="ind_ups">Unique Personality Sentence - <i><small>Max.87 Characters</small></i></label>
								<textarea class="form-control <?=error_class('ind_ups')?>" name="ind_ups" rows="3" data-height="100"><?=set_row_value('ind_ups',$row)?></textarea>
								<?=error_block('ind_ups')?>
							</div>
						</div> -->			
					</div>				
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<!-- <div class="col-md-6">
			<div class="form-group">
				<label for="linkedin">LinkedIn</label>
				<input type="text" class="form-control <?=error_class('linkedin')?>" name="linkedin" value="<?=set_row_value('linkedin',$row)?>" />
				<?=error_block('linkedin')?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="instagram">Instagram</label>
				<input type="text" class="form-control <?=error_class('instagram')?>" name="instagram" value="<?=set_row_value('instagram',$row)?>" />
				<?=error_block('instagram')?>
			</div>
		</div> -->
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