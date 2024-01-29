<?php if (!isset($multilanguage)) $multilanguage = false; ?>
<?php if (!isset($modal_size)) $modal_size = ''; ?>
						

						<div class="modal fade modal-ajax" id="modal-<?=$Page_name?>">
							<div class="modal-dialog <?=$modal_size?>">
								<div class="modal-content">
									<div class="card">
										<div class="card-header">
											<div class="row">
												<div class="col-12" style="position: relative;">
													<h3 class="mb-3"><?=$subtitle; ?></h3>

													<div style="position: absolute; top: 5px;
													right: 5px;">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													</div>
												</div>
											</div>
											<?php if ($multilanguage): ?>
												<ul class="nav nav-tabs card-header-tabs">
													<li class="nav-item"><a data-toggle="tab" class="nav-link active" href="#mt-eng">English</a></li>
													<li class="nav-item"><a data-toggle="tab" class="nav-link" href="#mt-ind">Indonesia</a></li>
												</ul>
											<?php endif; ?>
										</div>
										<div class="card-body" style="overflow: auto;">
											<?php if ($multilanguage){ echo validation_block(); }; ?>
											<?php $this->load->view($view); ?>
										</div>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>

						<style type="text/css">
							.modal-980{max-width: 990px;}
						</style>
