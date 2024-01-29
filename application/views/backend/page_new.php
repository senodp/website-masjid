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

							<div class="tab-content">
								<div class="tab-pane active" id="mt-eng">
									<div class="form-group">
										<label for="title">Title</label>
										<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title', $row)?>" />
										<?=error_block('title')?>
									</div>
								</div>
								<div class="tab-pane" id="mt-ind">
									<div class="form-group">
										<label for="ind_title">Title</label>
										<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title', $row)?>" />
										<?=error_block('ind_title')?>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="url">URL Slug (optional)</label>
								<input type="text" class="form-control <?=error_class('url')?>" name="url" value="<?=set_row_value('url', $row)?>" />
								<?=error_block('url')?>
							</div>

						<?php if ($Page_action == 'new'): ?>
							<!-- <div class="form-group">
								<label for="template">Template (optional)</label>
								<select name="template" id="template" class="form-control">
									<option value="singlepage">Single Page</option>
									<option value="listpage">List Page</option>
								</select>
								<?=error_block('template')?>
							</div> -->
						<?php else: ?>
							<!-- <input type="hidden" value="<?=$row['template']?>" name="template"> -->
						<?php endif; ?>
							<div class="form-group text-muted">
								<label for="template">Template</label>
								<input type="text" class="form-control <?=error_class('template_options')?>" value="<?=set_row_value('template', $row)?>" name="template">
								<?=error_block('template')?>
								<div class="text-muted"><i><small>optional, input by developer only</small></i></div>
							</div>
							<div class="form-group text-muted">
								<label for="template_options">Template Options:</label>
								<input type="text" class="form-control <?=error_class('template_options')?>" name="template_options" value="<?=set_row_value('template_options', $row)?>" data-role="tagsinput" />
								<?=error_block('template_options')?>
								<div class="text-muted"><i><small>optional, input by developer only</small></i></div>
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