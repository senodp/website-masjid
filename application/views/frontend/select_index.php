<div class="scroll-wrap">
      
      <!-- <div class="section-bg bg-once mask" style="background-image:url(<?=assets_url('frontend')?>/images/bg/health.jpg);"></div> -->
      <div class="scroll-wrap">
        <div class="scrollable-content">

          <div class="vertical-centred long-content">
            <div class="boxed boxed-inner">

              <!--<div class="container">-->
              <div class="intro">
                <a href="opportunity-area"><h3 class="mb-2"><span class="text-primary">Healthcare</span></h3></a>
                <h2 class="title mb-5"></h2>
              </div>

              <div class="start-content">
                <div class="filter-sidebar">
                  <div class="filter-container">
                    <h5><img src="<?=assets_url('frontend')?>/images/icon-filter.svg" class="big-icon"> Filter</h5>
                    <form class="form-filter">
                      <div class="form-group">
                        <label>Location</label>
                        <select>
                          <option selected>All province</option>
                          <option>Aceh</option>
                          <option>Sumatra Utara</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label>Investment sector</label>
                        <select>
                          <option>All investment areas</option>
                          <option>Food and beverage</option>
                          <option selected>Healthcare</option>
                          <option>Education</option>
                          <option>Infrastructure</option>
                          <option>Renewable energy & alt sources</option>
                          <option>Financials</option>
                        </select>
                      </div>


                      <div class="form-group">
                        <label>Investment sub-sector</label>
                        <select>
                          <option selected>All sub-sector</option>
                          <option>Bio-technology & pharmaceuticals</option>
                          <option>Healthcare delivery</option>
                          <option>Medical equipment & supplies</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>SDGs Addressed</label>
                        <select>
                          <option value="All" selected="selected">Select SDGs Addressed</option>
                          <option selected>1 - No Poverty</option>
                          <option selected>2 - Zero Hunger</option>
                          <option selected>3 - Good Health and Well-Being</option>
                          <option selected>4 - Quality Education</option>
                          <option selected>5 - Gender Equality</option>
                          <option selected>6 - Clean water and sanitation</option>
                        </select>
                      </div>

                      <input type="submit" class="btn btn-full-red mt-2" value="Apply">


                    </form>
                  </div>

                </div>

                <div class="result-content">

                  <div class="row">
                    <h3 class="title mb-5">Investment Opportunity Areas</h3><br>
                  </div>


                  <div class="row-specialization row">

                    <?php foreach ($ioa as $i => $row): ?>
                    <div class="col-specialization col-md-6 col-lg-6">


                      <div class="rounded-col">

                        <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>">
                          <img src="<?=img_thumb_url($row['photo'], 'ioa')?>" class="img-full mb-2">
                        </a>

                        <div class="content-specialization">

                          <div class="title-container">
                            <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>">
                              <h4><?=ucfirst($row['title'])?></h4>
                            </a>
                          </div>

                          <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>" class="icon-content-link">
                            <div class="icon-content">
                              <img src="<?=assets_url('frontend')?>/images/icon-business-model.svg" class="big-icon" style="fill: green;">
                            </div>
                            Business <br>Model
                          </a>

                          <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>" class="icon-content-link">
                            <div href="#" class="icon-content">
                              <img src="<?=assets_url('frontend')?>/images/icon-business-case.svg" class="big-icon">
                            </div>
                            Business <br>Case
                          </a>

                          <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>" class="icon-content-link">
                            <div class="icon-content">
                              <img src="<?=assets_url('frontend')?>/images/icon-impact.svg" class="big-icon">
                            </div>
                            Impact
                          </a>

                          <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>" class="icon-content-link">
                            <div class="icon-content">
                              <img src="<?=assets_url('frontend')?>/images/icon-enablers.svg" class="big-icon">
                            </div>
                            Enablers
                          </a>

                          <a href="<?php echo base_url() ?>sector/detail/<?php echo $row['id'] ?>" class="icon-content-link">
                            <div class="icon-content">
                              <img src="<?=assets_url('frontend')?>/images/icon-location.svg" class="big-icon">
                            </div>
                            Locations
                          </a>





                          <a href="" class="btn btn-outline mt-2">Explore</a>



                        </div>

                      </div>

                    </div>
                    <?php endforeach; ?>

                    


                  </div>





                </div>
              </div>





              <!-- </div>-->
            </div>

          </div>
        </div>
      </div>
    </div>