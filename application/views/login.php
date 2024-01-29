<?php
	header("Expires: Mon, 12 Aug 1992 00:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
	header("Cache-Control: no-store, no-cache, must-revalidate"); 
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    
    <!-- App title -->
    <?php if (!isset($title)){ $title = ''; } ?>
	<?php if (!isset($subtitle)){ $subtitle = ''; } ?>
	<title><?=app_name()?> Content Management <?=text_before($title,' &gt; ')?><?=text_before($subtitle,' &gt; ')?></title>
    
    <meta name="description" content="<?=app_name()?> Content Management">
	<meta name="author" content="Komunigrafik">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->

    <!-- App CSS -->
    <link href="<?=assets_url('lib/adminto-4/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/material-design-iconic-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet" type="text/css" />
    
    <!-- Icons Css -->
    <link href="<?=assets_url('lib/adminto-4/css/icons.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?=assets_url('lib/adminto-4/css/app.min.css')?>" id="app-stylesheet" rel="stylesheet" type="text/css" />

    <!-- Common CSS -->
    <link href="<?=site_url()?>assets/common/common.css" rel="stylesheet" type="text/css" />
    <link href="<?=site_url()?>assets/common/control_custom.css" rel="stylesheet" type="text/css" />
	<link href="<?=site_url()?>assets/common/control.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
		var base_url = '<?=base_url()?>'; 
		var site_url = '<?=site_url()?>';
		var current_url = '<?=current_url()?>';
		var control_url = '<?=control_url()?>';
		var controller = '<?=CI_controller_name()?>';
		<?php if (isset($module_base_url)): ?>
		var module_base_url = '<?=site_url($module_base_url)?>';
		<?php endif; ?>
	</script>
</head>

<body class="body-login" data-sidebar="dark">
	
    <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="<?=control_url()?>" class="logo"><h1><?=app_name(false)?></h1></a>
                            <h5 class="text-muted m-t-0 font-600">content management system</h5>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">

                                <form action="<?=current_url()?>" method="post">
                                    <?=validation_block()?>
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required="" id="password" placeholder="Enter your password">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

    <script src="<?=assets_url('lib/adminto-4/js/vendor.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/js/app.min.js')?>"></script>

</body>
</html>