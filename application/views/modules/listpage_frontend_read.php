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
    footer: '<a href="<?=current_url()?>#page3">Click here</a>',
    showConfirmButton: false,
    timer: 3800
  });
  </script>
<?php endif; ?>
<div class="pagepiling">

  <div data-anchor="page1" class="pp-scrollable bg-white text-white section section-1 section-detail">
    <div class="scroll-wrap">
      <div class="scrollable-content"
        style="background-image: url('<?=imgcache_url($entry['background_image'], 'listpages', '1920x1080')?>'); background-repeat: no-repeat; background-size: cover;background-position: center;">
        <!-- <div class="vertical-title  d-none d-lg-block"><span>more info</span></div> -->
        <div class="vertical-centred">
          <div class="boxed boxed-inner">
            <div class="boxed">
              <div class="container">
                <div class="intro">
                  <div class="row-specialization">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <h1 class="animated text-white mr-t-70 fadeInUp" data-ckav-sm="fs30"
                          data-animin="fadeInUp|0.1" style="animation-delay: 0.1s;">
                          <!-- Our CLients Story -->
                          <?=$entry['title'];?>
                          </h3>

                          <div class="row">
                            <div class="col-lg-6 col-md-6" style="margin:0 auto;">
                              <div
                                class="info-obj img-t g20 small align-l pd-30 bg-white rd-10 mr-t-70 shadow-xlarge">
                                <!-- ICONED ARTICLE -->
                                <div class="partner-inner text-center mr-b-20">
                                  <div class="img-iconed-article">
                                    <img width="150" alt="" src="<?=imgcache_url($entry['icon_image'], 'listpages', '300x300')?>">
                                  </div>
                                </div>
                                <!-- ICONED ARTICLE -->
                                <div class="info-costumer ">

                                  <h2 class="title bold-n small mr-auto txt-default with-sep-r mr-b-6">
                                    <span></span>
                                  </h2>
                                  <p class="fs14 f-2 mr-b-0"><?=$entry['summary'];?></p>
                                </div>
                              </div>
                              <span class="icon pe-7s-bottom-arrow arrow-down arrow-animation"></span>
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

  <div data-anchor="page1" class="pp-scrollable bg-white section section-1 section-article">
    <div class="scroll-wrap">

      <div class="scrollable-content">
        <!-- <div class="vertical-title  d-none d-lg-block"><span>more info</span></div> -->
        <div class="vertical-centred">
          <div class="boxed boxed-inner">
            <div class="boxed">


              <div class="container">
                <div class="works-title wow fadeIn" style="visibility: visible; animation-name: fadeIn;">
                  <h2 class="color-font text-center"><?=$entry['title_content'];?></h2>
                  <!-- <p class="text-center">We create digital experiences for brands communicating the unique services
                    provided to your
                    customers. Creativity for us something personal.</p> -->
                </div>
                <!-- end works-title -->
                <!-- <article class="row">
                  <div class="col-md-6 wow fadeIn" data-wow-delay="0s"
                    style="visibility: visible; animation-delay: 0s; animation-name: fadeIn;">
                    <h6 class="mb-1">Description</h6>
                    <p>Specialists who can take on any challenge in the sphere of web and mobile app development.
                    </p>
                  </div>
                  
                  <div class="col-md-3 wow fadeIn" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                    <h6 class="mb-1">Project</h6>
                    <p>Web design &amp; Mobile app</p>
                  </div>
        
                  <div class="col-md-3 wow fadeIn" data-wow-delay="0.2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                    <h6 class="mb-1">Launch</h6>
                    <p>2019 Semptember</p>
                  </div>
                 
                </article> -->

                <hr>

                <?=$entry['content'];?>

                <div class="row">
                  <div class="col-12">
                    <h3>Other Showcase</h3>
                  </div>
                </div>

                <div class="row align-items-center mt-3 mb-5">
                  <?php foreach ($list as $l): ?>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-12 col-card-showcase mb-3">
                    <div class="card-case-three">
                      <a class="link-card-showcase" href="<?=listshowcase_url($l, $Page_url)?>">
                        <div class="caption-case-home">
                          <div class="tagging-case">
                            <span><?=$l['name']?></span>
                          </div>
                          <h3><?=$l['title']?></h3>
                        </div>
                        <img class="img-fluid" src="<?=img_thumb_url($l['cover'], 'listpages')?>" alt="Case study one">
                      </a>
                    </div>
                  </div>
                  <?php endforeach; ?> 
                  <div class="col-12">
                    <div class="row justify-content-center">
                      <div class="col-lg-5 col-md-6 col-sm-12 col-12">
                        <a class="btn-outline-all" href="<?=option_value('sectionshowcase_url')?>"><?=option_value('sectionshowcase_label_button')?></a>
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

  <div data-anchor="page2" class="pp-scrollable section section-2 section-article-contact">
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
                                          <div class="d-flex social-list p-relative">
                                            <!-- <a href="<?=option_value('sosmed_twitter')?>" class="icon ion-social-twitter"></a>
                                            <a href="<?=option_value('sosmed_facebook')?>" class="icon ion-social-facebook"></a> -->
                                            <a href="<?=option_value('sosmed_instagram')?>" class="icon ion-social-instagram"></a>
                                            <a href="<?=option_value('sosmed_linkedin')?>" class="icon ion-social-linkedin"></a>
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
                                    <form action="<?=base_url('home')?>" method="post">
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

