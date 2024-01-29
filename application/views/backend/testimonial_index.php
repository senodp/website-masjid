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