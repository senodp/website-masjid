		
		<div class="container">
			<div id="main-application">
				<div class="row">
					<div class="col-md-9 col-sm-8 application">
						<div id="application">
							<?php $this->load->view('frontend/_breadcrumb'); ?>
						
						
							<article class="article-item">
								<h1 class="component-heading">BOC Profile</h1>
								<div class="clearfix"></div>
								<div class="content-text">
									<ul>
									<?php foreach ($profiles as $pro): ?>
										<li style="padding-bottom: 30px">
											<p>
												<strong> 
													<img alt="" class="mobile-full-width" src="<?=img_thumb_url($pro['photo'], 'profiles')?>"  width="30%" style="float: right; border: 0px;" /> 
													<?=$pro['name']?>
												</strong> 
												<br /><?=$pro['position']?>
											</p>
										
											<?=$pro['description']?>
											<div style="clear: both;"></div>
										</li>
									<?php endforeach; ?>
									</ul>
								</div>
							</article>
						</div>
					</div>

					<div class="col-md-3 col-sm-4">
						<?php $this->load->view('frontend/_navigation'); ?>
					</div>
				</div>
			</div>
		</div>