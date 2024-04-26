<!-- Blog Start -->
  <?php if(in_array('category', $Page_options)) { ?>
    <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        <?php foreach ($list as $l): ?>
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="shadow blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <a href="<?=listartikel_url($l, $Page_url)?>"><img class="img-fluid" src="<?=img_thumb_url($l['cover'], 'listpages')?>" alt="<?=$l['title']?>"></a>
                                    <a class="position-absolute top-0 start-0 bg-warning text-dark rounded-end mt-5 py-2 px-4" href="<?=listartikel_url($l, $Page_url)?>"><?=$l['title_category']?></a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><b><?=date_f($l['created_on'])?></b></small>
                                    </div>
                                    <h4 class="mb-3"><a style="color: #091E3E;" href="<?=listartikel_url($l, $Page_url)?>"><?=$l['title']?></a></h4>
                                    <p><?=$l['summary']?></p>
                                    <a class="btn btn-primary text-uppercase" href="<?=listartikel_url($l, $Page_url)?>">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
    
                    <!-- Category Start -->
                    <?php $this->load->view('frontend/_listpage_navigation'); ?>
                    <!-- Category End -->
  
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
  <?php } else { ?>
    <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
              <h5 class="fw-bold text-primary text-uppercase"><?=$Page['title']?></h5>
              <h1 class="mb-0">List <?=$Page['title']?></h1>
            </div>
            <div class="row g-5">
                <!-- Blog list Start -->
                <div class="col-lg-8">
                    <div class="row g-5">
                        <?php foreach ($list as $l): ?>
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="shadow blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <a href="<?=listpage_url($l, $Page_url)?>"><img class="img-fluid" src="<?=img_thumb_url($l['cover'], 'listpages')?>" alt="<?=$l['title']?>"></a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><b><?=date_f($l['created_on'])?></b></small>
                                    </div>
                                    <h4 class="mb-3"><a style="color: #091E3E;" href="<?=listpage_url($l, $Page_url)?>"><?=$l['title']?></a></h4>
                                    <p><?=$l['summary']?></p>
                                    <a class="text-uppercase btn btn-primary" href="<?=listpage_url($l, $Page_url)?>">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
                <!-- Blog list End -->
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
    
                    <!-- Category Start -->
                    <?php $this->load->view('frontend/_listpage_navigation'); ?>
                    <!-- Category End -->
  
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
  <?php } ?>
    
<!-- Blog End -->  