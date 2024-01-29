<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">

	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label for="title">Email</label>
				<input type="text" class="form-control <?=error_class('title')?>" name="title" value="<?=set_row_value('title',$row)?>" />
				<?=error_block('title')?>
			</div>

		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<button class="btn btn-secondary btn-submit btn-rounded btn-sm"><span class="glyphicon glyphicon-ok"></span> Save</button>
				
				<a href="<?=$Page_url?>" class="btn btn-warning btn-cancel btn-rounded btn-sm"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
			</div>							
		</div>
	</div>

</form>