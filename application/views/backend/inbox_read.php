<div class="row">
	<div class="col-md-12">
		<p class="text-white bg-secondary border p-2 m-0">
			<!-- <small class="text-white">From:</small><br> -->
			Full Name : <?=$row['name']?><br> 
			Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$row['email']?><br>
			Subject &nbsp;&nbsp;&nbsp;&nbsp; : <?=$row['title_subject']?><br>			
		</p>
		<!-- <p class="text-white bg-secondary border p-2 m-0">
			<small>Subject:</small><br>
			<strong>Pertanyaan :
			<?=nl2p($row['message'])?></strong>
		</p> -->
		<div class="text-white bg-secondary border p-2 m-0">
			<strong>Question &nbsp; :</strong><br>
			<?=nl2p($row['message'])?>
		</div>
	</div>
</div>

<form action="<?=current_url()?>" method="post" enctype="multipart/form-data">
	<div class="row">
		<div class="col-md-12 text-center"> <hr>
			<div class="form-group" style="margin: 0;">
				<!-- <button class="btn btn-rounded btn-primary btn-submit" tabindex="6" name="mark_as_read"><?=mdi('email-open')?> Mark as Read</button>

				<button class="btn btn-rounded btn-secondary btn-submit" tabindex="6" name="mark_as_unread"><?=mdi('email')?> Mark as Unread</button>
-->
				<a href="<?=$Page_url.'/remove/'.$row['id']?>" class="btn btn-rounded btn-ajax btn-danger" tabindex="6" name="mark_as_trash"><?=mdi('delete')?> Delete Message</a>
				
				<a href="<?=$Page_url?>" tabindex="7" class="btn btn-rounded btn-warning btn-cancel"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
			</div>							
		</div>
	</div>
</form>