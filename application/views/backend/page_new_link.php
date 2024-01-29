					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
					<div class="row">
						<div class="col-md-12">

							<?php if (!empty($menus['parents'])): ?>
							<div class="form-group">
								<label for="id_parent">Parent Menu</label>
								<select name="id_parent" class="form-control <?=error_class('id_parent')?>">
									<option value="0">None</option>
								<?php foreach ($menus['parents'] as $m): ?>
									<?php menu_html($m, $row['id_parent'], $menus['children']); ?>
								<?php endforeach; ?>
								</select>
								<?=error_block('id_parent')?>
								<!-- <pre><?php var_dump($menus); ?></pre> -->
							</div>
							<?php endif; ?>

							<?php if (!empty($Menu_parents)): ?>
							<div class="form-group">
								<label for="url">Linked Page *</label>
								<select name="url" class="form-control <?=error_class('url')?>">
									<option value="0">Select linked page</option>
								<?php foreach ($Menu_parents as $m): ?>
									<?php menu_html($m, $row['url'], $Menu_children, '', true); ?>
								<?php endforeach; ?>
								</select>
								<?=error_block('url')?>
								<!-- <pre><?php var_dump($menus); ?></pre> -->
							</div>
							<?php endif; ?>

							<div class="tab-content">
								<div class="tab-pane active" id="mt-eng">
									<div class="form-group">
										<label for="title">Custom Title</label>
										<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
										<?=error_block('title')?>
										<small class="text-muted form-text">leave blank to use original Page title</small>
									</div>
								</div>
								<div class="tab-pane" id="mt-ind">
									<div class="form-group">
										<label for="ind_title">Custom Title</label>
										<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
										<?=error_block('ind_title')?>
										<small class="text-muted form-text">leave blank to use original Page title</small>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12 text-center"> <hr>
							<div class="form-group" style="margin: 0;">
								<button class="btn btn-primary btn-submit btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
								
								<a href="<?=$Page_url?>" tabindex="7" class="btn btn-warning btn-cancel btn-rounded"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
							</div>							
						</div>
					</div>

					</form>