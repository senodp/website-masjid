			
				
			<div class="row">
				
				<?php foreach ($rows as $r): ?>
					<div class="col-md-3 m-b-20">
						<div class="card">
							<div class="card-body">
								<h3 class="card-title" style="margin-bottom: 5px;"><?=$r['name']?></h3>

								<p class="card-text">
									<?=$r['description']?>
								</p>

								<a href="<?=$module_root_url.'/edit-group/'.$r['id']?>" class="card-link btn btn-ajax btn-outline-secondary btn-sm" title='Edit Group'><?=mdi('edit')?> Edit</a>
								<a href="<?=$module_root_url.'/remove-group/'.$r['id']?>" class="card-link btn btn-ajax btn-outline-danger btn-sm btn-ajax"><?=mdi('delete')?> Delete</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
				