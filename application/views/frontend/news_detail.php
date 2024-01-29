
    
      
      <div class="scroll-wrap">
        
             
          <div class="scrollable-content">
           
            <div class="vertical-centred short-content">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    
                        <div id="tab">
                            
                            <div class="tab-content active" data-content='1'>
                                <div class="row">
                                    <?php if($new['file'] == ''){ ?>
                                      <div class="col-12 publication-title">
                                        <h2 class="mb-4"><?=$new['title'];?></h2>                                       
                                      </div>
                                    <?php }else{ ?>
                                      <div class="col-12 col-lg-4 publication-thumbnail">
                                        <img src="<?=img_thumb_url($new['image'], 'news')?>" alt="judul" class="img-fluid"/>
                                      </div>

                                      <div class="col-12 col-lg-8 publication-title">
                                          <h2 class="mb-4"><?=$new['title'];?></h2>
                                          <p>Published by XYZ Company<br>2021</p>
                                          <a href="<?=file_url($new['file'],'news');?>" class="btn btn-lg">Download</a>
                                      </div>
                                    <?php } ?>
                                    
                                    <!-- <div class="col-12 publication-image">
                                        <img src="images/image-news.jpg" class="img-fluid mb-4">
                                    </div> -->
                                </div>
                             
                                <?=$new['subtitle'];?>

                            </div>
                           
                        </div>

                        <h2 class="title mb-5 mt-5">Other Updates & Publications</h2>

                        <div class="row-specialization row">
                          <?php foreach($newss as $key=> $val) { ?>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="<?=news_url($val, $Page_url)?>">
                              <img class="img-fluid mb-4" src="<?=img_thumb_url($val['image'], 'news')?>" alt=""> 
                            </a>
                            <a href="<?=news_url($val, $Page_url)?>">
                              <h4><?= $val['title'];?></h4>
                            </a>
                          </div>
                          <?php } ?>
                        </div>
                        <div class="view-all mb-5">
                          <a href="info.html">
                            Read more
                          </a>
                        </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
      
      
