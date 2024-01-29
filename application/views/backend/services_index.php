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
							<button class="btn btn-block btn-warning btn-save btn-rounded" tabindex="4"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
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
				<button class="btn btn-block btn-secondary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
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
				<h3 class="m-0">List Services</h3>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-services" class="btn-ajax btn-sm btn btn-dark btn-rounded"><?=mdi('plus')?> Services</a>
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