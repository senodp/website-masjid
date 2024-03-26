<!-- Galeri Start -->
    <div class="container-fluid py-0 wow fadeInUp pb-3" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- <h5 class="fw-bold text-primary text-uppercase">Poster Dakwah</h5> -->
                <h1 class="mb-0"><?=option_value('overviewpagegaleri_title')?></h1>
            </div>
            <div class="row g-5">
                <!-- Galeri list Start -->
                <div class="col-lg-12">
                    <div class="row g-5">
                        <?php foreach($ourgaleri as $key=> $val) { ?>
                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                            <div class="shadow blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <a href="<?=galeri_url($val, $Page_url)?>"><img class="img-fluid" src="<?=img_url($val['image'], 'galeri')?>" alt="<?=$val['title'];?>"></a>
                                    <!-- <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a> -->
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-0">
                                        <!-- <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Jan, 2045</small> -->
                                    </div>
                                    <h4 class="mb-0"><?=$val['title'];?></h4>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <div class="col-12 wow slideInUp" data-wow-delay="0.1s">
                            <nav aria-label="Page navigation">
                              <ul class="pagination pagination-lg m-0">
                                <li class="page-item disabled">
                                  <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                  </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                  <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div> -->
                    </div>
                </div>
                <!-- Galeri list End -->
            </div>
        </div>
    </div>
<!-- Galeri End -->