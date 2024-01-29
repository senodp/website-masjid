<div class="row">
	<div class="col-md-4">
		<div class="card form-save" data-url="<?=$Page_url?>/certification">
			<div class="card-header">
				<h4 class="m-0">Certification</h4>
			</div>
			<img src="<?=option_image_url('footer_certification', 'holder.js/800x600?auto=yes')?>" alt="" class="card-img-top" id="footer-certification-image">
			<div class="card-body">
				<input type="file" name="footer_certification" class="input-save" accept="image/*" />
				<div style="margin-top: 5px;">
					<small>recommended size is above 400x300 pixels</small>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Upload new image</button>
			</div>
		</div>
	</div>
</div>