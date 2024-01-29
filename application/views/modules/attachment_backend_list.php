			<div class="row">
			<?php foreach ($attachments as $att): ?>
				<div class="col-md-6 mb-1">
					<div class="card">
						<img src="<?=img_thumb_url($att['file'], 'attachments')?>" alt="" class="card-img-top">
						<div class="card-footer">
							<a href="<?=control_url().'/attachment/edit/'.$att['id'].'/Image/'?>" class="btn btn-secondary btn-sm btn-ajax"  data-module="attachment"><?=mdi('edit')?> Edit</a>
							<a href="<?=control_url().'/attachment/remove/'.$att['id'].'/Image/'.$att['collection']?>" class="btn-ajax btn-danger btn-sm btn"  data-module="attachment"><?=mdi('delete')?> Remove</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>