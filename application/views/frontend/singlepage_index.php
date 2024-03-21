<?php if($this->uri->segment(1) == 'terms-conditions' || $this->uri->segment(1) == 'privacy-policy'){ ?>
	<section class="section-career-hiring">
	    <div class="container customized-container">
	        <div class="align-center-container justify-center-container">
	            <div class="row">
	                <div class="col-lg-4">
	                    <div class="wrp-side-link">
	                        <div class="wrp-floating-link">
	                        	<?php if($this->uri->segment(1) == 'terms-conditions'){ ?>
	                        		<ul>
		                                <li class="active"><a href="javascript:void(0)"><?=$page['titlehead'] ?></a></li>
		                                <li><a href="<?=base_url('privacy-policy'); ?>">Privacy Policy</a></li>
		                                <!-- <li><a href="#">Cookies</a></li> -->
		                            </ul>
	                        	<?php }else{ ?>
	                        		<ul>
		                                <li><a href="<?=base_url('terms-conditions'); ?>">Terms & Conditions</a></li>
		                                <li class="active"><a href="javascript:void(0)"><?=$page['titlehead'] ?></a></li>
		                                <!-- <li><a href="#">Cookies</a></li> -->
		                            </ul>
	                        	<?php } ?>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-8">
	                    <div class="description-publication-text">
	                        <div class="static-content-text">
	                            <div class="breadcrumb bredcrumb-headhunter pb-1 mb-1">
	                            	<?php if($this->uri->segment(1) == 'terms-conditions'){ ?>
	                            		<ol class="breadcrumb breadcrumb-white">
		                                    <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
		                                    <li class="breadcrumb-item active" aria-current="page"><?=$page['titlehead'] ?></li>
		                                </ol>
	                            	<?php }else{ ?>
	                            		<ol class="breadcrumb breadcrumb-white">
		                                    <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
		                                    <li class="breadcrumb-item active" aria-current="page"><?=$page['titlehead'] ?></li>
		                                </ol>
	                            	<?php } ?>          
	                            </div>   
	                            <?php if($this->uri->segment(1) == 'terms-conditions'){ ?>
	                            	<div class="title-static-terms">
	                                	<h1><?=$page['titlehead'] ?></h1>
			                        </div>                           
		                            <?=$page['content'] ?> 
	                            <?php }else{ ?>
                            		<div class="title-static-terms">
	                                	<h1><?=$page['titlehead'] ?></h1>
			                        </div>                           
		                            <?=$page['content'] ?> 
	                           	<?php } ?>                                            
	                        </div>
	                    </div>
	                </div>
	            </div>                   
	        </div>                    
	    </div>
	</section>
<?php }else{ ?>
	<!-- Pricing Plan Start -->
    <div class="container-fluid py-0 wow fadeInUp pb-3" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?=Masjid_title()?></h5>
                <h1 class="mb-0"><?=$page['titlehead']?></h1>
            </div>
            <div class="row g-0">
                
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s">
                    <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                        <!-- <div class="border-bottom py-4 px-5 mb-4">
                           
                            <small class="text-uppercase">Tuesday, 19 December 2023</small>
                        </div> -->
                        <div class="p-5 pt-4">
                            <h1 class="display-5 mb-3">
                                <!-- <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99.00<small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small> -->
                            </h1>
                            
                            <div class="d-flex justify-content-between mb-2"><?=$page['content']?></div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Pricing Plan End -->
<?php } ?>
