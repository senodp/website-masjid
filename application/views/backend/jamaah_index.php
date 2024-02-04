<div class="row">
	<div class="col-md-2">
		
	</div>
	<div class="col-md-8">
		<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-overviewpagejamaah">
			<div class="card-header text-center">
				<h3 class="mt-0 mb-1">Overview Daftar Semua Jamaah</h3>
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#overviewpagejamaah-eng">English</a></li>
					<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#overviewpagejamaah-ind">Indonesia</a></li>
				</ul>
			</div>
			<div class="card-body cards-container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<div class="tab-pane active" id="overviewpagejamaah-eng">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('overviewpagejamaah_title')?>" name="overviewpagejamaah_title" value="<?=option_value('overviewpagejamaah_title')?>" />
									<?=error_block('overviewpagejamaah_title')?>
								</div>
								
							</div>
							<div class="tab-pane" id="overviewpagejamaah-ind">
								<div class="form-group">
									<label for="">Title</label>
									<input type="text" class="input-save form-control <?=error_class('ind_overviewpagejamaah_title')?>" name="ind_overviewpagejamaah_title" value="<?=option_value('overviewpagejamaah_title', null, 'ind')?>" />
									<?=error_block('ind_overviewpagejamaah_title')?>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-primary btn-sm btn-block btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span> Save Changes</button>
			</div>
		</div>
	</div>
	<div class="col-md-2">
		
	</div>
</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<div class="card">
    <div class="card-body">
    	<a href="<?=$Page_url?>/new-jamaah" class="btn-ajax btn-sm btn-rounded btn-dark"><?=mdi('plus')?> Add Data</a><br><br>
	    <table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
		            <th>Full Name</th> 
		            <th>Phone</th>  
		            <th>Alamat</th>                                 
		            <!-- <th class="hidden-sm" width="120">Display Date</th> -->
		            <th width="145">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($jamaah as $new): ?>
		        <tr>
		            <td title="<?=$new['title']?>"><?=$new['title']?></td>
		            <td title="<?=$new['phone']?>"><?=$new['phone']?></td> 
		            <td title="<?=$new['address']?>"><?=$new['address']?></td>          
		            <!-- <td><?=date_f($new['created_on'], 'd M Y')?></td> -->
		            <td>
		                <a href="<?=$Page_url.'/edit-jamaah/'.$new['id']?>" data-toggle="modal" data-target="#newarticle" class="btn-ajax btn-secondary btn-sm btn-rounded"><i data-feather="edit-3" class="small-icon"></i><?=mdi('edit')?> Edit</a>
		                <a href="<?=$Page_url.'/remove-jamaah/'.$new['id']?>" data-toggle="modal" data-target="#delete_article" class="btn-ajax btn-danger btn-sm btn-rounded"><i data-feather="trash" class="small-icon"></i><?=mdi('delete')?> Remove</a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>