					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

					<div class="row media-row" style="max-height: 320px; overflow: auto;">

					<?php foreach ($files as $file): ?>
						<div class="col-md-3 m-b-20" title="<?=$file['name']?>" data-toggle="tooltip" data-placement="bottom">
							<div class="card media-card glow" data-url="<?=$file['url']?>" data-filename="<?=$file['fullname']?>" data-is-image="<?=$file['is_image']?>">
								<div class="card-img-top"><img src="<?=mediamanager_thumb($file)?>" class="img-fluid" alt=""></div>
								<div class="card-footer"><?=str_shorten($file['name'], 25)?></div>
							</div>
						</div>
					<?php endforeach; ?>
					
					</div>

					<div class="row" style="padding-top: 15px; border-top: 1px solid #ccc;">
						<div class="col-md-12">
							<!-- <h5>Upload new file</h5> -->
							<div class="form-group">
								<?=html_upload('','file','media');?>
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-submit btn-sm btn-rounded" tabindex="6"><?=mdi('check')?> Upload file</button>
							</div>
						</div>
					</div>

					</form>