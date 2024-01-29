<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<div class="card">
    <div class="card-body">
    	<a href="<?=$Page_url?>/new-news" class="btn-ajax btn-sm btn btn-dark"><?=mdi('plus')?> Add Data</a><br><br>
	    <table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
		            <th>Title</th>                                    
		            <th class="hidden-sm" width="120">Display Date</th>
		            <th width="145">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($newss as $new): ?>
		        <tr>
		            <td title="<?=$new['title']?>"><?=$new['title']?></td>                                 
		            <td><?=date_f($new['created_on'], 'd M Y')?></td>
		            <td>
		                <a href="<?=$Page_url.'/edit-news/'.$new['id']?>" data-toggle="modal" data-target="#newarticle" class="btn-ajax btn-secondary btn-sm btn"><i data-feather="edit-3" class="small-icon"></i><?=mdi('edit')?> Edit</a>
		                <a href="<?=$Page_url.'/remove-news/'.$new['id']?>" data-toggle="modal" data-target="#delete_article" class="btn-ajax btn-danger btn-sm btn"><i data-feather="trash" class="small-icon"></i><?=mdi('delete')?> Remove</a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>
