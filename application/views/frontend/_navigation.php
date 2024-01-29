                    <!--===================== Sidebar ========================-->

                    <div id="sidebar">
                        <div class="mod-sidebar menu">
                            <?php foreach ($Menu_parents as $Menu): ?>
                            <?php if ( $Menu['id'] == $Page['id_parent'] ): ?>
                            <h3 class="mod-sidebar-title"><?=$Menu['title']?></h3>
                            <div class="mod-sidebar-data">
                                <?php if ( array_key_exists($Menu['id'], $Menu_children) ): ?>
                                <ul class="menu">
                                <?php foreach ($Menu_children[$Menu['id']] as $Submenu): ?>
                                    <li class="<?=($Submenu['id']==$Page['id'])?'active ':''?>item<?=$Submenu['id']?>"><a href="<?=lang_url($Submenu['parent_url'].'/'.$Submenu['url'])?>"><?=$Submenu['title']?></a></li>
                                <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>   
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!--===================== End of Sidebar ========================-->