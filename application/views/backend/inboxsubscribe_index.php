<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<div class="card">
    <div class="card-body">
    	<div class="row">			
			<div class="col">
				<h3 class="m-0">List Subscribe</h3><hr>
			</div>
			<!-- <div class="col text-right">
				<a href="<?=$Page_url?>/new-location" class="btn-ajax btn-sm btn btn-dark"><?=mdi('plus')?> Add Data</a><br>
			</div> -->			
		</div>
    	
	    <table id="example" class="table table-striped table-bordered" style="width:100%">
		    <thead>
		        <tr>
		            <th>Data Sent</th>                                    
		            <th>First Name</th>
		            <th>Email</th>
		            <!-- <th>Latitude</th>
		            <th>Longitude</th> -->
		            <!-- <th width="200">Action</th> -->
		        </tr>
		    </thead>
		    <tbody>
		    	<?php foreach ($rows as $mail): ?>
		        <tr>
		        	<td><i><?=date_f($mail['created_on'])?></i></td>
		            <td title="<?=$mail['name']?>"><?=ucfirst($mail['name'])?></td>
		            <td><a href="#"><strong><?=$mail['email']?></a></td>                               
		            <!-- <td><?=$coun['latitude']?></td>
		            <td><?=$coun['longitude']?></td> -->
		            <!--  <td><?=$coun['link_map']?></td> -->
		            <!-- <td>
		                <a href="<?=$Page_url.'/edit-location/'.$coun['id']?>" data-toggle="modal" data-target="#newarticle" class="btn-ajax btn-secondary btn-sm btn-rounded"><i data-feather="edit-3" class="small-icon"></i><?=mdi('edit')?> Edit</a>
		                <a href="<?=$Page_url.'/remove-location/'.$coun['id']?>" data-toggle="modal" data-target="#delete_article" class="btn-ajax btn-danger btn-sm btn-rounded"><i data-feather="trash" class="small-icon"></i><?=mdi('delete')?> Remove</a>
		            </td> -->
		        </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
	</div>
</div>