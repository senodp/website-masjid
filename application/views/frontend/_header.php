<!-- Sidebar Menu-->
    <div class="menu">
      <!-- <span class="close-menu icon-cross2 right-boxed"></span> -->
      <div class="close-menu icon-cross2 right-boxed">
        <div class="close-cross">
          <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 4000 4000" style="enable-background:new 0 0 4000 4000;" xml:space="preserve">
            <g>
              <path class="st0" d="M2353.8,2000L3926.7,427.1c97.7-97.6,97.7-256.1,0-353.7c-97.7-97.7-256-97.7-353.7,0L2000,1646.3L427,73.4
              c-97.7-97.7-256-97.7-353.7,0c-97.7,97.6-97.7,256.1,0,353.7l1573,1572.9L73.3,3573c-97.7,97.6-97.7,256.1,0,353.7
              c48.9,48.8,112.9,73.2,176.9,73.2s128-24.4,176.9-73.3l1573-1572.9l1573,1572.9c48.9,48.9,112.9,73.3,176.9,73.3
              s128-24.4,176.9-73.3c97.7-97.6,97.7-256.1,0-353.7L2353.8,2000z" />
            </g>
          </svg>
        </div>
      </div>
      <?php if($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home'){ ?>
      <ul class="menu-list right-boxed">
        <?php foreach ($Menu_parents as $Menu): ?>
        <li data-menuanchor="page1">
          <?php if($Menu['title'] == 'home' || $Menu['title'] == 'Home'){ ?>
            <a href="#page1"><?=$Menu['title']?></a>
          
          <?php }else if($Menu['title'] == 'services' || $Menu['title'] == 'Services'){ ?>
            <a href="#page3"><?=$Menu['title']?></a>
          <?php }else if($Menu['title'] == 'our showcase' || $Menu['title'] == 'Our Showcase'){ ?>
            <a href="#page4"><?=$Menu['title']?></a>
          <?php }else if($Menu['title'] == 'testimonial' || $Menu['title'] == 'Testimonial'){ ?>
            <a href="#page5"><?=$Menu['title']?></a>
          <?php }else if($Menu['title'] == 'contact' || $Menu['title'] == 'Contact'){ ?>
            <a href="#page6"><?=$Menu['title']?></a>
          <?php }else{ ?>

          <?php } ?>
        </li>
        <!-- <li data-menuanchor="page2">
          <a href="#page2">About</a>
        </li>
        <li data-menuanchor="page3">
          <a href="#page3">Services</a>
        </li>
        <li data-menuanchor="page4">
          <a href="#page4">Our Showcase</a>
        </li>
        <li data-menuanchor="page5">
          <a href="#page5">Testimonial</a>
        </li>
        <li data-menuanchor="page6">
          <a href="#page6">Contact</a>
        </li> -->
        <?php endforeach; ?>
      </ul>
      <?php }else if($this->uri->segment(1) != ''){ ?>
      <ul class="menu-list right-boxed">
        <?php foreach ($Menu_parents as $Menu): ?>
       
        <li data-menuanchor="">
          <?php if($Menu['title'] == 'home' || $Menu['title'] == 'Home'){ ?>
            <a href="<?=site_url()?>"><?=$Menu['title']?></a>
          <?php }else{ ?>

            <?php if($Menu['title'] == 'about' || $Menu['title'] == 'About'){ ?>

            <?php }else{ ?>
            <a href="<?=site_url($Menu['url'])?>"><?=$Menu['title']?></a>
            <?php } ?>
            
          <?php } ?>
        </li>
        <!-- <li data-menuanchor="page2">
          <a href="#page2">About</a>
        </li>
        <li data-menuanchor="page3">
          <a href="#page3">Services</a>
        </li>
        <li data-menuanchor="page4">
          <a href="#page4">Our Showcase</a>
        </li>
        <li data-menuanchor="page5">
          <a href="#page5">Testimonial</a>
        </li>
        <li data-menuanchor="page6">
          <a href="#page6">Contact</a>
        </li> -->
        
        <?php endforeach; ?>
      </ul>
      <?php } ?>
      <div class="menu-footer right-boxed">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 col-sm-12 col-12">
            <div class="copy">SAB - Sabtacular © 2023. All Rights Reseverd</div>
          </div>
          <div class="col-md-6 col-sm-12 col-12">
            <div class="social-media-footer d-flex justify-content-md-end justify-content-sm-center">
              <ul>
                <?php if(option_value('sosmed_facebook') == NULL){ ?>

                <?php }else{ ?>
                <li>
                  <a target="_blank" href="<?=option_value('sosmed_facebook')?>">
                    <div class="icon-facebook-headhunterindonesia">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                        enable-background="new 0 0 64 64" xml:space="preserve">
                        <path fill="#FFFFFF"
                          d="M40.438,12H46V2.546c-2-0.13-4.109-0.419-7.859-0.419C30.314,2.127,25,7.049,25,16.097V24h-9v12h9v26h11V36h7.646l1.315-12H36v-6.854C36,14.09,36.182,12,40.438,12z">
                        </path>
                      </svg>
                    </div>
                  </a>
                </li>
                <?php } ?>
                
                <?php if(option_value('sosmed_twitter') == NULL){ ?>

                <?php }else{ ?>
                <li>
                  <a target="_blank" href="<?=option_value('sosmed_twitter')?>">
                    <div class="icon-twitter-headhunterindonesia">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                        enable-background="new 0 0 64 64" xml:space="preserve">
                        <g>
                          <path fill="#FFFFFF"
                            d="M60.417,14.378c-2.088,0.928-4.337,1.554-6.694,1.833c2.405-1.442,4.254-3.723,5.129-6.447c-2.254,1.336-4.75,2.307-7.403,2.829c-2.127-2.266-5.157-3.68-8.511-3.68c-6.438,0-11.658,5.221-11.658,11.655c0,0.914,0.104,1.804,0.303,2.658c-9.687-0.487-18.276-5.127-24.025-12.181c-1.003,1.721-1.579,3.725-1.579,5.86c0,4.044,1.117,7.613,4.244,9.702C8.312,26.548,7,26.024,4,25.149c0,0.049,0,0.098,0,0.147c0,5.647,4.96,10.36,10.292,11.429c-0.977,0.27-1.538,0.41-2.598,0.41c-0.753,0-1.248-0.074-1.958-0.208c1.483,4.628,5.903,8.001,11.005,8.093c-3.99,3.129-8.956,4.991-14.418,4.991c-0.939,0-1.84-0.054-2.75-0.164c5.156,3.312,11.3,5.239,17.881,5.239c21.44,0,33.174-17.763,33.174-33.167c0-0.506-0.008-1.008-0.03-1.507C56.875,18.77,58.854,16.717,60.417,14.378L60.417,14.378z">
                          </path>
                        </g>
                      </svg>
                    </div>
                  </a>
                </li>
                <?php } ?>
                

                <?php if(option_value('sosmed_linkedin') == NULL){ ?>

                <?php }else{ ?>
                <li>
                  <a target="_blank" href="<?=option_value('sosmed_linkedin')?>">
                    <div class="icon-linkedin-headhunterindonesia">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="334.285 0 756.076 768"
                        enable-background="new 334.285 0 756.076 768" xml:space="preserve">
                        <path fill="#FFFFFF" d="M1023.165,23.994h-616.33c-28.8,0-51.841,23.041-51.841,51.841v616.33c0,28.8,23.041,51.841,51.841,51.841h616.33c28.8,0,51.841-23.041,51.841-51.841V75.835C1075.006,47.035,1051.965,23.994,1023.165,23.994z M599.798,571.203h-72.001V311.999h72.001V571.203z M566.678,254.398L566.678,254.398c-30.241,0-48.962-12.96-48.962-38.88c0-25.921,20.161-41.761,48.962-41.761c28.8,0,48.96,14.4,48.96,40.321S596.917,254.398,566.678,254.398z M916.604,571.203h-72.001V427.201c0-36.001-15.841-59.042-47.521-59.042c-24.481,0-41.762,15.84-47.521,31.681c-2.88,5.76-5.76,12.96-5.76,21.6v149.763h-84.961c0,0,1.44-244.804,0-259.204h84.961v30.241c14.4-17.281,28.8-43.201,74.881-43.201c57.602,0,97.922,37.44,97.922,118.081V571.203z" />
                      </svg>
                    </div>
                  </a>
                </li>
                <?php } ?>
                

                <?php if(option_value('sosmed_youtube') == NULL){ ?>

                <?php }else{ ?>
                <li>
                  <a target="_blank" href="<?=option_value('sosmed_youtube')?>">
                    <div class="icon-youtube-headhunterindonesia">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="347.5 22.5 665.212 720"
                        enable-background="new 347.5 22.5 665.212 720" xml:space="preserve">
                        <g>
                          <path fill="#FFFFFF"
                            d="M983,234c-7.2-26.4-28.8-48-55.2-55.2C878.6,165.6,683,165.6,683,165.6s-195.6,0-244.8,13.2c-26.4,7.2-48,28.8-55.2,55.2c-13.2,48-13.2,150-13.2,150s0,102,13.2,150c7.2,26.4,28.8,48,55.2,55.2c49.2,13.2,244.8,13.2,244.8,13.2s195.6,0,244.8-13.2c26.4-7.2,48-28.8,55.2-55.2c13.2-49.2,13.2-150,13.2-150S996.2,282,983,234zM362,477.6V290.4L786.2,384L623,477.6z" />
                      </svg>
                    </div>
                        </g>
                  </a>
                </li>
                <?php } ?>
                
                <?php if(option_value('sosmed_instagram') == NULL){ ?>

                <?php }else{ ?>
                <li>
                  <a target="_blank" href="<?=option_value('sosmed_instagram')?>">
                    <div class="icon-instagram-headhunterindonesia">
                      <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="299.5 0 768 768"
                        enable-background="new 299.5 0 768 768" xml:space="preserve">
                        <g>
                          <path fill="#FFFFFF"
                            d="M825.154,32H540.846C424.415,32,331,125.415,331,241.846v284.308C331,642.585,424.415,736,540.846,736h284.308C941.585,736,1035,642.585,1035,526.154V241.846C1035,125.415,941.585,32,825.154,32z M967.308,528.862c0,77.168-62.277,139.445-139.445,139.445H538.138c-77.169,0-139.446-62.277-139.446-139.445V239.139c0-77.169,62.277-139.446,139.446-139.446h291.077c75.815,0,138.093,62.277,138.093,139.446V528.862z" />
                          <path fill="#FFFFFF"
                            d="M683,202.585c-100.185,0-181.415,81.23-181.415,181.415S582.815,565.415,683,565.415S864.415,484.185,864.415,384S783.185,202.585,683,202.585z M683,495.016c-60.923,0-111.016-50.093-111.016-111.016S622.077,272.985,683,272.985S794.016,323.077,794.016,384S743.923,495.016,683,495.016z" />
                          <circle fill="#FFFFFF" cx="865.77" cy="203.938" r="43.323" />
                        </g>
                      </svg>
                    </div>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Navbar -->