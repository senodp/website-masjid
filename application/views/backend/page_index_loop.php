        <?php if ($row['template'] == 'menu'): ?>
			<div class="<?=pageman_class($row, $depth)?>">
				<div class="card glow mb-2" id="page-<?=$row['id']?>" style="border-bottom: 5px double #ccc; border-right: 5px double #ccc;">
					<div class="card-label">
						<?php if ($row['visibility'] == '1'): ?> <span class="badge badge-warning"><?=mdi('eye-off')?> hidden</span><?php endif; ?>
					</div>
					<div class="card-header">
						<div class="row mb-1" data-toggle="collapse" data-target=".menu-<?=$row['id']?>-collapse">
							<div class="col-md-6">
								<h4 class="m-0"><?=$row['title']?></h4>
							</div>
							<div class="col-md-6 text-right">
								<?php if ( $position > 1 && $total > 1 ): ?>
									<a href="<?=control_url('page/move-up/'.$row['id'])?>" class="btn-outline-dark btn-sm btn" title="Move Page Position Up"><?=mdi('long-arrow-up')?></a>
								<?php endif; ?>
								<?php if ( $position < $total && $total > 1 ): ?>
									<a href="<?=control_url('page/move-down/'.$row['id'])?>" class="btn-outline-dark btn-sm btn" title="Move Page Position Down"><?=mdi('long-arrow-down')?></a>
								<?php endif; ?>
								<?php if ($depth < 4): ?>
                                <a href="<?=control_url('page/new/'.$row['id'])?>" class="btn-ajax btn btn-dark btn-sm"><?=mdi('plus')?> New Sub Page</a>
                                <a href="<?=control_url('page/new-menu/'.$row['id'])?>" class="btn-ajax btn btn-dark btn-sm"><?=mdi('plus')?> New Sub Menu</a>
								<?php endif; ?>
								<a href="<?=control_url('page/edit-menu/'.$row['id'])?>" class="btn-ajax btn-primary btn-sm btn"><?=mdi('edit')?> Edit</a>
								<a href="<?=control_url('page/remove-menu/'.$row['id'])?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?></a>
							</div>
						</div>
					</div>
					<!-- <div class="card-header collapse menu-<?=$row['id']?>-collapse">
						<div class="row" style="padding-top: 5px;">
							<div class="col-12 text-left">
                                <?php if ($depth < 3): ?>
                                <a href="<?=control_url('page/new-menu/'.$row['id'])?>" class="btn-ajax btn btn-dark btn-sm"><?=mdi('plus')?> New Sub-Menu</a>
                                <?php endif; ?>
							</div>
						</div>
					</div> -->
					<div class="card-header">
						<div class="form-check form-check-inline">
							<input type="checkbox" value="1" name="visibility" class="form-check-input toggle-ajax" data-url="<?=control_url('page/toggle-visibility/'.$row['id'])?>" <?=is_checked('visibility', $row['visibility'], '1')?> />
							<label for="visibility" class="form-check-label">Hide in Frontend navigation</label>
						</div>
						<!-- <div class="form-check form-check-inline">
							<input type="checkbox" value="1" name="visibility_sitemap" class="form-check-input toggle-ajax" data-url="<?=control_url('page/sitemap-visibility/'.$row['id'])?>" <?=is_checked('visibility_sitemap', $row['visibility_sitemap'], '1')?> />
							<label for="visibility_sitemap" class="form-check-label">Hide in Sitemap page</label>
						</div> -->
					</div>
					<div class="card-body pageman-children collapse menu-<?=$row['id']?>-collapse">
						<div class="row px-3 py-0">
							<!-- <div class="col-md-12 m-t-10 text-center">
								<a href="<?=control_url('page/new/'.$row['id'])?>" class="btn-ajax btn btn-dark btn-sm"><?=mdi('plus')?> New Sub-Page</a>
							</div> -->
					<?php if (array_key_exists($row['id'], $children)): ?>
						<?php foreach ($children[$row['id']] as $ic => $child): ?>
                            <?php $data = array(
                                'row' => $child, 'position' => $ic+1, 
                                'total' => count($children[$row['id']]),
                                'depth' => $depth+1
                            ); ?>
							<?php echo $this->load->view('backend/page_index_loop', $data, true); ?>
						<?php endforeach; ?>
					<?php endif; ?>
					<?php if($row['title'] == 'Tentang Kami'){ ?>

						<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-tentangkami">
							<div class="card-header">
								<h3 class="mt-0 mb-1">Image Sub Menu Tentang Kami</h3>
								<!-- <div class="text-muted mb-3">
									<i><small>To display on the right side of the article page</small></i>
								</div> -->
								<ul class="nav nav-tabs card-header-tabs">
									<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#ho-kabar-eng">English</a></li>
									<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ho-kabar-ind">Indonesia</a></li>
								</ul>
							</div>
							<div class="card-body cards-container">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label for="submenu_image">Image</label>
											<?=html_upload_img(option_value('submenu_image'), 'submenu_image', 'options', '488x341', 'jpg', 'input-save');?>
										</div>
									</div>
									<div class="col-md-7">
										<div class="tab-content">
											<div class="tab-pane active" id="ho-kabar-eng">
												<div class="form-group">
													<label for="submenu_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('submenu_title')?>" name="submenu_title" value="<?=option_value('submenu_title')?>" />
													<?=error_block('submenu_title')?>
												</div>
												<div class="form-group">
													<label for="submenu_description">Description</label>
													<textarea class="input-save form-control <?=error_class('submenu_description')?>" name="submenu_description" rows="3" data-height="90">
													<?=option_value('submenu_description')?>
													</textarea>
													<?=error_block('submenu_description')?>
												</div>
												<div class="form-group">
													<label for="submenu_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('submenu_label')?>" name="submenu_label" value="<?=option_value('submenu_label')?>" />
													<?=error_block('submenu_label')?>
												</div>
												<div class="form-group">
													<label for="submenu_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('submenu_url')?>" name="submenu_url" value="<?=option_value('submenu_url')?>" />
													<?=error_block('submenu_url')?>
												</div>
											</div>

											<div class="tab-pane" id="ho-kabar-ind">
												
												<div class="form-group">
													<label for="ind_submenu_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenu_title')?>" name="ind_submenu_title" value="<?=option_value('submenu_title', null, 'ind')?>" />
													<?=error_block('ind_submenu_title')?>
												</div>
												<div class="form-group">
													<label for="ind_submenu_description">Description</label>
													<textarea class="input-save form-control <?=error_class('ind_submenu_description')?>" name="ind_submenu_description" rows="3" data-height="90"><?=option_value('submenu_description', null, 'ind')?></textarea>
													<?=error_block('ind_submenu_description')?>
												</div>
												<div class="form-group">
													<label for="ind_submenu_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenu_label')?>" name="ind_submenu_label" value="<?=option_value('submenu_label', null, 'ind')?>" />
													<?=error_block('ind_submenu_label')?>
												</div>
												<div class="form-group">
													<label for="ind_submenu_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenu_url')?>" name="ind_submenu_url" value="<?=option_value('submenu_url', null, 'ind')?>" />
													<?=error_block('ind_submenu_url')?>
												</div>
												
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-block btn-warning btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span>Save Changes</button>
							</div>
						</div>

					<?php }else if($row['title'] == 'Tata Kelola Perusahaan'){ ?>
						<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-tatakelola">
							<div class="card-header">
								<h3 class="mt-0 mb-1">Image Sub Menu Tata Kelola Perusahaan</h3>
								<!-- <div class="text-muted mb-3">
									<i><small>To display on the right side of the article page</small></i>
								</div> -->
								<ul class="nav nav-tabs card-header-tabs">
									<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#ho-tata-eng">English</a></li>
									<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ho-tata-ind">Indonesia</a></li>
								</ul>
							</div>
							<div class="card-body cards-container">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label for="submenutatakelola_image">Image</label>
											<?=html_upload_img(option_value('submenutatakelola_image'), 'submenutatakelola_image', 'options', '488x341', 'jpg', 'input-save');?>
										</div>
									</div>
									<div class="col-md-7">
										<div class="tab-content">
											<div class="tab-pane active" id="ho-tata-eng">
												<div class="form-group">
													<label for="submenutatakelola_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('submenutatakelola_title')?>" name="submenutatakelola_title" value="<?=option_value('submenutatakelola_title')?>" />
													<?=error_block('submenutatakelola_title')?>
												</div>
												<div class="form-group">
													<label for="submenutatakelola_description">Description</label>
													<textarea class="input-save form-control <?=error_class('submenutatakelola_description')?>" name="submenutatakelola_description" rows="3" data-height="90">
													<?=option_value('submenutatakelola_description')?>
													</textarea>
													<?=error_block('submenutatakelola_description')?>
												</div>
												<div class="form-group">
													<label for="submenutatakelola_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('submenutatakelola_label')?>" name="submenutatakelola_label" value="<?=option_value('submenutatakelola_label')?>" />
													<?=error_block('submenutatakelola_label')?>
												</div>
												<div class="form-group">
													<label for="submenutatakelola_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('submenutatakelola_url')?>" name="submenutatakelola_url" value="<?=option_value('submenutatakelola_url')?>" />
													<?=error_block('submenutatakelola_url')?>
												</div>
											</div>

											<div class="tab-pane" id="ho-tata-ind">
												
												<div class="form-group">
													<label for="ind_submenutatakelola_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenutatakelola_title')?>" name="ind_submenutatakelola_title" value="<?=option_value('submenutatakelola_title', null, 'ind')?>" />
													<?=error_block('ind_submenutatakelola_title')?>
												</div>
												<div class="form-group">
													<label for="ind_submenutatakelola_description">Description</label>
													<textarea class="input-save form-control <?=error_class('ind_submenutatakelola_description')?>" name="ind_submenutatakelola_description" rows="3" data-height="90"><?=option_value('submenutatakelola_description', null, 'ind')?></textarea>
													<?=error_block('ind_submenutatakelola_description')?>
												</div>
												<div class="form-group">
													<label for="ind_submenutatakelola_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenutatakelola_label')?>" name="ind_submenutatakelola_label" value="<?=option_value('submenutatakelola_label', null, 'ind')?>" />
													<?=error_block('ind_submenutatakelola_label')?>
												</div>
												<div class="form-group">
													<label for="ind_submenutatakelola_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenutatakelola_url')?>" name="ind_submenutatakelola_url" value="<?=option_value('submenutatakelola_url', null, 'ind')?>" />
													<?=error_block('ind_submenutatakelola_url')?>
												</div>
												
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-block btn-warning btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span>Save Changes</button>
							</div>
						</div>
					<?php } else if($row['title'] == 'Hubungan Investor'){ ?>
						<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-hubunganinvestor">
							<div class="card-header">
								<h3 class="mt-0 mb-1">Image Sub Menu Hubungan Investor</h3>
								<!-- <div class="text-muted mb-3">
									<i><small>To display on the right side of the article page</small></i>
								</div> -->
								<ul class="nav nav-tabs card-header-tabs">
									<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#ho-hubungan-eng">English</a></li>
									<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ho-hubungan-ind">Indonesia</a></li>
								</ul>
							</div>
							<div class="card-body cards-container">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label for="submenuhubunganinvestor_image">Image</label>
											<?=html_upload_img(option_value('submenuhubunganinvestor_image'), 'submenuhubunganinvestor_image', 'options', '488x341', 'jpg', 'input-save');?>
										</div>
									</div>
									<div class="col-md-7">
										<div class="tab-content">
											<div class="tab-pane active" id="ho-hubungan-eng">
												<div class="form-group">
													<label for="submenuhubunganinvestor_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('submenuhubunganinvestor_title')?>" name="submenuhubunganinvestor_title" value="<?=option_value('submenuhubunganinvestor_title')?>" />
													<?=error_block('submenuhubunganinvestor_title')?>
												</div>
												<div class="form-group">
													<label for="submenuhubunganinvestor_description">Description</label>
													<textarea class="input-save form-control <?=error_class('submenuhubunganinvestor_description')?>" name="submenuhubunganinvestor_description" rows="3" data-height="90">
													<?=option_value('submenuhubunganinvestor_description')?>
													</textarea>
													<?=error_block('submenuhubunganinvestor_description')?>
												</div>
												<div class="form-group">
													<label for="submenuhubunganinvestor_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('submenuhubunganinvestor_label')?>" name="submenuhubunganinvestor_label" value="<?=option_value('submenuhubunganinvestor_label')?>" />
													<?=error_block('submenuhubunganinvestor_label')?>
												</div>
												<div class="form-group">
													<label for="submenuhubunganinvestor_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('submenuhubunganinvestor_url')?>" name="submenuhubunganinvestor_url" value="<?=option_value('submenuhubunganinvestor_url')?>" />
													<?=error_block('submenuhubunganinvestor_url')?>
												</div>
											</div>

											<div class="tab-pane" id="ho-hubungan-ind">
												
												<div class="form-group">
													<label for="ind_submenuhubunganinvestor_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenuhubunganinvestor_title')?>" name="ind_submenuhubunganinvestor_title" value="<?=option_value('submenuhubunganinvestor_title', null, 'ind')?>" />
													<?=error_block('ind_submenuhubunganinvestor_title')?>
												</div>
												<div class="form-group">
													<label for="ind_submenuhubunganinvestor_description">Description</label>
													<textarea class="input-save form-control <?=error_class('ind_submenuhubunganinvestor_description')?>" name="ind_submenuhubunganinvestor_description" rows="3" data-height="90"><?=option_value('submenuhubunganinvestor_description', null, 'ind')?></textarea>
													<?=error_block('ind_submenuhubunganinvestor_description')?>
												</div>
												<div class="form-group">
													<label for="ind_submenuhubunganinvestor_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenuhubunganinvestor_label')?>" name="ind_submenuhubunganinvestor_label" value="<?=option_value('submenuhubunganinvestor_label', null, 'ind')?>" />
													<?=error_block('ind_submenuhubunganinvestor_label')?>
												</div>
												<div class="form-group">
													<label for="ind_submenuhubunganinvestor_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenuhubunganinvestor_url')?>" name="ind_submenuhubunganinvestor_url" value="<?=option_value('submenuhubunganinvestor_url', null, 'ind')?>" />
													<?=error_block('ind_submenuhubunganinvestor_url')?>
												</div>
												
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-block btn-warning btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span>Save Changes</button>
							</div>
						</div>
					<?php }else if($row['title'] == 'CSR'){ ?>
						<div class="card mt-0 form-save" data-url="<?=$Page_url?>/edit-csr">
							<div class="card-header">
								<h3 class="mt-0 mb-1">Image Sub Menu CSR</h3>
								<!-- <div class="text-muted mb-3">
									<i><small>To display on the right side of the article page</small></i>
								</div> -->
								<ul class="nav nav-tabs card-header-tabs">
									<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#ho-csr-eng">English</a></li>
									<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#ho-csr-ind">Indonesia</a></li>
								</ul>
							</div>
							<div class="card-body cards-container">
								<div class="row">
									<div class="col-md-5">
										<div class="form-group">
											<label for="submenucsr_image">Image</label>
											<?=html_upload_img(option_value('submenucsr_image'), 'submenucsr_image', 'options', '488x341', 'jpg', 'input-save');?>
										</div>
									</div>
									<div class="col-md-7">
										<div class="tab-content">
											<div class="tab-pane active" id="ho-csr-eng">
												<div class="form-group">
													<label for="submenucsr_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('submenucsr_title')?>" name="submenucsr_title" value="<?=option_value('submenucsr_title')?>" />
													<?=error_block('submenucsr_title')?>
												</div>
												<div class="form-group">
													<label for="submenucsr_description">Description</label>
													<textarea class="input-save form-control <?=error_class('submenucsr_description')?>" name="submenucsr_description" rows="3" data-height="90">
													<?=option_value('submenucsr_description')?>
													</textarea>
													<?=error_block('submenucsr_description')?>
												</div>
												<div class="form-group">
													<label for="submenucsr_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('submenucsr_label')?>" name="submenucsr_label" value="<?=option_value('submenucsr_label')?>" />
													<?=error_block('submenucsr_label')?>
												</div>
												<div class="form-group">
													<label for="submenucsr_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('submenucsr_url')?>" name="submenucsr_url" value="<?=option_value('submenucsr_url')?>" />
													<?=error_block('submenucsr_url')?>
												</div>
											</div>

											<div class="tab-pane" id="ho-csr-ind">
												
												<div class="form-group">
													<label for="ind_submenucsr_title">Title</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenucsr_title')?>" name="ind_submenucsr_title" value="<?=option_value('submenucsr_title', null, 'ind')?>" />
													<?=error_block('ind_submenucsr_title')?>
												</div>
												<div class="form-group">
													<label for="ind_submenucsr_description">Description</label>
													<textarea class="input-save form-control <?=error_class('ind_submenucsr_description')?>" name="ind_submenucsr_description" rows="3" data-height="90"><?=option_value('submenucsr_description', null, 'ind')?></textarea>
													<?=error_block('ind_submenucsr_description')?>
												</div>
												<div class="form-group">
													<label for="ind_submenucsr_label">Label</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenucsr_label')?>" name="ind_submenucsr_label" value="<?=option_value('submenucsr_label', null, 'ind')?>" />
													<?=error_block('ind_submenucsr_label')?>
												</div>
												<div class="form-group">
													<label for="ind_submenucsr_url">URL</label>
													<input type="text" class="input-save form-control <?=error_class('ind_submenucsr_url')?>" name="ind_submenucsr_url" value="<?=option_value('submenucsr_url', null, 'ind')?>" />
													<?=error_block('ind_submenucsr_url')?>
												</div>
												
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="card-footer">
								<button class="btn btn-block btn-warning btn-save btn-rounded" tabindex="6"><span class="glyphicon glyphicon-ok"></span>Save Changes</button>
							</div>
						</div>
					<?php } ?>	
						</div>
					</div>
				</div>
			</div>
		<?php elseif ($row['template'] == 'menu_link'): ?>
			<div class="<?=pageman_class($row, $depth)?>">
				<div class="card" id="page-<?=$row['id']?>">
					<div class="card-label">
						<span class="badge badge-primary"><?=mdi('link')?> link</span><?php if ($row['visibility'] == '1'): ?> <span class="badge badge-warning"><?=mdi('eye-off')?> hidden</span><?php endif; ?>
					</div>
					<div class="card-body">
						<div class="row mb-1" data-toggle="collapse" data-target=".menu-<?=$row['id']?>-collapse">
							<div class="col-md-6">
							<?php if ($depth > 1): ?>
								<h4 class="m-0"><?=Page_title($row, $Pages)?></h4>
							<?php else: ?>
								<h4 class="m-0"><?=Page_title($row, $Pages)?></h4>
							<?php endif; ?>
								<small><?=Page_url($row, $Pages)?></small>
							</div>
							<div class="col-md-6 text-right">
								<?php if ( $position > 1 && $total > 1 ): ?>
									<a href="<?=control_url('page/move-up/'.$row['id'])?>" class="btn-outline-dark btn-sm btn" title="Move Page Position Up"><?=mdi('long-arrow-up')?></a>
								<?php endif; ?>
								<?php if ( $position < $total && $total > 1 ): ?>
									<a href="<?=control_url('page/move-down/'.$row['id'])?>" class="btn-outline-dark btn-sm btn" title="Move Page Position Down"><?=mdi('long-arrow-down')?></a>
								<?php endif; ?>
								<a href="<?=control_url('page/edit-link/'.$row['id'])?>" class="btn-ajax btn-primary btn-sm btn"><?=mdi('edit')?> Edit</a>
								<a href="<?=control_url('page/remove-link/'.$row['id'])?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?></a>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="form-check form-check-inline">
							<input type="checkbox" value="1" name="visibility" class="form-check-input toggle-ajax" data-url="<?=control_url('page/toggle-visibility/'.$row['id'])?>" <?=is_checked('visibility', $row['visibility'], '1')?> />
							<label for="visibility" class="form-check-label">Hide in Frontend navigation</label>
						</div>
						<!-- <div class="form-check form-check-inline">
							<input type="checkbox" value="1" name="visibility_sitemap" class="form-check-input toggle-ajax" data-url="<?=control_url('page/sitemap-visibility/'.$row['id'])?>" <?=is_checked('visibility_sitemap', $row['visibility_sitemap'], '1')?> />
							<label for="visibility_sitemap" class="form-check-label">Hide in Sitemap page</label>
						</div> -->
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="<?=pageman_class($row, $depth)?>">
				<div class="card mb-2" id="page-<?=$row['id']?>">
					<div class="card-label">
						<!-- <span class="badge badge-primary">page</span> --><?php if ($row['visibility'] == '1'): ?> <span class="badge badge-warning"><?=mdi('eye-off')?> hidden</span><?php endif; ?>
					</div>
					<div class="card-body bg-white">
						<div class="row mb-1" data-toggle="collapse" data-target=".menu-<?=$row['id']?>-collapse">
							<div class="col-md-6">
								<?php if ($depth > 1): ?>
									<h4 class="m-0"><?=Page_title($row, $Pages)?></h4>
								<?php else: ?>
									<h4 class="m-0"><?=Page_title($row, $Pages)?></h4>
								<?php endif; ?>
									<small><?=Page_url($row)?></small>
							</div>
							<div class="col-md-6 text-right">
								<?php if ( $position > 1 && $total > 1 ): ?>
									<a href="<?=control_url('page/move-up/'.$row['id'])?>" class="btn-outline-dark btn-sm btn" title="Move Page Position Up"><?=mdi('long-arrow-up')?></a>
								<?php endif; ?>
								<?php if ( $position < $total && $total > 1 ): ?>
									<a href="<?=control_url('page/move-down/'.$row['id'])?>" class="btn-outline-dark btn-sm btn" title="Move Page Position Down"><?=mdi('long-arrow-down')?></a>
								<?php endif; ?>
								<a href="<?=control_url($row['url'])?>" class="btn-dark btn-sm btn"><?=mdi('wrench')?> Manage</a>
								<a href="<?=control_url('page/edit/'.$row['id'])?>" class="btn-ajax btn-primary btn-sm btn"><?=mdi('edit')?> Edit</a>
								<a href="<?=control_url('page/remove/'.$row['id'])?>" class="btn-ajax btn-danger btn-sm btn"><?=mdi('delete')?></a>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="form-check form-check-inline">
							<input type="checkbox" value="1" name="visibility" class="form-check-input toggle-ajax" data-url="<?=control_url('page/toggle-visibility/'.$row['id'])?>" <?=is_checked('visibility', $row['visibility'], '1')?> />
							<label for="visibility" class="form-check-label">Hide in Frontend navigation</label>
						</div>
						<!-- <div class="form-check form-check-inline">
							<input type="checkbox" value="1" name="visibility_sitemap" class="form-check-input toggle-ajax" data-url="<?=control_url('page/sitemap-visibility/'.$row['id'])?>" <?=is_checked('visibility_sitemap', $row['visibility_sitemap'], '1')?> />
							<label for="visibility_sitemap" class="form-check-label">Hide in Sitemap page</label>
						</div> -->
					</div>
				</div>
			</div>
		<?php endif; ?>