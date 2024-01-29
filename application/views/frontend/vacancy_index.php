		<!--===================== Content ========================-->
		<div class="">
			<div class="container">
				<div class="row">

					<div class="col-xl-3 col-lg-3">
						<?php $this->load->view('frontend/_navigation'); ?>
					</div>
					
					<div class="col-xl-9 col-lg-9 content-container blog">
						<div class="content-header" style="min-height: unset;">
							<h1 class="h1-head"><?=$Page['title']?></h1>
						</div>
						<div class="content-inside">
							<div class="row">
							<?php foreach ($vacancies as $row): ?>
								<div class="col-xl-12 col-lg-12 col-12">
									<!--===================== Post ========================-->
									<article class="post post-grid">
										<div class="last-news-info-wrap" style="border-radius: 20px;">
											<a href="<?=vacancy_url($row, $Page_url)?>">
												<h3 class="last-news-title"><?=$row['title']?></h3>
											</a>
											<h4 class="last-news-date"><?=mdi('calendar')?> <?=date_f($row['start_date'])?> - <?=date_f($row['end_date'])?></h4>
											<p class="m-0 p-0 mt-2"><?=mdi('pin')?> <?=$row['location']?></p>
											<p class="m-0 p-0"><?=mdi('case')?> <?=$row['type']?></p>
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
		<!--===================== End of Content ========================-->