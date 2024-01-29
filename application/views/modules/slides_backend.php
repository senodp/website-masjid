<div class="card cards">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0 mb-1">Slides</h3><small><i>Click and drag items to change order</i></small>
			</div> 
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-slide" class="btn-ajax btn-sm btn-rounded btn-primary"><?=mdi('plus')?> New Slide</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/slide-sorter/">
			<?php foreach ($slides as $slide): ?>
				<div class="col-md-4 mb-0" data-id="<?=$slide['id']?>">
					<div class="card">
						<div class="card-img-overlay" style="top: unset; bottom: 50px;">
							<?php if ( !empty($slide['title']) ): ?>
							<div class="bg-transparent-white bg-padding-10 rounded text-center">
								<h4 class="m-0"><?=$slide['title']?></h4>
							</div><?php endif; ?>
						</div>
						<img src="<?=img_url($slide['image'], 'slides')?>" alt="" class="card-img-top">
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-left">
									<a href="<?=$Page_url.'/edit-slide/'.$slide['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
								</div>
								<div class="col p-0 m-0 text-right">
									<a href="<?=$Page_url.'/remove-slide/'.$slide['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>