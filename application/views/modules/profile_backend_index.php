	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<?php foreach ($rows as $profile): ?>
					<div class="col-md-12 mb-3">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-10">
										<h4 class="p-0 m-0"><?=$profile['name']?></h4>
										<p><?=$profile['position']?></p>
										<?=$profile['description']?>
									</div>
									<div class="col-md-2">
										<img src="<?=img_thumb_url($profile['photo'], 'profiles', 'holder.js/290x375?auto=yes')?>" alt="" class="card-img-top">
									</div>
								</div>
							</div>
							<div class="card-footer text-center">
								<a href="<?=$Page_url.'/edit/'.$profile['id']?>" class="btn-ajax btn-secondary btn-sm btn"><?=mdi('edit')?> Edit</a>
								<a href="<?=$Page_url.'/remove/'.$profile['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>