<?php if($this->session->flashdata('message')) : ?>
  <script type="text/javascript" src="<?=assets_url('frontend')?>/alert/sweetalert2.all.min.js"></script>
  <script type="text/javascript">
    Swal.fire({
    position: '',
    icon: 'success',
    title: '<?php echo $this->session->flashdata('message') ?>',
    showConfirmButton: false,
    timer: 3400
  });
  </script>
<?php endif; ?>
<?php if($this->session->flashdata('warning')) : ?>
  <script type="text/javascript" src="<?=assets_url('frontend')?>/alert/sweetalert2.all.min.js"></script>
  <script type="text/javascript">
    Swal.fire({
    position: '',
    icon: 'error',
    title: '<?php echo $this->session->flashdata('warning') ?>',
    // text: 'Something went wrong!',
    // footer: '<a href="<?=site_url()?>#page6">Click here</a>',
    showConfirmButton: false,
    timer: 3600
  });
  </script>
<?php endif; ?>
<!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <?=option_value('about_title')?>
                    </div>
                    <?=option_value('about_description')?>
                    <!-- <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet</p> -->
                    <!-- <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                        </div>
                    </div> -->
                    <a href="<?=option_value('about_text_profile_url')?>" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s"><?=option_value('about_text_profile')?></a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="shadow position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?=option_thumb_url('about_image', assets_url('frontend/img/cover1.jpg'))?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <?=option_value('overview_program_kegiatan')?>
            </div>
            <div class="row g-5">
                <?php foreach ($program as $prog): ?>
                <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                    <div class="shadow service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                        
                        <h4 class="mb-3"><?=$prog['title']?></h4>
                        <!-- <p class="m-0">Amet justo dolor lorem kasd amet magna sea stet eos vero lorem ipsum dolore sed</p> -->
                        <p class="m-0"><?=$prog['content']?></p>
                        <a class="shadow btn btn-lg btn-primary rounded" href="<?=$prog['link']?>">
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <?=option_value('overviewpagetestimonial')?>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <?php foreach ($testimonial as $testi): ?>
                <div class="testimonial-item bg-light my-4">
                    <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                        <img class="img-fluid rounded" src="<?=img_url($testi['image'], 'testimonial')?>" style="width: 60px; height: 60px;" >
                        <div class="ps-4">
                            <h4 class="text-primary mb-1"><?=$testi['title']?></h4>
                            <small class="text-uppercase"><?=$testi['position']?></small>
                        </div>
                    </div>
                    <div class="pt-4 pb-5 px-5">
                        <?=$testi['content']?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="container-fluid py-3 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-3">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <?=option_value('sectionartikel_title')?>
            </div>
            <div class="row g-5">
                <?php foreach ($list_article as $la): ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="shadow blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <img class="img-fluid" src="<?=img_thumb_url($la['cover'], 'listpages')?>" alt="<?=$la['title']?>">
                            <a class="position-absolute top-0 start-0 bg-warning text-dark rounded-end mt-5 py-2 px-4" href="<?=listartikel_url($la, $Page_url)?>"><?=$la['name']?></a>
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <!-- <small class="me-3"><i class="far fa-user text-primary me-2"></i>John Doe</small> -->
                                <small><i class="far fa-calendar-alt text-primary me-2"></i><?=date_f($la['created_on'])?></small>
                            </div>
                            <h4 class="mb-3"><a style="color: #091E3E;" href="<?=listartikel_url($la, $Page_url)?>"><?=$la['title']?></a></h4>
                            <p><?=$la['summary']?></p>
                            <a class="btn btn-primary text-uppercase" href="<?=listartikel_url($la, $Page_url)?>">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Blog Start -->

    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-3">
                        <?=option_value('contact_title')?>
                    </div>
                    
                    <p class="mb-4"><?=option_value('contact_address')?></p>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-default d-flex align-items-center justify-content-center rounded" style="width: 65px; height: 65px;">
                            <!-- <i class="fa fa-phone-alt text-white"></i> -->
                            <img class="img-fluid rounded" src="<?=assets_url('frontend')?>/img/whatsapp.png" style="width: 65px; height: 65px;" >
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?=option_value('contact_phone_title')?></h5>
                            <h4 class="text-primary mb-0"><?=option_value('contact_phone_number')?></h4>
                        </div>
                    </div>
                    <br>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-default d-flex align-items-center justify-content-center rounded" style="width: 65px; height: 65px;">
                            <!-- <i class="fa fa-phone-alt text-white"></i> -->
                            <img class="img-fluid rounded" src="<?=assets_url('frontend')?>/img/whatsapp.png" style="width: 65px; height: 65px;" >
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?=option_value('contact_phone_title_other')?></h5>
                            <h4 class="text-primary mb-0"><?=option_value('contact_phone_number_other')?></h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <form method="post" action="<?=current_url()?>">
                            <div class="row g-3">
                                <div class="col-xl-12">
                                    <input type="text" name="contact_name" class="form-control bg-light border-0 <?=error_class('contact_name')?>" placeholder="Nama Lengkap" style="height: 55px;" value="<?=set_value('contact_name')?>">
                                </div>
                                <div class="col-12">
                                    <input type="email" name="contact_email" class="form-control bg-light border-0 <?=error_class('contact_email')?>" placeholder="Email" style="height: 55px;" value="<?=set_value('contact_email')?>">
                                </div>
                                <div class="col-12">
                                    <select name="contact_subject" class="form-select bg-light border-0 <?=error_class('contact_subject')?>" style="height: 55px;">
                                        <option selected>Pilihan</option>
                                        <?php foreach (Subjects() as $Subject): ?>
                                            <option value="<?=$Subject['id']?>" <?=set_select('contact_subject', $Subject['id'])?>>
                                            <?=$Subject['title']?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <textarea name="contact_message" class="form-control bg-light border-0 <?=error_class('contact_message')?>" rows="3" placeholder="Tulis Pesan"><?=set_value('contact_message')?></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-dark w-100 py-3" type="submit">Kirim Pesan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->

    <!-- Team Start -->
    <!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
                <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?=assets_url('frontend')?>/img/team-1.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?=assets_url('frontend')?>/img/team-2.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?=assets_url('frontend')?>/img/team-3.jpg" alt="">
                            <div class="team-social">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary">Full Name</h4>
                            <p class="text-uppercase m-0">Designation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Team End -->
    