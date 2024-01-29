					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
					<div class="row justify-content-center">
						<div class="col-md-10">
							<div class="card">
								<div class="card-header">
									<h4 class="mt-0 mb-1"><?=$Page['title']?></h4>
									<ul class="nav nav-tabs card-header-tabs">
										<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#mt-eng">English</a></li>
										<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#mt-ind">Indonesia</a></li>
									</ul>
								</div>
								<div class="card-body">
									<div class="row justify-content-center">
										<!-- <div class="col-md-10">
											<div class="form-group">
												<label for="header">Header</label>
												html_upload_img($row['header'],'header','singlepages','1000x0');?>
											</div>
										</div> -->
										<div class="col-md-12">
											<div class="tab-content">
												<div class="tab-pane active" id="mt-eng">
												    <div class="form-group">
														<label for="titlehead">Title Head</label>
														<input type="text" class="form-control <?=error_class('titlehead')?>" name="titlehead" value="<?=set_row_value('titlehead',$row)?>" />
														<?=error_block('titlehead')?>
													</div>
													<div class="form-group">
														<label for="content">Content</label>
														<textarea class="editor form-control <?=error_class('content')?>" name="content" rows="20" data-height="420"><?=set_row_value('content',$row)?></textarea>
														<?=error_block('content')?>
													</div>
												</div>
												<div class="tab-pane" id="mt-ind">
												    <div class="form-group">
														<label for="ind_titlehead">Title Head</label>
														<input type="text" class="form-control <?=error_class('ind_titlehead')?>" name="ind_titlehead" value="<?=set_row_value('ind_titlehead',$row)?>" />
														<?=error_block('ind_titlehead')?>
													</div>
													<div class="form-group">
														<label for="ind_content">Content</label>
														<textarea class="editor form-control <?=error_class('ind_content')?>" name="ind_content" rows="20" data-height="420"><?=set_row_value('ind_content',$row)?></textarea>
														<?=error_block('ind_content')?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card-footer text-center">
									<div class="form-group" style="margin: 0;">
										<button class="btn btn-rounded btn-primary btn-submit" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
										
										<a href="<?=$Page_url?>" tabindex="7" class="btn btn-rounded btn-warning btn-cancel"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
									</div>	
								</div>
							</div>
						</div>
					</div>

					</form>