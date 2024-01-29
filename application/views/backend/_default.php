				<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

				<?=validation_block()?>

				<div class="card">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
						  <li class="nav-item">
						    <a data-toggle="tab" class="nav-link active" href="#indonesia">Indonesia</a>
						  </li>
						  <li class="nav-item">
						    <a data-toggle="tab" class="nav-link" href="#english">English</a>
						  </li>
						</ul>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-8">
								<div class="tab-content">
									<div class="tab-pane active" id="indonesia">
										<div class="form-group">
											<label for="title">Title</label>
											<input type="text" class="form-control form-control-lg <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$data)?>" />
											<?=error_block('title')?>
										</div>

										<div class="form-group">
											<label for="content">Content</label>
											<textarea name="content" id="content" cols="30" rows="15" class="form-control editor <?=error_class('content')?>" data-height="500"><?=set_row_value('content',$data)?></textarea>
											<?=error_block('content')?>
										</div>
									</div>
									<div class="tab-pane" id="english">
										<div class="form-group">
											<label for="en_title">Title</label>
											<input type="text" class="form-control form-control-lg <?=error_class('en_title')?>" name="en_title" value="<?=set_row_value('en_title',$data)?>" />
											<?=error_block('en_title')?>
										</div>

										<div class="form-group">
											<label for="en_content">Content</label>
											<textarea name="en_content" id="en_content" cols="30" rows="15" class="form-control editor <?=error_class('en_content')?>" data-height="500"><?=set_row_value('en_content',$data)?></textarea>
											<?=error_block('en_content')?>
										</div>
									</div>
								</div>
							</div>

							<?php $this->load->view('control/_default_attachments'); ?>
						</div>


						<div class="row justify-content-center">
							<div class="col-md-12 text-center"><hr>					
								<div class="form-group">
									<button class="btn btn-primary btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>

									<button class="btn btn-secondary btn-rounded" tabindex="6" name="status" value="2"><span class="glyphicon glyphicon-ok"></span> Save changes as draft</button>
									
									<a href="<?=last_url($module_base_url)?>" tabindex="7" class="btn btn-warning btn-rounded"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				</form>
				