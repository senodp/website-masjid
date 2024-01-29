		
		<div class="container">
			<div id="main-application">
				<div class="row">
					<div class="col-md-9 col-sm-8 application">
						<div id="application">
							<?php $this->load->view('frontend/_breadcrumb'); ?>
						
							<article class="article-item">
								<h1 class="component-heading"><?=$Page['title']?></h1>
								<div class="clearfix"></div>

							<?php foreach ($documents as $doc): ?>
								<div class="row content-text">
								<?php if (!empty($doc['cover'])): ?>
									<div class="col-md-3">
										<p>
											<a href="<?=file_url($doc['file'], 'documents')?>">
												<img alt="" src="<?=img_thumb_url($doc['cover'], 'documents')?>"  width="170px" style="border: 2px solid #333; float:left;" />
											</a>
										</p>
									</div>
									<div class="col-md-9 text-left">
								<?php else: ?>
									<div class="col-md-12 text-left">
								<?php endif; ?>
										<strong><a href="<?=file_url($doc['file'], 'documents')?>"><?=$doc['title']?></a></strong>
									</div>
								</div>
							<?php endforeach; ?>
							</article>
						</div>
					</div>

					<div class="col-md-3 col-sm-4">
						<?php $this->load->view('frontend/_navigation'); ?>
					</div>
				</div>
			</div>
		</div>