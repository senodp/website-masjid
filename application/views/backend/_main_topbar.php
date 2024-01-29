<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="d-none"> <!--d-sm-block"-->
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="pro-user-name ml-1">
                    <?=logged_in_user_('first_name')?> <?=logged_in_user_('last_name')?>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <a href="<?=site_url('logout')?>" class="dropdown-item notify-item">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul>
    <!-- LOGO -->
    <div class="logo-box text-center">
        <a href="<?=control_url()?>" class="logo" style="font-weight: bold; color: #FFF;">
            <?=app_icon()?>  <?=app_name()?>
        </a>
    </div>
    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>
        <li>
            <!-- <h4 class="page-title-main"><?=plural(backend_page_title($Page, $Page_name))?></h4> -->
            <!-- Page-Title -->
            <?php if($subtitle == 'Index'){ ?>
                <h4 class="page-title-main"><a href="<?=$Page_url?>"><?=$title?></a></h4>
            <?php }else{ ?>
                <h4 class="page-title-main"><a href="<?=$Page_url?>"><?=$title?></a><?=text_before(emptag(str_shorten($subtitle), '<abbr title="'.$subtitle.'" style="text-decoration: none;">', '</abbr>') , ' / ')?></h4>
            <?php } ?>
            <!-- /Page-Title -->
        </li>
        <?php if (CI_view_exists($navigation)): ?>
        <li class="backend-page-nav">
            <br><div class="row"><?php $this->load->view($navigation); ?></div>
        </li>
        <?php endif; ?>
    </ul>
</div>