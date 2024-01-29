<div class="row">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-titleabout">
			<div class="card-header">
				<h4 class="mt-0 mb-2 text-center">Title About</h4>
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
									<input type="text" class="input-save form-control <?=error_class('title_about')?>" name="title_about" value="<?=option_value('title_about')?>" />
									<?=error_block('title_about')?>
								</div>
							</div>
							<div class="tab-pane" id="titleserv-ind">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('ind_title_about')?>" name="ind_title_about" value="<?=option_value('title_about', null, 'ind')?>" />
									<?=error_block('ind_title_about')?>
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
	<div class="col-md-3">
		
	</div>
</div>

<div class="row">
	<div class="col-md-1">
		
	</div>
	<div class="col-md-10">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-contentimage">
			<div class="card-header text-center">
				<h4 class="mt-0 mb-1">Content Image</h4>
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
									<textarea class="editor input-save form-control <?=error_class('content_image')?>" name="content_image" rows="3" data-height="90">
										<?=option_value('content_image', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="overviewpagetestimonial-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagetestimonial</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_content_image')?>" name="ind_content_image" rows="3" data-height="90">
										<?=option_value('content_image', null, 'ind')?>
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
	<div class="col-md-1">
		
	</div>
</div>

<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-webelieve">
			<div class="card-header text-center">
				<h4 class="mt-0 mb-1">We Believe</h4>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#we-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#we-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="we-eng">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">weon</label> -->
									<textarea class="editor input-save form-control <?=error_class('we_believe')?>" name="we_believe" rows="3" data-height="90">
										<?=option_value('we_believe', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="we-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">we</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_we_believe')?>" name="ind_we_believe" rows="3" data-height="90">
										<?=option_value('we_believe', null, 'ind')?>
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

<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sectionabout">
	<div class="card-header">
		<!-- <h3 class="mt-0 mb-2">Section About</h3> -->
		<ul class="nav nav-tabs card-header-tabs">
			<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#about-eng">English</a></li>
			<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#about-ind">Indonesia</a></li>
		</ul>
	</div>
	<div class="card-body cards-container">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="about_history_image">Image</label>
					<?=html_upload_img(option_value('about_history_image'), 'about_history_image', 'options', '820x487', 'jpg', 'input-save');?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="tab-content">
					<div class="tab-pane active" id="about-eng">
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label for="ind_about_description">Description</label>
									<textarea class="editor input-save form-control <?=error_class('about_history_description')?>" name="about_history_description" rows="3" data-height="300">
									<?=option_value('about_history_description', '<h2 class="h2-main"><span class="gold">About</span> <br>Us</h2>')?>
									</textarea>
									<?=error_block('about_history_description')?>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="about-ind">
						<div class="row">
							
							<div class="col-md-12">
								<div class="form-group">
									<label for="ind_about_history_description">Deskripsi</label>
									<textarea class="editor input-save form-control <?=error_class('ind_about_history_description')?>" name="ind_about_history_description" rows="3" data-height="300"><?=option_value('about_history_description', null, 'ind')?></textarea>
									<?=error_block('ind_about_history_description')?>
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

<div class="card cards mt-0">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Logo Subsidiaries</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-logosubsidiaries" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> New Subsidiaries</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/logosubsidiaries-sorter/">
			<?php foreach ($logosubsidiaries as $log): ?>
				<div class="col-md-3 mb-0" data-id="<?=$log['id']?>">
					<div class="card">
						<div class="card-header text-center">
							<?php if ( !empty($log['title']) ): ?><h4 class="m-0"><?=$log['title']?></h4><?php endif; ?>
						</div>
						<img src="<?=img_thumb_url($log['image'], 'logosubsidiaries', 'holder.js/172x141?auto=yes')?>" alt="" class="card-img-top">
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-center">
									<a href="<?=$Page_url.'/edit-logosubsidiaries/'.$log['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
									<a href="<?=$Page_url.'/remove-logosubsidiaries/'.$log['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="card cards">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Our Values</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-ourvalues" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> Add Values</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/ourvalues-sorter/">
			<?php foreach ($ourvalues as $row): ?>
				<div class="col-md-3 mb-0" data-id="<?=$row['id']?>">
					<div class="card">
						<div class="card-header" style="text-align: center; min-height: 70px;">
							<?php if ( !empty($row['title']) ): ?><h4 class="m-0"><?=$row['title']?></h4><?php endif; ?>
						</div>
						<img src="<?=img_thumb_url($row['image'], 'ourvalues')?>" alt="" class="card-img-top">
						
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-center">
									<a href="<?=$Page_url.'/edit-ourvalues/'.$row['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
								
									<a href="<?=$Page_url.'/remove-ourvalues/'.$row['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<div class="card cards mt-0">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Solution</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-solution" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> New Solution</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/solution-sorter/">
			<?php foreach ($solution as $solus): ?>
				<div class="col-md-12 mb-0" data-id="<?=$solus['id']?>">
					<div class="card">
						<div class="card-header text-left">
							<?php if ( !empty($solus['title']) ): ?><h3 class="m-0"><?=$solus['title']?></h3><?php endif; ?>
						</div>
						<div class="row">
							<div class="col-md-8">
								<div class="card-header text-left" style="background-color: #fff !important;">
									<?php if ( !empty($solus['content']) ): ?><h4 class="m-0"><?=$solus['content']?></h4><?php endif; ?>
								</div>
								<div class="card-header text-left" style="background-color: #fff !important;">
									<button title="<?=$solus['linkbutton_1']?>" class="btn btn-primary btn-submit"><?=$solus['labelbutton_1']?></button>
									<button title="<?=$solus['linkbutton_2']?>" class="btn btn-dark btn-submit"><?=$solus['labelbutton_2']?></button>
								</div>
								
							</div>
							<div class="col-md-4">
								<img src="<?=img_thumb_url($solus['image'], 'solution', 'holder.js/172x141?auto=yes')?>" alt="" class="card-img-top">
							</div>
						</div>
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-center">
									<a href="<?=$Page_url.'/edit-solution/'.$solus['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
									<a href="<?=$Page_url.'/remove-solution/'.$solus['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
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
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sectiondown">
			<div class="card-header text-center">
				<!-- <h4 class="mt-0 mb-1">We Believe</h4> -->
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#we-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#we-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="we-eng">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">weon</label> -->
									<textarea class="editor input-save form-control <?=error_class('sectiondown_description')?>" name="sectiondown_description" rows="3" data-height="90">
										<?=option_value('sectiondown_description', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="we-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">we</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_sectiondown_description')?>" name="ind_sectiondown_description" rows="3" data-height="90">
										<?=option_value('sectiondown_description', null, 'ind')?>
									</textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Label Button</label>
							<input type="text" class="input-save form-control <?=error_class('sectiondown_label')?>" name="sectiondown_label" value="<?=option_value('sectiondown_label')?>" />
							<?=error_block('sectiondown_label')?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Link Button</label>
							<input type="text" class="input-save form-control <?=error_class('sectiondown_link')?>" name="sectiondown_link" value="<?=option_value('sectiondown_link')?>" />
							<?=error_block('sectiondown_link')?>
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