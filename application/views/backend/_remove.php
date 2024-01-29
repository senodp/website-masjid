<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 text-center">
			<h4 class="text-danger">Are you sure you want to remove this item?</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<button class="btn btn-danger btn-submit" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Yes</button>
				
				<a href="<?=$Page_url?>" tabindex="7" class="btn btn-secondary btn-cancel"><span class="glyphicon glyphicon-remove"></span> No</a>
			</div>							
		</div>
	</div>
</form>
