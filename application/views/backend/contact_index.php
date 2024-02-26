<div class="row">
	<div class="col-md-12">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-sectioncontact">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-2">Overview Saran / Masukan</h3>
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
							<div class="col-md-4">
								<div class="form-group">
									<i class="fa fa-phone"></i> <label>Phone</label>
									<input type="text" class="input-save form-control <?=error_class('contact_phone')?>" name="contact_phone" value="<?=option_value('contact_phone')?>" />
									<?=error_block('contact_phone')?>
								</div>
							</div>
							<div class="col-md-4">	
								<div class="form-group">
									<i class="fa fa-envelope"></i> <label>Email</label>
									<input type="text" class="input-save form-control <?=error_class('contact_email')?>" name="contact_email" value="<?=option_value('contact_email')?>" />
									<?=error_block('contact_email')?>
								</div>
							</div>
							<div class="col-md-4">	
								<div class="form-group">
									<i class="fa fa-map"></i> <label>Location Map</label>
									<input type="text" class="input-save form-control <?=error_class('contact_map')?>" name="contact_map" value="<?=option_value('contact_map')?>" />
									<?=error_block('contact_map')?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-block btn-primary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col-md-6">
		<div class="card mb-3">
			<div class="card-header">
				<div class="row">
					<div class="col-md-8"><h4 class="m-0 p-0">Pilihan Pesan</h4></div>
					<div class="col-md-4 text-right"><a href="<?=control_url().'/subject/new/'?>" class="btn btn-dark btn-sm btn-ajax" data-module="subject"><?=mdi('plus')?> New</a></div>
				</div>
			</div>
			<div class="card-body p-0">
				<ul class="list-group m-0 p-0">
				<?php foreach (Subjects() as $subject): ?>
					<li class="list-group-item">
						<div class="d-flex w-100 justify-content-between">
							<h5><?=$subject['title']?><br><small><?=$subject['email']?></small></h5>
							<div class="m-0">
								<a href="<?=control_url().'/subject/edit/'.$subject['id']?>" class="btn btn-secondary btn-sm btn-ajax" data-module="subject"><?=mdi('edit')?> Edit</a>
								<a href="<?=control_url().'/subject/remove/'.$subject['id']?>" class="btn-ajax btn-danger btn-sm btn" data-module="subject"><?=mdi('delete')?> Remove</a>
							</div>
						</div>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagecontact">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-2">Overview Location Map</h3>
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
				<button class="btn btn-block btn-primary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
			<div class="card">
			    <div class="card-body">
			    	<div class="row">			
						<div class="col">
							<h3 class="m-0">Penerima Email</h3><hr>
						</div>
						<div class="col text-right">
							<a href="<?=$Page_url?>/new-vacancy" class="btn-ajax btn-sm btn btn-dark btn-rounded"><?=mdi('plus')?> Add List</a><br>
						</div>		
					</div>
			    	
				    <table id="example_peserta" class="table table-striped table-bordered" style="width:100%">
					    <thead>
					        <tr>
					            <th>Email</th>                                    
					            
					            <!-- <th>Latitude</th>
					            <th>Longitude</th> -->
					            <th width="200">Action</th>
					        </tr>
					    </thead>
					    <tbody>
					    	<?php foreach ($vacancies as $peserta): ?>
					        <tr>
					            <td title="<?=$peserta['title']?>"><?=$peserta['title']?></td>
					            
					            <td>
					                <a href="<?=$Page_url.'/edit-vacancy/'.$peserta['id']?>" data-toggle="modal" data-target="#newarticle" class="btn-ajax btn-dark btn-sm btn-rounded"><i data-feather="edit-3" class="small-icon"></i><?=mdi('edit')?> Edit</a>
					                <a href="<?=$Page_url.'/remove-vacancy/'.$peserta['id']?>" data-toggle="modal" data-target="#delete_article" class="btn-ajax btn-warning btn-sm btn-rounded"><i data-feather="trash" class="small-icon"></i><?=mdi('delete')?> Remove</a>
					            </td>
					        </tr>
					        <?php endforeach; ?>
					    </tbody>
					</table>
				</div>
			</div>
	</div>
</div>
