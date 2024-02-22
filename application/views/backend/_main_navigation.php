<div class="left-side-menu">
    <div class="slimscroll-menu">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title" style="color: #71b6f9;">Navigation</li>
            <?php
                $icon_page = '<i class="mdi mdi-stop-circle"></i>';
                $icon_menu = '<i class="mdi mdi-menu"></i>';
            ?>
            <?php foreach ($Menu_parents as $mp): if (is_allowed($mp['url'])): ?>
                <li>
                <?php if ($mp['template'] == 'menu'): ?>
                    <a href="javascript: void(0);">
                        <?=$icon_menu?>
                        <span><?=$mp['title']?></span>
                        <span class="menu-arrow"></span>
                    </a>
                    <?php if (array_key_exists($mp['id'], $Menu_children)): ?>
                        <ul class="nav-second-level" aria-expanded="false">
                            <?php foreach ($Menu_children[$mp['id']] as $mc): ?>
                                <?php if ($mc['template'] == 'menu'): ?>
                                <li>
                                    <a href="javascript: void(0);">
                                        <?=$icon_menu?>
                                        <span><?=$mc['title']?></span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <?php if (array_key_exists($mc['id'], $Menu_children)): ?>
                                        <ul class="nav-third-level" aria-expanded="false">
                                        <?php foreach ($Menu_children[$mc['id']] as $mgc): ?>
                                        <li>  
                                        <?php if ($mgc['template'] == 'menu'): ?>
                                            <a href="javascript: void(0);"> 
                                                <?=$icon_page?>
                                                <span><?=$mgc['title']?></span> 
                                            </a>
                                            <?php if (array_key_exists($mgc['id'], $Menu_children)): ?>
                                                <ul class="nav-third-level" aria-expanded="false">
                                                <?php foreach ($Menu_children[$mgc['id']] as $mggc): ?>
                                                    <li><a href="<?=control_url($mggc['url'])?>"><?=$mggc['title']?></a></li>
                                                <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?=control_url($mgc['url'])?>">
                                                <?=$icon_page?>
                                                <span><?=$mgc['title']?></span>
                                            </a>
                                        <?php endif; ?>
                                        </li>
                                        <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                <?php else: ?>
                                <li>
                                    <a href="<?=control_url($mc['url'])?>">
                                        <?=$icon_page?>
                                        <span style="font-size: 13px;"><?=$mc['title']?></span>
                                    </a>
                                <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php else: ?>
                <!-- <li> -->
                    <a href="<?=control_url($mp['url'])?>">
                        <?=$icon_page?>
                        <span><?=$mp['title']?></span>
                    </a>
                <?php endif; ?>
                </li>
            <?php endif; endforeach; ?>
            
            <?php if (!empty($Menu_hidden['parents']) && is_admin()): ?>
                <li class="menu-title mt-2" style="color: #f9c851;">Hidden Pages</li>
            <?php foreach ($Menu_hidden['parents'] as $hp): if ( is_allowed($hp['url']) ): ?>
                <?php if ($hp['template'] == 'menu'): ?>
                <li>
                    <a href="javascript: void(0);">
                        <?=$icon_menu?>
                        <span><?=$hp['title']?></span>
                        <span class="menu-arrow"></span>
                    </a>
                    <?php if (array_key_exists($hp['id'], $Menu_children)): ?>
                        <ul class="nav-second-level" aria-expanded="false">
                        <?php foreach ($Menu_hidden['children'][$hp['id']] as $hc): ?>
                            <li><a href="<?=control_url($hc['url'])?>"><?=$hc['title']?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                <?php else: ?>
                <li>
                    <a href="<?=control_url($hp['url'])?>">
                        <?=$icon_menu?>
                        <span><?=$hp['title']?></span>
                    </a>
                <?php endif; ?>
                </li>
            <?php endif; endforeach; ?>
            <?php endif; ?>

            <?php if (is_admin()): ?>
                <li class="menu-title mt-2" style="color: #71b6f9;">Administration</li>
                <li>
                    <a href="<?=control_url('page')?>" title="Page Manager" data-toggle="tooltip" data-placement="bottom"><?=mdi('collection-text')?>
                        <span>Page Manager</span>
                    </a>
                </li>
                <li>
                    <a href="<?=control_url('user')?>" title="User Manager" data-toggle="tooltip" data-placement="bottom"><?=mdi('accounts')?>
                        <span>User Manager</span>
                    </a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>