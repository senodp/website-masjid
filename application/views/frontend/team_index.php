<!-- Team Start -->
    <div class="container-fluid py-0 wow fadeInUp pb-3" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- <h5 class="fw-bold text-primary text-uppercase">Team Members</h5> -->
                <?=option_value('overviewpageteam_summary')?>
            </div>
            <div class="row g-5">
                <?php foreach ($ourteam as $row): ?>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light rounded overflow">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="<?=img_url($row['image'], 'team')?>" alt="">
                            <div class="team-social">
                                <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a> -->
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><?=$row['title'];?></h4>
                            <p class="text-uppercase m-0"><?=$row['position'];?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<!-- Team End --> 