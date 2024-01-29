<div class="col-md-auto text-right m-t-20">
	<?php if (in_array('image-gallery', $Page_options)): ?>
		<a href="<?=$Page_url.'/new'?>" class="btn btn-dark"><?=mdi('plus')?> New Entry</a>
	<?php else: ?>
		<a href="<?=$Page_url.'/new'?>" class="btn-ajax btn btn-dark"><?=mdi('plus')?> New Entry</a>
	<?php endif; ?>
	
	<?php if (in_array('topic', $Page_options)): ?>
	<a href="<?=control_url().'/taxonomy/new/'.$Page['id'].'/Topic'?>" class="btn-ajax btn btn-dark" data-module="taxonomy"><?=mdi('plus')?> New Topic</a>
	<?php endif; ?>
	<?php if (in_array('category', $Page_options)): ?>
	<a style="color: #fff;" href="<?=control_url().'/taxonomy/new/'.$Page['id'].'/Category'?>" class="btn-ajax btn btn-primary" data-module="taxonomy"><?=mdi('plus')?> New Category</a>
	<?php endif; ?>
</div>