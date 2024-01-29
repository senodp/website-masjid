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
    <meta name="description" content="<?=app_name()?> Content Management System">
	<meta name="author" content="Komunigrafik">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?=assets_url('frontend/images/favicon.ico')?>">
    <link href="<?=assets_url('lib/bootstrap-select.css')?>" rel="stylesheet" type="text/css" />
    <!-- App CSS -->
    <link href="<?=assets_url('lib/adminto-4/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/material-design-iconic-font/css/material-design-iconic-font.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/adminto-4/libs/bootstrap-datepicker/bootstrap-datepicker.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/adminto-4/libs/bootstrap-timepicker/bootstrap-timepicker.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/adminto-4/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/adminto-4/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/adminto-4/libs/select2/select2.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?=assets_url('lib/adminto-4/css/icons.min.css')?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?=assets_url('lib/adminto-4/css/app.min.css')?>" id="app-stylesheet" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/waitMe/waitMe.min.css')?>" rel="stylesheet" type="text/css" />
    <link href="<?=assets_url('lib/summernote/script/summernote-lite.min.css')?>" rel="stylesheet" type="text/css" />
	<link href="<?=assets_url('lib/summernote/script/plugin/table/summernote-ext-table.css')?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=assets_url('lib/cropperjs/cropper.min.css')?>" type="text/css">
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
		var page_name = '<?=urlencode($Page_name)?>';
		<?php if (isset($module_base_url)): ?>
		var module_base_url = '<?=site_url($module_base_url)?>';
		<?php endif; ?>
		var do_featherlightgallery = false;
	</script>
</head>
<body class="body-<?=url_title_lowercase($Page_name)?>" data-sidebar="dark">
	<div id="wrapper">
		<!-- Topbar Start -->
		<?php $this->load->view('backend/_main_topbar'); ?>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <?php $this->load->view('backend/_main_navigation'); ?>
        <!-- Left Sidebar End -->
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">
               		<?php $this->load->view($view); ?>
                </div> <!-- container -->

            </div> <!-- content -->
            <?php $this->load->view('backend/_footer'); ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
	</div>
	<!-- end wrapper -->
    <script src="<?=assets_url('lib/bootstrap-select.js')?>"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/metismenu@3.0.7/dist/metisMenu.min.js" integrity="sha256-CXoFWtETCSSvEQ9gUNr0+y97x8d6Bjkp9mZwvBfuFqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-slimscroll@1.3.8/jquery.slimscroll.min.js" integrity="sha256-qE/6vdSYzQu9lgosKxhFplETvWvqAAlmAuR+yPh/0SI=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/node-waves@0.7.6/src/js/waves.min.js"></script>
	<!--<script src="<?=assets_url('lib/adminto-4/js/vendor.min.js')?>"></script>-->
	<script src="<?=assets_url('lib/Sortable.min.js')?>"></script>
	<!-- App js -->
    <script src="<?=assets_url('lib/adminto-4/js/app.min.js')?>"></script>
    <!-- knob plugin -->
    <script src="<?=assets_url('lib/adminto-4/libs/jquery-knob/jquery.knob.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/switchery/switchery.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/multiselect/jquery.multi-select.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/jquery-quicksearch/jquery.quicksearch.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/select2/select2.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/jquery-mask-plugin/jquery.mask.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/moment/moment.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-timepicker/bootstrap-timepicker.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
    <script src="<?=assets_url('lib/adminto-4/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')?>"></script>
    <script src="<?=assets_url('lib/cropperjs/cropper.min.js')?>"></script>
    <!-- JQUERY UI -->
	<!-- <script src="<?=assets_url('lib/jquery/jquery-ui.min.js')?>"></script> -->
	<!-- Commonlib -->
	<script src="<?=assets_url('lib/imagesloaded.pkgd.min.js')?>"></script>
	<script src="<?=assets_url('lib/holder.min.js')?>"></script>
	<!-- <script src="<?=assets_url('lib/html5sortable.min.js')?>"></script> -->
	<script src="<?=assets_url('lib/waitMe/waitMe.min.js')?>"></script>
	<!-- WYSIWYG js-->
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
	<script src="<?=assets_url('lib/summernote/script/plugin/table/summernote-ext-table.js')?>"></script>
	<script src="<?=assets_url('common/control.js')?>"></script>
	<?php if (form_get('scrollIntoView')): ?>		
	<script>
		$('html, body').animate({
		    scrollTop: ( $("#<?=form_get('scrollIntoView')?>").offset().top - 175 )
		}, 250);
	</script>
	<?php endif; ?>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://sikibu.djmt.id/assets/dist/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js"></script>
    <script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#example').DataTable({
            order: [],
        });
    } );
    </script>
</body>
</html>