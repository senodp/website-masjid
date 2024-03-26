<!-- Video Start -->
    <div class="container-fluid py-0 wow fadeInUp pb-3" data-wow-delay="0.1s">
        <div class="container py-0">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <!-- <h5 class="fw-bold text-primary text-uppercase">Poster Dakwah</h5> -->
                <h1 class="mb-0"><?=option_value('overviewpagevideo_title')?></h1>
            </div>
            <div class="row g-5">
                <!-- Video list Start -->
                <div class="col-lg-12">
                    <div class="row g-5">
                        <?php foreach ($ourvideo as $row): ?>
                        <div class="col-md-4 wow slideInUp" data-wow-delay="0.1s">
                            <div class="shadow blog-item bg-primary rounded overflow-hidden">
                                <div class="detail-img position-relative overflow-hidden">
                                    <?=$row['embed'];?>
                                    <!-- <iframe width="360" height="202" src="https://www.youtube.com/embed/QKZwMwkGd2o?si=1mg3pVs97Hi8zr3U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->
                                    <!-- <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a> -->
                                </div>
                                <div class="p-3">
                                    <h5 class="mb-0" style="color:#fff;"><?=$row['title'];?></h5>
                                </div>
                                
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <div id="myModal" class="modal">
                          <span class="close">&times;</span>
                          <img class="modal-content" id="img01">
                          <div id="caption"></div>
                        </div>
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
                <!-- Video list End -->
    
            </div>
        </div>
    </div>
    <!-- Video End -->