<section class="section-career-hiring">
    <div class="container customized-container">
        <div class="align-center-container justify-center-container">
            <div class="content-page-810">
                                               
                <div class="description-publication-text mt-0">

                    <h4>Tag result for "<?php echo $query?>"</h4>

                </div>  

                <?php if (!empty($career)): ?>
                <?php foreach ($career as $ca): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$ca['title']?></h2>
                        <p><?=$ca['departements']?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=career_url($ca, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>
                <?php endif;?>

                <?php if (!empty($jobopening)): ?>
                <?php foreach ($jobopening as $job): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$job['title']?></h2>
                        <p><?=$job['job_type']?></p>
                    </div>		
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=jobopening_url($job, $Page_url)?>">See Details</a>
                    </div>															
                </div>  
                <?php endforeach; ?>
                <?php endif;?>

                <?php if (!empty($events)): ?>
                <?php foreach ($events as $past): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$past['title']?></h2>
                        <p><?=date("l, d F Y", strtotime($past['start_date']));?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=pastevents_url($past, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>
                <?php endif;?>

                <?php if (!empty($upcomingevents)): ?>
                <?php foreach ($upcomingevents as $upc): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$upc['title']?></h2>
                        <p><?=date("l, d F Y", strtotime($upc['start_date']));?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=upcomingevents_url($upc, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>
                <?php endif;?>

                <?php if (!empty($article)): ?>
                <?php foreach ($article as $artic): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$artic['title']?></h2>
                        <p><?=$artic['summary']?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=listpagearticle_url($artic, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>
                <?php endif;?>

                <?php if (!empty($insights)): ?>
                <?php foreach ($insights as $ins): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$ins['title']?></h2>
                        <p><?=$ins['summary']?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=listpageinsights_url($ins, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>
                <?php endif;?>

                <?php if (!empty($case)): ?>
                <?php foreach ($case as $ca): ?>    
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$ca['title']?></h2>
                        <p><?=$ca['summary']?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-orange" href="<?=listpagecase_url($ca, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>
                <?php endif;?>
            </div>
        </div>      
        <!-- <div class="wrp-pagination-career">
            <div class="row">
                <div class="col-12">
                    <ul class="pagi-nation margin-top-48 d-flex justify-content-center">
                        <li>
                            <a href="#">«</a>
                        </li>							
                        <li class="prev">
                            <a href="#">Prev</a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">...</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li class="next">
                            <a href="#">Next</a>
                        </li>
                        <li>
                            <a href="#">»</a>
                        </li>							
                    </ul>
                </div>
            </div>    
        </div> -->                      
    </div>
</section>