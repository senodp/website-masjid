<div class="row">
<?php foreach ($vacancies as $vacancy): ?>
	<div class="col-md-4">
		<div class="card m-b-20">
			<div class="card-header">
				<h4 class="m-0"><?=$vacancy['title']?></h4>
				<small><?=mdi('calendar')?> <?=date_f($vacancy['start_date'])?> - <?=date_f($vacancy['end_date'])?></small>
				<br>
				<small><?=mdi('pin')?> <?=$vacancy['location']?></small>
				<?php if (!empty($vacancy['type'])): ?>
				<br>
				<small><?=mdi('case')?> <?=$vacancy['type']?></small>
				<?php endif; ?>
			</div>
			<div class="card-body" style="height: 125px; overflow: auto;"><?=str_shorten($vacancy['content'], 200)?></div>
			<div class="card-footer">
				<div class="row m-0">
					<div class="col p-0 m-0 text-left">
						<a href="<?=$Page_url.'/edit-vacancy/'.$vacancy['id']?>" class="btn-ajax btn-dark btn-sm btn"><?=mdi('edit')?> Edit</a>
					</div>
					<div class="col p-0 m-0 text-right">
						<a href="<?=$Page_url.'/remove-vacancy/'.$vacancy['id']?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?> Remove</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>