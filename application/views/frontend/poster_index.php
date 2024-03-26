<!-- Poster Start -->
    <div class="container-fluid py-0 wow fadeInUp pb-3" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- <h5 class="fw-bold text-primary text-uppercase">Poster Dakwah</h5> -->
                <h1 class="mb-0"><?=option_value('overviewpageposter_title')?></h1>
            </div>
            <div class="row g-5">
                <?php foreach($ourposter as $key=> $val) { ?>
                <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                    <div class="shadow team-item bg-dark rounded overflow">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="poster-item img-fluid w-100" src="<?=img_url($val['image'], 'poster')?>" alt="">
                        </div>
                        <div class="text-center py-4">
                            <!-- <h4 class="text-primary">Full Name</h4> -->
                            <p class="text-uppercase m-0" style="color: #fff;"><?=$val['title'];?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
<!-- Poster End -->  

<!-- Modal Poster Start -->
    <div class="modal fade" id="poster-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img class="modal-img img-fluid w-100" src="" alt="">
          </div>
          
        </div>
      </div>
    </div>
<!-- Modal Poster End -->