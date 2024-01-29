<div class="card form-save" data-url="<?=$Page_url?>/edit-metacareer">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<div id="accordion">
			        <div class="card">
			            <div class="card-header text-center">
			            	<a class="collapsed card-link p-2" data-toggle="collapse" href="#collapseTwo">
			                    Click to fill in the SEO Meta Career
			                </a>
			            </div>
			            <div id="collapseTwo" class="collapse" data-parent="#accordion">
			                <div class="card-body">
			                    <div class="row">
			                        <div class="col-md-12">
			                            
										<div class="form-group">
											<label for="meta_description_career">Description</label>
											<textarea class="form-control editor input-save <?=error_class('meta_description_career')?>" name="meta_description_career" rows="3" data-height="90"><?=option_value('meta_description_career')?></textarea>
											<?=error_block('meta_description_career')?>
										</div>
										
			                        </div>
			                    </div>
			                </div>
			                <div class="card-footer text-center">
								<button class="btn btn-block btn-success btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
							</div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-1">
		
	</div>
	<div class="col-md-10">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagecareer">
			<div class="card-header">
				<h4 class="mt-0 mb-2">Overview Page Career</h4>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpagecareer-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpagecareer-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="overviewpagecareer-eng">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagecareeron</label> -->
									<textarea class="editor input-save form-control <?=error_class('overviewpagecareer')?>" name="overviewpagecareer" rows="3" data-height="90">
										<?=option_value('overviewpagecareer', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="overviewpagecareer-ind">
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpagecareer</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_overviewpagecareer')?>" name="ind_overviewpagecareer" rows="3" data-height="90">
										<?=option_value('overviewpagecareer', null, 'ind')?>
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

<div class="card cards">
	<div class="card-header">
		<div class="row">
			<div class="col">
				<h3 class="m-0">List Vacancy</h3>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-career" class="btn-ajax btn-sm btn btn-dark btn-rounded"><?=mdi('plus')?> Vacancy</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/career-sorter/">
			<?php foreach ($career as $row): ?>
				<div class="col-md-4 mb-0" data-id="<?=$row['id']?>">
					<div class="card m-b-20">
						<div class="card-header">
							<h4 class="m-0"><?=$row['title']?></h4>
							<small><?=mdi('calendar')?> <?=date_f($row['start_date'])?> - <?=date_f($row['end_date'])?></small>
							<br>
							<small><?=mdi('pin')?> <?=$row['location']?></small>
							<?php if (!empty($row['type'])): ?>
							<br>
							<small><?=mdi('case')?> <?=$row['type']?></small>
							<?php endif; ?>
						</div>
						<div class="card-body" style="height: 125px; overflow: auto;"><?=str_shorten($row['content'], 200)?></div>
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-left">
									<a href="<?=$Page_url.'/edit-career/'.$row['id']?>" class="btn-ajax btn-dark btn-sm btn"><?=mdi('edit')?> Edit</a>
								</div>
								<div class="col p-0 m-0 text-right">
									<a href="<?=$Page_url.'/remove-career/'.$row['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
						</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>