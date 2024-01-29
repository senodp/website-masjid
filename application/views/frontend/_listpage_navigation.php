                    <!--===================== Listpage Navigation ========================-->
                    
                    <?php if (in_array('category', $Page_options)): ?>
                            <ul class="news-category">
                                <li class="active"><a href="<?=$Page_url?>">All</a></li>
                            <?php foreach (Taxonomies($Page['id'], 'Category') as $tx): ?>
                                <li><a href="<?=$Page_url.'/category/'.$tx['id'].'/'.$tx['name']?>"><?=$tx['name']?></a></li>
                            <?php endforeach; ?>
                            </ul>
                    <?php endif; ?>
                    
                    <?php if (in_array('topic', $Page_options)): ?>
                            <ul class="news-topics">
                                <li class="active"><a href="<?=$Page_url?>">All</a></li>
                            <?php foreach (Taxonomies($Page['id'], 'Topic') as $tx): ?>
                                <li><a href="<?=$Page_url.'/topic/'.$tx['id'].'/'.$tx['name']?>"><?=$tx['name']?></a></li>
                            <?php endforeach; ?>
                            </ul>
                    <?php endif; ?>
                    
                    <!--===================== End of Listpage Navigation ========================-->