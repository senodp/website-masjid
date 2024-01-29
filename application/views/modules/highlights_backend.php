
	<div class="card cards">
		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3 class="m-0">Highlights</h3>
				</div>
				<div class="col text-right">
					<a href="<?=$Page_url?>/new-highlight" class="btn-ajax btn-sm btn btn-dark"><?=mdi('plus')?> New Highlight</a>
				</div>
			</div>
		</div>
		<div class="card-body cards-container">
			<div class="row">
				<?php foreach ($highlights as $highlight): ?>
					<div class="col-md-3 mb-3">
						<div class="card">
							<div class="card-body text-center">
								<img src="<?=img_thumb_url($highlight['image'], 'highlights', 'holder.js/80x80?auto=yes')?>" alt="">
								<div><h4><?=$highlight['title']?></h4></div>
							</div>
							<div class="card-footer">
								<div class="row m-0">
									<div class="col p-0 m-0 text-left">
										<a href="<?=$Page_url.'/edit-highlight/'.$highlight['id']?>" class="btn-ajax btn-dark btn-sm btn"><?=mdi('edit')?> Edit</a>
									</div>
									<div class="col p-0 m-0 text-right">
										<a href="<?=$Page_url.'/remove-highlight/'.$highlight['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

