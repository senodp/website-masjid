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

        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="<?=assets_url('lib/adminto/plugins/morris/morris.css')?>">

        <!-- App CSS -->
        <link href="<?=assets_url('lib/adminto/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=assets_url('lib/material-design-iconic-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?=assets_url('lib/adminto/css/style.css')?>" rel="stylesheet" type="text/css" />

        <link href="<?=assets_url('lib/waitMe/waitMe.min.css')?>" rel="stylesheet" type="text/css" />
		<link href="<?=assets_url('lib/summernote/summernote-bs4.css')?>" rel="stylesheet" type="text/css" />

        <!-- Common CSS -->
        <link href="<?=site_url()?>assets/common/control_custom.css" rel="stylesheet" type="text/css" />
		<link href="<?=site_url()?>assets/common/control.css" rel="stylesheet" type="text/css" />

        <script src="<?=assets_url('lib/adminto/js/modernizr.min.js')?>"></script>

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

    <body class="body-<?=CI_controller_name()?>">

        