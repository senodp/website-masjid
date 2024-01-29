			<div class="navbar-custom">
				<div class="container-fluid">
					<div id="navigation">

						<div class="row">
							<div class="col-md-9">
								<!-- Navigation Menu-->
								<ul class="navigation-menu">
								<?php foreach ($Menu_parents as $mp): if (is_allowed($mp['url'])): ?>
									<li class="has-submenu">
									<?php if ($mp['template'] == 'menu'): ?>
										
										<a href="#"><?=$mp['title']?> <?=mdi('chevron-down')?></a>
										<?php if (array_key_exists($mp['id'], $Menu_children)): ?>
											<ul class="submenu">
													
												<?php foreach ($Menu_children[$mp['id']] as $mc): ?>
													<?php if ($mc['template'] == 'menu'): ?>
													<li class="has-submenu">
														<a href="#"><?=$mc['title']?> </a>
														<?php if (array_key_exists($mc['id'], $Menu_children)): ?>
															<ul class="submenu">
															<?php foreach ($Menu_children[$mc['id']] as $mgc): ?>
																
															<?php if ($mgc['template'] == 'menu'): ?>
															<li class="has-submenu">
																<a href="#"><?=mdi('file-text')?> <?=$mgc['title']?> </a>
																<?php if (array_key_exists($mgc['id'], $Menu_children)): ?>
																	<ul class="submenu">
																	<?php foreach ($Menu_children[$mgc['id']] as $mggc): ?>
																		<li><a href="<?=control_url($mggc['url'])?>"><?=$mggc['title']?></a></li>
																	<?php endforeach; ?>
																	</ul>
																<?php endif; ?>
															<?php else: ?>
															<li>
																<a href="<?=control_url($mgc['url'])?>"><?=$mgc['title']?> </a>
															<?php endif; ?>
															</li>

															<?php endforeach; ?>
															</ul>
														<?php endif; ?>
													<?php else: ?>
													<li>
														<a href="<?=control_url($mc['url'])?>"><?=$mc['title']?> </a>
													<?php endif; ?>
													</li>
												
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									<?php else: ?>
									<!-- <li> -->
										<a href="<?=control_url($mp['url'])?>"><?=$mp['title']?> </a>
									<?php endif; ?>
									</li>
								<?php endif; endforeach; ?>
								<?php if (!empty($Menu_hidden['parents']) && is_admin() && false === true): ?>
									<li class="has-submenu">
										<a href="#">More <?=mdi('chevron-down')?></a>
										<ul class="submenu">
										<?php foreach ($Menu_hidden['parents'] as $hp): if ( is_allowed($hp['url']) ): ?>
											<?php if ($hp['template'] == 'menu'): ?>
											<li class="has-submenu">
													<a href="#"><?=$hp['title']?></a>
												<?php if (array_key_exists($hp['id'], $Menu_children)): ?>
													<ul class="submenu">
													<?php foreach ($Menu_hidden['children'][$hp['id']] as $hc): ?>
														<li><a href="<?=control_url($hc['url'])?>"><?=$hc['title']?></a></li>
													<?php endforeach; ?>
													</ul>
												<?php endif; ?>
											<?php else: ?>
											<li>
												<a href="<?=control_url($hp['url'])?>"><?=mdi('file')?> <?=$hp['title']?> </a>
											<?php endif; ?>
											</li>
										<?php endif; endforeach; ?>
										</ul>
									</li>
								<?php endif; ?>
								</ul>
								<!-- End navigation menu -->
							</div>
							<div class="col-md-3 text-right">
								<!-- Navigation Menu-->
								<ul class="navigation-menu">
									<?php if (is_super_admin()): ?>

										<li class="has-submenu">
											<a href="<?=control_url('page')?>" title="Page Manager" data-toggle="tooltip" data-placement="bottom"><?=mdi('collection-text')?></a>
										</li>

										<li class="has-submenu">
											<a href="<?=control_url('user')?>" title="User Manager" data-toggle="tooltip" data-placement="bottom"><?=mdi('accounts')?></a>
										</li>
									<?php endif; ?>

									<li class="has-submenu">
										<a href="<?=site_url('logout')?>" title="Logout" data-toggle="tooltip" data-placement="bottom"><?=mdi('power')?> Logout</a>
									</li>
								</ul>
								<!-- End navigation menu -->
							</div>
						</div>

					</div> <!-- end #navigation -->
				</div> <!-- end container -->
			</div> <!-- end navbar-custom -->