	<div class="card cards">
		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3 class="m-0">Slide Business</h3>
				</div>
				<div class="col text-right">
					<a href="<?=$Page_url?>/new-busines" class="btn-ajax btn-sm btn btn-dark"><?=mdi('plus')?> New Slide</a>
				</div>
			</div>
		</div>
		<div class="card-body cards-container">
			<div class="row">
				<?php foreach ($business as $busines): ?>
					<div class="col-md-4 mb-0">
						<div class="card">
							<div class="card-img-overlay" style="top: unset; bottom: 50px;">
								<?php if ( !empty($busines['title']) ): ?>
									<div class="bg-transparent-white bg-padding-10 rounded">
										<h4 class="m-0"><?=$busines['title']?></h4>
										</div><?php endif; ?>
							</div>
							<img src="<?=img_thumb_url($busines['image'], 'business', 'holder.js/1280x500?auto=yes')?>" alt="" class="card-img-top">
							<div class="card-footer">
								<div class="row m-0">
									<div class="col p-0 m-0 text-left">
										<a href="<?=$Page_url.'/edit-busines/'.$busines['id']?>" class="btn-ajax btn-secondary btn-sm btn"><?=mdi('edit')?> Edit</a>
									</div>
									<div class="col p-0 m-0 text-right">
										<a href="<?=$Page_url.'/remove-busines/'.$busines['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>