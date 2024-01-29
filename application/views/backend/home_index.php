<div class="card form-save" data-url="<?=$Page_url?>/edit-meta">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<div id="accordion">
			        <div class="card">
			            <div class="card-header text-center">
			            	<a class="collapsed card-link p-2" data-toggle="collapse" href="#collapseTwo">
			                    Click to fill in the SEO Meta
			                </a>
			            </div>
			            <div id="collapseTwo" class="collapse" data-parent="#accordion">
			                <div class="card-body">
			                    <div class="row">
			                        <div class="col-md-12">
			                            <div class="form-group">
											<label for="meta_title">Title</label>
											<input type="text" class="input-save form-control <?=error_class('meta_title')?>" name="meta_title" value="<?=option_value('meta_title')?>" />
											<?=error_block('meta_title')?>
										</div>
										<div class="form-group">
											<label for="meta_description">Description</label>
											<textarea class="form-control editor input-save <?=error_class('meta_description')?>" name="meta_description" rows="3" data-height="90"><?=option_value('meta_description')?></textarea>
											<?=error_block('meta_description')?>
										</div>
										<div class="form-group">
											<label for="meta_keyword">Keywords</label>
											<textarea class="form-control editor input-save <?=error_class('meta_keyword')?>" name="meta_keyword" rows="3" data-height="90"><?=option_value('meta_keyword')?></textarea>
											<?=error_block('meta_keyword')?>
										</div>
			                        </div>
			                    </div>
			                </div>
			                <div class="card-footer text-center">
								<button class="btn btn-block btn-primary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
							</div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>	

<div class="mt-0">
	<?php $this->load->view('modules/slides_backend'); ?>
</div>

<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sectionabout">
	<div class="card-header">
		<h3 class="mt-0 mb-2">Section About</h3>
		<ul class="nav nav-tabs card-header-tabs">
			<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#about-eng">English</a></li>
			<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#about-ind">Indonesia</a></li>
		</ul>
	</div>
	<div class="card-body cards-container">
		<div class="row">
			<div class="col-md-8">
				<div class="tab-content">
					<div class="tab-pane active" id="about-eng">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="ind_about_title">Title</label>
									<textarea class="editor input-save form-control <?=error_class('about_title')?>" name="about_title" rows="3" data-height="300">
									<?=option_value('about_title', '<h2 class="h2-main"><span class="gold">About</span> <br>Us Title</h2>')?>
									</textarea>
									<?=error_block('about_title')?>
								</div>
								<div class="form-group">
									<label>Text Profile</label>
									<input type="text" class="input-save form-control <?=error_class('about_text_profile')?>" name="about_text_profile" value="<?=option_value('about_text_profile')?>" />
									<?=error_block('about_text_profile')?>
								</div>
								<div class="form-group">
									<label>Text Our Team</label>
									<input type="text" class="input-save form-control <?=error_class('about_text_ourteam')?>" name="about_text_ourteam" value="<?=option_value('about_text_ourteam')?>" />
									<?=error_block('about_text_ourteam')?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="ind_about_description">Description</label>
									<textarea class="editor input-save form-control <?=error_class('about_description')?>" name="about_description" rows="3" data-height="300">
									<?=option_value('about_description', '<h2 class="h2-main"><span class="gold">About</span> <br>Us</h2>')?>
									</textarea>
									<?=error_block('about_description')?>
								</div>
								<div class="form-group">
									<label>Url Text Profile</label>
									<input type="text" class="input-save form-control <?=error_class('about_text_profile_url')?>" name="about_text_profile_url" value="<?=option_value('about_text_profile_url')?>" />
									<?=error_block('about_text_profile_url')?>
								</div>
								<div class="form-group">
									<label>Url Text Our Team</label>
									<input type="text" class="input-save form-control <?=error_class('about_text_ourteam_url')?>" name="about_text_ourteam_url" value="<?=option_value('about_text_ourteam_url')?>" />
									<?=error_block('about_text_ourteam_url')?>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="about-ind">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="ind_about_title">Title</label>
									<textarea class="editor input-save form-control <?=error_class('ind_about_title')?>" name="ind_about_title" rows="3" data-height="300"><?=option_value('about_title', null, 'ind')?></textarea>
									<?=error_block('ind_about_title')?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="ind_about_description">Deskripsi</label>
									<textarea class="editor input-save form-control <?=error_class('ind_about_description')?>" name="ind_about_description" rows="3" data-height="300"><?=option_value('about_description', null, 'ind')?></textarea>
									<?=error_block('ind_about_description')?>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label for="about_image">Image</label>
					<?=html_upload_img(option_value('about_image'), 'about_image', 'options', '960x1080', 'jpg', 'input-save');?>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<button class="btn btn-block btn-secondary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
	</div>
</div>

<div class="card form-save" data-url="<?=$Page_url?>/edit-backgroundservices">
	<div class="row">
		<div class="col-md-12">
			<div id="accordion">
		        <div class="card">
		        	<a class="collapsed card-link p-1" data-toggle="collapse" href="#backservices">
			            <div class="card-header text-center">
			                Click to fill in the header background services image<br>
			                <small style="color: #6c757d;">recommended image size is 1412x1445 pixels</small>
			            </div>
		            </a>
		            <div id="backservices" class="collapse" data-parent="#accordion">
		            	<!-- <div class="card-header text-center">
							<h3 class="mt-0 mb-0">Header Image</h3>
						</div> -->
		                <div class="card-body">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="form-group">
										<!-- <label for="home_kabardaripedati_image">Image</label> -->
										<?=html_upload_img(option_value('backgroundservices_image'), 'backgroundservices_image', 'options', '1412x1445', 'jpg', 'input-save');?>
									</div>
		                        </div>
		                    </div>
		                </div>
		                <div class="card-footer text-center">
							<button class="btn btn-sm btn-block btn-warning btn-save btn-rounded" tabindex="4"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
						</div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-titleservices">
			<div class="card-header">
				<h4 class="mt-0 mb-2 text-center">Title Services</h4>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#titleserv-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#titleserv-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="titleserv-eng">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('title_services')?>" name="title_services" value="<?=option_value('title_services')?>" />
									<?=error_block('title_services')?>
								</div>
							</div>
							<div class="tab-pane" id="titleserv-ind">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('ind_title_services')?>" name="ind_title_services" value="<?=option_value('title_services', null, 'ind')?>" />
									<?=error_block('ind_title_services')?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-sm btn-block btn-secondary btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		
	</div>
</div>

<div class="card cards mt-0">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Services</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-services" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> New Services</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/services-sorter/">
			<?php foreach ($services as $pub): ?>
				<div class="col-md-3 mb-0" data-id="<?=$pub['id']?>">
					<div class="card">
						<div class="card-header text-center" style="min-height: 70px;">
							<?php if ( !empty($pub['title']) ): ?><h4 class="m-0"><?=$pub['title']?></h4><?php endif; ?>
						</div>

						<div class="row">
							<div class="col-md-1">	

							</div>
							<div class="col-md-10" style="background-color: #444;">	
								<img src="<?=img_thumb_url($pub['image'], 'services', 'holder.js/600x600?auto=yes')?>" alt="" class="card-img-top">
							</div>
							<div class="col-md-1">	

							</div>
						</div>
						
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-left">
									<a href="<?=$Page_url.'/edit-services/'.$pub['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
								</div>
								<div class="col p-0 m-0 text-right">
									<a href="<?=$Page_url.'/remove-services/'.$pub['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sectionshowcase">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-2">Title & Description - Showcase</h3>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#showc-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#showc-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="showc-eng">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="sectionshowcase_title">Title</label>
											<textarea class="editor input-save form-control <?=error_class('sectionshowcase_title')?>" name="sectionshowcase_title" rows="3" data-height="300">
											<?=option_value('sectionshowcase_title')?>
											</textarea>
											<?=error_block('sectionshowcase_title')?>
										</div>
										<div class="form-group">
											<label for="sectionshowcase_description">Description</label>
											<textarea class="editor input-save form-control <?=error_class('sectionshowcase_description')?>" name="sectionshowcase_description" rows="3" data-height="300">
											<?=option_value('sectionshowcase_description')?>
											</textarea>
											<?=error_block('sectionshowcase_description')?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Button Label</label>
											<input type="text" class="input-save form-control <?=error_class('sectionshowcase_label_button')?>" name="sectionshowcase_label_button" value="<?=option_value('sectionshowcase_label_button')?>" />
											<?=error_block('sectionshowcase_label_button')?>
										</div>
										<div class="form-group">
											<label>URL / Link</label>
											<input type="text" class="input-save form-control <?=error_class('sectionshowcase_url')?>" name="sectionshowcase_url" value="<?=option_value('sectionshowcase_url')?>" />
											<?=error_block('sectionshowcase_url')?>
										</div>
									</div>
								</div>												
							</div>

							<div class="tab-pane" id="showc-ind">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="sectionshowcase_title">Title</label>
											<textarea class="editor input-save form-control <?=error_class('ind_sectionshowcase_title')?>" name="ind_sectionshowcase_title" rows="3" data-height="300"><?=option_value('sectionshowcase_title', null, 'ind')?></textarea>
											<?=error_block('ind_sectionshowcase_title')?>
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea class="editor input-save form-control <?=error_class('ind_sectionshowcase_description')?>" name="ind_sectionshowcase_description" rows="3" data-height="300"><?=option_value('sectionshowcase_description', null, 'ind')?></textarea>
											<?=error_block('ind_sectionshowcase_description')?>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<label>Button Label (Optional)</label>
											<input type="text" class="input-save form-control <?=error_class('ind_sectionshowcase_label_button')?>" name="ind_sectionshowcase_label_button" value="<?=option_value('sectionshowcase_label_button', null, 'ind')?>" />
											<?=error_block('ind_sectionshowcase_label_button')?>
										</div>
										<div class="form-group">
											<label>URL / Link (Optional)</label>
											<input type="text" class="input-save form-control <?=error_class('ind_sectionshowcase_url')?>" name="ind_sectionshowcase_url" value="<?=option_value('sectionshowcase_url', null, 'ind')?>" />
											<?=error_block('ind_sectionshowcase_url')?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-block btn-secondary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card mt-0 cards">
		<div class="card-header">
			<div class="row">
				<div class="col">
					<h3 class="m-0">Featured Showcase</h3><small><i>Click and drag items to change order</i></small>
				</div>
				<div class="col text-right">
					<!-- <a href="<?=$Page_url?>/new-featuredshowcase" class="btn-ajax btn-sm btn-rounded btn-dark"><?=mdi('plus')?> New Showcase</a> -->
				</div>
			</div>
		</div>
		<div class="card-body cards-container">
			<div class="row is-sortable" data-post-url="<?=$Page_url?>/featuredshowcase-sorter/">
				<?php foreach ($rowing as $pet): ?>
					<div class="col-md-6 mb-0" data-id="<?=$pet['id']?>">
						<div class="card">
							<div class="card-header" style="text-align: center; min-height: 70px;">
								<h4 title="<?=$pet['title'] ?>" class="m-0"><?=str_shorten($pet['title'], '65')?></h4>
							</div>
							<div class="row">
								<div class="col-md-12">	
									<img src="<?=img_url($pet['cover'], 'listpages')?>" alt="thumbnail" class="card-img-top">
								</div>
							</div>
							<div class="card-footer">
								<div class="row m-0">
									<div class="col p-0 m-0 text-center">
										<a href="<?=$Page_url.'/edit-featuredshowcase/'.$pet['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
										<a href="<?=$Page_url.'/remove-featuredshowcase/'.$pet['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagetestimonial">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-1">Overview Page Testimonial</h3>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpagetestimonial-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpagetestimonial-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="overviewpagetestimonial-eng">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagetestimonialon</label> -->
									<textarea class="editor input-save form-control <?=error_class('overviewpagetestimonial')?>" name="overviewpagetestimonial" rows="3" data-height="90">
										<?=option_value('overviewpagetestimonial', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="overviewpagetestimonial-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagetestimonial</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_overviewpagetestimonial')?>" name="ind_overviewpagetestimonial" rows="3" data-height="90">
										<?=option_value('overviewpagetestimonial', null, 'ind')?>
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-secondary btn-sm btn-block btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>
<div class="card cards">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Testimonial</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-testimonial" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> Add Testimonial</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/testimonial-sorter/">
			<?php foreach ($testimonial as $row): ?>
				<div class="col-md-3 mb-0" data-id="<?=$row['id']?>">
					<div class="card">
						<div class="card-header" style="text-align: center; min-height: 70px;">
							<?php if ( !empty($row['title']) ): ?><h4 class="m-0"><?=$row['title']?></h4><?php endif; ?>
						</div>
						<img src="<?=img_url($row['image'], 'testimonial')?>" alt="" class="card-img-top">
						<div class="card-header" style="text-align: center; background-color: #fff;">
							<?php if ( !empty($row['position']) ): ?><i><?=$row['position']?></i><?php endif; ?>
						</div>
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-center">
									<a href="<?=$Page_url.'/edit-testimonial/'.$row['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
								
									<a href="<?=$Page_url.'/remove-testimonial/'.$row['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagelogo">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-1">Overview Page Logo Clients</h3>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpagelogo-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpagelogo-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="overviewpagelogo-eng">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagelogoon</label> -->
									<textarea class="editor input-save form-control <?=error_class('overviewpagelogo')?>" name="overviewpagelogo" rows="3" data-height="90">
										<?=option_value('overviewpagelogo', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="overviewpagelogo-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagelogo</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_overviewpagelogo')?>" name="ind_overviewpagelogo" rows="3" data-height="90">
										<?=option_value('overviewpagelogo', null, 'ind')?>
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-secondary btn-sm btn-block btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>
<div class="card cards mt-0">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Logo</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-logo" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> New Logo</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/logo-sorter/">
			<?php foreach ($logo as $log): ?>
				<div class="col-md-3 mb-0" data-id="<?=$log['id']?>">
					<div class="card">
						<div class="card-header text-center">
							<?php if ( !empty($log['title']) ): ?><h4 class="m-0"><?=$log['title']?></h4><?php endif; ?>
						</div>
						<img src="<?=img_url($log['image'], 'logo')?>" alt="" class="card-img-top">
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-center">
									<a href="<?=$Page_url.'/edit-logo/'.$log['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
									<a href="<?=$Page_url.'/remove-logo/'.$log['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sectioncontact">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-2">Overview Address</h3>
				<!-- <h3 class="mt-0 mb-2">Overview Page Contact / Let's Decode!</h3> -->
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#sections-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#sections-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="sections-eng">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<!-- <label for="contact_address">Description</label> -->
											<textarea class="editor input-save form-control <?=error_class('contact_address')?>" name="contact_address" rows="3" data-height="300">
											<?=option_value('contact_address')?>
											</textarea>
											<?=error_block('contact_address')?>
										</div>
										
									</div>
									
								</div>												
							</div>

							<div class="tab-pane" id="sections-ind">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<!-- <label for="contact_address">Title</label> -->
											<textarea class="editor input-save form-control <?=error_class('ind_contact_address')?>" name="ind_contact_address" rows="3" data-height="300"><?=option_value('contact_address', null, 'ind')?></textarea>
											<?=error_block('ind_contact_address')?>
										</div>
										
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<i class="fa fa-phone"></i> <label>Phone</label>
									<input type="text" class="input-save form-control <?=error_class('contact_phone')?>" name="contact_phone" value="<?=option_value('contact_phone')?>" />
									<?=error_block('contact_phone')?>
								</div>
							</div>
							<div class="col-md-6">	
								<div class="form-group">
									<i class="fa fa-envelope"></i> <label>Email</label>
									<input type="text" class="input-save form-control <?=error_class('contact_email')?>" name="contact_email" value="<?=option_value('contact_email')?>" />
									<?=error_block('contact_email')?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-block btn-secondary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sosmed">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-0">Social Media</h3>
			</div>
			<div class="card-body cards-container pb-4">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="sosmed_image">Logo</label>
							<?=html_upload_img(option_value('sosmed_image'), 'sosmed_image', 'options', '505x246', 'jpg', 'input-save');?>
						</div>
					</div>
					<div class="col-md-8">
						<div class="tab-content">
							<div class="tab-pane active" id="hosos-eng">
								
								<!-- <div class="form-group">
									<label for="sosmed_title">Title</label>
									<input type="text" class="input-save form-control <?=error_class('sosmed_title')?>" name="sosmed_title" value="<?=option_value('sosmed_title')?>" />
									<?=error_block('sosmed_title')?>
									
								</div> -->
								<div class="form-group">
									<label for="sosmed_facebook">Facebook</label>
									<input type="text" class="input-save form-control <?=error_class('sosmed_facebook')?>" name="sosmed_facebook" value="<?=option_value('sosmed_facebook')?>" />
									<?=error_block('sosmed_facebook')?>
									
								</div>
								<div class="form-group">
									<label for="sosmed_twitter">Twitter</label>
									<input type="text" class="input-save form-control <?=error_class('sosmed_twitter')?>" name="sosmed_twitter" value="<?=option_value('sosmed_twitter')?>" />
									<?=error_block('sosmed_twitter')?>
								
								</div>
								<div class="form-group">
									<label for="sosmed_linkedin">Linkedin</label>
									<input type="text" class="input-save form-control <?=error_class('sosmed_linkedin')?>" name="sosmed_linkedin" value="<?=option_value('sosmed_linkedin')?>" />
									<?=error_block('sosmed_linkedin')?>
									
								</div>
								<div class="form-group">
									<label for="sosmed_youtube">Youtube</label>
									<input type="text" class="input-save form-control <?=error_class('sosmed_youtube')?>" name="sosmed_youtube" value="<?=option_value('sosmed_youtube')?>" />
									<?=error_block('sosmed_youtube')?>
								
								</div>
								<div class="form-group">
									<label for="sosmed_instagram">Instagram</label>
									<input type="text" class="input-save form-control <?=error_class('sosmed_instagram')?>" name="sosmed_instagram" value="<?=option_value('sosmed_instagram')?>" />
									<?=error_block('sosmed_instagram')?>
								
								</div>
								
							</div>					
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-block btn-secondary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-1">
		
	</div>
	<div class="col-md-10">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagecontact">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-2">Overview Page Contact / Let's Decode!</h3>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpagecontact-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpagecontact-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="overviewpagecontact-eng">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagecontacton</label> -->
									<textarea class="editor input-save form-control <?=error_class('overviewpagecontact')?>" name="overviewpagecontact" rows="3" data-height="90">
										<?=option_value('overviewpagecontact', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="overviewpagecontact-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagecontact</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_overviewpagecontact')?>" name="ind_overviewpagecontact" rows="3" data-height="90">
										<?=option_value('overviewpagecontact', null, 'ind')?>
									</textarea>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-block btn-secondary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-1">
		
	</div>
</div>






