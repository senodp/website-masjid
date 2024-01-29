			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-body">
							<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">
								<input type="hidden" value="<?=$row['attachment_collection']?>" name="attachment_collection">
							<div class="row">
								<div class="col-md-12">
									<div class="tab-content">
										<div class="tab-pane active" id="mt-eng">
											<div class="form-group">
												<label for="title">Title</label>
												<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
												<?=error_block('title')?>
											</div>
											<div class="form-group">
												<label for="summary">Summary</label>
												<textarea class="editor form-control <?=error_class('summary')?>" name="summary" rows="20" data-height="100"><?=set_row_value('summary',$row)?></textarea>
												<?=error_block('summary')?>
											</div>
											<div class="form-group">
												<label for="content">Content</label>
												<textarea class="editor form-control <?=error_class('content')?>" name="content" rows="20" data-height="300"><?=set_row_value('content',$row)?></textarea>
												<?=error_block('content')?>
											</div>
										</div>
										<div class="tab-pane" id="mt-ind">
											<div class="form-group">
												<label for="ind_title">Title</label>
												<input type="text" class="form-control <?=error_class('ind_title')?>" name="ind_title" value="<?=set_row_value('ind_title',$row)?>" />
												<?=error_block('ind_title')?>
											</div>
											<div class="form-group">
												<label for="ind_summary">Summar</label>
												<textarea class="editor form-control <?=error_class('ind_summary')?>" name="ind_summary" rows="20" data-height="100"><?=set_row_value('ind_summary',$row)?></textarea>
												<?=error_block('ind_summary')?>
											</div>
											<div class="form-group">
												<label for="ind_content">Content</label>
												<textarea class="editor form-control <?=error_class('ind_content')?>" name="ind_content" rows="20" data-height="300"><?=set_row_value('ind_content',$row)?></textarea>
												<?=error_block('ind_content')?>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="created_on">Date</label>
										<input type="text" class="form-control datepicker <?=error_class('created_on')?>" name="created_on" placeholder="From: yyyy-mm-dd" value="<?=($Page_action == 'new')?date('Y-m-d'):date_f($row['created_on'], 'Y-m-d')?>" />
										<?=error_block('created_on')?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="url">URL Slug (optional)</label>
										<input type="text" class="form-control <?=error_class('url')?>" name="url" value="<?=set_row_value('url',$row)?>" />
										<?=error_block('url')?>
									</div>
								</div>
							</div>			
							<div class="row">
								<div class="col-md-12">
								<?php if (in_array('topic', $Page_options)): ?>
									<div class="form-group">
										<label for="topic_id">Topic</label>
										<select name="topic_id" id="topic_id" class="form-control">
											<option value="0">Select Topic</option>
											<?php foreach (Taxonomies($Page['id'], 'Topic') as $tx): ?>
											<option value="<?=$tx['id']?>" <?=set_select_ext('topic_id', $tx['id'], $row['topic_id'])?>><?=$tx['name']?></option>
											<?php endforeach; ?>
										</select>
										<?=error_block('topic_id')?>
									</div>
								<?php endif; ?>

								<?php if (in_array('category', $Page_options)): ?>
									<div class="form-group">
										<label for="category_id">Category</label>
										<select name="category_id" id="category_id" class="form-control">
											<option value="0">Select Category</option>
											<?php foreach (Taxonomies($Page['id'], 'Category') as $tx): ?>
											<option value="<?=$tx['id']?>" <?=set_select_ext('category_id', $tx['id'], $row['category_id'])?>><?=$tx['name']?></option>
											<?php endforeach; ?>
										</select>
										<?=error_block('category_id')?>
									</div>
								<?php endif; ?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12 text-center"> <hr>
									<div class="form-group" style="margin: 0;">
										<button class="btn btn-rounded btn-primary btn-submit" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
										
										<a href="<?=$Page_url?>" tabindex="7" class="btn btn-rounded btn-warning btn-cancel"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
									</div>							
								</div>
							</div>

							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="col">
									<h3 class="m-0">Image Gallery</h3>
								</div>
								<div class="col text-right">
									<a href="<?=control_url('attachment')?>/new/<?=$row['attachment_collection']?>/Image" class="btn-ajax btn-sm btn btn-dark" data-module="attachment"><?=mdi('plus')?> New Image</a>
								</div>
							</div>
						</div>
						<div class="card-body" id="attachment-body">
						<?php $this->load->view('modules/attachment_backend_list', ['attachments' => attachments($row['attachment_collection'])]); ?>
						</div>
					</div>
				</div>
			</div>