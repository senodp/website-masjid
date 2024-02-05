	<?php if (in_array('category', $Page_options) || in_array('topic', $Page_options)): ?>
	<div class="row">
		<div class="col-md-8">
	<?php endif; ?>

			<div class="row mt-0">
				<?php foreach ($rows as $r): ?>
					<div class="col-md-12 m-b-20">
						<div class="card">
							<div class="card-body py-0 pl-0" style="overflow: auto;">
								<div class="row">
									<div class="col-md-12">
										<div class="media">
										<?php if (in_array('image-gallery', $Page_options)): ?>
											<img class="align-self-top mr-3" src="<?=imgcache_url(listpage_cover($r), 'attachments', '260x130', 'holder.js/260x130?text='.$Page['title'])?>" alt="thumbnail">
										<?php else: ?>
											
											<img width="170" class="align-self-top mr-3 mt-1 ml-1" src="<?=img_url($r['cover'], 'listpages')?>" alt="thumbnail">
											
										<?php endif; ?>
											<div class="media-body pt-2">
												<h3 class="m-0 pb-2" title="<?=$r['title']?>"><?=str_shorten($r['title'], 75)?></h3>
												<!-- <hr class="p-1 m-0"> -->
												<p class="m-0"><?=str_shorten($r['content'], 275)?>
												</p>
												<!-- <br> -->
												<i>* post created at <?=date_f($r['created_on'], 'd M Y')?></i>
												<p class="font-italic pt-2">
												<a href="<?=$Page_url.'/edit/'.$r['id']?>" class="<?=(in_array('image-gallery', $Page_options))?'':'btn-ajax'?> btn-warning btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
												<a href="<?=$Page_url.'/remove/'.$r['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="card-footer text-center">
								<a href="<?=$Page_url.'/edit/'.$r['id']?>" class="<?=(in_array('image-gallery', $Page_options))?'':'btn-ajax'?> btn-secondary btn-sm btn"><?=mdi('edit')?> Edit</a>
								<a href="<?=$Page_url.'/remove/'.$r['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
							</div> -->
						</div>
					</div>
				<?php endforeach; ?>
			</div>

	<?php if (in_array('category', $Page_options) || in_array('topic', $Page_options)): ?>
		</div>
		<div class="col-md-4">
	<?php endif; ?>

	<?php if (in_array('category', $Page_options)): ?>
			<div class="card mb-0 mt-0">
				<div class="card-header">
					<div class="row">
						<div class="col-md-12 text-center"><h4 class="m-0 p-0">Categories</h4></div>
						<!-- <div class="col-md-6 text-right"><a href="<?=control_url().'/taxonomy/new/'.$Page['id'].'/Category'?>" class="btn btn-dark btn-sm btn-ajax" data-module="taxonomy"><?=mdi('plus')?> New Category</a></div> -->
					</div>
				</div>
				<div class="card-body p-0">
					<ul class="list-group m-0 p-0">
					<?php foreach (Taxonomies($Page['id'], 'Category') as $tx): ?>
						<li class="list-group-item">
							<div class="d-flex w-100 justify-content-between">
								<h5><?=$tx['name']?></h5>
								<div class="m-0 pt-1">
									<a href="<?=control_url().'/taxonomy/edit/'.$tx['id']?>" class="btn-secondary btn-sm btn-ajax btn-rounded" data-module="taxonomy"><?=mdi('edit')?> Edit</a>
									<a href="<?=control_url().'/taxonomy/remove/'.$tx['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded" data-module="taxonomy"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
	<?php endif; ?>

	<?php if (in_array('topic', $Page_options)): ?>
			<div class="card mb-3 mt-3">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6"><h4 class="m-0 p-0">Topics</h4></div>
						<div class="col-md-6 text-right"><a href="<?=control_url().'/taxonomy/new/'.$Page['id'].'/Topic'?>" class="btn btn-dark btn-sm btn-ajax" data-module="taxonomy"><?=mdi('plus')?> New</a></div>
					</div>
				</div>
				<div class="card-body p-0">
					<ul class="list-group m-0 p-0">
					<?php foreach (Taxonomies($Page['id'], 'Topic') as $tx): ?>
						<li class="list-group-item">
							<div class="d-flex w-100 justify-content-between">
								<h5><?=$tx['name']?></h5>
								<div class="m-0">
									<a href="<?=control_url().'/taxonomy/edit/'.$tx['id']?>" class="btn btn-secondary btn-sm btn-ajax btn-rounded"  data-module="taxonomy"><?=mdi('edit')?> Edit</a>
									<a href="<?=control_url().'/taxonomy/remove/'.$tx['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"  data-module="taxonomy"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</li>
					<?php endforeach; ?>
					</ul>
				</div>
			</div>
	<?php endif; ?>

	<?php if (in_array('category', $Page_options) || in_array('topic', $Page_options)): ?>
		</div>
	</div>
	<?php endif; ?>