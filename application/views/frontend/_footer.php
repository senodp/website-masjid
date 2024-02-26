<div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 footer-about">
                <div class="d-flex flex-column align-items-center justify-content-center text-left h-100 bg-primary p-4">
                    <?=option_value('menu_1')?>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    <div class="col-lg-4 col-md-12 pt-5 mb-5">
                        <?=option_value('menu_2')?>
                        <div class="d-flex mt-4">
                            <!-- <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a> -->
                            <!-- <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a> -->
                            <a target="_blank" title="Youtube" class="btn btn-primary btn-square me-2" href="<?=option_value('sosmed_youtube')?>"><i class="fab fa-youtube fw-normal"></i></a>
                            <a target="_blank" title="Instagram" class="btn btn-primary btn-square" href="<?=option_value('sosmed_instagram')?>"><i class="fab fa-instagram fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <?=option_value('menu_3')?>
                    </div>
                    <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                        <?=option_value('menu_4')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>