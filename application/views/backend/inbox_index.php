<div class="card form-save" data-url="<?=$Page_url?>/edit-description">
	<div class="card-header">
		<div class="row">
			<div class="col-md-12">
				<div id="accordion">
			        <div class="card">
			            <div class="card-header text-center">
			            	<a class="collapsed card-link p-2" data-toggle="collapse" href="#collapseTwo">
			                    Click to fill in Description Popup
			                </a>
			            </div>
			            <div id="collapseTwo" class="collapse" data-parent="#accordion">
			                <div class="card-body">
			                    <div class="row">
			                        <div class="col-md-12">
			                            
										<div class="form-group">
											<label for="description_description">Description</label>
											<textarea class="form-control editor input-save <?=error_class('description_description')?>" name="description_description" rows="3" data-height="90"><?=option_value('description_description')?></textarea>
											<?=error_block('description_description')?>
										</div>
										
			                        </div>
			                    </div>
			                </div>
			                <div class="card-footer text-center">
								<button class="btn btn-block btn-primary btn-save btn-rounded btn-sm" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
							</div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<div class="card">
    <div class="card-body">
    	<div class="row">			
			<div class="col">
				<h3 class="m-0">Inbox Contact List</h3><hr>
			</div>
			<!-- <div class="col text-right">
				<a href="<?=$Page_url?>/new-location" class="btn-ajax btn-sm btn btn-dark"><?=mdi('plus')?> Add Data</a><br>
			</div> -->			
		</div>
    	
	    <table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
					<!-- <th width="5%"><input type="checkbox"  class=" table-checker"></th> -->
					<th width="12%">Pesan Terkirim</th>
					<th width="15%">Kategori / Pilihan</th>
					<th width="20%">Pengirim</th>
					<th width="10%">Email Pengirim</th>
					<!-- <th width="10%">Phone</th> -->
					<!-- <th width="15%">Subject</th> -->					
					<!-- <th>Reply Message</th> -->
				</tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($rows as $mail): ?>
				<tr class="<?=$mail['is_unread']==1?'is-unread':'text-muted'?>">
					<!-- <td><input type="checkbox" value="<?=$mail['id']?>" name="mails" class=""></td> -->
					<td><strong><?=date_f($mail['created_on'])?></strong></td>
					<td><div class="btn btn-primary btn-xs btn-rounded"><a style="color: #fff;" href="<?=$Page_url?>/read/<?=$mail['id']?>"><?=Subjects($mail['subject_id'],'title')?></a></div></td>
					<td><a href="<?=$Page_url?>/read/<?=$mail['id']?>" class="btn-ajax"><strong><?=$mail['name']?></strong></a></td>
					<!-- <td><a href="<?=$Page_url?>/read/<?=$mail['id']?>" class="btn-ajax"><strong><?=$mail['last_name']?></strong></a></td> -->
					<td><a href="javascript:void(0)"><strong><?=$mail['email']?></strong></a></td>
					<!-- <td><strong><?=$mail['phone']?></strong></td> -->
				</tr>
				<?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>
