		<!--===================== Content ========================-->
		<div class="">
			<div class="container">
				<div class="row">

					<div class="col-xl-3 col-lg-3">
						<?php $this->load->view('frontend/_navigation'); ?>

						<?php $this->load->view('frontend/_listpage_navigation'); ?>
					</div>
					
					<div class="col-xl-9 col-lg-9 content-container blog">
						<h1 class="h1-head news-title"><?=Tanabe_title()?></h1>
						<div class="blog-read-wrap">
						<div class="content-inside">
							<?php if (!empty($entry['cover'])): ?>
							<p>
								<img src="<?=img_thumb_url($entry['cover'], 'listpages')?>" alt="" class="img-fluid">
							</p>		
							<?php endif; ?>
							<?=$entry['content']?>
							<div style="clear: both;">&nbsp;</div>
						</div>
						</div>
					</div>					

					

				</div>
			</div>
		</div>
		<!--===================== End of Content ========================-->