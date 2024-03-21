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
<!-- Contact Start -->
    <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 100%;">
                <!-- <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5> -->
                <h1 class="mb-0"><?=option_value('contact_address')?></h1>
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-3">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                        <div class="bg-dark d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <!-- <h5 class="mb-2">Call to ask any question</h5> -->
                            <h5 class="text-primary mb-0"><?=option_value('contact_phone')?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                        <div class="bg-dark d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-envelope-open text-white"></i>
                        </div>
                        <div class="ps-4">
                            <!-- <h5 class="mb-2">Email to get free quote</h5> -->
                            <h5 class="text-primary mb-0"><?=option_value('contact_email')?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                        <div class="bg-dark d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ps-4">
                            <!-- <h5 class="mb-2">Visit our office</h5> -->
                            <h5 class="text-primary mb-0"><?=option_value('contact_map')?></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                    <form method="post" action="<?=current_url()?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="contact_name" class="form-control border-0 bg-light px-4 <?=error_class('contact_name')?>" placeholder="Nama Lengkap" style="height: 55px;" value="<?=set_value('contact_name')?>">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="contact_email" class="form-control border-0 bg-light px-4 <?=error_class('contact_email')?>" placeholder="Email" style="height: 55px;" value="<?=set_value('contact_email')?>">
                            </div>
                            <div class="col-12">
                                <select name="contact_subject" class="form-select bg-light border-0 bg-light px-4 <?=error_class('contact_subject')?>" style="height: 55px;">
                                    <option selected>Pilihan</option>
                                    <?php foreach (Subjects() as $Subject): ?>
                                        <option value="<?=$Subject['id']?>" <?=set_select('contact_subject', $Subject['id'])?>>
                                        <?=$Subject['title']?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-12">
                                <!-- <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea> -->
                                <textarea name="contact_message" class="form-control bg-light border-0 bg-light px-4 py-3 <?=error_class('contact_message')?>" rows="4" placeholder="Tulis Pesan"><?=set_value('contact_message')?></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-success w-100 py-3" type="submit">Kirim Pesan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow slideInUp" data-wow-delay="0.6s">
                    <?=option_value('overviewpagecontact')?>
                    <!-- <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe> -->
                </div>
            </div>
        </div>
    </div>
<!-- Contact End --> 


