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
	<section class="summary-team-text">
        <div class="container customized-container">
            <div class="align-center-container justify-center-container">
                <div class="content-page-810">
                    <div class="breadcrumb bredcrumb-headhunter">
                        <ol class="breadcrumb breadcrumb-white">
                            <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?=Headhunter_title()?></li>
                        </ol>                    
                    </div> 
                    <?php if($this->uri->segment(1) == 'sitemap'){ ?>
                    	<?=option_value('overviewpagesitemap')?>
                    <?php }else{ ?>

                    <?php } ?>                       
                    
                </div>
            </div>
        </div>
    </section>
	<section class="section-sitemaps">
        <div class="justify-center-container">
            <div class="content-page-810">
				<div class="wrp-of-sitemap">
					<?=$page['content']?>
				</div>
            </div>
        </div>
    </section>
<?php } ?>
