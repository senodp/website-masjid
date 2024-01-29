<secction class="section-career-hiring">
    <div class="container customized-container">
        <div class="align-center-container justify-center-container">
            <div class="content-page-810">
                <div class="breadcrumb bredcrumb-headhunter">
                    <ol class="breadcrumb breadcrumb-white">
                        <li class="breadcrumb-item"><a href="<?=site_url();?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=Headhunter_title()?></li>
                    </ol>                    
                </div>       
                <?=option_value('overviewpagecareer')?>   

                <?php foreach ($vacancies as $vac): ?>     
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2><?=$vac['title']?></h2>
                        <p><?=$vac['location']?></p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-white-outline" href="<?=career_url($vac, $Page_url)?>">See Details</a>
                    </div>                                                          
                </div>  
                <?php endforeach; ?>  
                <!-- <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2>Public Policy Communications Manager - Global Society Team, Berlin/London/Amsterdam</h2>
                        <p>Jakarta, Amsterdam</p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-white-outline" href="career-detail.php">See Details</a>
                    </div>                                                          
                </div>  
                <div class="wrp-list-career-position">
                    <div class="title-position-column">
                        <h2>Accounting Manager - Accounting Operations</h2>
                        <p>Jakarta, Jakarta Selatan</p>
                    </div>      
                    <div class="link-detail-career-column">
                        <a class="btn-c-lg btn-c-md btn-white-outline" href="career-detail.php">See Details</a>
                    </div>                                                          
                </div>                                                                                                                                                                                         -->
            </div>
        </div>      
        <div class="wrp-pagination-career">
            <div class="row">
                <div class="col-12">
                    <ul class="pagi-nation margin-top-48 d-flex justify-content-center">
                        <?php echo $this->pagination->create_links(); ?>                          
                    </ul>
                </div>
            </div>    
        </div>                      
    </div>
</secction>