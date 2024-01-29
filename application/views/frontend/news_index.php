<div class="scroll-wrap">
        
             
          <div class="scrollable-content">
           
            <div class="vertical-centred short-content">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container">
                    

                        <h2 class="title mb-5 mt-5">Updates & Publications</h2>

                        <div class="row-specialization row list-news">
                          <?php foreach($news_list as $key=> $val) { ?>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="<?=news_url($val, $Page_url)?>">
                              <img class="img-fluid mb-4" src="<?=img_thumb_url($val['image'], 'news')?>" alt="">
                            </a>
                            <a href="<?=news_url($val, $Page_url)?>">
                              <h4><?= $val['title'];?></h4>
                            </a>
                          </div>
                          <?php } ?>
                          <!-- <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail-download.html">
                              <img src="images/infra.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail-download.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail.html">
                              <img src="images/news3.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail.html">
                              <h4>This platform is lorem ipsum dolor m ipsum dolor sit sectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail.html">
                              <img src="images/bottle.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail-download.html">
                              <img src="images/publication-thumb.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail-download.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail.html">
                              <img src="images/news3.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail.html">
                              <img src="images/news1.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail-download.html">
                              <img src="images/bean.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail-download.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div>
                          <div class="col-specialization col-md-6 col-lg-4">
                            <a href="info-detail.html">
                              <img src="images/financial.jpg" class="img-fluid mb-4">
                            </a>
                            <a href="info-detail.html">
                              <h4>This platform is lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                            </a>
                          </div> -->
                        </div>
                        <div class="view-all mb-5">
                          <a href="#">
                            Next page
                          </a>
                        </div>
                        
                     
                      
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>