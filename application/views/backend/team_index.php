<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpageteam">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-1">Overview Page team</h3>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpageteam-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpageteam-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="overviewpageteam-eng">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('overviewpageteam_title')?>" name="overviewpageteam_title" value="<?=option_value('overviewpageteam_title')?>" />
									<?=error_block('overviewpageteam_title')?>
								</div>
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpageteamon</label> -->
									<textarea class="editor input-save form-control <?=error_class('overviewpageteam_summary')?>" name="overviewpageteam_summary" rows="3" data-height="90">
										<?=option_value('overviewpageteam_summary', null)?>
									</textarea>
								</div>
							</div>
							<div class="tab-pane" id="overviewpageteam-ind">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('ind_overviewpageteam_title')?>" name="ind_overviewpageteam_title" value="<?=option_value('overviewpageteam_title', null, 'ind')?>" />
									<?=error_block('ind_overviewpageteam_title')?>
								</div>
								<div class="form-group">
									<!-- <label for="dewankomisaris_overview_deskripsi">overviewpageteam</label> -->
									<textarea class="editor input-save form-control <?=error_class('ind_overviewpageteam_summary')?>" name="ind_overviewpageteam_summary" rows="3" data-height="90">
										<?=option_value('overviewpageteam_summary', null, 'ind')?>
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
				<h3 class="m-0">List Team</h3><small><i>Click and drag items to change order</i></small>
			</div>
			<div class="col text-right">
				<a href="<?=$Page_url?>/new-team" class="btn-ajax btn-sm btn-dark btn-rounded"><?=mdi('plus')?> Add Team</a>
			</div>
		</div>
	</div>
	<div class="card-body cards-container">
		<div class="row is-sortable" data-post-url="<?=$Page_url?>/team-sorter/">
			<?php foreach ($team as $row): ?>
				<div class="col-md-3 mb-0" data-id="<?=$row['id']?>">
					<div class="card">
						<div class="card-header" style="text-align: center; min-height: 70px;">
							<?php if ( !empty($row['title']) ): ?><h4 class="m-0"><?=$row['title']?></h4><?php endif; ?>
						</div>
						<img src="<?=img_thumb_url($row['image'], 'team')?>" alt="" class="card-img-top">
						<div class="card-header" style="text-align: center; background-color: #fff;">
							<?php if ( !empty($row['position']) ): ?><i><?=$row['position']?></i><?php endif; ?>
						</div>
						<div class="card-footer">
							<div class="row m-0">
								<div class="col p-0 m-0 text-center">
									<a href="<?=$Page_url.'/edit-team/'.$row['id']?>" class="btn-ajax btn-dark btn-sm btn-rounded"><?=mdi('edit')?> Edit</a>
								
									<a href="<?=$Page_url.'/remove-team/'.$row['id']?>" class="btn-ajax btn-danger btn-sm btn-rounded"><?=mdi('delete')?> Remove</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>