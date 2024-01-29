	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<?php foreach ($rows as $row): ?>
					<div class="col-md-2 mb-3">
						<div class="card">
							<div class="card-body" style="position: relative;">
								<img src="<?=img_thumb_url($row['cover'], 'documents', 'holder.js/300x400?auto=yes')?>" alt="" class="img-fluid">
								<div style="position: absolute; bottom: 5px;">
									<h5><?=$row['title']?></h5>
								</div>
							</div>
							<div class="card-footer text-center">
								<a href="<?=$Page_url.'/edit/'.$row['id']?>" class="btn-ajax btn-secondary btn-sm btn"><?=mdi('edit')?> Edit</a>
								<a href="<?=$Page_url.'/remove/'.$row['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>