<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<div class="card">
    <div class="card-body">
    	<a href="<?=$Page_url?>/new-departement" class="btn-ajax btn-sm btn btn-dark"><?=mdi('plus')?> Depertment</a><br><br>
	    <table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
		            <th>Title</th>                                    
		            <!-- <th class="hidden-sm">E-mail</th> -->
		            <th class="hidden-sm" width="120">Date</th>
		            <th width="80">Action</th>
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($departement as $r): ?>
		        <tr>
		            <td title="<?=$r['title']?>"><?=str_shorten($r['title'], 100)?></td>
		            <!-- <td><?=str_shorten($r['email'], 300)?></td>  -->                                   
		            <td><?=date_f($r['created_on'], 'd M Y H:i')?></td>
		            <td>
		                <a href="<?=$Page_url.'/edit-departement/'.$r['id']?>" data-toggle="modal" data-target="#newarticle" class="btn-ajax btn-secondary btn-sm btn"><i data-feather="edit-3" class="small-icon"></i><?=mdi('edit')?></a>
		                <a href="<?=$Page_url.'/remove-departement/'.$r['id']?>" data-toggle="modal" data-target="#delete_article" class="btn-ajax btn-danger btn-sm btn"><i data-feather="trash" class="small-icon"></i><?=mdi('delete')?></a>
		            </td>
		        </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>