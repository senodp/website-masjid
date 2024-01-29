					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
								<?=error_block('title')?>
							</div>

							<div class="form-group">
								<label for="start_date">Display Date</label>
								<div class="row">
									<div class="col-md-6">
										<div class="input-group">
											<div class="input-daterange input-group datepicker-ranged">
												<input type="text" class="form-control <?=error_class('start_date')?>" name="start_date" placeholder="From: yyyy-mm-dd" value="<?=set_row_value('start_date', $row)?>" />
												<div class="input-group-append">
												  <span class="input-group-text">to</span>
												</div>
												<input type="text" class="form-control <?=error_class('end_date')?>" name="end_date" placeholder="To: yyyy-mm-dd" value="<?=set_row_value('end_date', $row)?>" />
											</div>
										</div>
									</div>
								</div>
								<?=error_block('start_date')?>
								<?=error_block('end_date')?>
							</div>

							<div class="form-group">
								<label for="content">Content</label>
								<textarea name="content" id="content" cols="30" rows="5" class="form-control editor <?=error_class('content')?>" data-height="120"><?=set_row_value('content',$row)?></textarea>
								<?=error_block('content')?>
							</div>

							<div class="form-group">
								<label for="type">Type (Optional)</label>
								<input type="text" class="form-control <?=error_class('type')?>" name="type" value="<?=set_row_value('type',$row)?>" placeholder="'Full Time', 'Part Time', '9 to 5', 'Night Shift' etc" />
								<small class="form-text text-muted">'Full Time', 'Part Time', '9 to 5', 'Night Shift' etc</small>
								<?=error_block('type')?>
							</div>

							<div class="form-group">
								<label for="location">Location</label>
								<input type="text" class="form-control <?=error_class('location')?>" name="location" value="<?=set_row_value('location',$row)?>" />
								<?=error_block('location')?>
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