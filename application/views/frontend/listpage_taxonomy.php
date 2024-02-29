<!-- Blog Start -->
<div class="container-fluid py-0 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-0">
    	<div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"><?=$Page['title']?></h5>
            <h1 class="mb-0"><?=$taxonomy['name']?></h1>
        </div>
        <div class="row g-5">
            <!-- Blog list Start -->
            <div class="col-lg-12">
                <div class="row g-5">
                	<?php foreach ($list as $row): ?>
                    <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                        <div class="shadow blog-item bg-light rounded overflow-hidden">
                            <div class="blog-img position-relative overflow-hidden">
                                <a href="<?=listpage_url($row, $Page_url)?>"><img class="img-fluid" src="<?=imgcache_url($row['cover'], 'listpages', '500x350')?>" alt="<?=$row['title']?>"></a>
                                
                            </div>
                            <div class="p-4">
                                <div class="d-flex mb-3">
                                    
                                    <small><i class="far fa-calendar-alt text-primary me-2"></i><?=date_f($row['created_on'])?></small>
                                </div>
                                <h4 class="mb-3"><?=$row['title']?></h4>
                                <p><?=$row['summary']?></p>
                                <a class="text-uppercase" href="<?=listpage_url($row, $Page_url)?>">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Blog list End -->

        </div>
    </div>
</div>
<!-- Blog End -->  