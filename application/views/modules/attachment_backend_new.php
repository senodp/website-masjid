					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
					<div class="row justify-content-center">
						<div class="col-md-8">
							<div class="form-group">
								<label for="file">Image</label>
								<?=html_upload_img($row['file'],'file','attachments','300x300');?>
							</div>
						</div>	
						<div class="col-md-12">
							<div class="form-group">
								<label for="description">Description</label>
								<textarea name="description" id="description" rows="1" class="form-control <?=error_class('description')?>"><?=set_row_value('description',$row)?></textarea>
								<?=error_block('description')?>
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