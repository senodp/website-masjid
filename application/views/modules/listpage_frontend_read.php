<!-- Blog Start -->
    <div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="row g-5">
                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="mb-5">
                        
                        <h1 class="mb-4"><?=$entry['title'];?></h1>
                        <!-- <img class="img-fluid w-100 rounded mb-5" src="img/blog-1.jpg" alt=""> -->
                        <?=$entry['content'];?>
                    </div>
                    <!-- Blog Detail End -->
    
                    <!-- Comment List Start -->
                    <div class="mb-4">
                        <div class="section-title section-title-sm position-relative pb-2 mb-3">
                            <h3 class="mb-0">Artikel Lain</h3>
                        </div>                        
                    </div>
                    <!-- Comment List End -->
    
                    <!-- Comment Form Start -->
                    
                    <!-- Comment Form End -->
                    <div class="row g-5">
                        <?php foreach ($list as $l): ?>
                        <div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
                            <div class="shadow blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="<?=img_thumb_url($l['cover'], 'listpages')?>" alt="<?=$l['title']?>">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="<?=listartikel_url($l, $Page_url)?>"><?=$l['name']?></a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><?=date_f($l['created_on'])?></small>
                                    </div>
                                    <h4 class="mb-3"><?=$l['title']?></h4>
                                    <p><?=$l['summary']?></p>
                                    <a class="text-uppercase" href="<?=listartikel_url($l, $Page_url)?>">Read More <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
    
                <!-- Sidebar Start -->
                <div class="col-lg-4">
                    
                    <!-- Category Start -->
                    <?php $this->load->view('frontend/_listpage_navigation'); ?>
                    <!-- Category End -->
    
                    <!-- Recent Post Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <div class="section-title section-title-sm position-relative pb-3 mb-4">
                            <h3 class="mb-0">Artikel Terbaru</h3>
                        </div>
                        <?php foreach ($list_new as $ln): ?>
                        <div class="shadow d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="<?=img_thumb_url($ln['cover'], 'listpages')?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="<?=listartikel_url($ln, $Page_url)?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?=$ln['title']?>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Recent Post End -->
    
                    <!-- Image Start -->
                    <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                        <img src="img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div>
                    <!-- Image End -->
                    
                </div>
                <!-- Sidebar End -->
            </div>
        </div>
    </div>
    <!-- Blog End -->