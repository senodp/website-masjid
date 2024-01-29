<div data-anchor="page5" class="pp-scrollable bg-white text-white section section-5">
  <div class="scroll-wrap">
    <div class="scrollable-content">
      <!-- <div class="vertical-title  d-none d-lg-block"><span>more info</span></div> -->
      <div class="vertical-centred">
        <div class="boxed boxed-inner">
          <div class="boxed">
            <div class="container">
              <div class="intro">
                <div class="row-specialization">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                      <?=option_value('overviewpagetestimonial')?>
                      <div class="row d-none d-sm-none d-md-none d-lg-flex d-xl-flex">
                        <?php foreach ($testimonial as $testi): ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                          <div
                            class="info-obj img-t g20 small align-l pd-30 bg-white rd-10 mr-t-70 shadow-xlarge">
                            <div class="img -mr-t-60 shadow-small rd" data-ckav-sm="mr-l-0"><img src="<?=img_url($testi['image'], 'testimonial')?>" class="rd" alt="image"></div>
                            <div class="info-costumer">
                              <h3 class=""><?=$testi['title']?></h3>
                              <em class="fs12 f-2"><?=$testi['position']?></em>
                              <h2 class="title bold-n small mr-auto txt-default with-sep-r mr-b-6">
                                <span><i class="mdi mdi-format-quote-open"></i></span>
                              </h2>
                              <p class="fs14 f-2 mr-b-0"><?=$testi['content']?></p>
                            </div>
                          </div>
                        </div>
                        <?php endforeach; ?> 
                      </div>
                      <div class="row d-flex d-sm-flex d-md-flex d-lg-none d-xl-none">
                        <div class="wrp-carousel-testimony">
                          <div class="testimonyhome slider">
                            <?php foreach ($testimonial as $testi): ?>
                            <div class="col-12 col-sm-12 col-md-12 card-testimony">
                              <div
                                class="info-obj img-t g20 small align-l pd-30 bg-white rd-10 mr-t-70 shadow-xlarge">
                                <div class="img -mr-t-60 shadow-small rd" data-ckav-sm="mr-l-0"><img
                                    src="<?=img_url($testi['image'], 'testimonial')?>" class="rd" alt="image"></div>
                                <div class="info-costumer">
                                  <h3 class=""><?=$testi['title']?></h3>
                                  <em class="fs12 f-2"><?=$testi['position']?></em>
                                  <h2 class="title bold-n small mr-auto txt-default with-sep-r mr-b-6">
                                    <span><i class="mdi mdi-format-quote-open"></i></span>
                                  </h2>
                                  <p class="fs14 f-2 mr-b-0"><?=$testi['content']?></p>
                                </div>
                              </div>
                            </div>
                            <?php endforeach; ?> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <?=option_value('overviewpagelogo')?>
                    </div>
                    <div class="col-lg-12 col-12">
                      <div class="row row-partners justify-content-center">
                        <?php foreach ($logo as $clients): ?>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-partner" style="opacity: 1">
                          <div class="partner-inner"><img alt="" src="<?=img_url($clients['image'], 'logo')?>"></div>
                        </div>
                        <?php endforeach; ?> 
                        <!-- <div class="col-6 col-sm-6 col-md-4 col-xl-3 col-partner">
                          <div class="partner-inner"><img alt="" src="images/logo-wyeth.png"></div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="view-all">
                  <a href="#">
                    Read more
                  </a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>