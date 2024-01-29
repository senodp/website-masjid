			<?php foreach ($groups as $g):  ?>
				<div class="row m-b-20">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col">
									<h3 class="m-0"><?=$g['description']?></h3>
								</div>

								<div class="col text-right">
									<a href="<?=$Page_url?>/edit-group/<?=$g['id']?>" class="btn btn-ajax btn-dark"><?=mdi('edit')?> Edit Group</a>
									<!-- <a href="<?=$Page_url.'/remove-group/'.$g['id']?>" class="btn btn-ajax btn-danger btn-ajax"><?=mdi('delete')?></a> -->
								</div>
							</div>
						</div>
				<?php if (!empty($g['users'])): ?>
						<div class="card-body">
							<div class="row">
				<?php foreach ($g['users'] as $r): ?>
					<div class="col-md-3 m-b-20">
						<div class="card">
							<div class="card-body">
								<!-- <a href="<?=$Page_url.'/edit/'.$r['id']?>" title='Edit User'> -->
									<h4 class="card-title" style="margin-bottom: 5px;"><?=$r['first_name']?> <?=$r['last_name']?></h4>
								<!-- </a> -->
								<!-- <h5 class="m-0">Member of:</h5>  -->
								<!-- <ul style="margin: 0; padding: 0 0 15px 15px;"> -->
								<!-- <?php foreach ($r['groups'] as $group): ?>
									<h5>[<?=$group['description']?>]</h5>
								<?php endforeach; ?> -->
								<!-- </ul> -->

								<p class="card-text">
									<?=$r['username']?> <br>
									<i><?=$r['email']?></i>
								</p>
								
								

								<a href="<?=$Page_url.'/edit/'.$r['id']?>" class="btn btn-ajax btn-outline-secondary btn-sm" title='Edit User'><?=mdi('edit')?> Edit</a>
								<?php if ($r['id'] > 1): ?><a href="<?=$Page_url.'/remove/'.$r['id']?>" class="btn btn-ajax btn-outline-danger btn-sm btn-ajax"><?=mdi('delete')?> Delete</a><?php endif; ?>
								<a href="<?=$Page_url.'/reset-password/'.$r['id']?>" class="btn btn-ajax btn-outline-secondary btn-sm" title='Reset Password'><?=mdi('lock-open')?> Reset Password</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
							</div>
						</div>
				<?php endif; ?>
					</div>
				</div>
				</div>
			<?php endforeach; ?>
				