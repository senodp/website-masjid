	<div class="card form-save" data-url="<?=$Page_url?>/footer">
		<div class="card-header">
			<h3 class="mt-0 mb-1">Footer</h3>
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#ho-eng">English</a></li>
				<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ho-ind">Indonesia</a></li>
			</ul>
		</div>
		<div class="card-body cards-container">
			<div class="tab-content">
				<div class="tab-pane active" id="ho-eng">
					<div class="row justify-content-center">
						<div class="col-md-6">
							<div class="form-group" style="height: 100%;">
								<label for="footer_map_code">Map Embed Code</label>
								<textarea class="input-save form-control <?=error_class('footer_map_code')?>" name="footer_map_code" style="height: 90%;"><?=option_value('footer_map_code', '')?></textarea>
									<?=error_block('footer_map_code')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="footer_contact_title">Title</label>
								<input type="text" class="input-save form-control <?=error_class('footer_contact_title')?>" name="footer_contact_title" value="<?=htmlspecialchars(option_value('footer_contact_title'))?>" />
								<?=error_block('footer_contact_title')?>
							</div>
							<div class="form-group">
								<label for="footer_contact_address">Address</label>
								<textarea class="editor input-save form-control <?=error_class('footer_contact_address')?>" name="footer_contact_address" rows="3" data-height="300">
								<?=option_value('footer_contact_address', '')?>
								</textarea>
								<?=error_block('footer_contact_address')?>
							</div>
						</div>
					</div>
				</div>

				<div class="tab-pane" id="ho-ind">
					<div class="row justify-content-center">
						<div class="col-md-6">
							<div class="form-group" style="height: 100%; display: flex; flex-direction: column;">
								<textarea class="input-save form-control <?=error_class('ind_footer_map_code')?>" name="ind_footer_map_code" style="height: 90%;"><?=option_value('footer_map_code', null, 'ind')?></textarea>
								<?=error_block('ind_footer_map_code')?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="ind_footer_contact_title">Title</label>
								<input type="text" class="input-save form-control <?=error_class('ind_footer_contact_title')?>" name="ind_footer_contact_title" value="<?=htmlspecialchars(option_value('footer_contact_title', null, 'ind'))?>" />
								<?=error_block('ind_footer_contact_title')?>
							</div>
							<div class="form-group">
								<label for="ind_footer_contact_address">Address</label>
								<textarea class="editor input-save form-control <?=error_class('ind_footer_contact_address')?>" name="ind_footer_contact_address" rows="3" data-height="300"><?=option_value('footer_contact_address', null, 'ind')?></textarea>
								<?=error_block('ind_footer_contact_address')?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-center">
			<button class="btn btn-primary btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save changes</button>
		</div>
	</div>