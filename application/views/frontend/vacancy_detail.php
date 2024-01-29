		<!--===================== Content ========================-->
		<div class="">
			<div class="container">
				<div class="row">

					<div class="col-xl-3 col-lg-3">
						<?php $this->load->view('frontend/_navigation'); ?>
					</div>
					
					<div class="col-xl-9 col-lg-9 content-container blog">
						<h1 class="h1-head news-title"><?=Tanabe_title()?></h1>
						<div class="blog-read-wrap">
						<div class="content-inside">
							<table class="table mb-5">
								<tbody>
									<tr>
										<td width="20%">Position:</td>
										<td><strong><?=$job['title']?></strong></td>
									</tr>
									<tr>
										<td width="20%">Period:</td>
										<td><strong><?=date_f($job['start_date'])?> - <?=date_f($job['end_date'])?></strong></td>
									</tr>
									<tr>
										<td width="20%">Location:</td>
										<td><strong><?=$job['location']?></strong></td>
									</tr>
									<tr>
										<td width="20%">Type:</td>
										<td><strong><?=$job['type']?></strong></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="2">&nbsp;</td>
									</tr>
								</tfoot>
							</table>
							<?=$job['content']?>
						</div>
						</div>
					</div>					

					

				</div>
			</div>
		</div>
		<!--===================== End of Content ========================-->