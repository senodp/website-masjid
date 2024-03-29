<?php if($this->session->flashdata('message')) : ?>
  <script type="text/javascript">
    Swal.fire({
    position: '',
    icon: 'success',
    title: '<?php echo $this->session->flashdata('message') ?>',
    showConfirmButton: false,
    timer: 3200
  });
  </script>
<?php endif; ?>
<?php if($this->session->flashdata('warning')) : ?>
  <script type="text/javascript">
    Swal.fire({
    position: '',
    icon: 'error',
    title: '<?php echo $this->session->flashdata('warning') ?>',
    // text: 'Something went wrong!',
    footer: '<a href="<?=site_url()?>#page6">Click here</a>',
    showConfirmButton: false,
    timer: 3800
  });
  </script>
<?php endif; ?>
<div class="pagepiling">
  <div data-anchor="page1" class="pp-scrollable text-white section section-1">
    <div class="scroll-wrap scroll-bakground-after">
      <?php foreach ($slides as $i => $slide): ?>
      <div id="particles-js"></div>
      <div class="section-bg" style="background-image:url(<?=img_url(str_replace(".png",".jpg",$slide['image']), 'slides')?>);"></div>
        <div class="scrollable-content">
          <div class="vertical-centred">
            <div class="boxed boxed-inner">
              <div class="boxed">
                <div class="container">
                  <div class="intro">
                    <div class="row">
                      <div class="col-md-12 col-lg-12">
                        <div class="min-vh-h100 w100 flex-bc pd-tb-100" data-ckav-sm="pd-tb-large">
                          <div class="innerwrapper w100 animated" data-animOut="fadeOut">
                            <div class="container">
                              <div class="w90 mr-auto align-c" data-ckav-sm="w100">
                                <h2 class="title fs100 lh-1 f-1 mr-b-30 animated" data-ckav-sm="fs40"
                                  data-animIn="fadeInUp">
                                  <?=$slide['title']?>
                                </h2>
                                <p class="fs18 f-2 lh-6 mr-b-40 w80 mr-auto animated" data-ckav-sm="fs16 mr-b-30 w100"
                                  data-animIn="fadeInUp|0.1">
                                  <span class="normal-text text-white">
                                    <?=$slide['subtitle']?>
                                  </span>
                                </p>
                                <span class="icon pe-7s-bottom-arrow arrow-down arrow-animation"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- <h1 class="display-2 text-white  wow fadeIn" data-wow-delay="0.1s"><span class="text-primary">Invest,</span> in Sustainable Indonesia</h1>
                        <a class="popup-youtube"  href="http://www.youtube.com/watch?v=0O2aH4XLbto"><span class="icon ion-ios-play"></span>Watch video </a> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<div data-anchor="page2" class="pp-scrollable section section-2">
  <div class="scroll-wrap">
    <div class="scrollable-content">
      <div class="vertical-centred">
        <div class="about-home p-realtive w-100">
          <div class="bg-holder-about" style="background-image: url('<?=option_thumb_url('about_image', assets_url('frontend/img/cover1.jpg'))?>')"></div>
          <div class="min-vh-h100 w50 flex-cc pd-tb-100 bg-black" data-ckav-sm="pd-tb-large w100">
            <div class="innerwrapper w100 animated" data-animOut="fadeOut">
              <div class="container-fluid" data-ckav-sm="align-c w100">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left-about-home">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <?=option_value('about_title')?>
                      </div>
                      <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                        <p class="fs18 f-2 lh-6 mr-b-40 animated" data-ckav-sm="fs16 mr-b-30"
                          data-animIn="fadeInUp|0.2">
                          <?=option_value('about_description')?>

                         <!--  <hr class="w-100 bg-white op-05 animated" data-ckav-sm="fs30"
                            data-animIn="fadeInUp|0.3">
                          <a href="<?=option_value('about_text_profile_url')?>" class="text-white"><span class="icon pe-7s-angle-right"></span>
                            &nbsp; <?=option_value('about_text_profile')?></a> -->
                          <hr class="w-100 bg-white op-08 animated" data-ckav-sm="fs30"
                            data-animIn="fadeInUp|0.3">
                          <a href="<?=option_value('about_text_ourteam_url')?>" class="text-white"><span class="icon pe-7s-angle-right"></span>
                            &nbsp; <?=option_value('about_text_ourteam')?></a>
                          <hr class="w-100 bg-white op-08 animated" data-ckav-sm="fs30"
                            data-animIn="fadeInUp|0.3">
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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
<div data-anchor="page4" class="pp-scrollable section section-4">
  <div class="scroll-wrap">
      <div class="section-bg bg-about"></div>
        <div class="scrollable-content">
            <!-- <div class="vertical-title text-white  d-none d-lg-block"><span>where</span></div> -->
            <div class="vertical-centred">
              <div class="boxed boxed-inner">
                <div class="boxed">
                  <div class="container-fluid">
                    <div class="intro">
                      <div class="row align-items-center">
                        <div class="col-lg-12 mt-5 mt-xl-0">
                          <div class="row row align-items-center">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-12 left-showcase-home">
                              <?=option_value('sectionshowcase_title')?>
                              <?=option_value('sectionshowcase_description')?>
                              <div class="view-all d-none d-sm-none d-md-none d-lg-none d-xl-block">
                                <a href="<?=option_value('sectionshowcase_url')?>"><?=option_value('sectionshowcase_label_button')?></a>
                              </div>
                            </div>
                            <div class="col-xl-8 col-lg-12 col-md-12 col-12 right-showcase-home">
                              <div class="wrp-grid-showcase">

                                <div class="row align-items-center">
                                  <?php foreach ($list_showcase as $ls): ?>
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-card-showcase">
                                      <?php if($ls['sorting'] == 0){ ?>
                                        <div class="card-case-one">
                                      <?php }else if($ls['sorting'] == 1){ ?>
                                        <div class="card-case-two">
                                      <?php }else if($ls['sorting'] == 2){ ?>
                                        <div class="card-case-three">
                                      <?php }else if($ls['sorting'] == 3){ ?>
                                        <div class="card-case-four">
                                      <?php } ?>
                                      <a class="link-card-showcase" href="<?=listshowcase_url($ls, $Page_url)?>">
                                        <div class="caption-case-home">
                                          <div class="tagging-case">
                                            <span><?=$ls['name']?></span>
                                          </div>
                                          <h3><?=$ls['title']?></h3>
                                        </div>
                                        <img class="img-fluid" src="<?=img_thumb_url($ls['cover'], 'listpages')?>" alt="Case study one">
                                      </a>
                                    </div>
                                  </div>
                                  <?php endforeach; ?>
                                </div>

                                <!-- <div class="row align-items-center">
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-card-showcase ">
                                    <div class="card-case-three">
                                      <a class="link-card-showcase" href="showcase-inspire-2.html">
                                        <div class="caption-case-home">
                                          <div class="tagging-case">
                                            <span>Inspire</span>
                                          </div>
                                          <h3>The Power of Customer Loyalty: Unleashing Business Success through Data
                                          </h3>
                                        </div>
                                        <img class="img-fluid" src="<?=assets_url('frontend')?>/images/porto-3.jpg" alt="Case study one">
                                      </a>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-card-showcase align-self-start">
                                    <div class="card-case-four">
                                      <a class="link-card-showcase" href="showcase-decode-1.html">
                                        <div class="caption-case-home">
                                          <div class="tagging-case">
                                            <span>Decode</span>
                                          </div>
                                          <h3>Can You Crack the Code ?</h3>
                                        </div>
                                        <img class="img-fluid" src="<?=assets_url('frontend')?>/images/porto-4.jpg" alt="Case study one">
                                      </a>
                                    </div>
                                  </div>
                                </div> -->
                                <!-- <div class="row mt-2 mb-4 d-block d-sm-block d-md-none d-lg-none">
                                  <div class="col-12">
                                    <div class="view-all">
                                      <a href="#">All Showcase</a>
                                    </div>
                                  </div>
                                </div> -->

                              </div>
                            </div>
                            <div class="col-12">
                              <div class="view-all-showcase">
                                <div class="view-all d-block d-sm-block d-md-block d-lg-block d-xl-none">
                                  <a href="<?=option_value('sectionshowcase_url')?>"><?=option_value('sectionshowcase_label_button')?></a>
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
            </div>
          </div>
        </div>
      </div>

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
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 col-partner">
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
      
<div data-anchor="page6" class="pp-scrollable section section-6">
  <div class="scroll-wrap">
    <div class="section-bg bg-white" style="background-image: url('<?=assets_url('frontend')?>/images/bg-sq.jpg');"></div>
    <div class="scrollable-content">
      <!-- <div class="vertical-title text-white d-none d-lg-block"><span>connect</span></div> -->
      <div class="vertical-centred">
        <div class="boxed boxed-inner">
          <div class="boxed">
            <div class="container">
              <div class="intro overflow-hidden">
                <div class="row">
                  <!-- <div class="col-md-6">
                    <h2 class="title"><span class="text-primary">Jakarta</span>, Indonesia</h2>
                    <h5 class="text-muted">Jl Kemerdekaan menuju 123 <br>Jakarta Pusat, DKI Jakarta, 4352</h5>
                    <section class="contact-address">
                      <h3><a class="mail" href=""> contact@contact.com</a></h3>
                      <h3><span class="phone">+62 123456</span></h3>
                    </section>
                  </div>
                  <div class="col-md-6">
                    <div class="contact-info">
                      <form class="js-form" novalidate="novalidate">
                        <div class="row">
                          <div class="form-group col-sm-6">
                            <input type="text" name="name" required="" placeholder="Name*" aria-required="true">
                          </div>
                          <div class="form-group col-sm-6">
                            <input type="email" required="" name="email" placeholder="Email*">
                          </div>
                          <div class="form-group col-sm-12">
                            <input type="text" name="subject" placeholder="Subject (Optinal)">
                          </div>
                          <div class="form-group col-sm-12">
                            <textarea name="message" required="" placeholder="Message*"></textarea>
                          </div>
                          <div class="form-group form-group-message col-sm-12">
                            <span id="success" class="text-primary">Thank You, your message is successfully
                              sent!</span>
                            <span id="error" class="text-primary">Sorry, something went wrong </span>
                          </div>
                          <div class="col-sm-12"><button type="submit" class="btn">Contact me</button></div>
                        </div>
                      </form>
                    </div>
                  </div> -->
                  <div class="col-lg-12 col-md- col-sm-12 col-12">
                    <div class="wrp-contact-us">
                      <div class="row justify-content-center">
                        <div class="col-12">
                          <div class="d-flex w-100 justify-content-center">
                            <div class="top-form bg-dark">
                              <div class="space-sab">
                                <?=option_value('contact_address')?>
                                <div class="cta-phoe-mail">
                                  <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="row justify-content-center">
                                        <a class="link-action" href="callto:<?=option_value('contact_phone')?>">
                                          <span class="icon pe-7s-call"></span>
                                          <p><?=option_value('contact_phone')?></p>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                      <div class="row justify-content-center">
                                        <a class="link-action" href="mailto:<?=option_value('contact_email')?>">
                                          <span class="icon pe-7s-mail"></span>
                                          <p><?=option_value('contact_email')?></p>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-md-12 col-12 mt-1">
                                      <div class="row justify-content-center">
                                        <!-- <div class="d-flex social-list p-relative">
                                          <a href="" class="icon ion-social-twitter"></a>
                                          <a href="" class="icon ion-social-facebook"></a>
                                          <a href="" class="icon ion-social-instagram"></a>
                                          <a href="" class="icon ion-social-linkedin"></a>
                                        </div> -->
                                        <div
                                          class="social-media-footer d-flex justify-content-md-end justify-content-sm-center">
                                          <ul>
                                            <!-- <li>
                                              <a target="_blank" href="<?=option_value('sosmed_facebook')?>">
                                                <div class="icon-facebook-headhunterindonesia">
                                                  <svg version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 64 64" enable-background="new 0 0 64 64"
                                                    xml:space="preserve">
                                                    <path fill="#FFFFFF"
                                                      d="M40.438,12H46V2.546c-2-0.13-4.109-0.419-7.859-0.419C30.314,2.127,25,7.049,25,16.097V24h-9v12h9v26h11V36 h7.646l1.315-12H36v-6.854C36,14.09,36.182,12,40.438,12z">
                                                    </path>
                                                  </svg>
                                                </div>
                                              </a>
                                            </li> -->
                                            <!-- <li>
                                              <a target="_blank" href="<?=option_value('sosmed_twitter')?>">
                                                <div class="icon-twitter-headhunterindonesia">
                                                  <svg version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 64 64" enable-background="new 0 0 64 64"
                                                    xml:space="preserve">
                                                    <g>
                                                      <path fill="#FFFFFF"
                                                        d="M60.417,14.378c-2.088,0.928-4.337,1.554-6.694,1.833c2.405-1.442,4.254-3.723,5.129-6.447 c-2.254,1.336-4.75,2.307-7.403,2.829c-2.127-2.266-5.157-3.68-8.511-3.68c-6.438,0-11.658,5.221-11.658,11.655 c0,0.914,0.104,1.804,0.303,2.658c-9.687-0.487-18.276-5.127-24.025-12.181c-1.003,1.721-1.579,3.725-1.579,5.86 c0,4.044,1.117,7.613,4.244,9.702C8.312,26.548,7,26.024,4,25.149c0,0.049,0,0.098,0,0.147c0,5.647,4.96,10.36,10.292,11.429 c-0.977,0.27-1.538,0.41-2.598,0.41c-0.753,0-1.248-0.074-1.958-0.208c1.483,4.628,5.903,8.001,11.005,8.093 c-3.99,3.129-8.956,4.991-14.418,4.991c-0.939,0-1.84-0.054-2.75-0.164c5.156,3.312,11.3,5.239,17.881,5.239 c21.44,0,33.174-17.763,33.174-33.167c0-0.506-0.008-1.008-0.03-1.507C56.875,18.77,58.854,16.717,60.417,14.378L60.417,14.378z">
                                                      </path>
                                                    </g>
                                                  </svg>
                                                </div>
                                              </a>
                                            </li> -->
                                            <li>
                                              <a target="_blank" href="<?=option_value('sosmed_linkedin')?>">
                                                <div class="icon-linkedin-headhunterindonesia">
                                                  <svg version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="334.285 0 756.076 768"
                                                    enable-background="new 334.285 0 756.076 768"
                                                    xml:space="preserve">
                                                    <path fill="#FFFFFF"
                                                      d="M1023.165,23.994h-616.33c-28.8,0-51.841,23.041-51.841,51.841v616.33c0,28.8,23.041,51.841,51.841,51.841 h616.33c28.8,0,51.841-23.041,51.841-51.841V75.835C1075.006,47.035,1051.965,23.994,1023.165,23.994z M599.798,571.203h-72.001 V311.999h72.001V571.203z M566.678,254.398L566.678,254.398c-30.241,0-48.962-12.96-48.962-38.88 c0-25.921,20.161-41.761,48.962-41.761c28.8,0,48.96,14.4,48.96,40.321S596.917,254.398,566.678,254.398z M916.604,571.203h-72.001 V427.201c0-36.001-15.841-59.042-47.521-59.042c-24.481,0-41.762,15.84-47.521,31.681c-2.88,5.76-5.76,12.96-5.76,21.6v149.763 h-84.961c0,0,1.44-244.804,0-259.204h84.961v30.241c14.4-17.281,28.8-43.201,74.881-43.201c57.602,0,97.922,37.44,97.922,118.081 V571.203z" />
                                                  </svg>
                                                </div>
                                              </a>
                                            </li>
                                            <!-- <li>
                                              <a target="_blank" href="<?=option_value('sosmed_youtube')?>">
                                                <div class="icon-youtube-headhunterindonesia">
                                                  <svg version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="347.5 22.5 665.212 720"
                                                    enable-background="new 347.5 22.5 665.212 720"
                                                    xml:space="preserve">
                                                    <g>
                                                      <path fill="#FFFFFF"
                                                        d="M983,234c-7.2-26.4-28.8-48-55.2-55.2C878.6,165.6,683,165.6,683,165.6s-195.6,0-244.8,13.2 c-26.4,7.2-48,28.8-55.2,55.2c-13.2,48-13.2,150-13.2,150s0,102,13.2,150c7.2,26.4,28.8,48,55.2,55.2 c49.2,13.2,244.8,13.2,244.8,13.2s195.6,0,244.8-13.2c26.4-7.2,48-28.8,55.2-55.2c13.2-49.2,13.2-150,13.2-150S996.2,282,983,234z M623,477.6V290.4L786.2,384L623,477.6z" />
                                                    </g>
                                                  </svg>
                                                </div>
                                              </a>
                                            </li> -->
                                            <li>
                                              <a target="_blank" href="<?=option_value('sosmed_instagram')?>">
                                                <div class="icon-instagram-headhunterindonesia">
                                                  <svg version="1.1" id="Layer_1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="299.5 0 768 768"
                                                    enable-background="new 299.5 0 768 768" xml:space="preserve">
                                                    <g>
                                                      <path fill="#FFFFFF"
                                                        d="M825.154,32H540.846C424.415,32,331,125.415,331,241.846v284.308C331,642.585,424.415,736,540.846,736 h284.308C941.585,736,1035,642.585,1035,526.154V241.846C1035,125.415,941.585,32,825.154,32z M967.308,528.862 c0,77.168-62.277,139.445-139.445,139.445H538.138c-77.169,0-139.446-62.277-139.446-139.445V239.139 c0-77.169,62.277-139.446,139.446-139.446h291.077c75.815,0,138.093,62.277,138.093,139.446V528.862z" />
                                                      <path fill="#FFFFFF"
                                                        d="M683,202.585c-100.185,0-181.415,81.23-181.415,181.415S582.815,565.415,683,565.415 S864.415,484.185,864.415,384S783.185,202.585,683,202.585z M683,495.016c-60.923,0-111.016-50.093-111.016-111.016 S622.077,272.985,683,272.985S794.016,323.077,794.016,384S743.923,495.016,683,495.016z" />
                                                      <circle fill="#FFFFFF" cx="865.77" cy="203.938"
                                                        r="43.323" />
                                                    </g>
                                                  </svg>
                                                </div>
                                              </a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-white-sab">
                            <div class="row">
                              <?=option_value('overviewpagecontact')?>
                              <div class="col-12">
                                <div class="contact-info">
                                  <form action="<?=current_url()?>" method="post">
                                    <div class="row">
                                      <div class="form-group col-sm-6">
                                        <div class="form-group form-label-group form-group-line">
                                          <input type="text" name="contact_name" id="inputName" class="<?=error_class('contact_name')?> form-control reset-box-shadow" placeholder="Your Name">
                                          <!-- <div class="invalid-feedback">Floating label is required</div> -->
                                          <?=error_block('contact_name')?>
                                          <label for="inputEmail">Enter your name</label>
                                        </div>
                                      </div>

                                      <div class="form-group col-sm-6">
                                        <!-- <input type="email" required="" name="email" placeholder="Email*"> -->
                                        <div class="form-group form-label-group form-group-line">
                                          <input type="email" name="contact_email" id="inputName" class="<?=error_class('contact_email')?> form-control reset-box-shadow" placeholder="Enter email address">
                                          <!-- <div class="invalid-feedback">Your email address is required</div> -->
                                          <?=error_block('contact_email')?>
                                          <label for="inputEmail">Enter email address</label>
                                        </div>
                                      </div>

                                      <div class="form-group col-sm-12">
                                        <div class="form-group form-label-group form-group-line">
                                          <input type="text" name="contact_title" id="inputName" class="<?=error_class('contact_title')?> form-control reset-box-shadow"
                                            placeholder="Enter Your Subject">
                                          <!-- <div class="invalid-feedback">Enter Your Subject is required</div> -->
                                          <?=error_block('contact_title')?>
                                          <label for="inputEmail">Enter Your Subject</label>
                                        </div>
                                      </div>

                                      <div class="col-sm-12">
                                        <div class="wrp-form-control-collaboration">
                                          <div class="label-form-control-collaboration">
                                            <textarea name="contact_message" id="message"
                                              class="<?=error_class('contact_message')?> form-control label-form-control-collaboration reset-box-shadow" rows="3" placeholder="Add your message"></textarea>
                                            <!-- <div class="invalid-feedback">Add your message
                                            </div> -->
                                            <?=error_block('contact_message')?>
                                            <label for="floatingFullname">Add your message</label>
                                          </div>
                                        </div>
                                      </div>

                                    </div>
                                    <!-- <div class="form-group form-group-message col-sm-12">
                                      <span id="success" class="text-primary">Thank You, your message is
                                        successfully sent!</span>
                                      <span id="error" class="text-primary">Sorry, something went wrong </span>
                                    </div> -->
                                    <div class="row justify-content-center">
                                      <div class="col-sm-12">
                                        <div class="d-flex w-100 justify-content-center mt-3">
                                          <button type="submit" class="btn">Send Message</button>
                                        </div>
                                      </div>
                                    </div>

                                </div>
                                </form>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>