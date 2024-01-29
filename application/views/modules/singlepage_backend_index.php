<?php if($this->uri->segment(2) == 'sitemap'){ ?>
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-10">
			<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagesitemap">
				<div class="card-header">
					<h4 class="mt-0 mb-2">Overview Page Sitemap</h4>
					<ul class="nav nav-tabs card-header-tabs">
						<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpagesitemap-eng">English</a></li>
						<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpagesitemap-ind">Indonesia</a></li>
					</ul>
				</div>
				<div class="card-body cards-container">
					<div class="row">
						<div class="col-md-12">
							<div class="tab-content">
								<div class="tab-pane active" id="overviewpagesitemap-eng">
									<div class="form-group">
										<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagesitemapon</label> -->
										<textarea class="editor input-save form-control <?=error_class('overviewpagesitemap')?>" name="overviewpagesitemap" rows="3" data-height="90">
											<?=option_value('overviewpagesitemap', null)?>
										</textarea>
									</div>
								</div>
								<div class="tab-pane" id="overviewpagesitemap-ind">
									<div class="form-group">
										<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagesitemap</label> -->
										<textarea class="editor input-save form-control <?=error_class('ind_overviewpagesitemap')?>" name="ind_overviewpagesitemap" rows="3" data-height="90">
											<?=option_value('overviewpagesitemap', null, 'ind')?>
										</textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button class="btn btn-block btn-primary btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
				</div>
			</div>
		</div>
		<div class="col-md-1">
			
		</div>
	</div>
<?php }else{ ?>

<?php } ?>

<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
	<div class="row justify-content-center">
		<div class="col-md-11">
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
						<div class="col-md-12">
							
							<div id="accordion">
						        <div class="card">
						        	<a class="collapsed card-link p-1" data-toggle="collapse" href="#collapseTwo">
							            <div class="card-header text-center">
							                    Click to fill in the header image
							            </div>
						            </a>
						            <div id="collapseTwo" class="collapse" data-parent="#accordion">
						            	
						                <div class="card-body">
						                    <div class="row">
						                        <div class="col-md-12">
						                            <div class="form-group">
														<!-- <label for="header">Header</label> -->
														<?=html_upload_img($row['header'],'header','singlepages','1800x440');?>
													</div>
						                        </div>
						                    </div>
						                </div>
						               
						            </div>
						        </div>
						    </div>
						</div>
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
						<div class="col-md-4">
								<div class="form-group">
									<label for="is_publish">Publish / Not Publish</label>
									<select name="is_publish" class="form-control">
										<option value="1" <?php echo $row['is_publish']==1 ? "selected" : "";?>>Publish</option>
										<option value="0" <?php echo !$row['is_publish'] ? "selected" : "";?>>Not Publish</option>
									</select>
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