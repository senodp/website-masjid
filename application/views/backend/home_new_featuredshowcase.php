<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">			
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-12">
				<div class="form-group">
					<label for="id_listpages">Select List Showcase</label>
					<select name="id_listpages" id="id_listpages" class="form-control">
						<?=populate_select_featured_showcase_db('listpages', 'Select Showcase', $row['id_listpages'], ['name_field'=>'title', 'field_name'=>'id_listpages'])?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<button class="btn btn-primary btn-submit btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
				<a href="<?=$Page_url?>" tabindex="7" class="btn btn-warning btn-cancel btn-rounded"><span class="glyphicon glyphicon-remove"></span> Cancel changes</a>
			</div>							
		</div>
	</div>
</form>