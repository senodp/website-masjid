					<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

					<div class="row">
						<div class="col-md-12">
							

							<div class="form-group">
								<label for="title">Title</label>
								<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
								<?=error_block('title')?>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="departements">Department</label>
										<select name="departements" class="form-control">
											<?php 
											echo "<option value=''>Select Department</option>";
											$q=$this->db->query("SELECT * FROM departement WHERE deleted_by = 0");
											foreach($q->result_array() as $r) {
												$slc = $row['departements']==$r['title'] ? "selected" : "";
												echo "<option value='".$r['title']."' $slc>".$r['title']."</option>";
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="start_date">Display Date</label>
										<div class="row">
											<div class="col-md-12">
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
								</div>
							</div>
							

							<div class="form-group">
								<label for="content">Content</label>
								<textarea name="content" id="content" cols="30" rows="5" class="form-control editor <?=error_class('content')?>" data-height="120"><?=set_row_value('content',$row)?></textarea>
								<?=error_block('content')?>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="type">Type (Optional)</label>
										<input type="text" class="form-control <?=error_class('type')?>" name="type" value="<?=set_row_value('type',$row)?>" placeholder="'Full Time', 'Part Time', '9 to 5', 'Night Shift' etc" />
										<small class="form-text text-muted">'Full Time', 'Part Time', '9 to 5', 'Night Shift' etc</small>
										<?=error_block('type')?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="experience">Experience (Optional)</label>
										<input type="text" class="form-control <?=error_class('experience')?>" name="experience" value="<?=set_row_value('experience',$row)?>" placeholder="'1 years', '1 - 2 years', '>2 years' etc" />
										<small class="form-text text-muted">'1 years', '1 - 2 years', '>2 years' etc</small>
										<?=error_block('experience')?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="location">Location</label>
										<input type="text" class="form-control <?=error_class('location')?>" name="location" value="<?=set_row_value('location',$row)?>" />
										<?=error_block('location')?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="is_publish">Publish / Not Publish</label>
										<select name="is_publish" class="form-control">
											<option value="1" <?php echo $row['is_publish']==1 ? "selected" : "";?>>Publish</option>
											<option value="0" <?php echo !$row['is_publish'] ? "selected" : "";?>>Not Publish</option>
										</select>
									</div>
								</div>
							</div>

							<div class="form-group">
								<label for="location">Tag (Click Enter if you want to add)</label>
								<input type="text" data-role="tagsinput" class="form-control <?=error_class('location')?>" name="tags" value="<?=set_row_value('tags',$row)?>" />
								<?=error_block('tags')?>
							</div>

							<div class="form-group">
								<label for="url">URL (Optional)</label>
								<input type="text" class="form-control <?=error_class('url')?>" name="url" value="<?=set_row_value('url',$row)?>" />
								<?=error_block('url')?>
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