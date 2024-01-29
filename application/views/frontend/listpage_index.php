		<!--===================== Content ========================-->
		<div class="">
			<div class="container">
				<div class="row">

					<div class="col-xl-3 col-lg-3">
						<?php $this->load->view('frontend/_navigation'); ?>

						<?php $this->load->view('frontend/_listpage_navigation'); ?>
					</div>
					
					<div class="col-xl-9 col-lg-9 content-container blog">
						<div class="content-header">
							<h1 class="h1-head <?php if (in_array('category', $Page_options)): ?>head-with-category<?php endif; ?>"><?=$Page['title']?></h1>

							<div class="">
						<div class="content-inside">
							<div class="row">
							<?php foreach ($list as $row): ?>
								<div class="col-xl-4 col-lg-4 col-12">
									<!--===================== Post ========================-->
									<article class="post post-grid">
											<div class="last-news-img-wrap">
												<a href="<?=listpage_url($row, $Page_url)?>">
													<img src="<?=imgcache_url($row['cover'], 'listpages', '400x280')?>" alt="images">
												</a>
											</div>
											<div class="last-news-info-wrap">
												<h4 class="last-news-date"><?=date_f($row['created_on'])?></h4>
												<a href="<?=listpage_url($row, $Page_url)?>"><h3 class="last-news-title"><?=$row['title']?></h3></a>
												</div>
									</article>
									<!--===================== End of Post ========================-->
								</div>
							<?php endforeach; ?>
								<div class="w-100"></div>
							</div>
						</div>
					</div>
						</div>
					</div>


					

				</div>
			</div>
		</div>
		<!--===================== End of Content ========================-->