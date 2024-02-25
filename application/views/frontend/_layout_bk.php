<!DOCTYPE HTML>
<html lang="en">

<head>
  <title><?=option_value('meta_title')?></title>
  <?php if(($this->uri->segment(1) == 'our-showcase' || $this->uri->segment(1) == 'showcase') && $this->uri->segment(2) == 'read'){ ?>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="<?=$entry['title'];?>">
  <meta name="description" content="<?=$entry['summary'];?>">
  <meta name="keywords" id="index_keywords" content="<?=$entry['title'];?>">

  <!-- FACEBOOK OPEN GRAPH -->
  <meta property="og:url" content="<?=current_url(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?=$entry['title'];?>">
  <meta property="og:description" content="<?=$entry['summary'];?>">
  <meta property="og:image" content="<?=assets_url('frontend')?>/images/sabtacular-image-meta-image.png">
  <!-- FACEBOOK OPEN GRAPH -->

  <!-- TWITTER CARD -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@sabtacular">
  <meta name="twitter:title" content="<?=$entry['title'];?>">
  <meta name="twitter:description" content="<?=$entry['summary'];?>">
  <meta name="twitter:image" content="<?=assets_url('frontend')?>/images/sabtacular-image-meta-image.png" />
  <meta name="twitter:url" content="<?=current_url(); ?>">

  <?php }else{ ?>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="<?=option_value('meta_title')?>">
  <meta name="description" content="<?=option_value('meta_description')?>">
  <meta name="keywords" id="index_keywords" content="<?=option_value('meta_keyword')?>">

  <!-- FACEBOOK OPEN GRAPH -->
  <meta property="og:url" content="<?=current_url(); ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?=option_value('meta_title')?>">
  <meta property="og:description" content="<?=option_value('meta_description')?>">
  <meta property="og:image" content="<?=assets_url('frontend')?>/images/sabtacular-image-meta-image.png" />
  <!-- FACEBOOK OPEN GRAPH -->

  <!-- TWITTER CARD -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@sabtacular">
  <meta name="twitter:title" content="<?=option_value('meta_title')?>">
  <meta name="twitter:description" content="<?=option_value('meta_description')?>">
  <meta name="twitter:image" content="<?=assets_url('frontend')?>/images/sabtacular-image-meta-image.png" />
  <meta name="twitter:url" content="<?=current_url(); ?>">
  <?php } ?>

  <!-- FAVICONS -->
  <link rel="icon" href="<?=assets_url('frontend')?>/images/favicons/favicon.ico">
  <link rel="apple-touch-icon" href="<?=assets_url('frontend')?>/images/favicons/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="<?=assets_url('frontend')?>/images/favicons/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?=assets_url('frontend')?>/images/favicons/apple-touch-icon-114x114.png">

  <!-- Styles -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700&display=swap" rel="stylesheet">
  <link href="<?=assets_url('frontend')?>/fonts/pixeden/pe-icon-7-stroke.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i&display=swap" rel="stylesheet">
  <link href="<?=assets_url('frontend')?>/css/partical-animation.css" rel="stylesheet">
  <link href="fonts/material-webfont/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="<?=assets_url('frontend')?>/css/slick.css" rel="stylesheet">
  <link href="<?=assets_url('frontend')?>/css/slick-theme.css" rel="stylesheet">
  <link href="<?=assets_url('frontend')?>/css/style.min.css" rel="stylesheet" media="screen">

  <?php if($this->uri->segment(1) == 'our-showcase' && $this->uri->segment(2) == 'read'){ ?>
  <style type="text/css">
    body {
      color: #888888;
      font-size: 16px;
    }

    .vertical-centred {
      font-size: 16px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      color: #000;
    }

    blockquote {
      display: block;
      margin: auto;
      padding: 40px;
      margin-bottom: 40px;
      background: #000;
      color: #fff;
      position: relative;
    }

    .font-color {
      font-family: "Poppins", sans-serif;
      font-size: 4.96rem;
      font-weight: 300;
      text-align: center !important;
      display: unset;
      width: auto;
      margin-bottom: 10px;
    }
  </style>
  <?php } ?>

  <!-- Alert Contact -->
  <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
  crossorigin="anonymous"></script> -->

  <link rel="stylesheet" type="text/css" href="<?=assets_url('frontend')?>/alert/sweetalert.css">
  <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugin/dist/sweetalert-dev.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugin/dist/sweetalert.min.js"></script> -->
  <script type="text/javascript" src="<?=assets_url('frontend')?>/alert/sweetalert2.all.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.2/lazysizes.min.js" async=""></script>
</head>

<body>
  <div class="animsition">
    <div class="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>

    <!-- Content CLick Capture-->

    <div class="click-capture"></div>

    <!-- HEADER -->
    <?php $this->load->view('frontend/_header'); ?>
    <!-- END of HEADER -->

    <header class="navbar navbar-fullpage nav-flex boxed">
      <div class="navbar-bg"></div>
      <a class="brand" href="<?=site_url()?>">
        <img alt="" src="<?=assets_url('frontend')?>/images/logo.png" width="147">
      </a>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse"
        aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </header>
    <!-- <div class="copy-bottom white boxed">© Sabtacular 2023.</div>
    <div class="social-list social-list-bottom boxed">
      <a href="" class="icon ion-social-twitter"></a>
      <a href="" class="icon ion-social-facebook"></a>
      <a href="" class="icon ion-social-instagram"></a>
      <a href="" class="icon ion-social-linkedin"></a>
    </div> -->

    <!-- MAIN VIEW -->
    <?php $this->load->view($view); ?>
    <!-- END of MAIN VIEW -->
    
  </div>
  <!-- jQuery -->

  <script src="<?=assets_url('frontend')?>/js/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <?php if($this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''){ ?>

  <?php }else{ ?>
  <script src="<?=assets_url('frontend')?>/js/wow.min.js"></script>
  <?php } ?>
  
  <script src="<?=assets_url('frontend')?>/js/smoothscroll.js"></script>
  <script src="<?=assets_url('frontend')?>/js/animsition.js"></script>
  <script src="<?=assets_url('frontend')?>/js/jquery.validate.min.js"></script>
  <!-- <script src="<?=assets_url('frontend')?>/js/jquery.magnific-popup.min.js"></script> -->
  <?php if($this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''){ ?>

  <?php }else{ ?>
  <script src="<?=assets_url('frontend')?>/js/owl.carousel.min.js"></script>
  <?php } ?>
  <script src="<?=assets_url('frontend')?>/js/jquery.pagepiling.min.js"></script>
  <script src="<?=assets_url('frontend')?>/js/particles.min.js"></script>
  <script src="<?=assets_url('frontend')?>/js/partical-animation.js"></script>

  <?php if($this->uri->segment(1) == 'our-showcase' || $this->uri->segment(1) == 'showcase'){ ?>
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <?php } ?>
  
  <!-- Scripts -->
  <?php if($this->uri->segment(1) == 'home' || $this->uri->segment(1) == ''){ ?>

  <?php }else{ ?>
  <script src="<?=assets_url('frontend')?>/js/slick.min.js"></script>
  <?php } ?>
  
  <script src="<?=assets_url('frontend')?>/js/scripts.js"></script>
  <script>
    $(".testimonyhome").slick({
      arrows: true,
      autoplay: true,
      autoplaySpeed: 997000,
      infinite: true,
      centerMode: false,
      variableWidth: true,
      swipeToSlide: true,
      slidesToShow: 2,
      slidesToScroll: 2,
      centerPadding: '50px',
      dots: true,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            dots: true,
            arrows: true,
            centerMode: true,
            centerPadding: '10px',
            slidesToShow: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            dots: true,
            arrows: true,
            centerMode: true,
            centerPadding: '10px',
            slidesToShow: 1
          }
        }
      ]
    });
  </script>
  <?php if($this->uri->segment(1) == 'our-showcase' || $this->uri->segment(1) == 'showcase'){ ?>
    <script>
      $(window).load(function () {
        var $grid = $('.grid').isotope({
          // options
          itemSelector: '.grid-item',
          // layoutMode: 'fitRows',
          layoutMode: 'masonry'
        });

        // change is-checked class on buttons
        var $buttonGroup = $('.filters');
        $buttonGroup.on('click', 'li', function (event) {
          $buttonGroup.find('.is-checked').removeClass('is-checked');
          var $button = $(event.currentTarget);
          $button.addClass('is-checked');
          var filterValue = $button.attr('data-filter');
          $grid.isotope({ filter: filterValue });


          if (isotopeFilter != '*') {
            var $last = $archive_grid.find(isotopeFilter).last(),
              $hidden = $archive_grid.find('article').not(isotopeFilter);

            $hidden.insertAfter($last);
          }

        });
      });
    </script>
  <?php } ?>
</body>

</html>