<div data-anchor="page3" class="pp-scrollable text-white section section-3 index-3">
  <div class="scroll-wrap">
    <div class="section-bg" style="background-image: url('<?=option_thumb_url('backgroundservices_image', assets_url('frontend/img/cover1.jpg'))?>')"></div>
    <div class="scrollable-content">
      <div class="vertical-title judul-service d-none d-lg-block">
        <h3 class="fs60 lh-1 f-1 mr-b-30 mr-t-30 animated color-font"><?=option_value('title_services')?></h3>
      </div>
      <div class="vertical-centred">
        <div class="boxed boxed-inner">
          <div class="boxed">
            <div class="container-fluid services">
              <div class="row d-xl-flex d-lg-flex d-md-none d-sm-none d-none">
                <?php foreach ($services as $serv): ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12">
                  <div class="item-box md-mb50 services-rel">
                    <div class="icn-text-services">
                      <div class="icon">
                        <div class="wrp-icon-services">
                          <img src="<?=img_url($serv['image'], 'services')?>" alt="icon one">
                        </div>
                      </div>
                      <div class="title-icon-services">
                        <h6 class="color-font"><?=$serv['title']?></h6>
                      </div>
                    </div>
                    <div class="visibility-content">
                      <?=$serv['content']?>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>

              <div class="row d-xl-none d-lg-none d-md-flex d-sm-flex d-flex">
                <div class="col-12 col-acoording">
                  <div class="title-section-home w-100 d-flex justify-content-center">
                    <h3 class="animated color-font fadeInUp" data-ckav-sm="fs30" data-animin="fadeInUp|0.1"
                      style="animation-delay: 0.1s;">
                      <?=option_value('title_services')?>
                    </h3>
                  </div>
                </div>
                <div class="col-12 pt-4 pb-5 col-acoording">
                  <div class="accordion" id="accordionServices">
                    <?php
                    foreach($services as $key=> $r) {
                    if($key==0) $show="show";
                    else $show="";
                    ?>
                    <div class="card">
                      <div class="card-header" id="headingOne1">
                        <div class="icon-accordion-title" type="button" data-toggle="collapse"
                          data-target="#collapseservices<?=$r['id'];?>" aria-expanded="true"
                          aria-controls="collapseservices<?=$r['id'];?>">
                          <div class="icon-accordion">
                            <img src="<?=img_url($r['image'], 'services')?>" alt="icon one">
                          </div>
                          <div class="title-accrdion">
                            <h4 class="color-font"><?=$r['title']?></h4>
                          </div>
                        </div>
                      </div>
                      <div id="collapseservices<?=$r['id'];?>" class="collapse <?=$show;?>" aria-labelledby="headingOne1"
                        data-parent="#accordionServices">
                        <div class="card-body">
                          <div class="descservices-accordion">
                            <?=$r['content']?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>